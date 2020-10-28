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
Route::group(['prefix' => '/', 'namespace' => 'frontend'], function() {
	Route::get('/', 'HomeController@index');
	Route::get('/orders', 'HomeController@order')->name('order');
	Route::resource('/check-out','CheckOutController',['only' => ['show','index']]);
});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'api', 'namespace' => 'frontend'], function() {
	Route::resource('/drink-foods','DrinkFoodController',['only' => 'show']);
	Route::resource('/products','ProductCarController',['only' => ['store','destroy']]);
	Route::resource('/orders','OrderController',['only' => ['store']]);
	Route::resource('/check-out','CheckOutController',['only' => ['store']]);

	/*Redirección de mesa*/
	Route::resource('/redirect/table','TableController',['only' => ['show']]);
});

Route::group(['prefix' => 'admin','middleware' => ['auth'], 'namespace' => 'backend'], function() {
	Route::resource('pending/orders', 'PendingOrderController',['only' => ['index']]);
	Route::resource('process/orders', 'ProcessOrderController',['only' => ['index']]);
});

Route::group(['prefix' => 'api/admin','middleware' => ['auth'], 'namespace' => 'backend'], function() {
	Route::resource('orders', 'PendingOrderController',['only' => ['show','update']]);
	Route::resource('drink-food-orders', 'DrinkFoodOrderController',['only' => ['update']]);
	Route::resource('check-orders', 'CheckOrderController',['only' => ['store']]);
});