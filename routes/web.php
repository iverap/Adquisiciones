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
Route::resource('Categoria', 'CategoriaController');
Route::resource('TipoDocumento','TipoDocController');
Route::resource('Compra', 'CompraController');
Route::resource('MedioPago', 'MedioPagoController');
Route::resource('Cuenta', 'CuentaController');

Route::get('Documento/buscar', 'DocumentoController@buscar');
Route::post('Documento/busqueda', 'DocumentoController@busqueda')->name('Documento.busqueda');
Route::resource('Documento', 'DocumentoController');

Route::get('Pago/buscar', 'PagoController@buscar');
Route::post('Pago/busqueda', 'PagoController@busqueda')->name('Pago.busqueda');
Route::get('Pago/proveedor', 'PagoController@selecProv');
Route::post('Pago/seleccionar', 'PagoController@seleccionar')->name('Pago.proveedor');
Route::get('Pago/pagar', 'PagoController@pagar');
Route::resource('Pago', 'PagoController');


Route::get('Grafico/seleccionar', 'GraficoController@seleccionar'); //por cuenta
Route::get('Grafico/pagos_cuentas', 'GraficoController@pagosCuentas');//por proveedor
Route::get('Grafico/pagos_categoria', 'GraficoController@pagosCategoria');//por categoria
Route::post('Grafico', 'GraficoController@index')->name('Grafico');
Route::post('Grafico/cuenta', 'GraficoController@graficoCuenta')->name('Grafico.cuenta');
Route::post('Grafico/categoria', 'GraficoController@graficoCategoria')->name('Grafico.categoria');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/eliminadoSatisfactoriamente', 'HomeController@eliminado')->name('eliminadoSatisfactoriamente');

