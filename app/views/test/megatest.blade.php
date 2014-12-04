<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mega test</title>

	<!-- CSS -->
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<style>
		body { padding-top:50px; } /* add some padding to the top of our site */
	</style>
</head>
<body class="container">
<div class="col-sm-8 col-sm-offset-2">

	<?php 	

		$id = Auth::id();
		
		$user = User::find($id);

		$path = $user->getPath(); // Chemin des uploads de l'utilisateur
		
		$albums = $user->albums; // Trouve les albums de l'utilisateur logué
		
		$album =  Album::find(4);
		
		$images = $album->images; // Acces aux images d'un album particulier (ici dont l'id = 4)
		
		$image = Image::find(1);
		
		$tags = $image->tags; // Acces aux tags d'une image (dont l'id est 1)
		
		$tag = Tag::find(3);
		
		$ImagesFromTag = $tag->images;	// Acces aux images d'un tag particulier (ici son id = 3)	
		
	?>
	
</div>
</body>
</html>
