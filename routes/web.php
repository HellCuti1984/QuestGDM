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

Route::get('/', 'View\ViewController@index');
Route::get('/home', 'HomeController@index')->name('home');

/* ЛИЧНЫЙ КАБИНЕТ ПОЛЬЗОВАТЕЛЯ */
Route::post('/home', 'Upload\UploadController@image_upload')->name('image_upload');
Route::post('/home', 'Upload\UploadController@file_upload')->name('file_upload');

/* АДМИН ПАНЕЛЬ */
Route::get('/home/create_quest/', 'QuestManagment\CreateQuestController@index')->name('quest_edit');
Route::get('/home/make_quest/', 'QuestManagment\MakeQuestController@index')->name('make_quest');
Route::post('/', 'QuestManagment\MakeQuestController@MakeQuest')->name('make_quest_save');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

