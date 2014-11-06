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
	return View::make('index', array('page' => 'home'));
});

Route::get('/home', function()
{
	return View::make('index', array('page' => 'home'));
});

//Route::get('/user/{user}', function()
Route::get('/user', function()
{
	return View::make('index', array('page' => 'user'));
});

Route::get('/signin', function()
{
	return View::make('index', array('page' => 'signin'));
});

Route::get('/signup', function()
{
	return View::make('index', array('page' => 'signup'));
});
