<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;
use App\Proveedores;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proveedores = Proveedores::all();

        return view('Proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('proveedores.create');
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
            'nombre_proveedor'=>'required|max:49',
            'rut_proveedor' => 'required|max:49',
            'nro_cuenta' => 'nullable|max:49',
            'banco' => 'nullable|max:49'
        ]);
        $proveedor = new Proveedores([
            'nombre_proveedor' => $request->get('nombre_proveedor'),
            'rut_proveedor'=> $request->get('rut_proveedor'),
            'nro_cuenta'=> $request->get('nro_cuenta'),
            'banco'=> $request->get('banco')
        ]);
        $proveedor->save();
        return redirect('/Proveedores')->with('success', 'Proveedor Agregado');
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
    public function edit($id_proveedor)
    {
        //
        $proveedor = Proveedores::find($id_proveedor);

        return view('Proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_proveedor)
    {
        //
        $request->validate([
            'nombre_proveedor'=>'required|max:49',
            'rut_proveedor' => 'required|max:49',
            'nro_cuenta' => 'nullable|max:49',
            'banco' => 'nullable|max:49'
        ]);

        $proveedor = Proveedores::find($id_proveedor);
        $proveedor->nombre_proveedor = $request->get('nombre_proveedor');
        $proveedor->rut_proveedor = $request->get('rut_proveedor');
        $proveedor->nro_cuenta = $request->get('nro_cuenta');
        $proveedor->banco = $request->get('banco');
        $proveedor->save();

        return redirect('/Proveedores')->with('success', 'Proveedor actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_proveedor)
    {
        //
        $proveedor = Proveedores::find($id_proveedor);
        $proveedor->delete();

        return redirect('/Proveedores')->with('success', 'Proveedor Eliminado');
    }
}
