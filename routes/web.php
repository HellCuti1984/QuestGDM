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


Route::get('/results', 'HomeController@results_of_quest');

Route::get('/', 'View\ViewController@index');

Route::post('/home', 'Upload\UploadController@image_upload')->name('image_upload');
Route::post('/', 'Upload\UploadController@file_upload')->name('file_upload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/create_quest/', 'CreateQuestController@CreateQuest')->name('quest_edit');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

