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

Route::get('/curriculum', function(){
  $likes = \DB::table('likes')->value('likes');
  $comments = \App\Comment::all();

  // dd($comments);

  $employers = collect([
    [ 'name' => 'Perry & Knorr',
      'timespan' => '2010 - 2013',
      'jobname' => 'Compliance, Versatel',
      'description' => 'Bearbeiten, Beurteilen und Lösen von Kundenbeschwerden für einen großen Telekomanbieter'
    ],
    [ 'name' => 'Perry & Knorr',
      'timespan' => '2011 - 2013',
      'jobname' => 'Ordermanagement, 1&1',
      'description' => 'Hotlinearbeit verbunden mit Kundenberatung, Beschwerdemanagement und Sachbearbeitung'
    ],
    [ 'name' => 'CarebyPhone',
      'timespan' => '2013 - 2014',
      'jobname' => 'Customer Advisor',
      'description' => 'Zuerst habe ich in der normale Kundenbetreuung gearbeitet und konnte und fachliche Unterstützung der Kollegen'
    ],
    [ 'name' => 'Contevis GmbH',
      'timespan' => '2014 - 2015',
      'jobname' => 'Second Level Administrator',
      'description' => 'Ich habe für einen großen, regionalen Internetanbieter Telefonanschlüsse repariert. Dies beinhaltete die Aufnahme von Störungen, das Durchführen diverser Testverfahren und eine Lösung zu präsentieren'
    ],
    [ 'name' =>  'Contevis GmbH | Ausbildung',
      'timespan' => '2015 - 2018',
      'jobname' => 'Ausbildung zum Fachinformatiker FR Anwendungsentwickler',
      'description' => 'In der Ausbildung konnte ich mehrere Bereiche des Unternehmens kennenlernen. Ich habe meine ersten Programmiererfahrungen gesammelt und war für erste Projekte verantwortlich.'
    ],
    [ 'name' =>  'Versatel GmbH',
      'timespan' => '07/2018 - 05/2019',
      'jobname' => 'Customer Advisor im Shared Service Bereich',
      'description' => 'In dieser Anstellung habe ich das registrieren, ändern und löschen von Domains übernommen. Zudem habe ich kleinere Arbeiten im Ordermanagement übernommen.'
    ],
    [ 'name' =>  'ME Media Ug',
      'timespan' => '06/2019 - 04/2020',
      'jobname' => 'Programmierer',
      'description' => 'in meiner letzten Arbeitsstelle habe ich als klassischer Programmierer gearbeitet. Hauptsächlich haben wir in einem 2 Mann Team ein Forum programmiert.'
    ]
  ]);

  // dd($employers);

  return view('frontend.curriculum', compact('employers', 'likes', 'comments'));

})->name('frontend.curriculum');

Route::view('/adminchat', 'backend.adminchat');
Route::post('/comments/store', 'CommentController@store')->name('comment.store');
Route::get('/likes/update', function(){

  \DB::table('likes')->increment('likes', 1);
  return redirect()->route('frontend.curriculum');
})->name('likes.update');



// the backendcontroller
Route::get('/config', 'ConfigController@indexConfig')->name('config.index');
Route::get('/migrate', 'ConfigController@migrate')->name('config.migrate');
Route::get('/migrate/reset/{tablename}', 'ConfigController@migrateResetTable')->name('config.migrateResetTable');
Route::get('/truncateALL', 'ConfigController@truncateAll')->name('config.truncate.all');

//chat routes

Route::get('/conversations', 'ConversationsController@index')->name('conversations.get');
Route::post('/startConversation', 'ConversationsController@startConversation')->name('conversations.start');
Route::get('/messages/conId/{id}', 'ConversationsController@show')->name('conversations.get');
Route::post('/sendMessage', 'ConversationsController@update')->name('conversations.sendMessage');
Route::post('/getConversation', 'ConversationsController@getConversation')->name('conversation.get');

//roles and rights
Route::post('/user/create', 'UserController@store')->name('exampleuser.create');
Route::get('/users/index', 'UserController@index')->name('exampleuser.index');
Route::post('/users/rights', 'UserController@rights')->name('exampleuser.rights');

Route::get('/test', 'UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
