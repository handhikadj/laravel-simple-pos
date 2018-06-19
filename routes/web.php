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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

	 /*
    |--------------------------------------------------------------------------
    | Home Routes
    |--------------------------------------------------------------------------
    */
	Route::get('/home', 'ProductController@index');
    Route::get('/', function () { return redirect('/home'); });

	 /*
    |--------------------------------------------------------------------------
    | Product Routes
    |--------------------------------------------------------------------------
    */
	Route::resource('product', 'ProductController');
	Route::get('api/product', 'ProductController@apiProduct')->name('api.product');
	Route::get('/cariproduk/{kdproduk}', 'ProductController@cariproduk');	

	 /*
    |--------------------------------------------------------------------------
    | Transaction Routes
    |--------------------------------------------------------------------------
    */
	Route::resource('transaksi', 'TransactionController');
    Route::get('exportpdf', 'TransactionController@exportpdfs')->name('exportpdfs');
     /*
    |--------------------------------------------------------------------------
    | Transaction Detail Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('transaksidetail', 'TransactionDetailController');
    Route::get('loadcart', 'TransactionDetailController@show');

}); /* end of Middleware Auth */


