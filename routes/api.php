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



Route::get('carts','Api\CartController@index')->name('carts');
Route::post('carts/store','Api\CartController@store')->name('carts.store');
Route::post('carts/update/{id}','Api\CartController@update')->name('carts.update');
Route::post('carts/delete/{id}','Api\CartController@destroy')->name('carts.delete');


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
