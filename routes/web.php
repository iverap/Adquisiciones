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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//ADMINISTRADOR
Route::get('/mantenedorProveedor', 'Auth\MantenedorProveedorController@showRegistrationForm')->name('admin.mantenedorProveedor');
Route::post('/mantenedorProveedor', 'Auth\MantenedorProveedorController@register')->name('admin.mantenedorProveedor.submit');

