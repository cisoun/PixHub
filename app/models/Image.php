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
	
	// Getters
	
	// Retourne les 5 dernières images de l'album dont l'id est passé en paramètre.
	public static function getLatestImages($albumID)
	{
		return DB::table('images')->orderBy('id', 'desc')->take(5)->get();
	}
	
	public function getExif($imageID)
	{
		return Image::find($imageID)->exif;
	}
	
	public function getTags($imageID)
	{
		$tags = Image::find($imageID)->tags;
		
		return $tags;		
	}
	
	// Setter
	
	public function setDescription($description)
	{
		$this->description = $description;
		$this->save();
	}
	
	// Méthode de création d'image dans la BDD
	public function createImage($filename,$description,$albumID,$exifID)
	{
		$data =[
			'name' =>$filename,
			'description' =>$description,
			'dateUpload' =>time(),
			'album_id' =>$albumID,
			'exif_id' =>$exifID,
		];
		
		return Image::create($data)['id'];
	}
	
	// Supression de l'image (.png etc)
	public function deleteImage()
	{
		$userID = $this->album->user->id;
		
		$path = User::getPath($userID);		
		
		$filename = $path.'\\'.$this->name;
		echo $filename;
		if (File::exists($filename)){
			File::delete($filename);
		}
		
		$this->deleteExif();
	}
	
	// Supression de l'exif et de l'image dans la BDD
	public function deleteExif()
	{
		$exifID = $this->exif_id;
		
		if($exifID != 1){ // Ne pas supprimer l'entrée 1 de la table exif qui représente les images sans exif
			Exif::deleteExif($exifID);// Supprimer l'exif supprimera la photo dans la DBB
		}
		else{
			$this->delete(); // Si photo sans exif, on supprime la photo de la BDD
		}
	}

}
