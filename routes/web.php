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

Route::get('/', 'ProductsController@index');

Route::match(['get', 'post'], '/product-create', 'ProductsController@productCreate');

Route::match(['get', 'post'], '/product-update/{id}', 'ProductsController@productUpdate');

Route::get('/product-delete/{id}', 'ProductsController@productDelete');
