<?php

class Image extends Eloquent{
	
	//Disable records in the table
	public $timestamps = false;

	protected $guarded = array('id');
	
	// Relations
	
	public function exif() {
		return $this->belongsTo('Exif');
	}
	
	public function album() {
		return $this->belongsTo('Album');
	}
	
	public function tags()
    {
        return $this->belongsToMany('Tag','image_has_tag');
    }
	
	// Getters
	
	public function getExif($imageID)
	{
		return Image::find($imageID)->exif;
	}
	
	public function getTags($imageID)
	{
		$tags = Image::find($imageID)->tags;
		
		return $tags;		
	}
	
	// Méthode de création d'image dans la BDD
	public function createImage($filename,$description,$albumID,$exifID)
	{
		$data =[
			'name' =>$filename,
			'description' =>$description,
			'dateUpload' =>time(),
			'album_id' =>$albumID,
			'exif_id' =>$exifID,
		];
		
		return Image::create($data)['id'];
	}

}
