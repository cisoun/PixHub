<?php
	$album = Album::find($album);
	$images = $album->images;


	$cover = asset('img/cover.jpg');
	if (count($images) > 0) {
		$id = $images[rand(0, count($images) - 1)]->id;
		$cover = $album->path() . '/' . $id;
	}


	$title = $album->name;
	$author = $album->user->name;

?>
<div id="album">
	<div id="album-cover" class="cover" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.7)), url('{{ $cover }}');">

	</div>
	<div id="album-infos" class="cover">
		<h1>{{ $title }}</h1>
		<h2>{{ $author }}</h2>
		<img src="../../img/avatar.png" class="avatar"/>
	</div>
	<div id="album-gallery" class="page container">
		<?php
			/*for ($i = 0; $i < 10; $i++)
			{
				$newline = ($i % 4 == 0);

				echo ('<div class="col-lg-12 user-grid-thumbnail">');
				echo (View::make('fragments/photo-thumbnail', array('title' => 'Photo #' . $i)));
				echo ('</div>');
			}*/

			for ($i = 0; $i < count($images); $i++)
			{
				echo ('<div class="col-lg-12 user-grid-thumbnail">');
				echo (View::make('fragments/photo-thumbnail', array('title' => $images[$i]->name, 'avatar' => '', 'image' => $images[$i]->path())));
				echo ('</div>');
			}
		?>
	</div>
</div>
