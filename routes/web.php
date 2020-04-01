<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/landingpage', 'frontend.landingpage');
Route::view('/examples', 'frontend.examples');
Route::view('/curriculum', 'frontend.curriculum');
Route::view('/aboutme', 'frontend.curriculum');

// the backendcontroller
Route::get('/config', 'ConfigController@indexConfig')->name('config.index');
Route::get('/migrate', 'ConfigController@migrate')->name('config.migrate');
Route::get('/migrate/reset/{tablename}', 'ConfigController@migrateResetTable')->name('config.migrateResetTable');
Route::get('/truncateALL', 'ConfigController@truncateAll')->name('config.truncate.all');

//chat routes

Route::get('/conversations', 'ConversationsController@index')->name('conversations.get');
Route::get('/messages/conId/{id}', 'ConversationsController@show')->name('conversations.get');
Route::post('/sendMessage', 'ConversationsController@update')->name('conversations.sendMessage');
