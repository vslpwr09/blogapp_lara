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


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'ShowBlogsController@index')->name('show-blogs');
Route::get('/show-blogs', 'ShowBlogsController@index')->name('show-blogs');
Route::get('/read-more/{id}', 'ShowBlogsController@readMore')->name('read-more');
Route::get('/backend/register', 'Backend\RegisterController@index')->name('backend.register');
Route::post('/backend/register', 'Backend\RegisterController@register')->name('backend.register');
Route::post('/backend/login', 'Backend\RegisterController@checkLogin')->name('backend.login');
Route::get('/backend/login', 'Backend\RegisterController@loginView')->name('backend.login');
Route::post('/backend/logout', 'Backend\RegisterController@logout')->name('backend.logout');

Route::group(['prefix' => 'backend'], function()
{
	Route::resource('blogs', 'BlogsController');
});
