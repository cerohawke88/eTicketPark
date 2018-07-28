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

Route::get('/', 'FrontController@home')->name('home');

Route::get('/login', 'FrontController@login')->name('login');

Route::post('/form', 'FrontController@create')->name('buat');

Auth::routes();

Route::get('/home', 'AdminController@index')->name('admin');

Route::get('/parkir-masuk', 'AdminController@masuk')->name('masuk');

Route::get('/parkir-keluar', 'AdminController@keluar')->name('keluar');

Route::get('/parkir-keluar/{park}', 'AdminController@detail')->name('detail-keluar');

Route::get('/parkir-masuk/{park}', 'AdminController@detail')->name('detail-masuk');

Route::post('/update', 'AdminController@update')->name('update');

Route::get('/daftar-admin', 'AdminController@list')->name('admin_list');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Route::view('/', 'welcome');


