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

Route::get('/', function()
{
	return View::make('hello');
});


/*User Controller Routes*/
Route::get('/login','UserController@login');
Route::get('/signup','UserController@createAccount');
Route::get('/savesession','UserController@saveSession');
Route::get('/register','UserController@register');