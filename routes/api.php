<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' =>'api','prefix' => 'invoice'], function () {
    Route::get('getprice', 'InvoicesController@Priceproduct');
    Route::post('save', 'InvoicesController@store');
    Route::get('productsget', 'InvoicesController@productsget');
    Route::post('update', 'InvoicesController@update');
    Route::post('changestatus', 'InvoicesController@changestatus');

});
