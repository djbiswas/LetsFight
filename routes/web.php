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
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/fight-category/{fightCategory}', 'FightCategoryController@show')->name('fightCategory.show');
Route::get('fights/{fight}', 'FightController@show')->name('fights.show');
Route::post('fights/{fight}/vote/{player}', 'FightController@addVote')->name('fights.addVote');
Route::post('fights/{fight}/comment', 'FightController@addComment')->name('fights.comment');
