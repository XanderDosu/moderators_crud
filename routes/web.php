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

Route::group(['namespace' => 'Moderators'], function() {
    Route::get('/moderators', 'ModeratorController@index')->name('moderator.index');
    Route::get('/moderators/create', 'ModeratorController@create')->name('moderator.create');
    Route::post('/moderators', 'ModeratorController@store')->name('moderator.store');
    Route::get('/moderators/{moderator}', 'ModeratorController@show')->name('moderator.show');
    Route::get('/moderators/{moderator}/edit', 'ModeratorController@edit')->name('moderator.edit');
    Route::patch('/moderators/{moderator}', 'ModeratorController@update')->name('moderator.update');
    Route::delete('/moderators/{moderator}', 'ModeratorController@destroy')->name('moderator.destroy');
});
