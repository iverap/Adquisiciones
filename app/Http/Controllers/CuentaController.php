<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;

class CuentaController extends Controller
{

    public function index()
    {
        //$documentos = Documento::with('Proveedores')->toSql();
       // $documentos = Documento::with('prov')->get();
        $cuentas = Cuenta::all();
        //$documentos = Documento::all();
        //dd($documentos);
        //$poveedornombre = Proveedores::find($documentos->proveedor);
        //$documentos = Proveedores::where('proveedor',$documentos->id_documento);
        return view('cuentas.index', compact('cuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cuentas = Cuenta::all();
        return view('cuentas.create', compact('cuentas'));
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
        //$request->validate([
        //    'nombre_categoria'=>'required|varchar|max:255'
       // ]);
        $cuenta = new Cuenta([
            'nombre_cuenta' => $request->get('nombre_cuenta')
        ]);
        $cuenta->save();
        return redirect('/Cuenta')->with('success', 'Cuenta Agregada');
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
    public function edit($id_cuenta)
    {
        $cuenta = Cuenta::find($id_cuenta);
        return view('cuentas.edit', compact('cuenta'));
    }

    public function update(Request $request, $id_cuenta)
    {

        $cuenta = Cuenta::find($id_cuenta);
        $cuenta->nombre_cuenta = $request->get('nombre_cuenta');
        $cuenta->save();

        return redirect('/Cuenta')->with('success', 'Cuenta actualizada');
    }

    public function destroy($id)
    {
        $cuentas = Cuenta::find($id);
        $cuentas->delete();
        return redirect('/Cuenta')->with('success', 'Cuenta Eliminada');
    }
    public function chart()
    {
        $result = \DB::table('cuentas')
            ->where('nombre_cuenta','=','scotiabank')
            ->orderBy('id_cuenta', 'ASC')
            ->get();
        return response()->json($result);
    }

}