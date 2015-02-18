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
#Route::get('/especies', 'EspeciesController@index');
#Route::post('/especies', array('as' => 'especies.store', 'uses' => 'EspeciesController@store'));
#Route::put('/especies/{id}', array('as' => 'especies.update', 'uses' => 'EspeciesController@update'));

#Route::get('/especies/new', array('as' => 'especies', 'uses' => 'EspeciesController@create'));
#Route::get('/especies/{id}/edit', array('as' => 'especies.edit', 'uses' => 'EspeciesController@edit'));
#Route::get('/especies/{id}/show', array('as' => 'especies.show', 'uses' => 'EspeciesController@show'));

#Route::post('/especies/{id}/store', array('as' => 'especies.store', 'uses' => 'EspeciesController@store'));

#Route::get('/especies/destroy', array('as' => 'especies.destroy', 'uses' => 'EspeciesController@destroy'));
#Route::post('/especies/store', array('as' => 'especies.store', 'uses' => 'EspeciesController@store'));


#Route::post('/especies/{id}', array('as' => 'especies.update', 'uses' => 'EspeciesController@update'));

//
//Route::get('/especies/{params}', 'TestingController@determineAction');


//Route::get('/', function()
//{
//    return View::make('index');
//});
//{
//    #$queryData = Informe::ultimasEntradas()->get();
//	#return View::make('index')->with('data', $queryData);
//    return View::make('index');
//});
