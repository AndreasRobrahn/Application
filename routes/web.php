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
    return view('frontend.landingpage1');
})->name('frontend.landingpage');

// Route::view('/landingpage', 'frontend.landingpage');
Route::post('/admin/login', 'Auth\LoginController@login')->name('admin.login');

Route::get('/examples', function(){

  \DB::table('exampleuser')->truncate();
  \DB::table('exampleusers_rights')->truncate();
  return view('frontend.examples');
})->name('frontend.examples');

Route::get('/curriculum', function(){

  $employers = collect([
    [ 'name' => 'Webhelp',
      'timespan' => '2010 - 2011',
      'jobname' => 'Compliance, Versatel',
      'description' => 'Wir haben in Team versucht die tägl. Beschwerden eines großen Telekomanbieter auf Validität zu prüfen und ggf. Maßnahmen zu treffen.',
      'link'  => 'https://webhelp.com/wp-content/uploads/2020/01/webhelp2020logo.svg'
    ],
    [ 'name' => 'Webhelp',
      'timespan' => '2011 - 2013',
      'jobname' => 'Ordermanagement, 1&1',
      'description' => 'das war klassische Arbeit in einer Hotline. Verbunden mit Kundenberatung, Beschwerdemanagement und Sachbearbeitung',
      'link'  => 'https://webhelp.com/wp-content/uploads/2020/01/webhelp2020logo.svg'
    ],
    [ 'name' => 'CarebyPhone',
      'timespan' => '2013 - 2014',
      'jobname' => 'Customer Advisor',
      'description' => 'Hier habe ich ebenfalls in einer Hotline gearbeitet. Zu meinen Aufgaben zählte das Beraten von Kunden bei kleineren Problemen mit dem Handy, Tarifberatungen und die fachliche Unterstützung der Kollegen',
      'link' => 'https://scontent-ham3-1.xx.fbcdn.net/v/t1.18169-1/p148x148/10489777_850977974931390_6828054277589258439_n.png?_nc_cat=105&ccb=1-5&_nc_sid=1eb0c7&_nc_ohc=InVvUkfrFgwAX9C3LOk&_nc_ht=scontent-ham3-1.xx&oh=00_AT8F8fgSTA0ndOwD9k7ds0oCMb8KOM2tGKvDZPVT3rF3kA&oe=622FB929'
    ],
    [ 'name' => 'Contevis GmbH',
      'timespan' => '2014 - 2015',
      'jobname' => 'Second Level Administrator',
      'description' => 'Aufnahme, Bearbeitung von DSL-Störungen. Prüfung der der Hardware und der Leitung, inklusive sog. "Last Mile", auf Schäden',
      'link' => 'https://www.toppholdings.com/assets/unternehmen/_resampled/ScaleWidthWyI4MDAiXQ/contevis-logo20160401rgb.png'

    ],
    [ 'name' =>  'Contevis GmbH',
      'timespan' => '2015 - 2018',
      'jobname' => 'Ausbildung Fachinformatiker/ Anwendungsentwicklung',
      'description' => 'Ausbildung zum ugs. Programmierer. Erste Programmiererfahrungen im Team, erste eigenverantwortliche Projekte. Ich hab erste Erfahrungen mit Netzwerksystemen gemacht und Mitarbeiterplätze eingerichtet und Profile angelegt. Ansonsten hatte ich in unterschiedlichen Unternehmensbereichen zu tun.',
      'link' => 'https://www.toppholdings.com/assets/unternehmen/_resampled/ScaleWidthWyI4MDAiXQ/contevis-logo20160401rgb.png'
    ],
    [ 'name' =>  'Versatel GmbH',
      'timespan' => '2018 - 2019',
      'jobname' => 'Customer Advisor im Shared Service Bereich',
      'description' => 'Ich habe Domains,für die Kunden der Versatel GmbH, verwaltet. IP Einträge administriert. Nachforschungen bzgl. IP Adressen angestellt. Alles in Absprache mit dem Kunden.',
      'link' => 'https://www.1und1.net/sites/default/files/media/images/unternehmen_presse_mediathek_logo_440x300.png'
    ],
    [ 'name' =>  'ME Media GmbH',
      'timespan' => '2019 - 2020',
      'jobname' => 'Programmierer',
      'description' => 'klassische Programmierarbeit. Hauptsächlich haben wir in einem 2 Mann Team ein Internetforum programmiert.',

    ],
    [ 'name' =>  'Care4as GmbH',
      'timespan' => '06/2020 - ',
      'jobname' => 'Programmierer, IT',
      'description' => 'Programmieren einer Verwaltungssoftware zur besseren Analyse der internen Kennzahlen. Umfangreiche IT Arbeiten, wie AD Administrstion, Hardwarebeschaffung und Installation, Netzwerkadministration',
      'link' => 'https://www.care4as.de/files/cto_layout/img/logo.png'
    ]
  ]);

return view('frontend.curriculum', compact('employers'));

})->name('frontend.curriculum');


Route::post('/comments/store', 'CommentController@store')->name('comment.store');
Route::get('/likes/update', function(){

  if(DB::table('likes')->value('likes') == null)
  {
    \DB::table('likes')->insert([
      'likes' => 1,
    ]);
  }
  else {
    \DB::table('likes')->increment('likes', 1);
  }

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
Route::post('/testexcel', 'HomeController@excel')->name('test.excel');
Route::view('/teamyak','frontend.TeamYak');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/getUsers', 'ConversationsController@getUsers')->name('chat.users');
Route::post('/joinConversation', 'ConversationsController@joinChat')->name('chat.join');
Route::post('/logoutChat', 'ConversationsController@logoutChat')->name('chat.logout');
Route::view('/adminchat', 'backend.adminchat')->middleware('auth');
Route::view('/chat', 'frontend.chat')->name('chat');
