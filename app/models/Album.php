<?php

class Album extends Eloquent {

	//Disable records in the table
	public $timestamps = false;

	protected $fillable = array('name', 'user_id');
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
		return public_path() . '/uploads/' . sha1($userID);
	}

	// Setter

	public function setName($name)
	{
		$this->name = $name;
		$this->save();
	}

	// Création d'album dans la BDD
	public function createAlbum($albumName, $userID)
	{
		$data =[
			'name' => $albumName,
			'user_id' =>$userID,
		];

		$albumID = Album::create($data)['id'];

		return $albumID;
	}

	public function deleteAlbum()
	{
		//Supression des images de l'album
		$images = $this->images;
		foreach($images as $image)
		{
			$image->deleteImage();
		}

		$this->delete();

	}

	// Création d'image
	public function createImage($filename,$description,$exifID)
	{
		$image = new Image;
		$image->createImage($filename,$description,$this->id,$exifID);
	}
}
