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

Route::get('/admin/dashboard', function() {
	return view('dashboard');
});

Route::get('/admin/maintenance/personnel', function() {
	return view('maintenance.personnel.index');
});

Route::resource('admin/maintenance/productcategory','ProductCategoryController');
Route::put('admin/maintenance/productcategory/checkbox/{id}', ['uses' => 'ProductCategoryController@checkbox', 'as' => 'productcategory.checkbox']);

Route::resource('admin/maintenance/product','ProductController');
Route::put('admin/maintenance/product/checkbox/{id}', ['uses' => 'ProductController@checkbox', 'as' => 'product.checkbox']);

Route::resource('admin/maintenance/productinventorystatus','ProductInventoryStatusController');
Route::put('admin/maintenance/vehicle/productinventorystatus/{id}', ['uses' => 'ProductInventoryStatusController@checkbox', 'as' => 'productinventorystatus.checkbox']);

Route::resource('admin/maintenance/productinventory','ProductInventoryController');
Route::put('admin/maintenance/vehicle/productinventory/{id}', ['uses' => 'ProductInventoryController@checkbox', 'as' => 'productinventory.checkbox']);

Route::resource('admin/maintenance/personnel','PersonnelController');
Route::put('admin/maintenance/personnel/checkbox/{id}', ['uses' => 'PersonnelController@checkbox', 'as' => 'personnel.checkbox']);

Route::resource('admin/maintenance/department','DepartmentController');
Route::put('admin/maintenance/department/checkbox/{id}', ['uses' => 'DepartmentController@checkbox', 'as' => 'department.checkbox']);

Route::resource('admin/maintenance/position','PositionController');
Route::put('admin/maintenance/position/checkbox/{id}', ['uses' => 'PositionController@checkbox', 'as' => 'position.checkbox']);

Route::resource('admin/maintenance/servicecategory','ServiceCategoryController');
Route::put('admin/maintenance/servicecategory/checkbox/{id}', ['uses' => 'ServiceCategoryController@checkbox', 'as' => 'servicecategory.checkbox']);

Route::resource('admin/maintenance/service','ServiceController');
Route::put('admin/maintenance/service/checkbox/{id}', ['uses' => 'ServiceController@checkbox', 'as' => 'service.checkbox']);

Route::resource('admin/maintenance/vehicletype','VehicleTypeController');
Route::put('admin/maintenance/vehicletype/checkbox/{id}', ['uses' => 'VehicleTypeController@checkbox', 'as' => 'vehicletype.checkbox']);

Route::resource('admin/maintenance/vehicle','VehicleController');
Route::put('admin/maintenance/vehicle/checkbox/{id}', ['uses' => 'VehicleController@checkbox', 'as' => 'vehicle.checkbox']);

Route::get('/admin/transactions/company', function() {
	return view('transactions.company.index');
});

Route::get('/admin/transactions/ship', function() {
	return view('transactions.ship.index');
});

Route::get('/admin/transactions/inquiry', function() {
	return view('transactions.inquiry.index');
});

Route::get('/admin/transactions/quotation', function() {
	return view('transactions.quotation.index');
});

Route::get('/admin/transactions/purchaseorder', function() {
	return view('transactions.purchaseorder.index');
});

Route::get('/admin/transactions/joborder', function() {
	return view('transactions.joborder.index');
});

Route::get('/admin/transactions/deliveryschedule', function() {
	return view('transactions.deliveryschedule.index');
});

Route::get('/admin/transactions/jobdeploymentschedule', function() {
	return view('transactions.jobdeploymentschedule.index');
});

Route::get('/admin/transactions/deliveryrequest', function() {
	return view('transactions.deliveryrequest.index');
});

Route::get('/admin/transactions/vehiclerequest', function() {
	return view('transactions.vehiclerequest.index');
});

Route::get('/admin/transactions/obanditinerary', function() {
	return view('transactions.obanditinerary.index');
});

Route::get('/admin/transactions/gatepass', function() {
	return view('transactions.gatepass.index');
});