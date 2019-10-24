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

// The front pages for index and about
Route::get('/', 'PagesController@index')->name('pages.index');
Route::get('/about','PagesController@about')->name('pages.about');

// The todos pages routes
Route::resource('/todos','TodosController');