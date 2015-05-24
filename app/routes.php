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
Route::get('login', 'HomeController@login');
Route::post('login', 'HomeController@doLogin');
Route::get('logout', 'HomeController@logout');
Route::get('logo', 'HomeController@showLogo');
Route::get('about', 'HomeController@showAbout');

Route::get('loginfb', 'SocialAuthController@loginWithFacebook');
Route::get('loginli', 'SocialAuthController@loginWithLinkedin');

Route::controller('users', 'UsersController');

Route::controller('play', 'GameController');

