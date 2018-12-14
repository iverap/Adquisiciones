<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\MedioPago;
use App\Proveedores;
use Illuminate\Http\Request;
use App\Documento;
use App\Pago;
use Illuminate\Support\Facades\DB;


class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar()
    {
        $proveedores = Proveedores::all();
        return view('pagos.buscar', compact('proveedores'));
    }

    public function busqueda(Request $request)
    {
        $request->validate([
            'inicio'=>'date',
            'fin'=>'after_or_equal:inicio'
        ]);

        $pagos_std = DB::select('SELECT pagos.id_pago
                                  FROM pagos,documento_pago,documentos,proveedores
                                  where documentos.proveedor = '.$request->proveedor.' 
                                  and documentos.id_documento = documento_pago.documento_id_documento 
                                  and pagos.id_pago = documento_pago.pago_id_pago
                                  and fecha_pago >='.$request->inicio.' and fecha_pago >='.$request->fin.'
                                  ORDER BY fecha_pago');

        $pagos_id = json_decode(json_encode($pagos_std), true);
        $pagos = Pago::find($pagos_id);
        return view('pagos.index', compact('pagos'));
    }

    public function selecProv()
    {
        $proveedores = Proveedores::all();
        return view('pagos.selecProv', compact('proveedores'));
    }

    public function seleccionar(Request $request)
    {
        $documentos = Documento::with('prov')->where('proveedor', '=',$request->proveedor)->whereColumn('monto_documento','<>','monto_pagado')->get();
        return view('pagos.seleccionar', compact('documentos'));
    }



    public function index()
    {
        $pagos = Pago::with('medios')->get();
        return view('pagos.index', compact('pagos'));
    }



    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function pagar(Request $request) //create
    {
        //var_dump($request->datos);
        $ids = json_decode($request->datos);
        //var_dump($ids);
        $documentos = Documento::with('prov')->find($ids);
        //var_dump($documentos);
        $medio_pagos=MedioPago::all();
        $cuentas = Cuenta::all();
        return view('pagos.create', compact('documentos','medio_pagos','cuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //not used
    {
        $documentos = Documento::all();

        return view('pagos.create', compact('documentos'));
    }
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */

    public function store(Request $request)
    {
        /*
        $request->validate([
            'numero_documento'=>'required|integer',
            'proveedor' => 'required',
            'fecha_documento'=>'required|date',
            'fecha_vencimiento'=>'required|date',
            'tipo'=>'required',
            'monto_documento'=>'required|integer',
            'documento_original'=>'image|nullable|max:1999'
        ]);

        if ($request->hasFile('documento_original')){
            $extension = $request->file('documento_original')->getClientOriginalExtension();
            $fileName = $request->get('proveedor').'_'.$request->get('numero_documento').'_'.time().'.'.$extension;
            $path = $request->file('documento_original')->storeAs('public/imagenes_facturas', $fileName);
        } else{
            $fileName = 'noImage.jpg';
        }*/
        $ids = $request->get('ids');
        $montos = $request->get('montos');
        $sumaMontos = 0;
        for($i = 0;$i < sizeof($montos);$i++) {
            $sumaMontos += $montos[$i];
        }
        $pago = new Pago([
            'monto' => $sumaMontos,
            'banco' => $request->get('banco'),
            'observacion' => $request->get('observacion'),
            'fecha_pago' => $request->get('fecha_pago'),
            'cuenta' => $request->get('cuenta'),
            'nro_cuenta' => $request->get('nro_cuenta'),
            'nro_transaccion' => $request->get('nro_transaccion'),
            'medio_pago' => $request->get('medio_pago')
        ]);
        $pago->save();
        $pagoId = Pago::find($pago->id_pago);
        for($i = 0;$i < sizeof($montos);$i++) {
            $pagoId->documentos()->attach($ids[$i], ['monto' => $montos[$i]]);
        }
        $documentos = Documento::find($ids);
        $i=0;
        foreach ($documentos as $documento){
            $documento->monto_restante -= $montos[$i];
            $documento->monto_pagado += $montos[$i];
            $documento->save();
            $i++;
            }



        return redirect('/Pago')->with('success', 'Pago Agregado');

        /*
        $ids = $request->get('ids');
        $montos = $request->get('montos');
        for($i = 0;$i < sizeof($ids);$i++){
            echo $ids[$i];
            echo'<br>';
            echo $montos[$i];
            echo'<br>';
            echo'<br>';
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pago)

    {
        $pago = pago::find($id_pago);
        foreach($pago->documentos as $documento) {
            $documento->monto_restante += $documento->pivot->monto;
            $documento->monto_pagado -= $documento->pivot->monto;
            $documento->save();
        }
        $pago->documentos->detach();
        $pago->delete();
        return redirect('/Pago')->with('success', 'Pago Anulado');
    }
}
