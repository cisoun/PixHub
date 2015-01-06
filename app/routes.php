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

Route::get('home', function()
{
	return View::make('index', array('page' => 'home'));
});

Route::get('photo/{id}', function($id)
{
	return View::make('index', array('page' => 'photo', 'id' => $id));
});

Route::get('user/{user}', function($user)
{
	return View::make('index', array('page' => 'user', 'user' => $user, 'section' => 'latest'));
});

Route::get('user/{user}/{section}', function($user, $section)
{
	return View::make('index', array('page' => 'user', 'user' => $user, 'section' => $section));
});

Route::get('album/{album}', function($album)
{
	return View::make('index', array('page' => 'album', 'album' => $album));
});

Route::get('signin', function()
{
	return View::make('index', array('page' => 'signin'));
});

Route::get('signup', function()
{
	return View::make('index', array('page' => 'signup'));
});


Route::get('upload', function()
{
	if (Auth::check())
		return View::make('index', array('page' => 'upload'));
	return View::make('index', array('page' => 'home'));
});

Route::post('upload', 'ImageController@uploadImage');


Route::post('signin', array('uses' => 'HomeController@doLogin'));
Route::get('signoff', array('uses' => 'HomeController@doLogout'));


Route::get('effect/{effect}/{id}', function($effect, $id)
{
	if ($effect === 'blur')
	{
		$album = Album::find(Image::find($id)->album_id);

		/*header('Content-type: image/jpeg');
		$image = new Imagick($album->getPath() . '/' . $id);
		$image->blurImage(50, 50);
		return $image;*/

		$blurs = 50;
		$file = '/srv/http/PixHub/public' . $album->getPath() . '/' . $id;
		list($width, $height, $type, $attr) = getimagesize($file);
		$image = imagecreatefromjpeg($file);
		$image = imagescale($image, $width / 2, $height / 2,  IMG_NEAREST_NEIGHBOUR);
		for ($i = 0; $i < $blurs; $i++) {
			imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
		}

		header('Content-Type: image/jpeg');

		imagejpeg($image, NULL);
		imagedestroy($image);
	}
});


/*
|--------------------------------------------------------------------------
| Tests Routes
|--------------------------------------------------------------------------
*/

// route pour afficher une page de test de presque tout
Route::get('test/megatest', function()
{
	return View::make('test/megatest');
});

// route pour afficher une page de test avec comme pseudo celui passé après /megatest/
Route::get('test/megatest/{user?}', function($userPseudo)
{
	return View::make('test/megatest')->with('userPseudo',$userPseudo);
});

// route pour afficher une page de test de la BDD
Route::get('test/tablestest', array('uses' => 'UserController@getAlbums'));

// formulaire de login de test
Route::get('test/logintest', array('uses' => 'UserController@showLogin'));

// route pour effectuer le login
Route::post('test/logintest', array('uses' => 'UserController@doLogin'));

// route pour se dé loguer
Route::get('test/logout', array('uses' => 'UserController@doLogout'));

// formulaire de crlation d'utilisateur de test
Route::get('test/createusertest', array('uses' => 'UserController@showCreate'));

// route pour créer l'utilisateur dans la BDD
Route::post('test/createusertest', array('uses' => 'UserController@createUser'));

// route pour tester l'upload d'image
Route::get('test/uploadtest', array('uses' => 'ImageController@showUpload'));

Route::post('test/uploadtest', array('uses' => 'ImageController@uploadImage'));

// route pour tester la création d'album
Route::get('test/createalbum', array('uses' => 'AlbumController@showAlbum'));

Route::post('test/createalbum', array('uses' => 'AlbumController@createAlbum'));
