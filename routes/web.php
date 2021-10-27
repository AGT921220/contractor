<?php

use Illuminate\Support\Facades\Auth;
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
})->name('dashboard');

Auth::routes();


//Vista Principal
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

//USUARIOS
Route::resource('users', 'UserController');
Route::get('/users/edit/{id}', 'UserController@edit');
Route::put('/users/update/{id}', 'UserController@update');
Route::delete('/users/destroy/{id}', 'UserController@destroy');



//CLIENTES
Route::group(['prefix' => 'clientes'], function () {
    Route::get('/', 'ClientController@index')->name('index_clients');
     Route::get('/nuevo', 'ClientController@create')->name('create_clients');
     Route::post('/guardar', 'ClientController@store')->name('store_clients');
});
//PROYECTOS
Route::group(['prefix' => 'proyectos'], function () {
    Route::get('/', 'ProyectController@index')->name('index_proyects');
     Route::get('/nuevo', 'ProyectController@create')->name('create_proyects');
     Route::post('/guardar', 'ProyectController@store')->name('store_proyects');



//CATALOGO GENERAL
Route::get('/{id}/catalogo-general/nuevo', 'GeneralCatalogController@create')->name('create_general_catalog');


});
