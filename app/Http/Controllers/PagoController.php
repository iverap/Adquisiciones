<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use App\Pago;


class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seleccionar()
    {
        $documentos = Documento::with('prov')->get();
        return view('pagos.seleccionar', compact('documentos'));
    }

    public function index()
    {
        $pagos = Pago::all();
        return view('pagos.index', compact('pagos'));
    }



    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function pagar(Request $request)
    {
        //var_dump($request->datos);
        $ids = json_decode($request->datos);
        //var_dump($ids);
        $documentos = Documento::with('prov')->find($ids);
        //var_dump($documentos);
        return view('pagos.create', compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    public function destroy($id)
    {
        //
    }
}
