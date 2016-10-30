<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', 'CustomerController@index');

Route::post('login', 'AuthenticateController@authenticate');

Route::get('search-customer/{keyword?}','CustomerController@search');

Route::get('search-items/{keyword?}','ItemController@search');

Route::post('place-order','OrderController@placeOrder');

Route::get('test-order','OrderController@testOrder');