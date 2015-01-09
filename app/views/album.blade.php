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
	@include('fragments/cover', array('cover' => $cover, 'fixed' => false))
	<div id="album-infos" class="cover cover-overlay">
		<h1>{{ $title }}</h1>
		<h2>{{ $author }}</h2>
		<img src="../../img/avatar.png" class="avatar"/>
	</div>
	<div id="album-gallery" class="page page-shadow container">
		<div class="container">
			@if(count($images) > 0)
			<?php
				for ($i = 0; $i < count($images); $i++)
				{
					echo ('<div class="col-lg-12 user-grid-thumbnail">');
					echo (View::make('fragments/photo-thumbnail', array('id' => $images[$i]->id)));
					echo ('</div>');
				}
			?>
			@else
				<div class="message">Aw snap ! This album is empty... :(</div>
			@endif
		</div>
	</div>
</div>
