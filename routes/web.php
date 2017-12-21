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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->name('card')->get('/cards/{card}', 'CardController@show');

Route::get('/liveladder', 'LadderController@liveladder');
Route::post('/ladder', 'LadderController@update')->name('ladder');
Route::get('/home', 'LadderController@index');
