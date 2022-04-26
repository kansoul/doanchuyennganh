<?php

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
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::get('/admin', 'HomeController@trangadmin')->name('admin');
//sanpham
Route::get('/sanpham' ,[
	'as' => 'sanpham',
	'uses' => 'HomeController@sanphamtrangchu'
]);
Route::post('/addsanpham', [
	'as' =>	'addsanpham',
	'uses'=>'HomeController@addsanpham'
]);
Route::delete('/delete-sanpham/{id}', [
	'as' =>	'delete-sanpham',
	'uses'=>'HomeController@deletesanpham'
]);

Route::put('/update-sanpham/{id}', [
	'as' =>	'updatesanpham',
	'uses'=>'HomeController@updatesanpham'
]);

//type
Route::get('/type' ,[
	'as' => 'type',
	'uses' => 'HomeController@loaisp'
]);
Route::post('/addtype', [
	'as' =>	'addtype',
	'uses'=>'HomeController@addtype'
]);
Route::delete('/delete-type/{id}', [
	'as' =>	'delete-type',
	'uses'=>'HomeController@deletetype'
]);

Route::put('/update-type/{id}', [
	'as' =>	'updatetype',
	'uses'=>'HomeController@updatetype'
]);

//customer
Route::get('/customer' ,[
	'as' => 'customer',
	'uses' => 'HomeController@customer'
]);
Route::post('/addcustomer', [
	'as' =>	'addcustomer',
	'uses'=>'HomeController@addcustomer'
]);
Route::delete('/delete-customer/{id}', [
	'as' =>	'delete-customer',
	'uses'=>'HomeController@deletecustomer'
]);

Route::put('/update-customer/{id}', [
	'as' =>	'updatecustomer',
	'uses'=>'HomeController@updatecustomer'
]);
//cart
Route::get('/cart' ,[
	'as' => 'cart',
	'uses' => 'HomeController@cart'
]);

Route::post('/addcart', [
	'as' =>	'addcart',
	'uses'=>'HomeController@addcart'
]);
Route::put('/update-cart/{id}', [
	'as' =>	'updatecart',
	'uses'=>'HomeController@updatecart'
]);
Route::delete('/delete-cart/{id}', [
	'as' =>	'delete-cart',
	'uses'=>'HomeController@deletecart'
]);
