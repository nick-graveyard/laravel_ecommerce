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


// Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

Route::get('home', function () {
    return 'Hello World';
});


Route::resource('category', 'CategoryController');
Route::resource('product', 'ProductController');


Route::get('/product/category/{category_name}',  'ProductController@showByCategory') ;









// Authentication routes...

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


// test routes
Route::get('hello_world', function () {
    return 'Hello World';
});