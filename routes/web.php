<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController')->except('show');
Route::resource('category', 'CategoryController');
Route::resource('product', 'ProductController');

Route::resource('order', 'OrderMainController');
Route::get('order/{order}/products', 'OrderMainController@Products')->name('order.product');

Route::resource('client', 'ClientController');
Route::resource('client.order', 'orderController');