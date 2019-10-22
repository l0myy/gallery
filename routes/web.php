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

Route::get('gallery/','GalleryController@index')->name('gallery.index');
Route::get('gallery/newIndex','GalleryController@newIndex')->name('gallery.newIndex');
Route::get('gallery/show/{album}','GalleryController@show')->name('gallery.show');
Route::post('gallery/load','GalleryController@load')->name('gallery.load');
Route::post('gallery/destroy','GalleryController@destroy')->name('gallery.destroy');
Route::post('gallery/create','GalleryController@create')->name('gallery.create');
Route::post('gallery/edit','GalleryController@edit')->name('gallery.edit');
Route::post('gallery/triangle','GalleryController@triangle')->name('gallery.triangle');
