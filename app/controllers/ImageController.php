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
           //return Response::make($validation->errors->first(), 400);
         }

        $file = Input::file('file');
		
		$exif = @exif_read_data($file->getRealPath(), 0, true);
		
		$path = $file->getRealPath();
		
		$id = Auth::id();
		
        $destinationPath = public_path().'\uploads\ '.sha1($id);
		
        $filename = $file->getClientOriginalName();
		$extension = $file->getClientOriginalExtension();
		
		$sha1filename = sha1($filename).time().'.'.$extension;
		
        $uploadSuccess = $file->move($destinationPath, $sha1filename);

        if( $uploadSuccess ) { 
			
			$exifID = App::make('ExifController')->createExif($exif);

			$albumID = Input::get('albumID');
			$album = Album::find($albumID);
			
			$album->createImage($sha1filename,'Description',$exifID); 	
			
			return Redirect::to('test/tablestest');
        } else {
           return Redirect::to('home');
        }
    }
}
