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

Route::get('/', function () {
    return view('admin.index');
});
Route::prefix('company')->group(function () {
    Route::get('/', 'VendorController@index')->name('company.index');
    Route::post('/add-extra-vendor-info', 'VendorController@addExtra')->name('vendor.addExtraVendorInfo');
    Route::post('/add', 'VendorController@postAdd')->name('vendor.postAdd');
    Route::post('/get-extra', 'VendorController@getExtra')->name('vendor.getExtra');
});
Route::prefix('demand')->group(function () {
    Route::get('/{user_phone?}', 'DemandController@index')->name('demand.index');
    Route::post('district/get', 'DemandController@getDistrict')->name('demand.getDistrict');
    Route::post('prefecture/get', 'DemandController@getPrefecture')->name('demand.getPrefecture');
    Route::post('add', 'DemandController@postAdd')->name('demand.postAdd');
});
Route::prefix('agreement')->group(function () {
    Route::get('add/{demandId?}', 'AgreementController@postAddAgreement')->name('agreement.postAdd');
});
Route::prefix('region')->group(function () {
    Route::get('/', 'RegionController@index')->name('region.index');
});
Route::prefix('job')->group(function () {
    Route::get('/', 'JobController@index')->name('job.index');
    Route::post('/add', 'JobController@postAdd')->name('job.postAdd');
    Route::get('/edit/{id}', 'JobController@postEdit')->name('job.postEdit');
});
Route::prefix('bill')->group(function () {
    Route::get('/', 'BillController@index')->name('bill.index');
    Route::get('add/{demandId}', 'BillController@getAdd')->name('bill.getAdd');
    Route::post('add/{demandId}', 'BillController@postAdd')->name('bill.postAdd');
    Route::get('edit/{id}', 'BillController@getEdit')->name('bill.getEdit');
    Route::post('edit/{id}', 'BillController@postEdit')->name('bill.postEdit');
});
