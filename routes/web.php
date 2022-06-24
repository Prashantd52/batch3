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

Route::get('category_create','CategoryController@create')->name('c.create');
Route::post('category_store','CategoryController@store');
Route::get('category_index','CategoryController@index')->name('c.index');

Route::get('/category_edit/{id}','CategoryController@edit')->name('c.edit');
Route::post('category_update','CategoryController@update')->name('c.update');
Route::delete('category/delete','CategoryController@destroy')->name('c.destroy');

// Route::get('/',function(){

// });   