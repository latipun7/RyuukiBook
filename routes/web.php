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

Auth::routes();

/** BOOKSTORE GROUP */
Route::group(['prefix' => 'book'], function() {

	Route::get('/show/{id}',['as' => 'bookstore.show', 'uses' => 'BookStoreController@show']);

	/** BOOKSTORE GROUP (REQUIRE LOGIN) */
	Route::group(['middleware' => 'auth'], function() {
		Route::get('/cart/{id}', ['as' => 'bookstore.addToCart', 'uses' => 'BookStoreController@addToCart']);
		Route::get('/cart', ['as' => 'bookstore.showCart', 'uses' => 'BookStoreController@showCart']);
		Route::get('/cart/remove/{rowId}', ['as' => 'bookstore.removeItem', 'uses' => 'BookStoreController@removeItem']);
		Route::get('/carts/checkout', ['as' => 'bookstore.checkout', 'uses' => 'BookStoreController@checkout']);
	});

});

/**
 * ADMIN GROUP
 */
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function() {
	Route::get('/home', 'HomeController@index');
	Route::resource('categories', 'CategoriesController');
	Route::resource('books', 'BooksController');
});
