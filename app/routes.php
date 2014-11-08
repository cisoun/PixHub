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



/*
|--------------------------------------------------------------------------
| Tests Routes
|--------------------------------------------------------------------------
*/

// route pour afficher une page de test de la BDD
Route::get('test/tablestest', function()
{
	return View::make('test/tablestest')->with('albums', Album::all());
});

// formulaire de login de test
Route::get('test/logintest', function()
{
   return View::make('test/logintest', array('uses' => 'HomeController@showLogin'));
});

// route pour effectuer le login
Route::post('test/logintest', function()
{
   return View::make('test/logintest', array('uses' => 'HomeController@doLogin'));
});

// route pour se dé loguer
Route::get('logout', array('uses' => 'HomeController@doLogout'));

// formulaire de crlation d'utilisateur de test
Route::get('test/createusertest', function()
{
   return View::make('test/createusertest', array('uses' => 'HomeController@showCreate'));
});

// route pour crééer l'utilisateur dans la BDD
Route::post('test/createusertest', function()
{
   return View::make('test/createusertest', array('uses' => 'HomeController@createUser'));
});
