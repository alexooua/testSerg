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


Route::get('ua_dol','TaskController@index');
Route::get('ua_dol/{id}','TaskController@show');
Route::post('ua_dol','TaskController@store');
Route::put('ua_dol/{id}','TaskController@update');
Route::delete('ua_dol/{id}','TaskController@delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
