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
Route::get('/contact', 'ContactController@index')->name('contact');

// DISHES routes
Route::get('/', 'DishController@index')->name('dishes');
Route::post('/dishes', 'DishController@store')->name('dishes.store');
Route::get('/dish/create', 'DishController@create')->name('dishes.create');
Route::get('/dish/{id}', 'DishController@show')->name('dishes.show');
Route::get('/dish/{id}/edit', 'DishController@edit')->name('dishes.edit');
Route::put('/dish/{id}', 'DishController@update')->name('dishes.update');
Route::delete('/dish/{id}', 'DishController@destroy')->name('dishes.destroy');
Route::get('/dish/{dish}/download', 'DishController@download')->name('dishes.download');

// php artisan make:controller XXController --resource --model=XX - sukurti CRUD routus tam modeliui
// daroma VIETOJ komandos make:controller, bet po parasymo Route::resource sitos eilutes:
Route::resource('orders', 'OrderController');
Route::resource('carts', 'CartController');
Route::resource('reservations', 'ReservationController');

// generate PDF:
Route::get('/pdf', function() {
    return PDF::loadHTML('<strong>Hello World</strong>')->lowquality()->pageSize('A4')->stream();
});
Route::get('/orders/{order}/invoice' , 'OrderController@invoice')->name('order.invoice')->middleware('auth');
