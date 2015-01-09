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

	public function path() {
		return '/uploads/' . sha1($this->user_id);
	}

	public function url() {
		return '/album/' . $this->id;
	}

	public function user() {
		return $this->belongsTo('User');
	}

	// Getters

	public function getImages($albumID)
	{
		return Album::find($albumID)->images;
	}

	public static function getPath($albumID)
	{
		return '/uploads/' . sha1(Album::find($albumID)->user_id);
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
			'name'		=> $albumName,
			'user_id'	=> $userID,
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
	public function createImage($name, $description = '', $exifID = 1)
	{
		$image = new Image;
		return $image->createImage($name, $description, $this->id, $exifID);
	}
}
