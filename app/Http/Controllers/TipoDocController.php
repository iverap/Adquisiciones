<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoDocumento;
class TipoDocController extends Controller
{

    public function index()
    {
        //$documentos = Documento::with('Proveedores')->toSql();
       // $documentos = Documento::with('prov')->get();
        $tiposdoc= TipoDocumento::all();
        //$documentos = Documento::all();
        //dd($documentos);
        //$poveedornombre = Proveedores::find($documentos->proveedor);
        //$documentos = Proveedores::where('proveedor',$documentos->id_documento);
        return view('tiposdoc.index', compact('tiposdoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tiposdoc = TipoDocumento::all();
        return view('tiposdoc.create', compact('tiposdoc'));
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
      //  $request->validate([
      //      'nombre_tipodoc'=>'required|varchar|max:255'
      //  ]);
        $tipodoc = new TipoDocumento([
            'nombre_tipodoc' => $request->get('nombre_tipodoc')
        ]);
        $tipodoc->save();
        return redirect('/TipoDocumento')->with('success', 'Tipo Documento Agregado');
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
        $tiposdoc = TipoDocumento::find($id);
        $tiposdoc->delete();
        return redirect('/TipoDocumento')->with('success', 'Tipo Documento Eliminado');
    }
}