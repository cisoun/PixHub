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
	
	public function getPath()
	{
		return public_path().'\uploads\ '.sha1($this->id);
	}
	
	public function createAlbum($albumName)
	{
		$album = new Album();
		$album->createAlbum($albumName,$this->id);
	}
}
