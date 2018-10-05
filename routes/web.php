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

Route::get('/home/facturas/nueva', 'PagesController@nueva');
Route::resource('Proveedores', 'ProveedoresController');
Route::resource('Documento', 'DocumentoController');
Route::resource('Categoria', 'CategoriaController');
Route::resource('TipoDocumento','TipoDocController');
Route::resource('Compra', 'CompraController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/eliminadoSatisfactoriamente', 'HomeController@eliminado')->name('eliminadoSatisfactoriamente');

