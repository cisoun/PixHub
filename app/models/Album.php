<?php

class Album extends Eloquent {
	
	//Disable records in the table
	public $timestamps = false;

	protected $fillable = array('name','user_id');
	protected $guarded = array('id');
	
	// Relations
	
	public function images() {
		return $this->hasMany('Image');
	}
	
	public function user() {
		return $this->belongsTo('User');
	}
	
	// Getters
	
	public function getImages($albumID)
	{
		return Album::find($albumID)->images;

	}
	
	public function getPath($userID)
	{
		return public_path().'\uploads\ '.sha1($userID);
	}
	
	// Création d'album dans la BDD
	public function createAlbum($albumName,$userID)
	{
		$data =[
			'name' => $albumName,
			'user_id' =>$userID,
		];
		
		$albumID = Album::create($data)['id'];
		
		return $albumID;
	}
	
	// Création d'image
	public function createImage($filename,$description,$exifID)
	{
		$image = new Image;
		$image->createImage($filename,$description,$this->id,$exifID);
	}
}
