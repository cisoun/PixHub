<?php
	$image = Image::find($id);
	$album = $image->album;
	$author = $image->user();
?>
<div class="photo-thumbnail photo">
	<a href="/photo/{{ $id }}" ><img src="{{ $image->path() }}" class="photo-thumbnail-img" class="img-responsive"/></a>
	<div class="photo-thumbnail-overlay">
		<div class="photo-thumbnail-infos">
			<a href="/user/{{ $author->pseudo }}" >
				@include('fragments/avatar', array('user' => $author->id))
			</a>
			<div>
				<span class="photo-thumbnail-title"><a href="/photo/{{ $id }}" >{{ $image->name }}</a></span>
				<span class="photo-thumbnail-author">In <a href="/album/{{ $album->id }}" >{{ $album->name }}</a> by <a href="/user/{{ $author->pseudo }}" >{{ $author->name }}</a></span>
			</div>
		</div>
	</div>
</div>
