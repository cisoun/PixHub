<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	//Disable records in the table
	public $timestamps = false;

	protected $hidden = array('password', 'remember_token');

	protected $fillable = array('name','pseudo', 'cover', 'site','mail','location','description', 'password');
	protected $guarded = array('id','password');
	
	public function albums() {
		return $this->hasMany('Album');
	}
	
	public static function getPath($userID)
	{
		return public_path().'\uploads\ '.sha1($userID);
	}
	
	public function createAlbum($albumName)
	{
		$album = new Album();
		$album->createAlbum($albumName,$this->id);
	}
	
	public static function getUserFromPseudo($pseudo)
	{
		return User::where('pseudo',$pseudo)->first();
	}
	
	public function deleteUser()
	{
		$albums = $this->albums;
		
		foreach($albums as $album)
		{
			$album->deleteAlbum();
		}
		
		$path = User::getPath($this->id);
		echo $path;
		if (File::exists($path)){
			File::deleteDirectory($path);
		}
		
		$this->delete();
	}

	// Setters
	
	public function setDescription($description)
	{
		$this->description = $description;
		$this->save();
	}
	
	public function setLocation($location)
	{
		$this->location = $location;
		$this->save();
	}
	
	public function setSite($site)
	{
		$this->site = $site;
		$this->save();
	}
	
	public function setCover($cover)
	{
		$this->cover = $cover;
		$this->save();
	}
	
	public function setName($name)
	{
		$this->name = $name;
		$this->save();
	}
	
	public function setPassword($passwordHash) // Le mot de passe doit être hashé (sha1(pass)) avant l'appel du set
	{
		$this->password = $passwordHash;
		$this->save();
	}
	
}
