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

	//Post Routes
	Route::get('/posts', 'PostsController@index')->name('posts.index');
	Route::get('/post/create', 'PostsController@create')->name('post.create');

	//Category Routes
	Route::get('/categories', 'CategoriesController@index')->name('categories.index');
	Route::get('/category/create', 'CategoriesController@create')->name('category.create');

});


