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
    Route::resource('supplier', 'SupplierController');
    Route::get('supplier-table', 'SupplierController@table');

    Route::resource('product-type', 'ProdTypeController');
    Route::get('product-type-table', 'ProdTypeController@table');
    
    Route::resource('brand', 'BrandController');
    Route::resource('product', 'ProductController');
    
    Route::resource('product-variant', 'VariantController');
    Route::get('product-variant-table', 'VariantController@table');

    Route::resource('unit-of-measurement', 'UOMController');
    Route::get('unit-of-measurement-table', 'UOMController@table');

    // Personnel
    Route::resource('role', 'RoleController');
    Route::resource('personnel', 'PersonnelController');
    Route::get('personnel-table', 'PersonnelController@table');

    // Services
    Route::resource('service-type', 'ServiceTypeController');
    Route::resource('service-area', 'ServiceAreaController');

    // Transportation
    Route::resource('vehicle-type', 'VehicleTypeController');
    Route::resource('vehicle', 'VehicleController');
    Route::get('vehicle-table', 'VehicleController@table');

    // Payment
    Route::resource('base-price', 'BasePriceController');
    Route::resource('discount', 'DiscountController');

    Route::resource('mode-of-payment', 'ModeOfPaymentController');
    Route::get('mode-of-payment-table', 'ModeOfPaymentController@table');

    Route::resource('delivery-charge', 'DeliveryChargeController');

  });

  Route::group(['prefix' => 'transactions'], function() {

  	Route::get('/', 'RouteController@transactions');

    // Client
    Route::resource('client', 'ClientController');

    // Temporary Routes
    Route::get('quotation', 'RouteController@quotation');
    Route::get('sales-order', 'RouteController@salesorder');
    Route::get('job-order', 'RouteController@joborder');
    Route::get('invoice', 'RouteController@invoice');
    Route::get('vehicle-request', 'RouteController@vehireq');
    Route::get('official-business', 'RouteController@ob');
    Route::get('gate-pass', 'RouteController@gp');

  });

});
