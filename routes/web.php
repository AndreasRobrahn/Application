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
    return view('frontend.landingpage');
});

Route::view('/landingpage', 'frontend.landingpage');
Route::get('/examples', function(){

  \DB::table('exampleuser')->truncate();
  \DB::table('exampleusers_rights')->truncate();
  return view('frontend.examples');
})->name('frontend.examples');

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

//roles and rights
Route::post('/user/create', 'UserController@store')->name('exampleuser.create');
Route::get('/users/index', 'UserController@index')->name('exampleuser.index');
Route::post('/users/rights', 'UserController@rights')->name('exampleuser.rights');

Route::get('/test', 'UserController@index');
