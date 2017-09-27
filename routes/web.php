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
Route::get('/admin/home', 'HomeController@indexAdmin')->name('admin_home');

// #####   Rutas para el rol "usuario"   #####

//-- Solicitudes
Route::get('/solicitude', 'CrearSolicitudPodaController@create');
Route::get('/solicitude/list', 'CrearSolicitudPodaController@index');
Route::get('/solicitude/show/{id}','CrearSolicitudPodaController@show');
Route::post('/solicitude/save','CrearSolicitudPodaController@store');

//Solicitudes admin
Route::get('/admin/solicitude/list', 'CrearSolicitudPodaController@indexAdmin')->name('solicitudes_admin');
Route::get('/solicitude/admin/show/{id}', 'CrearSolicitudPodaController@procesar')->name('solicitudes_procesar_admin');
Route::post('/admin/solicitude/save','CrearSolicitudPodaController@storeAdmin');


//-- Denuncias
Route::get('/report', 'DenunciaController@create');
Route::get('/report/list', 'DenunciaController@index');
Route::get('/report/show/{id}','DenunciaController@show');
Route::post('/report/save','DenunciaController@store');

//Denuncias admin
Route::get('/admin/report/list', 'DenunciaController@indexAdmin')->name('denuncias_admin');

