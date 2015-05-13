<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showHome');

Route::resource('users', 'UsersController');

Route::get('login', 'HomeController@login');
Route::post('login', 'HomeController@doLogin');
Route::get('logout', 'HomeController@logout');

Route::resource('play', 'GameController');





Route::get('test-route', function(){
	dd(Input::all());
});

