<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Database Tables test</title>

	<!-- CSS -->
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<style>
		body { padding-top:50px; } /* add some padding to the top of our site */
	</style>
</head>
<body class="container">
<div class="col-sm-8 col-sm-offset-2">
	@foreach ($albums as $album)
		<!-- GET OUR BASIC BEAR INFORMATION -->
		<h2>Album : {{ $album->name }} <small> belongs to {{ $album->user->name }}</small></h2>
		@foreach ($album->images as $image)
			<b>{{ $image->name}}</b> have exif's camera model : <b> {{ $image->exif->cameraModel}}</b>
			<i>, tags : </i>
			@foreach ($image->tags as $tag)
				<b>{{ $tag->name}}</b>
			@endforeach
			</br>
		@endforeach
	@endforeach

	<?php $tags2 = Tag::all(); ?>
	<h2> Tags : </h2>
	@foreach ($tags2 as $tag)
		<h3>{{ $tag->name }}<small> associates to
			@foreach($tag->images as $image)
				<b>{{$image->name}}</b>
			@endforeach
			</small></h3>
	@endforeach

</div>
</body>
</html>
