<?php
	$photo = asset('img/test.jpg');
?>
<div id="photo" class="container page">
	<img src="{{{ $photo }}}" class="img-responsive photo" alt="photo"/>
	<div id="photo-description" class="row">
		<div class="col-lg-6 separator photo-panel">
			<h1>Titre</h1>
			<p>Description de la photo</p>
		</div>
		<div class="col-lg-6 photo-panel">
			<h1>{{{ trans('pixhub.photo-exif') }}}</h1>
			<ul>
				<li>Size : -</li>
				<li>Cameral model : -</li>
			</ul>
		</div>
	</div>
</div>
