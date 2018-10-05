<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Categoria;
use App\Documento;
class CompraController extends Controller
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
        $compras = Compra::all();
        //$documentos = Documento::all();
        //$documentos = Documento::all();
        //dd($documentos);
        //$poveedornombre = Proveedores::find($documentos->proveedor);
        //$documentos = Proveedores::where('proveedor',$documentos->id_documento);
        return view('compras.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        $documentos = Documento::all();
        return view('compras.create')->with([
            'documentos' => $documentos,
            'categorias' => $categorias,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'categoria'=>'required',
            'documento' => 'required',
            'monto_gasto'=>'required|integer',
        ]);

        $compra = new Compra([
            'categoria' => $request->get('categoria'),
            'documento'=> $request->get('documento'),
            'detalle'=> $request->get('detalle'),
            'descripcion_gasto'=> $request->get('descripcion_gasto'),
            'monto_gasto'=> $request->get('monto_gasto')
        ]);
        $compra->save();
        return redirect('/Compra')->with('success', 'Compra Agregada');
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
        $compras = Compra::find($id);
        $compras->delete();
        return redirect('/Compra')->with('success', 'Compra Eliminada');
    }
}
