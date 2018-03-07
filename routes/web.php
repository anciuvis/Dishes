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

// DISHES routes
Route::get('/', 'DishController@index')->name('dishes');
Route::get('/dish/create', 'DishController@create')->name('dishes.create')->middleware('auth');
Route::get('/dish/{id}', 'DishController@show')->name('dishes.show');
Route::get('/dish/{id}/edit', 'DishController@edit')->name('dishes.edit')->middleware('auth');
Route::put('/dish/{id}', 'DishController@update')->name('dishes.update')->middleware('auth');
Route::delete('/dish/{id}', 'DishController@destroy')->name('dishes.destroy')->middleware('auth');
// php artisan make:controller XXController --resource --model=XX - sukurti CRUD routus tam modeliui
// daroma VIETOJ komandos make:controller, bet po Route::resource sitos eilutes:
Route::resource('orders', 'OrderController');
Route::resource('carts', 'CartController');
Route::resource('reservations', 'ReservationController');
