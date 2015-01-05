<?php

class ImageController extends BaseController {

	public function showUpload()
	{
		return View::make('test/uploadtest');
	}

	public function uploadImage()
	{

		// Validation process

		$rules = array (
			'album-name' => 'required|min:1',
			'file' => 'image'
		);
		
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			return Response::make($validation->errors(), 400);
		}

		// Take file/author datas

		$file = Input::file('file');
		$userID = Auth::id();
		
		// Define new file path

		$destinationPath = public_path() . '/uploads/' . sha1($userID);
		$filename = $file->getClientOriginalName();
		$extension = $file->getClientOriginalExtension();
		$sha1filename = sha1($filename).time() . '.' . $extension;

		// Upload process

		$uploadSuccess = $file->move($destinationPath, $sha1filename);
		if( $uploadSuccess )
		{
			// Title was defined ? If so, use it. Otherwise, use original file's name.
			$title = strlen(Input::has('title')) > 0 ? Input::get('title') : $sha1filename;

			// Exif stuff...
			$exif = @exif_read_data($file->getRealPath(), 0, true);
			$exifID = App::make('ExifController')->createExif($exif);

			// Get album's name. Create it if it doesn't exist.
			$albumName = Input::get('album-name');
			$album = Album::firstOrCreate(array('name' => $albumName, 'user_id' => $userID));
			$album->createImage($title, '', $exifID);

			return Response::json('success', 200);
		}
		else
		{
			return Response::json('error', 400);
		}
	}

	public function uploadAvatar()
	{
		$rules = array(
			'file' => 'image|max:650' //Max 650KB
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails())
		{
			return Response::make($validation->errors(), 400);
		}

		$file = Input::file('file');

		$path = $file->getRealPath();

		$id = Auth::id();

		$destinationPath = public_path().'\uploads\ '.sha1($id);

		$filename = $file->getClientOriginalName();
		$extension = $file->getClientOriginalExtension();

		$uploadSuccess = $file->move($destinationPath, sha1($id).'.ava');

		if( $uploadSuccess ) {
			return Redirect::to('test/tablestest');
		} else {
			return Redirect::to('home');
		}
	}

}
