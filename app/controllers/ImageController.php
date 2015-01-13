<?php
class ImageController extends BaseController {

	public function deleteImage($id)
	{
		$image = Image::find($id);
		$album = $image->album;
		$image->deleteImage();
		return Redirect::to('album/' . $album->id);
	}

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
			'file' => 'required|image'
		);

		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			return Response::make($validation->errors(), 400);
		}

		// Take file/author datas

		$file = Input::file('file');
		$userID = Auth::id();
		$mime = $file->getMimeType();

		// Define new file path

		$destinationPath = public_path() . '/uploads/' . sha1($userID);
		$filename = $file->getClientOriginalName();

		// Upload process

		$uploadSuccess = $file->move($destinationPath, $filename);
		if($uploadSuccess)
		{
			// Title was defined ? If so, use it. Otherwise, use original file's name.
			// We'll use base64 in order to avoid spaces and dots when passing the name by POST.
			$nameField = base64_encode($filename);
			$name = Input::has($nameField) ? Input::get($nameField) : $filename;

			// Exif stuff...

			if($mime == 'image/jpeg')
			{
				$exif = @exif_read_data($destinationPath . '/'. $filename, 0, true);
				$exifID = App::make('ExifController')->createExif($exif);
			}
			else
			{
				$exifID = 1;
			}

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

		$destinationPath = public_path() . '/uploads/' . sha1($id);

		$filename = $file->getClientOriginalName();
		$extension = $file->getClientOriginalExtension();

		$uploadSuccess = $file->move($destinationPath, 'avatar');

		return Redirect::to('user/' . User::find($id)->pseudo);
	}

}
