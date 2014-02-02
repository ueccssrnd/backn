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

Route::get('/login',function(){
	$username = Input::get('username');
	$password = Input::get('password');
	if(Auth::attempt(array('username' => $username, 'password' => Hash::make($password), 'status' => 1))){
		return Redirect::intended('dashboard');
	}else{
		return "Invalid Login Credentials";
	}
});

/*Controller Routes*/
Route::get('/signup','UserController@createAccount');