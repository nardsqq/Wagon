<?php

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

Route::get('/', 'RouteController@index');

Route::group(['prefix' => 'admin'], function() {

  Route::get('/', 'RouteController@admin');
  Route::get('/dashboard', 'RouteController@dashboard')->name('admin.dashboard');

  Route::group(['prefix' => 'maintenance'], function() {

  	Route::get('/', 'RouteController@maintenance');
    
    Route::resource('warehouse', 'WarehouseController');
    Route::resource('product-category', 'ProdCategController');
    Route::resource('brand', 'BrandController');

  });

  Route::group(['prefix' => 'transactions'], function() {

  	Route::get('/', 'RouteController@transactions');

  });

});
