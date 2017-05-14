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

/** Basic **/
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');

/** Album Project Management **/
Route::resource('/projects/album', 'AlbumController');