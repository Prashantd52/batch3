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


Route::middleware(['auth'])->group(function(){
    // Route::get('category_index','CategoryController@index')->name('c.index');
});

Route::get('category_create','CategoryController@create')->name('c.create');
Route::post('category_store','CategoryController@store');
Route::get('category_index','CategoryController@index')->name('c.index');

Route::get('/category_edit/{id}','CategoryController@edit')->name('c.edit');
Route::post('category_update','CategoryController@update')->name('c.update');
Route::delete('category/delete','CategoryController@destroy')->name('c.destroy');
Route::get('category/show/{id}','CategoryController@show')->name('c.show');


//tag routs
Route::get('tag/index','TagController@index')->name('t.index');
Route::get('tag/create','TagController@create')->name('t.create');
Route::post('tag/store','TagController@store')->name('t.store');
Route::post('tag/update','TagController@update')->name('t.update');
Route::delete('tag/delete','TagController@destroy')->name('t.destroy');

Route::get('tag/softdeleted','TagController@softdeleted_tags')->name('t.softdeleted');



//blog Routes

Route::resource('blog','BlogController');
Route::get('blog/remove image/{id}','BlogController@remove_image');
// Route::resource('/blog','BlogController@index')->name('blog.index');

// Route::get('/',function(){

// });   

Route::resource('comment','CommentController');
