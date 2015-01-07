<?php
	$image = Image::find($id);
	$id = $image->id;
	$title = $image->name;
	$path = $image->path();
	$avatar = asset('img/avatar.png');
	$author = $image->user();
?>
<div class="photo-thumbnail photo">
	<a href="/photo/{{ $id }}" ><img src="{{ $path }}" class="photo-thumbnail-img" class="img-responsive"/></a>
	<div class="photo-thumbnail-overlay">
		<div class="photo-thumbnail-infos">
			<a href="/user/{{ $author->pseudo }}" ><img src="{{ $avatar }}" class="avatar"/></a>
			<div>
				<span class="photo-thumbnail-title"><a href="/photo/{{ $id }}" >{{ $title }}</a></span>
				<span class="photo-thumbnail-author">By <a href="/user/{{ $author->pseudo }}" >{{ $author->name }}</a></span>
			</div>
		</div>
	</div>
</div>
