<?php

class ImageController extends BaseController {

	public function showUpload()
	{
		return View::make('test/uploadtest');
	}

	/**
	 * @brief Image upload controller.
	 * @return JSON response for Dropzone.
	 */
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

		// Upload process

		$uploadSuccess = $file->move($destinationPath, $filename);
		if( $uploadSuccess )
		{
			// Title was defined ? If so, use it. Otherwise, use original file's name.
			$name = strlen(Input::has('title')) > 0 ? Input::get('title') : $filename;

			// Exif stuff...
			$exif = exif_read_data($destinationPath . '/'. $filename, 0, true);
			$exifID = App::make('ExifController')->createExif($exif);

			// Get album's name. Create it if it doesn't exist.
			$albumName = Input::get('album-name');
			$album = Album::firstOrCreate(array('name' => $albumName, 'user_id' => $userID));

			// Create and rename the file after its ID in order to find it easily.
			$id = $album->createImage($name, '', $exifID);
			rename($destinationPath . '/'. $filename, $destinationPath . '/' . $id);

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
