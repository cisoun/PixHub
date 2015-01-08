<?php
	$image = Image::find($id);
	$album = $image->album;
	$avatar = asset('img/avatar.png');
	$author = $image->user();
?>
<div class="photo-thumbnail photo">
	<a href="/photo/{{ $id }}" ><img src="{{ $image->path() }}" class="photo-thumbnail-img" class="img-responsive"/></a>
	<div class="photo-thumbnail-overlay">
		<div class="photo-thumbnail-infos">
			<a href="/user/{{ $author->pseudo }}" ><img src="{{ $avatar }}" class="avatar"/></a>
			<div>
				<span class="photo-thumbnail-title"><a href="/photo/{{ $id }}" >{{ $image->name }}</a></span>
				<span class="photo-thumbnail-author">In <a href="/album/{{ $album->id }}" >{{ $album->name }}</a> by <a href="/user/{{ $author->pseudo }}" >{{ $author->name }}</a></span>
			</div>
		</div>
	</div>
</div>
