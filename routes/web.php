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



Route::get('/', 'FightCategoryController@index')->name('fightCategory.index');
Route::get('/admin/dashboard', 'HomeController@index')->name('home')->middleware('admin');
Route::redirect('/admin','/admin/dashboard');

Auth::routes(['verify' => true]);

Route::get('/support', function () {
    return view('support');
});



Route::prefix('admin')->middleware('admin')->group(function (){
    Route::resource('fightCategory', 'FightCategoryController')->except(['index','show']);
    Route::get('fight-category-list', 'FightCategoryController@list')->name('fightCategory.list');
    Route::resource('weapons', 'WeaponController');
    Route::resource('players', 'PlayerController')->except(['show']);
    Route::resource('fights', 'FightController')->except(['show']);
    Route::resource('suggestions', 'SuggestionController')->except(['create','store']);
    Route::resource('settings', 'SettingController');
    Route::post('settings', 'SettingController@bgc')->name('settings.bgc');
    Route::get('makeData', 'SuggestionController@makeData')->name('suggestions.makeData');
    Route::post('getPlayers', 'FightController@getPlayers')->name('getPlayers');
    //Route::post('getPlayers', ['as'=>'getPlayers','uses'=>'FightController@getPlayers']);

});

Route::resource('players', 'PlayerController')->except(['create','store','index','update','destroy','edit']);

Route::get('/fight-category/{fightCategory}', 'FightCategoryController@show')->name('fightCategory.show');
Route::get('{fightCategory}/fights/{fight}', 'FightController@show')->name('fights.show');
Route::post('fights/{fight}/vote/{player}', 'FightController@addVote')->name('fights.addVote');
Route::post('fights/{fight}/comment', 'FightController@addComment')->name('fights.comment')->middleware('verified');

Route::resource('suggestions', 'SuggestionController')->except(['index','show','update','destroy']);
