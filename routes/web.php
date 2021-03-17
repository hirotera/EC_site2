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

Route::name('product.')
->group(function () {
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/product/{id}', 'ProductController@show')->name('show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
