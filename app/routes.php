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

Route::get('/photo/{id}', function($id)
{
	return View::make('index', array('page' => 'photo', 'id' => $id));
});

Route::get('/user/{user}', function($user)
{
	return View::make('index', array('page' => 'user', 'user' => $user, 'section' => 'latest'));
});

Route::get('/user/{user}/{section}', function($user, $section)
{
	return View::make('index', array('page' => 'user', 'user' => $user, 'section' => $section));
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
Route::get('test/logintest', array('uses' => 'HomeController@showLogin'));

// route pour effectuer le login
Route::post('test/logintest', array('uses' => 'HomeController@doLogin'));

// route pour se dé loguer
Route::get('test/logout', array('uses' => 'HomeController@doLogout'));

// formulaire de crlation d'utilisateur de test
Route::get('test/createusertest', array('uses' => 'HomeController@showCreate'));

// route pour créer l'utilisateur dans la BDD
Route::post('test/createusertest', array('uses' => 'HomeController@createUser'));

// route pour tester l'upload d'image
Route::get('test/uploadtest', array('uses' => 'ImageController@showUpload'));

Route::post('test/uploadtest', array('uses' => 'ImageController@uploadImage'));

// route pour tester la création d'album
Route::get('test/createalbum', array('uses' => 'AlbumController@showAlbum'));

Route::post('test/createalbum', array('uses' => 'AlbumController@createAlbum'));
