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

// Route::get('/', function () {
//     return view('gaming.index');
// });

Route::get('/home', 'HomeController@index')->name('main');

Auth::routes();

// My routes

Route::get('/', 'SiteController@index')->name('site.index');
Route::get('/search', 'SiteController@search')->name('site.search');

Route::group(['namespace' => 'Gaming', 'prefix' => 'gaming'], function() {
    Route::get('/catalog', 'GamingController@catalog')->name('gaming.catalog');
    Route::get('game/{id}', 'GameController@show')->name('gaming.game');
    // Route::get('chapter/{id}', 'ChapterController@show')->name('gaming.chapter');
    Route::get('game/{gameId}/chapter/{chapterId}', 'ChapterController@show')->name('gaming.game.chapter');
    
});


// Route::group(['namespace' => 'Gaming', 'prefix' => 'gaming'], function() {
//     $methods = ['index', '']
// });

// Route::group(['namespace' => 'Gaming', 'prefix' => 'gaming'], function() {
//     Route::resource('game', 'GamingController')->names('gaming.game');
// });

// Admin

$groupData = [
    'namespace' => 'Gaming\Admin',
    'prefix' => 'admin/gaming',
];

Route::group($groupData, function() {
    $methods = ['index', 'edit', 'create', 'update', 'store', 'destroy'];

    // GamingWelcome
    Route::get('/', 'GamingController@welcome')->name('gaming.admin.welcome')->middleware('auth');

    

    // GamingGame
    Route::resource('games', 'GameController')
        ->only($methods)
        ->names('gaming.admin.games')
        ->middleware('auth');

    // GamingAct
    Route::resource('chapters', 'ChapterController')
        ->only($methods)
        ->names('gaming.admin.chapters')
        ->middleware('auth');
});






