<?php
	$album = Album::find($id);
	$images = $album->images;

	$cover = asset('img/cover.jpg');
	if (count($images) > 0) {
		$image = $images[rand(0, count($images) - 1)]->id;
		$cover = $album->path() . '/' . $image;
	}

	$title = $album->name;
	$author = $album->user;
?>
@include('fragments/popup', array('action' => '/album/delete/' . $id, 'message' => 'You are going to remove this album and all its content.<p><b>Are you sure to do this ?</b></p>', 'user' => $author))
<div id="album">
	@include('fragments/cover', array('cover' => $cover, 'fixed' => false))
	<div id="album-infos" class="cover cover-overlay">
		<h1>{{ $title }}</h1>
		<h2>{{ $author->name }}</h2>
		<img src="../../img/avatar.png" class="avatar"/>
	</div>
	<div id="album-gallery" class="page-shadow container">
		@include('fragments/navbar', array('cover' => false, 'delete' => true, 'user' => $author))
		<div class="container page">
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
