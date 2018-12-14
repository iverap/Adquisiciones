<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Charts\categorias;

class CategoriaController extends Controller
{

    public function index()
    {
        //$documentos = Documento::with('Proveedores')->toSql();
       // $documentos = Documento::with('prov')->get();
        $categorias= Categoria::all();
        //$documentos = Documento::all();
        //dd($documentos);
        //$poveedornombre = Proveedores::find($documentos->proveedor);
        //$documentos = Proveedores::where('proveedor',$documentos->id_documento);
        return view('categorias.index', compact('categorias'));
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
        return view('categorias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'nombre_categoria'=>'required|varchar|max:200'
        ]);
        $categoria = new Categoria([
            'nombre_categoria' => $request->get('nombre_categoria')
        ]);
        $categoria->save();
        return redirect('/Categoria')->with('success', 'Categoria Agregada');
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
    public function edit($id_categoria)
    {
        $categoria = Categoria::find($id_categoria);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id_categoria)
    {

        $categoria = Categoria::find($id_categoria);
        $categoria->nombre_categoria = $request->get('nombre_categoria');
        $categoria->save();

        return redirect('/Categoria')->with('success', 'Categoria actualizada');
    }

    public function destroy($id)
    {
        $categorias = Categoria::find($id);
        $categorias->delete();
        return redirect('/Categoria')->with('success', 'Categoria Eliminada');
    }
    public function chart()
    {
        $result = \DB::table('categorias')
            ->where('nombre_categoria','=','papeleria')
            ->orderBy('id_categoria', 'ASC')
            ->get();
        return response()->json($result);
    }
    public function nosequehago(){
        $data = Categoria::groupBy('nombre_categoria')
            ->get()
/**
            ->map(function ($item) {
                // Return the number of persons with that age
                return count($item);
            })**/;

        $chart = new categorias;
        $chart->labels($data->keys());

        $chart->dataset('My dataset', 'line', $data->values());
        return view('categorias.chart', compact('chart'));
    }
}