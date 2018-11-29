<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use App\Proveedores;
use App\Categoria;
use DB;

class GraficoController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'inicio'=>'date',
            'fin'=>'after_or_equal:inicio'
        ]);

        $labels = array();
        $montos = array();
        $inicio = date_create($request->inicio);
        $fin = date_create($request->fin);
        $i = 0;

        $pagos =DB::select
        ('SELECT MONTH(fecha_pago) MesDePago, buscados.monto 
        FROM (SELECT DISTINCT id_pago,pagos.monto, fecha_pago 
              FROM (SELECT id_documento 
                    FROM documentos 
                    WHERE proveedor = '.$request->proveedor.') AS ids, 
              pagos,documento_pago 
              WHERE ids.id_documento=documento_id_documento and id_pago=pago_id_pago and fecha_pago >='.$request->inicio.' and fecha_pago >='.$request->fin.') AS buscados 
              ORDER BY MesDePago');

        while($inicio < $fin){
            $totalMes = 0;
            $mes = date_format($inicio,'M');
            var_dump($mes);
            //$numero_mes = date_format()
            $labels[$i]=$mes;
            foreach ($pagos as $pago){
                if($pago->MesDePago==date_format($inicio,'m')){
                    $totalMes += $pago->monto;
                }
            }
            var_dump($totalMes);
            $montos[$i]=$totalMes;
            date_add($inicio,date_interval_create_from_date_string("1 months"));
            $i++;
        }
        $chart = new SampleChart;
        //$labels = array('One','Two','Three','Four');
        //$chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->labels($labels);
        $chart->dataset('Pagos a Proveedor Mensuales', 'bar', $montos);
        return view('graficos/index', compact('chart'));

    }

    public function seleccionar(){

        $proveedores = Proveedores::all();
        return view('graficos/seleccionar', compact('proveedores'));


    }

    public function pagosCuentas(){

        return view('graficos/pagos_cuenta');

    }

    public function pagosCategoria(){

        $categorias = Categoria::all();
        return view('graficos/pagos_categoria', compact('categorias'));


    }

    public function graficoCuenta(Request $request){

        $request->validate([
            'inicio'=>'date',
            'fin'=>'after_or_equal:inicio'
        ]);

        $pagos = DB::select
        ('SELECT MONTH(fecha_pago) MesDePago, buscados.monto, buscados.cuenta
          FROM (SELECT DISTINCT id_pago,pagos.monto, fecha_pago, cuenta
              FROM (SELECT id_documento 
                    FROM documentos) AS ids, 
              pagos,documento_pago 
              WHERE cuenta = "'.$request->cuenta.'" and ids.id_documento=documento_id_documento and id_pago=pago_id_pago and fecha_pago >='.$request->inicio.' and fecha_pago >='.$request->fin.') AS buscados 
          ORDER BY MesDePago');

        $labels = array();
        $montos = array();
        $inicio = date_create($request->inicio);
        $fin = date_create($request->fin);
        $i = 0;

        while($inicio < $fin){
            $totalMes = 0;
            $mes = date_format($inicio,'M');
            var_dump($mes);
            $labels[$i]=$mes;
            foreach ($pagos as $pago){
                if($pago->MesDePago==date_format($inicio,'m')){
                    $totalMes += $pago->monto;
                }
            }
            var_dump($totalMes);
            $montos[$i]=$totalMes;
            date_add($inicio,date_interval_create_from_date_string("1 months"));
            $i++;
        }
        $chart = new SampleChart;
        //$labels = array('One','Two','Three','Four');
        //$chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->labels($labels);
        $chart->dataset('Pagos a Proveedor Mensuales', 'bar', $montos);


        return view('graficos/index', compact('chart'));
    }

    public function graficoCategoria(Request $request){

        $request->validate([
            'inicio'=>'date',
            'fin'=>'after_or_equal:inicio'
        ]);

        $pagos = DB::select
        ('SELECT MONTH(fecha_pago) MesDePago, buscados.monto 
        FROM (SELECT DISTINCT id_pago,pagos.monto, fecha_pago 
              FROM (SELECT DISTINCT id_documento 
                    FROM documentos, compras, categorias
                    WHERE id_categoria = '.$request->categoria.' and id_categoria = categoria and documento = id_documento) AS ids, 
              pagos,documento_pago 
              WHERE ids.id_documento=documento_id_documento and id_pago=pago_id_pago and fecha_pago >='.$request->inicio.' and fecha_pago >='.$request->fin.') AS buscados 
              ORDER BY MesDePago');

        $labels = array();
        $montos = array();
        $inicio = date_create($request->inicio);
        $fin = date_create($request->fin);
        $i = 0;

        while($inicio < $fin){
            $totalMes = 0;
            $mes = date_format($inicio,'M');
            var_dump($mes);
            $labels[$i]=$mes;
            foreach ($pagos as $pago){
                if($pago->MesDePago==date_format($inicio,'m')){
                    $totalMes += $pago->monto;
                }
            }
            var_dump($totalMes);
            $montos[$i]=$totalMes;
            date_add($inicio,date_interval_create_from_date_string("1 months"));
            $i++;
        }
        $chart = new SampleChart;
        //$labels = array('One','Two','Three','Four');
        //$chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->labels($labels);
        $chart->dataset('Pagos a Proveedor Mensuales', 'bar', $montos);


        return view('graficos/index', compact('chart'));
    }

}
