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

Route::get('/', 'IndexController@index')->name('index.index');
Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'Auth\LoginController@login')->name('login.auth');

Route::get('/user/create', 'UserCreateController@index')->name('userCreate.index');
Route::post('/user/create', 'Auth\RegisterController@register')->name('register.register');
