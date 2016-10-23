<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Route::post('')

Route::get('/home', 'HomeController@index');

Route::get('/insumos', 'InsumoController@index');
//class="btn btn-block btn-primary btn-lg"
Route::get('/insumos/cadastro', 'InsumoController@ShowInsumoForm');
Route::post('/insumos/cadastro', 'InsumoController@create');

Route::get('/ordens', 'OrdemController@index');
Route::get('/ordens/{idorder}', 'OrdemController@getOrder');
Route::post('/ordens/{idorder}', 'OrdemController@updateOrder');
Route::get("/ordens/cadastro", 'OrdemController@ShowOrdemForm');
Route::post("/ordens/cadastro", 'OrdemController@create');


Route::get('logout', 'Auth\LoginController@logout');
