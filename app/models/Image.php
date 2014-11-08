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
}
