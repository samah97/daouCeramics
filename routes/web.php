<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('home');
});*/
/*Route::get( '/', function(){
    return view('layout.coming-soon');
});*/
Route::get('/lang/{lang}', 'LocalizationController@index');
Route::get('/','HomeController@index')->name('home');
Route::get('/payment','PaymentController@index')->name('payment');
Route::get('/products','ProductController@index')->name('products');
Route::get('/products/{id}','ProductController@show')->name('show-product')->where('id','[0-9]+');


Route::post('/products/{id}','OrderController@submit')->name('add-cart')->where('id','[0-9]+');
Route::post('/payment','PaymentController@submit')->name('payment-submit');
Route::post('/newsletter','HomeController@newsletter')->name('newsletter');
Route::post('/ajax/update-cart','AjaxController@updateCartItem');
Route::delete('/ajax/delete-cart-item','AjaxController@deleteCartItem')->name('delete-cart-item');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


