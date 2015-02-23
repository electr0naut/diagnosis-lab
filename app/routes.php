<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('especies', 'EspeciesController');
Route::resource('razas', 'RazasController');
Route::resource('contactos', 'ContactosController');
Route::resource('entidades', 'EntidadesController');
Route::resource('diagnosticos', 'DiagnosticosController');
Route::resource('muestras', 'MuestrasController');
Route::resource('informes', 'InformesController');
Route::resource('usuarios', 'UsuariosController');
Route::resource('tejidos', 'TejidosController');
Route::resource('formapago', 'FormaPagoController');

Route::get('especies/razas/{id}', array('as' => 'razas.especiesList', 'uses' => 'RazasController@especiesList'));

Route::get('/', function()
{
	return View::make('base');
});