<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','ProductController@index');


// product
Route::get('product/view', 'ProductController@index');
Route::get('product/management', 'ProductController@management');
Route::get('product/create/{id?}', 'ProductController@create');
Route::post('product/save', 'ProductController@store');
Route::get('product/detail/{id}', 'ProductController@show');
Route::get('product/edit/{id}', 'ProductController@edit');
Route::put('product/update/{id}', 'ProductController@update');
Route::delete('product/delete/{id}', 'ProductController@destroy');

// comment
Route::get('comment/management', 'CommentController@create');
Route::get('comment/create', 'CommentController@create');
Route::post('comment/save', 'CommentController@store');
Route::get('comment/delete', 'CommentController@create');

// cart
Route::get('cart/view', 'CartController@index');
Route::get('cart/checkout', 'CartController@checkout');
Route::get('cart/create/{id}', 'CartController@create');
Route::get('cart/delete/{id}', 'CartController@destroy');
Route::get('cart/delete_all', 'CartController@destroy_all');

// transaction
Route::get('transaction/view', 'TransactionController@index');
Route::get('transaction/management', 'TransactionController@management');
Route::get('transaction/create/{id?}', 'TransactionController@crete');
Route::get('transaction/user', 'TransactionController@show');

// auth user
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');


// image
Route::get('image/view', 'ImageController@index' );
Route::get('image/management', 'ImageController@management' );
Route::get('image/upload/{id?}', 'ImageController@upload' );
Route::post('image/save/{id?}', 'ImageController@store' );
Route::put('image/edit/{id}', 'ImageController@edit' );
Route::delete('image/delete/{id}', 'ImageController@destroy' );
Route::delete('image/oke/{id}', 'ImageController@oke' );
