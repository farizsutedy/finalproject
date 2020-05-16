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

Route::get('/', function () {
    return view('mainpage');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/mainpage', function () {
    return view('mainpage');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/sport', function () {
    return view('sport');
});
Route::get('/checkoutfifa', function () {
    return view('checkout/checkoutfifa');
});
Route::get('/pay', function () {
    return view('pay');
});
Route::get('/login', function () {
    return view('login');
});

