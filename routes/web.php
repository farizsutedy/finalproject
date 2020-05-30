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

Route::get('/about', function () {
    return view('about');
});

Route::get('/checkoutfifa', function () {
    return view('checkout/checkoutfifa');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function (){
    return view('signup');
});
// Route::get('/sport', function (){
//     return view('sport');
// });

Route::post('/login', ['uses' => 'UserController@signup']);
Route::post('/main', ['uses' => 'UserController@login']);
Route::get('/logout', ['uses' => 'UserController@logout']);
Route::get('/sport', ['uses' => 'ProductController@getSport']);
Route::get('/horror', ['uses' => 'ProductController@getHorror']);
Route::get('/adventure', ['uses' => 'ProductController@getAdventure']);
Route::get('/strategy', ['uses' => 'ProductController@getStrategy']);
Route::get('/simulation', ['uses' => 'ProductController@getSimulation']);
Route::get('/details/{id}', ['uses' => 'ProductController@getDetails']);
Route::post('/addToCart/{id}', ['uses' => 'BillController@addToCart']);
Route::get('/checkout', ['uses'=>'BillController@getCart']);
Route::get('/history', ['uses'=>'BillController@getHistory']);
Route::delete('deleteItem/{id}', ['uses' => 'BillController@deleteItem']);