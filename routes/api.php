<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



//PROYECTOS
Route::group(['prefix' => 'proyectos'], function () {
    Route::post('{proyectId}/contests-available/{scID}', 'Api\AvailableContestController@index')->name('store_clients');
// proyect+'/contests-available/'+subcontractor
// Route::post('/guardar', 'ClientController@store')->name('store_clients');

});

