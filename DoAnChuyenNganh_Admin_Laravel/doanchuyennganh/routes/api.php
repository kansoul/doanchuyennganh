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
//Route::apiResource('customer', 'Api\UserController');
Route::get('customer/{id}', 'Api\UserController@index')->name('customer.index');
Route::get('customer/{user}/{password}', 'Api\UserController@show')->name('customer.show');

Route::get('slide/{id}', 'Api\SlideController@index')->name('slide.index');
Route::get('productoftype/{id}', 'Api\SlideController@show')->name('productoftype.show');

Route::get('product/{id}', 'Api\ProductController@index')->name('product.index');
Route::get('search/{string}', 'Api\SearchController@index')->name('product.index');

Route::get('cart/{string}', 'Api\SearchController@show')->name('cart.show');

Route::get('cartadd/{id_cus}/{id_sp}/{qlt}/{note}', 'Api\CartController@show');
Route::get('cartdelete/{id_cus}/{id_sp}', 'Api\CartController@update');
Route::get('bill/{string}', 'Api\CartController@store');
Route::get('history/{string}', 'Api\CartController@destroy');
Route::get('cbill/{id_cus}', 'Api\CartController@index');