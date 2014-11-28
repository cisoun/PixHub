<?php

class ImageController extends BaseController {

	public function showUpload()
	{
		return View::make('test/uploadtest');
	}

	public function getExif($imageID)
	{
		return Image::find($imageID)->exif;
	}
	
	public function getTags($imageID)
	{
		return Image::find($imageID)->tags;
	}
	
	public function createImage($exifID,$filename,$albumID)
	{
		$data =[
			'name' =>$filename,
			'description' =>'Description',
			'dateUpload' =>time(),
			'album_id' =>$albumID,
			'exif_id' =>$exifID,
		];
		
		Image::create($data);
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
		
        $destinationPath = public_path().'\uploads\ '.sha1('1'); // à la place de '1' mettre l'id de l'utilisateur
		
        $filename = $file->getClientOriginalName();
		$extension = $file->getClientOriginalExtension();
		
		$sha1filename = sha1($filename).time().'.'.$extension;
		
        $uploadSuccess = $file->move($destinationPath, $sha1filename);

        if( $uploadSuccess ) {
			
			$exifID = App::make('ExifController')->createExif($exif);
			
			$this->createImage($exifID,$sha1filename,1); // à la place de '1' mettre l'id de l'album
			return Redirect::to('test/tablestest');
        } else {
           return Redirect::to('home');
        }
    }
}
