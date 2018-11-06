<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedioPago;
class MedioPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //$documentos = Documento::with('Proveedores')->toSql();
        //$compras = Compra::with('categoria')->get();
        //$compras = Compra::with('documento')->get();
        $mediopagos = MedioPago::all();
        //$documentos = Documento::all();
        //$documentos = Documento::all();
        //dd($documentos);
        //$poveedornombre = Proveedores::find($documentos->proveedor);
        //$documentos = Proveedores::where('proveedor',$documentos->id_documento);
        return view('mediopagos.index', compact('mediopagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      //  $categorias = Categoria::all();
       // $documentos = Documento::all();
        return view('mediopagos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'medio', 'banco', 'nro_cuenta', 'nro_transaccion'
        $mediopago = new MedioPago([
            'medio' => $request->get('medio')
        ]);
        $mediopago->save();
        return redirect('/MedioPago')->with('success', 'Medio pago Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $mediopagos = MedioPago::find($id);
        $mediopagos->delete();
        return redirect('/MedioPago')->with('success', 'Medio pago Eliminado');
    }
}
