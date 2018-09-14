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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/eliminadoSatisfactoriamente', 'HomeController@eliminado')->name('eliminadoSatisfactoriamente');
//ADMINISTRADOR
Route::get('/mantenedorProveedor', 'Auth\MantenedorProveedorController@showListarProveedores')->name('admin.mantenedorProveedor');
Route::get('/crearProveedor', 'Auth\MantenedorProveedorController@showRegistrationForm')->name('crearProveedor');
Route::post('/crearProveedor', 'Auth\MantenedorProveedorController@register')->name('crearProveedor.submit');

Route::get('/editarProveedor/{id}', 'Auth\MantenedorProveedorController@editarProveedor')->name('editarProveedor');
Route::post('/editarProveedor/{id}', 'Auth\MantenedorProveedorController@submitEditarProveedor')->name('editarProveedor.submit');

Route::get('/mantenedorProveedor/{id}', 'Auth\MantenedorProveedorController@eliminarProveedor')->name('eliminarProveedor');

