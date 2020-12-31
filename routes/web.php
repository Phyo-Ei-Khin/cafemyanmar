<?php

// use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// use Illuminate\Routing\Route;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;

// Route::middleware('auth')->group(function(){
    Route::resource('/todo','TodoController');
    Route::put('/todos/{todo}/complete','TodoController@complete')->name('todo.complete');
    Route::delete('/todos/{todo}/incomplete','TodoController@incomplete')->name('todo.incomplete');
// });
// Route::resource('/todo','TodoController');
// Route::get('/todos', 'TodoController@index')->name('todo.index');
// Route::get('/todos/create','TodoController@create');
// Route::post('/todos/create','TodoController@store');
// Route::get('/todos/{todo}/edit','TodoController@edit');
// Route::put('/todos/{todo}/update','TodoController@update')->name('todo.update');
// Route::delete('/todos/{todo}/delete','TodoController@delete')->name('todo.delete');

// Route::put('/todos/{todo}/complete','TodoController@complete')->name('todo.complete');
// Route::delete('/todos/{todo}/incomplete','TodoController@incomplete')->name('todo.incomplete');



// Route::get('/', function () {
//     // return env('APP_NAME');
//     return view('welcome');
// });
// Route::get('/user','UserController@index');

// Route::post('/upload', 'userController@uploadAvatar');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/', function(){
//     return view('landing-page');
// });

Route::get('/', 'LandingPageController@index')->name('landing-page');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::get('empty', function (){
    Cart::destroy();
});
