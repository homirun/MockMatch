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

Route::get('/user/create', 'UserController@create')->name('user.create');
Route::get('/user/logout', 'UserController@logout')->name('user.logout');
Route::post('/user/create', 'Auth\RegisterController@register')->name('register.register');

Route::get('/matching', 'MatchingController@create')->name('matching.create');
Route::post('/matching', 'MatchingController@store')->name('matching.store');

Route::get('/reserved', 'ReservedController@index')->name('reserved.index');
