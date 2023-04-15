<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/jdc', function () {
    return view('jdc');
});
Route::get('/jdc/{juicio}', function () {
    return view('jdc/{juicio}');
});
Route::get('/incidencias_show', function () {
    return view('incidencias_show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jdc/{juicio}', 'JDCController@index')->name('jdc');
Route::get('/jdc/{juicio}/{anio}', 'JDCController@index_year')->name('index_year');
Route::get('/juicio/{expediente}', 'AsignaDocumentosController@show_jdc')->name('show_jdc');
Route::resource('expedientes','ExpedientesController');
Route::resource('accesos','AccesosController');
Route::resource('actuaciones','ActuacionesController');
Route::resource('incidencias','IncidenciasController');
Route::get('/asignadocumentos/{asignadocumento}/show_inc', 'AsignaDocumentosController@show_inc')->name('asignadocumentos.show_inc');
Route::get('/incidencias/{expediente}/add', 'IncidenciasController@store_inc')->name('add_incidencia');
Route::resource('documentos','DocumentosController')->middleware('roles:admin,act');
Route::get('/documentos/{expedientes}/atach', 'DocumentosController@atach')->name('documentos.atach')->middleware('roles:admin,act');
Route::get('/documentos/{expedientes}/atach_inc', 'DocumentosController@atach_inc')->name('documentos.atach_inc')->middleware('roles:admin,act');
Route::post('/documentos/{expedientes}/file_inc', 'DocumentosController@store_atach_inc')->name('documentos.store_atach_inc')->middleware('roles:admin,act');
Route::post('/documentos/{expedientes}/file', 'DocumentosController@store_atach')->name('documentos.store_atach')->middleware('roles:admin,act');
Route::resource('asignadocumentos','AsignaDocumentosController')->middleware('roles:admin,act')->middleware('roles:admin,act');
Route::get('/expedientes/{expediente}', 'ExpedientesController@destroy')->name('destroy_expediente')->middleware('roles:admin,act');
Route::get('/incidencias/{expediente}', 'IncidenciasController@destroy')->name('destroy_incidencia')->middleware('roles:admin,act');
Route::get('/actuaciones/{actuacion}/delete', 'ActuacionesController@destroy')->name('destroy_actuacion')->middleware('roles:admin,act');
Route::get('/users/edit', 'UsersController@edit')->name('edit_user')->middleware('roles:admin,act');
Route::put('/users/{user}', 'UsersController@update')->name('update_user')->middleware('roles:admin,act');
Route::get('/asignadocumentos/{adoc}/delete', 'AsignaDocumentosController@destroy')->name('destroy_adoc')->middleware('roles:admin,act');
Route::get('/incidencias/{incidencia}/delete', 'IncidenciasController@destroy')->name('destroy_incidencia')->middleware('roles:admin,act');
Route::get('/accesos/{acceso}', 'AccesosController@destroy')->name('destroy_acceso')->middleware('roles:admin,act');

