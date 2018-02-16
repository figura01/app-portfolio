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

Route::get('/', 'FrontController@index')->name('one');

Route::get('/admin', 'BackController@index')->name('dashboard')->middleware('auth');

//GESTION DES TAGS
Route::get('/admin/tags', 'TagsController@index')->name('tag')->middleware('auth');
Route::get('/admin/tags/edit/{tag}', 'TagsController@edit')->name('tag-edit')->middleware('auth');
Route::put('/admin/tags/edit/{tag}', 'TagsController@update')->name('tag-update')->middleware('auth');
Route::get('/admin/tags/create', 'TagsController@create')->name('tag-create')->middleware('auth');
Route::post('/admin/tags/create', 'TagsController@store')->name('tag-store')->middleware('auth');


//GESTION DES PICTURES
Route::get('/admin/pictures', 'PictureController@index')->name('pictures')->middleware('auth');
Route::post('/admin/pictures/', 'PictureController@upload')->name('pictures')->middleware('auth');

Route::get('/admin/pictures/delete/{picture}', 'PictureController@destroy')->name('pictures')->middleware('auth');

//GESTIONS DES PROJETS
Route::get('/admin/projets', 'ProjetController@index')->name('projet');
Route::get('/admin/projets/create', 'ProjetController@create')->name('projet-create');
Route::post('/admin/projets/create', 'ProjetController@store')->name('projet-store');
