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
	
	public static function getTagByName($name)
	{
		return Tag::where('name',$name)->first();
	}
	
	// Ajout d'un tag à une image
	public static function addTagToImage($name,$imageID)
	{
		$tag = Tag::getTagByName($name);
		
		if($tag == null) // Si le tag n'existe pas, on le créé dans la BDD
		{
			$tag = Tag::createTag($name);
		}
		
		$check = DB::table('image_has_tag')->where(array('image_id' => $imageID, 'tag_id' => $tag->id))->first(); // Permet de savoir si la relation tag - image existe déjà
		
		if($check == null)
		{
			DB::table('image_has_tag')->insert(array('image_id' => $imageID, 'tag_id' => $tag->id)); // Création de l'entrée dans la table relationnelle
		}
		
	}
	
	// Création du tag dans la BDD
	private static function createTag($name)
	{	
		$tag = new Tag;
		$tag->name = $name;
		
		$tag->save();
		
		return $tag;		
	}
	
	// Supression d'un tag d'une image
	public static function deleteTag($name,$imageID)
	{
		$tag = Tag::getTagByName($name);
		$entry = DB::table('image_has_tag')->where(array('image_id' => $imageID, 'tag_id' => $tag->id));
		$entry->delete();
		
		$allEntries = DB::table('image_has_tag')->where(array('tag_id' => $tag->id))->get();
		
		if($allEntries == null) // Plus aucunes images n'utilisent ce tag, on le supprime de la bdd
		{
			$tag->delete();
		}
	}
}
