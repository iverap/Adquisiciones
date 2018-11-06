<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('Proveedores', 'ProveedoresController');
Route::resource('Documento', 'DocumentoController');
Route::resource('Categoria', 'CategoriaController');
Route::resource('TipoDocumento','TipoDocController');
Route::resource('Compra', 'CompraController');
Route::resource('MedioPago', 'MedioPagoController');

Route::get('Pago/seleccionar', 'PagoController@seleccionar');
Route::get('Pago/pagar', 'PagoController@pagar');
Route::resource('Pago', 'PagoController');


Route::get('Grafico/seleccionar', 'GraficoController@seleccionar');
Route::get('Grafico/pagos_cuentas', 'GraficoController@pagosCuentas');
Route::post('Grafico', 'GraficoController@index')->name('Grafico');
Route::post('Grafico/cuenta', 'GraficoController@graficoCuenta')->name('Grafico.cuenta');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/eliminadoSatisfactoriamente', 'HomeController@eliminado')->name('eliminadoSatisfactoriamente');

