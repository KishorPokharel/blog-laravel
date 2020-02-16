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

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function() {

	Route::get('/home', 'HomeController@index')->name('home');

	Route::group(['middleware' => 'can:manage-users'], function() {
		//User Routes
		Route::get('/users', 'UsersController@index')->name('users.index');
		Route::get('/user/{id}/edit', 'UsersController@edit')->name('user.edit');
		Route::put('/user/{id}', 'UsersController@update')->name('user.update');
		Route::delete('/user/{id}', 'UsersController@destroy')->name('user.delete');
	});
	

	//Post Routes
	Route::get('/posts', 'PostsController@index')->name('posts.index');
	Route::get('/post/create', 'PostsController@create')->name('post.create');
	Route::post('/posts', 'PostsController@store')->name('post.store');
	Route::get('/post/{id}/edit', 'PostsController@edit')->name('post.edit');
	Route::put('/post/{id}', 'PostsController@update')->name('post.update');
	Route::delete('/post/{id}', 'PostsController@destroy')->name('post.delete');

	//Category Routes
	Route::get('/categories', 'CategoriesController@index')->name('categories.index');
	Route::get('/category/create', 'CategoriesController@create')->name('category.create');
	Route::post('/categories', 'CategoriesController@store')->name('category.store');
	Route::get('/category/{id}/edit', 'CategoriesController@edit')->name('category.edit');
	Route::put('/category/{id}', 'CategoriesController@update')->name('category.update');
	Route::delete('/category/{id}', 'CategoriesController@destroy')->name('category.delete');

});

Route::fallback(function() {
	return view('notfound');
});


