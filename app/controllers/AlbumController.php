<?php
class AlbumController extends BaseController {

	public function deleteAlbum($id)
	{
		$album = Album::find($id);
		$user = $album->user;
		$album->deleteAlbum();
		return Redirect::to('user/' . $user->pseudo);
	}

	public function showAlbum()
	{
		return View::make('test/createalbum');
	}

}
