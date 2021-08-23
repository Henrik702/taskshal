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
Auth::routes();



Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::get('/', function () {
    return view('auth.login');
});

//    Route::get('/', 'Auth\LoginController@l')->name('/');

    Route::get('/order', 'OrderController@order')->name('order');
    Route::post('/new/order', 'OrderController@newOrder')->name('new.order');



    Route::group(['middleware'=>'auth','namespaces'=>'/'],function () {

        Route::get('/', 'ProductController@index')->name('dashboard');
        Route::resource('product','ProductController');


        Route::group(['middleware'=>'admin'],function () {
            Route::get('/all/products', 'ProductController@allProducts')->name('all.products');
        });

    });

