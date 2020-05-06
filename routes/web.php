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
})->name('frontend.landingpage');

// Route::view('/landingpage', 'frontend.landingpage');
Route::post('/admin/login', 'Auth\LoginController@login')->name('admin.login');

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
      'timespan' => '2010 - 2011',
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
      'description' => 'Hotlinearbeit, Beraten von Kunden bei Problemen, Tarifberatung, fachliche Unterstützung der Mitarbeiter'
    ],
    [ 'name' => 'Contevis GmbH',
      'timespan' => '2014 - 2015',
      'jobname' => 'Second Level Administrator',
      'description' => 'Aufnahme, Bearbeitung von Störungen ggf. Lösung präsentieren. Telefonischer und schriftlicher Kundenkontakt'
    ],
    [ 'name' =>  'Contevis GmbH | Ausbildung',
      'timespan' => '2015 - 2018',
      'jobname' => 'Ausbildung zum Fachinformatiker FR Anwendungsentwicklung',
      'description' => 'Ausbildung zum ugs. Programmierer. Erste Programmiererfahrungen im Team, erste eigenverantwortliche Projekte. Ich hab erste Erfahrungen mit Netzwerksystemen gemacht und Mitarbeiterplätze eingerichtet und Profile angelegt. Ansonsten hatte ich in unterschiedlichen Unternehmensbereichen zu tun.'
    ],
    [ 'name' =>  'Versatel GmbH',
      'timespan' => '2018 - 2019',
      'jobname' => 'Customer Advisor im Shared Service Bereich',
      'description' => 'Domains registriert und verwaltet für Kunden der Versatel GmbH. IP Einträge verwaltet, gelöscht, Nachforschungen angestellt etc.. Telefonische Lösungssuche mit Kundenkontakt'
    ],
    [ 'name' =>  'ME Media Ug',
      'timespan' => '2019 - 2020',
      'jobname' => 'Programmierer',
      'description' => 'klassische Programmierarbeit. Hauptsächlich haben wir in einem 2 Mann Team ein Internetforum programmiert.'
    ]
  ]);

  // dd($employers);

  return view('frontend.curriculum', compact('employers', 'likes', 'comments'));

})->name('frontend.curriculum');


Route::post('/comments/store', 'CommentController@store')->name('comment.store');
Route::get('/likes/update', function(){

  \DB::table('likes')->increment('likes', 1);
  return redirect()->route('frontend.curriculum');
})->name('likes.update');



// the backendcontroller
Route::get('/config', 'ConfigController@indexConfig')->name('config.index')->middleware('auth');
Route::get('/migrate', 'ConfigController@migrate')->name('config.migrate')->middleware('auth');
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
Route::view('/teamyak','frontend.TeamYak')->name('example.teamyak');
Route::view('/userforum','frontend.userforum')->name('example.userforum');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/adminchat', 'backend.adminchat')->middleware('auth');
