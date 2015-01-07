<?php
$image = Image::find($id);
$id = $image->id;
$title = $image->name;
$path = $image->path();
$avatar = asset('img/avatar.png');
?>
<div class="photo-thumbnail photo">
	<img src="{{ $path }}" class="img-responsive" alt=""/>
	<div class="photo-thumbnail-overlay">
		<div class="photo-thumbnail-title">
			<a href="/photo/{{ $id }}">
				<img src="{{ $avatar }}" class="avatar"/>
				{{ $title }}
			</a>
		</div>
	</div>
</div>
