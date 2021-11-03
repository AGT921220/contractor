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

//SUBCONTRATISTAS
Route::group(['prefix' => 'subcontratistas'], function () {

Route::get('/nuevo', 'SubcontractorController@create')->name('create_subcontractor');
});

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
//Route::get('/{id}/catalogo-general/nuevo', 'GeneralCatalogController@create')->name('create_general_catalog');
Route::post('/{id}/catalogo-general/bulk', 'GeneralCatalogController@bulk')->name('bulk_general_catalog');
Route::get('/{id}/catalogo-general/ver', 'GeneralCatalogController@index')->name('index_general_catalog');
Route::post('/{id}/catalogo-general/store', 'GeneralCatalogController@store')->name('store_general_catalog');
Route::get('/{proyectId}/catalogo-general/{id}/editar', 'GeneralCatalogController@edit')->name('edit_general_catalog');
Route::put('/{proyectId}/catalogo-general/{id}/guardar', 'GeneralCatalogController@update')->name('store_general_catalog');


//CONCURSOS
Route::get('/{id}/concursos/ver', 'ContestController@index')->name('index_contest');
// Route::post('/{id}/catalogo-general/store', 'GeneralCatalogController@store')->name('store_general_catalog');
// Route::get('/{proyectId}/catalogo-general/{id}/editar', 'GeneralCatalogController@edit')->name('edit_general_catalog');
// Route::put('/{proyectId}/catalogo-general/{id}/guardar', 'GeneralCatalogController@update')->name('store_general_catalog');


});
