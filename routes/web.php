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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// #####   Rutas para el rol "usuario"   #####

//-- Solicitudes
Route::get('/solicitude', 'CrearSolicitudPodaController@create');
Route::get('/solicitude/list', 'CrearSolicitudPodaController@index');
Route::get('/solicitude/show/{id}','CrearSolicitudPodaController@show');
Route::post('/solicitude/save','CrearSolicitudPodaController@store');

//-- Denuncias
Route::get('/report', 'DenunciaController@create');

