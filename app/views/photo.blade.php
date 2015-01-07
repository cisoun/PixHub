<?php
$image = Image::find($id);
$user = $image->user();
$exif = $image->exif;

$hasExif = $exif->id == 1 ? false : true;

?>
<div id="photo" class="container-fluid page">
	<div id="photo-container">
		<div class="container">
			<img src="{{{ $image->path() }}}" class="img-responsive photo" alt="photo"/>
		</div>
	</div>
	<div class="page-shadow">
		<div id="user-nav">
			<div class="page-tabs">
				<ul class="nav nav-pills">
					<li role="presentation">{{ link_to('', trans('pixhub.user-latest-photos'), $attributes = array(), $secure = null); }}</li>
					<li role="presentation" class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
							{{ trans('pixhub.user-albums') }} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							This user has no albums
						</ul>
					</li>
					<li role="presentation">{{ link_to('', trans('pixhub.user-about'), $attributes = array(), $secure = null); }}</li>
				</ul>
			</div>
		</div>
		<div id="photo-informations" class="container page">
			<div class="col-md-6 photo-panel">
				<div class="row">
					<div id="photo-title" class="row">
						<div class="col-md-2">
							<a href="{{ $user->url() }}"><img id="photo-avatar" src="../img/avatar.png" class="avatar img-responsive" alt="Avatar"/></a>
						</div>
						<div class="col-md-10">
							<h1 id="editable_title" class="editable">{{ $image->name }}</h1>
							<h4><a href="{{ $user->url() }}">{{ $user->name }}</a></h4>
						</div>
					</div>
					<div class="row">
						<div id="photo-description" class="editable">{{ $image->description }}</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 photo-panel separator">
				<h1>{{{ trans('pixhub.photo-informations') }}}</h1>
				@if($hasExif)
				<table>
					<!---tr><td class="photo-exif">{{{ trans('pixhub.views') }}}</td><td>9001</td></tr-->
					<tr><td class="photo-exif">{{{ trans('exif.size') }}}</td><td>{{ $exif->height }} × {{ $exif->width }}</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.camera-model') }}}</td><td>{{ $exif->cameraModel }}</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.camera-brand') }}}</td><td>{{ $exif->cameraBrand }}</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.iso') }}}</td><td>{{ $exif->iso }}</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.aperture') }}}</td><td>{{ $exif->aperture }}</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.exposure') }}}</td><td>{{ $exif->exposure }} s</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.focal') }}}</td><td>{{ $exif->focal }} mm</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.flash') }}}</td><td>{{ trans('exif.flashes.' . $exif->flash) }}</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.orientation') }}}</td><td>{{ trans('exif.orientations.' . $exif->orientation) }}</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.date') }}}</td><td>{{ $exif->date }}</td></tr>
				</table>
				@else
				<span>No EXIF datas.</span>
				@endif
				<h1>Tags</h1>
				<a href="#" class="tag">Example</a> <a href="#" class="tag">Example</a> <a href="#" class="tag">Example</a>
			</div>
		</div>
	</div>
</div>
