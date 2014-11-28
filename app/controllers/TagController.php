<?php

class TagController extends BaseController {

	// Retourne les albums de l'utlisateur
	public function getImages($tagID)
	{		
		return Tag::find($tagID)->images;
	}
}
