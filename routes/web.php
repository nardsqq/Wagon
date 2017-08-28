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
    

    // Product Building and Inventory
    Route::resource('warehouse', 'WarehouseController');
    Route::resource('product-category', 'ProdCategController');
    Route::resource('brand', 'BrandController');
    Route::resource('attributes', 'AttributeController', ['except' => ['create']]);
    Route::resource('product', 'ProductController');

    // Personnel
    Route::resource('role', 'RoleController');
    Route::resource('skill', 'SkillController');

    // Services
    Route::resource('service-type', 'ServiceTypeController');

    // Transportation
    Route::resource('vehicle-type', 'VehicleTypeController');

    // Payment
    Route::resource('base-price', 'BasePriceController');
    Route::resource('discount', 'DiscountController');
    Route::resource('mode-of-payment', 'ModeOfPaymentController');
    Route::resource('delivery-charge', 'DeliveryChargeController');
    Route::resource('price-validity', 'PriceValidityController');

  });

  Route::group(['prefix' => 'transactions'], function() {

  	Route::get('/', 'RouteController@transactions');

  });

});
