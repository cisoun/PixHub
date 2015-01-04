<?php

class ImageController extends BaseController {

	public function showUpload()
	{
		return View::make('test/uploadtest');
	}

	public function uploadImage()
	{
		$rules = array(
			'file' => 'image'
		);
		
		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails())
		{
			return Response::make($validation->errors(), 400);
		}


		$file = Input::file('file');

		$exif = @exif_read_data($file->getRealPath(), 0, true);
		

		$path = $file->getRealPath();

		$id = Auth::id();
		$destinationPath = public_path() . '/uploads/' . sha1($id);

		$filename = $file->getClientOriginalName();
		$extension = $file->getClientOriginalExtension();

		$sha1filename = sha1($filename).time() . '.' . $extension;

		$uploadSuccess = $file->move($destinationPath, $sha1filename);

		if( $uploadSuccess ) {

			$exifID = App::make('ExifController')->createExif($exif);

			//$albumID = Input::get('albumID');
			//$album = Album::find($albumID);
			$albumName = Input::get('album-name');
			$album = Album::firstOrCreate(array('name' => $albumName));

			$album->createImage($sha1filename, 'Description', $exifID);

			return Response::json('success', 200);
			//return Redirect::to('user/simon/album/' . $album->id);
		} else {
			return Response::json('error', 400);
			//return Redirect::to('home');
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
