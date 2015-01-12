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

Route::get('album/{id}', function($id)
{
	return View::make('index', array('page' => 'album', 'id' => $id));
});

Route::post('album/delete/{id}', array('uses' => 'AlbumController@deleteAlbum'));

Route::get('home', function()
{
	return View::make('index', array('page' => 'home'));
});

Route::get('explore',function()
{
	return View::make('index', array('page' => 'explore'));
});

Route::get('photo/{id}', function($id)
{
	return View::make('index', array('page' => 'photo', 'id' => $id));
});

Route::get('photo/cover/{id}', array('uses' => 'UserController@chooseCover'));
Route::post('photo/delete/{id}', array('uses' => 'ImageController@deleteImage'));

Route::post('photo/update/{id}', function($id)
{
	if (!Auth::check())
		return;
	$image = Image::find($id);
	$value = e(Input::get('value'));
	if (Input::get('id') == 'photo-title')
		$image->setName($value);
	else
		$image->setDescription($value);
	return Input::get('value');
});

Route::get('research', function()
{
   return Redirect::to('home');
});

Route::get('research/{research}',function($research)
{
	return View::make('index', array('page' => 'research', 'research' => $research));
});

Route::post('research', array('uses' => 'HomeController@doResearch'));

Route::get('tag/{tag}',function($tag)
{
	return View::make('index', array('page' => 'tag', 'tag' => $tag));
});

Route::get('signin', function()
{
	return View::make('index', array('page' => 'signin'));
});

Route::get('signup', function()
{
	return View::make('index', array('page' => 'signup'));
});

Route::post('signup', array('uses' => 'HomeController@createUser'));
Route::post('signin', array('uses' => 'HomeController@doLogin'));
Route::get('signoff', array('uses' => 'HomeController@doLogout'));

Route::post('tag', array('uses' => 'HomeController@showTags'));

Route::get('user/{user}', function($user)
{
	if (User::getUserFromPseudo($user)->count() == 0)
		return Redirect::to('home');
	return View::make('index', array('page' => 'user', 'user' => $user, 'section' => 'latest'));
});

Route::get('user/{user}/{section}', function($user, $section)
{
	return View::make('index', array('page' => 'user', 'user' => $user, 'section' => $section));
});

Route::post('user/{user}/avatar', array('uses' => 'ImageController@uploadAvatar'));
Route::post('user/{user}/update', array('uses' => 'UserController@update'));

Route::get('upload', function()
{
	if (Auth::check())
		return View::make('index', array('page' => 'upload'));
	return View::make('index', array('page' => 'home'));
});

Route::post('upload', 'ImageController@uploadImage');



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
