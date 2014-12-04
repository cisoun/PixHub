<?php

class Tag extends Eloquent{
	
	//Disable records in the table
	public $timestamps = false;
	
	// Relations
	
    public function images()
    {
        return $this->belongsToMany('Image', 'image_has_tag');
    }	
		
	public function getImagesViaTag($tagID)
	{
		$images = Tag::find($tagID)->images;		
		return $images;
	}
}
