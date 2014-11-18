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
}
