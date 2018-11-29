<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use App\Documento;
use App\Proveedores;
use App\Compra;
use App\TipoDocumento;
use File;
class DocumentoController extends Controller
{
    public function buscar()
    {
        $proveedores = Proveedores::all();
        return view('documentos.buscar', compact('proveedores'));
    }

    public function busqueda(Request $request)
    {
        $request->validate([
            'inicio'=>'date',
            'fin'=>'after_or_equal:inicio'
        ]);

        if ($request->pagos) {
            if ($request->todos) {
                $documentos = Documento::with('prov')->whereColumn('monto_documento','<>','monto_pagado')->whereBetween('fecha_documento', [$request->inicio, $request->fin])->get();
            } else {
                $documentos = Documento::with('prov')->whereColumn('monto_documento','<>','monto_pagado')->where('proveedor', '=', $request->proveedor)->whereBetween('fecha_documento', [$request->inicio, $request->fin])->get();
            }
        }else{
            if ($request->todos) {
                $documentos = Documento::with('prov')->whereBetween('fecha_documento', [$request->inicio, $request->fin])->get();
            } else {
                $documentos = Documento::with('prov')->where('proveedor', '=', $request->proveedor)->whereBetween('fecha_documento', [$request->inicio, $request->fin])->get();
            }
        }

        return view('documentos.index', compact('documentos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $documentos = Documento::with('prov')->get();
        //$documentos = Documento::all();
        //$documentos = Documento::with(array('prov' => function($query) {
            //$query->withTrashed();
        //}))->get();

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
        $categorias = Categoria::all();
        $tiposdoc = TipoDocumento::all();
        return view('documentos.create', compact('proveedores','categorias','tiposdoc'));
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
            'fecha_vencimiento'=>'required|date|after_or_equal:fecha_documento',
            'tipo'=>'required',
            'monto_documento'=>'required|integer',
            'documento_original'=>'image|nullable|max:1999',
            'categoria'=>'required',
        ]);

        if ($request->hasFile('documento_original')){
            $extension = $request->file('documento_original')->getClientOriginalExtension();
            $fileName = $request->get('proveedor').'_'.$request->get('numero_documento').'_'.time().'.'.$extension;
            $path = $request->file('documento_original')->storeAs('public/imagenes_facturas', $fileName);
        } else{
            $fileName = 'noImage.jpg';
        }
        $documento = Documento::create([
            'numero_documento' => $request->get('numero_documento'),
            'proveedor'=> $request->get('proveedor'),
            'fecha_documento'=> $request->get('fecha_documento'),
            'fecha_vencimiento'=> $request->get('fecha_vencimiento'),
            'tipo'=> $request->get('tipo'),
            'monto_documento'=> $request->get('monto_documento'),
            'monto_restante'=> $request->get('monto_documento'),
            'monto_pagado'=> 0,
            'documento_original'=> $fileName
        ]);
        $documento->save();


        $compra = new Compra([
            'categoria' => $request->get('categoria'),
            'documento'=> $documento->id_documento,
            'detalle'=> $request->get('detalle'),
            'descripcion_gasto'=> $request->get('descripcion_gasto'),
            'monto_gasto'=> $documento->monto_documento,
        ]);
        $compra->save();
       //dd($compra->monto_gasto);
        return redirect('/Documento')->with('success', 'Documento Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($documento_original)
    {
        $url = url('storage/imagenes_facturas/'.$documento_original);
        //$url = storage_path('app\public').'/imagenes_facturas/'.$documento_original;
        //$file_path = $documento_original;
        return view('documentos.show', compact('url'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_documento)
    {
        //$documento = Documento::find($id_documento);
        $documento = Documento::with('prov')->find($id_documento);
        //$documento = Documento::with('prov')->find($id_documento);
        $proveedores = Proveedores::all();
        return view('documentos.edit', compact('documento','proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_documento)
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

        $documento = Documento::find($id_documento);
        $documento->numero_documento = $request->get('numero_documento');
        $documento->proveedor = $request->get('proveedor');
        $documento->fecha_documento = $request->get('fecha_documento');
        $documento->fecha_vencimiento = $request->get('fecha_vencimiento');
        $documento->tipo = $request->get('tipo');
        $documento->monto_documento = $request->get('monto_documento');

        if ($request->hasFile('documento_original')){
            $file_path = storage_path('app\public').'/imagenes_facturas/'.$documento->documento_original;
            if(File::exists($file_path)) File::delete($file_path);
            $extension = $request->file('documento_original')->getClientOriginalExtension();
            $fileName = $request->get('proveedor').'_'.$request->get('numero_documento').'_'.time().'.'.$extension;
            $request->file('documento_original')->storeAs('public/imagenes_facturas', $fileName);
            $documento->documento_original = $fileName;
        }
        $documento->save();

        return redirect('/Documento')->with('success', 'Documento actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_documento)
    {
        $documento = Documento::find($id_documento);
        $documento->delete();
        $compra = Compra::where('documento',$id_documento);
        $compra->delete();
        return redirect('/Documento')->with('success', 'Documento Anulado');
    }
}
