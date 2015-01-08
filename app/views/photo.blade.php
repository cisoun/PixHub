<?php
$image = Image::find($id);
$user = $image->user();
$exif = $image->exif;
$albums = User::find($user->id)->albums;

$hasExif = $exif->id == 1 ? false : true;
$editable = Auth::check() ? 'class="editable"' : '';
?>
<div id="photo-remove-popup">
	{{ Form::open(array('url' => '/photo/delete/' . $id)) }}
	You are going to remove this photo.
	<p><b>Are you sure to do this ?</b></p>
	<button id="photo-remove-yes" type="submit" class="btn btn-danger">Yes !</button>
	<button id="photo-remove-no" type="button" class="btn btn-default">Nope.</button>
	{{ Form::close() }}
</div>
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
					<!--li role="presentation">{{ link_to('/user/' . $user->pseudo . '/latest', trans('pixhub.user-latest-photos'), $attributes = array(), $secure = null); }}</li-->
					<li role="presentation"><a href="/user/{{ $user->pseudo }}/latest"><span class="glyphicon glyphicon-time"></span> {{ trans('pixhub.user-latest-photos') }}</a></li>
					<li role="presentation" class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
							<span class="glyphicon glyphicon-book"></span> {{ trans('pixhub.user-albums') }} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							@forelse($albums as $album)
							<li><a href="/album/{{ $album->id }}">{{ $album->name }}</a></li>
							@empty
							<li>This user has no albums</li>
							@endforelse
						</ul>
					</li>
					<!--li role="presentation">{{ link_to('/user/' . $user->pseudo . '/about', trans('pixhub.user-about'), $attributes = array(), $secure = null); }}</li-->
					<li role="presentation"><a href="/user/{{ $user->pseudo }}/about"><span class="glyphicon glyphicon-user"></span> {{ trans('pixhub.user-about') }}</a></li>
					@if(Auth::check())
					<li role="presentation"><a id="photo-remove" href="#"><span class="glyphicon glyphicon-trash"></span> {{ trans('pixhub.action-delete') }}</a></li>
					@endif
				</ul>
			</div>
		</div>
		<div id="photo-informations" class="container page">
			<div class="col-md-6 photo-panel">
				<div class="row">
					<div id="photo-title-zone" class="row">
						<div class="col-md-2">
							<a href="{{ $user->url() }}"><img id="photo-avatar" src="../img/avatar.png" class="avatar img-responsive" alt="Avatar"/></a>
						</div>
						<div class="col-md-10">
							<h1 id="photo-title" {{ $editable }}>{{ $image->name }}</h1>
							<h4><a href="{{ $user->url() }}">{{ $user->name }}</a></h4>
						</div>
					</div>
					<div class="row">
						<div id="photo-description" {{ $editable }}>{{ nl2br($image->description) }}</div>
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
@if(Auth::check())
<script>
	$(document).ready(function() {
		$('#photo-title').editable('/photo/update/{{ $id }}', {
			type     	: 'text',
			//cancel    : 'Cancel',
			//submit    : 'OK',
			//indicator : '<img src="img/indicator.gif">',
			onblur		: 'submit',
			style		: 'display: block',
			placeholder	: 'Click here to add a title...'
			/*callback : function(value, settings) {
				$('#photo-title').text(value);
			}*/
		});

		$('#photo-description').editable('/photo/update/{{ $id }}', {
			type      : 'textarea',
			//cancel    : 'Cancel',
			//submit    : 'OK',
			//indicator : '<img src="img/indicator.gif">',
			onblur		: 'submit',
			placeholder	: 'Click here to add a description...',
			callback: function(value,settings) {
				var retval = value.replace(/\n/gi, "<br>\n");
				$(this).html(retval);
			},
			data: function(value,settings) {
				value = value.replace(/\r/gi, "");
				value = value.replace(/\n/gi, "");
				var retval = value.replace(/<br>/gi, "\n");
				return retval;
			}
		});
	});
</script>
@endif
