<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use App\Proveedores;
class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //$documentos = Documento::with('Proveedores')->toSql();
        $documentos = Documento::with('prov')->get();
        //$documentos = Documento::all();
        //$documentos = Documento::all();
        //dd($documentos);
        //$poveedornombre = Proveedores::find($documentos->proveedor);
        //$documentos = Proveedores::where('proveedor',$documentos->id_documento);
        return view('documentos.index', compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proveedores = Proveedores::all();
        return view('documentos.create', compact('proveedores'));
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
        }
        $documento = new Documento([
            'numero_documento' => $request->get('numero_documento'),
            'proveedor'=> $request->get('proveedor'),
            'fecha_documento'=> $request->get('fecha_documento'),
            'fecha_vencimiento'=> $request->get('fecha_vencimiento'),
            'tipo'=> $request->get('tipo'),
            'monto_documento'=> $request->get('monto_documento'),
            'documento_original'=> $fileName
        ]);
        $documento->save();
        return redirect('/Documento')->with('success', 'Documento Agregado');
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
        //
    }
}
