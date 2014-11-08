<?php

class Exif extends Eloquent{
	
	//Disable records in the table
	public $timestamps = false;

	protected $guarded = array('id');
	
	// Relations
	
	/*public function image() {
		return $this->belongsTo('Image');
	}*/
}
