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
    return view('welcome');
});

##AUTO_INSERT_ROUTE##

		//ProductClass
		Route::get('ProductClass', [
			'uses' => 'ProductClassController@index'
		]);
		Route::get('ProductClass/{id}', [
			'uses' => 'ProductClassController@get'
		]);
		Route::post('ProductClass', [
			'uses' => 'ProductClassController@add'
		]);
		Route::put('ProductClass/{id}', [
			'uses' => 'ProductClassController@put'
		]);
		Route::delete('ProductClass/{id}', [
			'uses' => 'ProductClassController@remove'
		]);
		

		//Product
		Route::get('Product', [
			'uses' => 'ProductController@index'
		]);
		Route::get('Product/{id}', [
			'uses' => 'ProductController@get'
		]);
		Route::post('Product', [
			'uses' => 'ProductController@add'
		]);
		Route::put('Product/{id}', [
			'uses' => 'ProductController@put'
		]);
		Route::delete('Product/{id}', [
			'uses' => 'ProductController@remove'
		]);
		

		//user
		Route::get('user', [
			'uses' => 'UserController@index'
		]);
		Route::get('user/{id}', [
			'uses' => 'UserController@get'
		]);
		Route::post('user', [
			'uses' => 'UserController@add'
		]);
		Route::put('user/{id}', [
			'uses' => 'UserController@put'
		]);
		Route::delete('user/{id}', [
			'uses' => 'UserController@remove'
		]);
		

//user
Route::get('user', [
    'uses' => 'UserController@index'
]);
Route::get('user/{id}', [
    'uses' => 'UserController@get'
]);
Route::post('user', [
    'uses' => 'UserController@add'
]);
Route::put('user/{id}', [
    'uses' => 'UserController@put'
]);
Route::delete('user/{id}', [
    'uses' => 'UserController@remove'
]);

		