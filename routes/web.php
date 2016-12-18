<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'BookStoreController@index');
Route::get('/book/show/{id}',['as' => 'bookstore.show', 'uses' => 'BookStoreController@show']);

Auth::routes();

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
	Route::get('/home', 'HomeController@index');
	Route::resource('categories', 'CategoriesController');
	Route::resource('books', 'BooksController');
});
