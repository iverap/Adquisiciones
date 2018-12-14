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
            'descripcion_gasto'=>'max:100'
        ]);

        $compra = new Compra([
            'categoria' => $request->get('categoria'),
            'documento'=> $request->get('documento'),
            //'detalle'=> $request->get('detalle'),
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
    categ docum*/
    public function edit($id_compra)
    {
        //$documento = Documento::find($id_documento);
        $compra = Compra::find($id_compra);
        //$documento = Documento::with('prov')->find($id_documento);
        $categorias = Categoria::all();
        $documentos = Documento::all();
        return view('compras.edit', compact('compra','documentos','categorias'));
    }

    public function update(Request $request, $id_compra)
    {
        //
        /**  $request->validate([
            'numero_documento'=>'required|integer',
            'proveedor' => 'required',
            'fecha_documento'=>'required|date',
            'fecha_vencimiento'=>'required|date',
            'tipo'=>'required',
            'monto_documento'=>'required|integer',
            'documento_original'=>'image|nullable|max:1999'
        ]);
         */
        $compra = Compra::find($id_compra);
        $compra->categoria = $request->get('categoria');
        $compra->documento = $request->get('documento');
        //$compra->detalle = $request->get('detalle');
        $compra->descripcion_gasto = $request->get('descripcion_gasto');
        $compra->save();

        return redirect('/Compra')->with('success', 'Compra actualizada');
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
