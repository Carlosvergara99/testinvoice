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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::resource('user', 'UserController')->except(['show'])->middleware('auth');
Route::get('product', 'ProductsController@index')->middleware('auth');
Route::resource('customer', 'CustomersController')->except(['show'])->middleware('auth');
Route::get('invoice', 'InvoicesController@index')->middleware('auth');
Route::get('invoice/{id}/generatepdf', 'InvoicesController@generatepdf')->middleware('auth');
