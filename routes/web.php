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

Route::get('/','GalleryController@index')->name('gallery.index');
Route::get('/show/{album}','GalleryController@show')->name('gallery.show');
Route::post('/load','GalleryController@load')->name('gallery.load');
Route::post('/destroy','GalleryController@destroy')->name('gallery.destroy');
Route::post('/create','GalleryController@create')->name('gallery.create');
Route::post('/edit','GalleryController@edit')->name('gallery.edit');
