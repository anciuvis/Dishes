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

// Route::get('/', function () {
// 	return view('dishes');
// });

Auth::routes(); // sukuria routus registracijai, loginui bei pass resetui

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'DishController@index')->name('dishes');
Route::get('/dish/{id}', 'DishController@show')->name('dishes.show');
