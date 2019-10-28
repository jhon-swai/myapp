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

//All this is the same as the above command

// Route::get('/todos','TodosController@index')->name('todos.index');
// Route::get('/todos/create','TodosController@create')->name('todos.create');
// Route::post('/todos','TodosController@store')->name('todos.store'); // making a post request
// Route::get('/todos/{id}','TodosController@show')->name('todos.show');
// Route::get('/todos/{id}/edit','TodosController@edit')->name('todos.edit');
// Route::put('/todos/{id}','TodosController@update')->name('todos.update'); // making a put request
// Route::delete('/todos/{id}','TodosController@destroy')->name('todos.destroy');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
