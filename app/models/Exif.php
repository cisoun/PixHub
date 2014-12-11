<?php

class Exif extends Eloquent{
	
	//Disable records in the table
	public $timestamps = false;

	protected $guarded = array('id');
	
	// Relations
	
	/*public function image() {
		return $this->belongsTo('Image');
	}*/
	
	// Supression d'exif
	public static function deleteExif($exifID)
	{
		$exif = Exif::find($exifID);
		$exif->delete();
	}
}
