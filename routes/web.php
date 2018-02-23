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

    Route::resource('specification', 'SpecsController');
    Route::resource('brand', 'BrandController');
    Route::resource('product', 'ProductController');
    Route::resource('attrib', 'AttributeController');

    Route::resource('product-variant', 'VariantController');
    Route::get('product-variant-table', 'VariantController@table');

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
    Route::resource('mode-of-payment', 'ModeOfPaymentController');
    Route::get('mode-of-payment-table', 'ModeOfPaymentController@table');

    // Discount
    Route::resource('discount', 'DiscountController');

    Route::resource('delivery-charge', 'DeliveryChargeController');

  });

  Route::group(['prefix' => 'transactions'], function() {

  	Route::get('/', 'RouteController@transactions');

    Route::resource('stocks', 'StockController');
    Route::get('stocks-table', 'StockController@table');

    // Client
    Route::resource('client', 'ClientController');
    Route::get('client-table', 'ClientController@table');

    // Job Order
    Route::get('job-order', 'RouteController@joborder');
    Route::get('job-order/{id}/checklist', 'JobOrderController@getChecklist');
    Route::put('job-order/{id}/checklist', 'JobOrderController@updateChecklist');

    // Receive Deliveries
    Route::resource('receive-items', 'ReceiveDeliveryController');
    Route::get('receive-items-table', 'ReceiveDeliveryController@table');

    // Sales Order
    Route::resource('sales-order', 'SalesOrderController');
    Route::get('sales-order-table', 'SalesOrderController@table');

    // Order
    Route::resource('process-order', 'ProcessOrderController');
    Route::get('process-order-table', 'ProcessOrderController@table');
    Route::get('process-order-form-data', 'ProcessOrderController@formData');

    // Purchase Order
    //Route::get('process-order', 'RouteController@purchaseorder');

    // Temporary Routes
    Route::resource('quotation', 'QuotationController');
    Route::name('quotation-report')->get('quotation-report/{id}', 'PDFController@quote');
    Route::get('quotation-table', 'QuotationController@table');
    // Route::get('sales-order', 'RouteController@salesorder');
    Route::get('invoice', 'RouteController@invoice');

    Route::resource('vehicle-request', 'VehicleRequestController');
    Route::get('vehicle-request-table', 'VehicleRequestController@table');
    Route::name('vehicle-request-report')->get('vehicle-request-report/{id}', 'PDFController@vehireq');

    Route::get('official-business', 'RouteController@ob');
    Route::get('gate-pass', 'RouteController@gp');

  });

Route::group(['prefix' => 'queries'], function() {
    Route::get('personnel', 'Query@index');
    Route::post('personnel-search', 'Query@search');
    Route::get('service-area', 'RouteController@servz');
    Route::post('service-area-search', 'Query@searchservice');
    Route::get('product-variant', 'RouteController@varz');
    Route::post('product-variant-search', 'Query@varzsearch');
});

});

//<------------- Earl :D  ----------------> ///

Route::get('stocks-report','ReportsController@index');
Route::get('stocks-report-pdf','ReportsController@salesReportPDF');

// <----------------- end Earrl ---------------> //