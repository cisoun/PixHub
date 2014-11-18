<?php

class AlbumController extends BaseController {

	public function showAlbum()
	{
		return View::make('test/createalbum');
	}

	public function createAlbum()
	{
		$data =[
			'name' => Input::get('name'),
			'user_id' =>35, // En dur pour le moment
		];
		
		$albumID = Album::create($data)['id'];
		return Redirect::to('test/tablestest'); // Page de login de test
	}
}
