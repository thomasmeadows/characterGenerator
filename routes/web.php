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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/random-character-image', 'RandomCharacterController@index')->name('random-character-image');
Route::get('/create-character', 'CreateCharacterController@index')->name('create-character');
Route::post('/create-character', 'CreateCharacterController@save')->name('create-character');
