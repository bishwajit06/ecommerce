<?php

use App\District;
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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/dropdown','DropDownController@index');
Route::get('category/{id}/products', 'DropDownController@getProducts');

Route::get('carts','CartController@index')->name('carts');
Route::post('carts/store','CartController@store')->name('carts.store');
Route::post('carts/update/{id}','CartController@update')->name('carts.update');
Route::post('carts/delete/{id}','CartController@destroy')->name('carts.delete');

Route::get('checkout','CheckoutController@index')->name('checkout');
Route::post('checkout/store','CheckoutController@store')->name('checkout.store');

Route::get('shop','ProductController@shop')->name('shop');
Route::get('product/{slug}','ProductController@detail')->name('product.detail');
Route::get('category/{slug}','CategoryController@showCategory')->name('category.show');
Route::get('token/{token}','VerificationController@verify')->name('user.verification');
Route::get('search','SearchController@search')->name('search');

Auth::routes();

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::post('seen/{id}','OrderController@seenByAdmin')->name('order.seen');
    Route::post('completed/{id}','OrderController@completed')->name('order.completed');
    Route::post('paid/{id}','OrderController@paid')->name('order.paid');
    Route::post('invoice/{id}','OrderController@invoice')->name('order.invoice');

    Route::resource('product','ProductController');
    Route::resource('category','CategoryController');
    Route::resource('order','OrderController');
    Route::resource('slider','SliderController');
    Route::resource('division','DivisionController');
    Route::resource('district','DistrictController');

});

Route::group(['as'=>'customer.','prefix'=>'customer','namespace'=>'Customer','middleware'=>['auth','customer']], function (){
    Route::get('dashboard','CustomerController@index')->name('dashboard');

});

//Api Route

Route::get('get-districts/{id}', function ($id) {
    return json_encode(District::where('division_id',$id)->get());
});


