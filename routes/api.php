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

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/


Route::get('test', 'CustomerController@index');

Route::post('login', 'AuthenticateController@authenticate');

Route::get('search-customer/{keyword?}','CustomerController@search');

Route::get('search-items/{keyword?}','ItemController@search');

Route::post('place-order','OrderController@placeOrder');

Route::get('test-order','OrderController@testOrder');
