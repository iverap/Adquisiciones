<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;

class RendicionController extends Controller
{


    public function seleccionar()
    {
        return view('rendiciones.seleccionar');
    }

    public function index(Request $request)
    {
        $request->validate([
            'inicio'=>'date',
            'fin'=>'after_or_equal:inicio'
        ]);

        $documentos = Documento::with('prov')->where('monto_restante','=','0')->whereBetween('fecha_documento', [$request->inicio, $request->fin])->get();
        return view('rendiciones.index', compact('documentos'));


    }


}
