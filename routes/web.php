<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', 'BlogController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/tags', 'TagsController');
    Route::get('/posts/deleted', 'PostsController@trash')->name('posts.trash');
    Route::get('/posts/restore/{id}', 'PostsController@restore')->name('posts.restore');
    Route::delete('/posts/delete/{id}/permanent', 'PostsController@forceDelete')->name('posts.forceDelete');
    Route::resource('/posts', 'PostsController');
    Route::resource('/users', 'UsersController');
});
