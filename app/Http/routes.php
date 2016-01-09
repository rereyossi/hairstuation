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

Route::get('where_buy', function () {
    return view('page/where_buy');
});
Route::get('contact', function () {
    return view('page/contact');
});
Route::get('about', function () {
    return view('page/about');
});

Route::get('/', function () {
    return view('landing');
});
Route::get('profile/save', function () {
    return view('cart/finish');
});



// product
Route::get('product/view', 'ProductController@index');
Route::get('product/grooming', 'ProductController@grooming');
Route::get('product/management', 'ProductController@management');
Route::get('product/create/{id?}', 'ProductController@create');
Route::post('product/save/{id?}', 'ProductController@store');
Route::get('product/detail/{id}', 'ProductController@show');
Route::get('product/edit/{id}', 'ProductController@edit');
Route::put('product/update/{id}', 'ProductController@update');
Route::get('product/delete/{id}', 'ProductController@destroy');

// comment
Route::get('comment/view', 'CommentController@index');
Route::get('comment/management', 'CommentController@management');
Route::get('comment/create', 'CommentController@create');
Route::post('comment/save/{id?}', 'CommentController@store');
Route::get('comment/show', 'CommentController@show');
Route::get('comment/delete/{id}', 'CommentController@destroy');

// cart
Route::get('cart/view', 'CartController@index');
Route::get('cart/checkout', 'CartController@checkout');
Route::get('cart/create/{id}', 'CartController@create');
Route::post('cart/save', 'CartController@store');
Route::get('cart/delete/{id}', 'CartController@destroy');
Route::get('cart/delete_all', 'CartController@destroy_all');
Route::get('cart/billing', 'CartController@billing');
Route::get('cart/finish/{id}', 'CartController@show');
Route::post('cart/update', 'CartController@update');

// transaction
Route::get('transaction/view', 'TransactionController@index');
Route::get('transaction/management', 'TransactionController@management');
Route::get('transaction/create', 'TransactionController@create');
Route::get('transaction/save', 'TransactionController@store');
Route::get('transaction/user', 'TransactionController@show');
Route::get('transaction/detail/{id}', 'TransactionController@show');
Route::get('transaction/send/{id}', 'TransactionController@send_order');

Route::get('transaction/mail', 'TransactionController@send_mail');
Route::get('transaction/subscribe', 'TransactionController@subscribe');




Route::get('auth/logout', function()
   {
       Auth::logout();
   Session::flush();
       return Redirect::to('/');
   })->before('auth.basic');



// password
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('user/password_edit', 'UserController@password_edit');
Route::post('user/password_update', 'UserController@password_update');

// profile
Route::get('profile/view', 'ProfileController@index');
Route::get('profile/management', 'ProfileController@management');
Route::get('profile/create/{id?}', 'ProfileController@create');
Route::get('profile/detail', 'ProfileController@show');
Route::get('profile/edit', 'ProfileController@edit');
Route::post('profile/update', 'ProfileController@update');
Route::get('profile/delete/{id}', 'ProfileController@destroy');

//user
Route::get('user/management', 'UserController@management');
Route::get('user/create/', 'UserController@create');
Route::get('user/detail', 'UserController@show');
Route::get('user/edit', 'UserController@edit');
Route::post('user/update', 'UserController@update');
Route::post('user/save', 'UserController@store');
Route::get('user/login', 'UserController@login');
Route::get('user/logout', 'UserController@logout');
Route::post('user/get_login', 'UserController@getLogin');
Route::get('user/tes', 'UserController@tes');




// group
Route::get('group/testing', 'Auth\GroupController@create');
Route::get('group/view', 'Auth\GroupController@index');
Route::get('group/management', 'Auth\GroupController@management');
Route::get('group/create/{id?}', 'Auth\GroupController@create');
Route::post('group/save', 'Auth\GroupController@store');
Route::get('group/detail', 'Auth\GroupController@show');
Route::put('group/update', 'Auth\GroupController@update');
Route::get('group/delete/{id}', 'Auth\GroupController@destroy');

// image
Route::get('image/view', 'ImageController@index' );
Route::get('image/management', 'ImageController@management' );
Route::get('image/upload/{id?}', 'ImageController@upload' );
Route::post('image/save/{id?}', 'ImageController@store' );
Route::get('image/set_display/{id?}', 'ImageController@setDisplay' );
Route::get('image/delete/{id}', 'ImageController@destroy' );

// location
Route::get('location/management', 'LocationController@management');
Route::get('location/edit', 'LocationController@edit');
Route::post('location/update', 'LocationController@update');
Route::post('location/get_price', 'LocationController@get_price');
