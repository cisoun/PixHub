<?php
	$user = Auth::user();
	$albums = $user->albums;
?>
<div id="upload" class="container-fluid page">
	<div class="container">
		<h1>Upload your pictures</h1>
		<div id="upload-alert" class="alert alert-success" role="alert"><b>Hurray</b> ! Your photos were successfully uploaded !</div>
		{{ Form::open(array('url' => '/upload', 'files' => true, 'class' => 'dropzone', 'id' => 'upload-dropzone')) }}
			<div id="upload-toolbar" class="content form-inline">
				<select id="upload-album-list" class="selectpicker form-control">
					<option><b>New album</b></option>
					<option disabled>──────</option>
					@foreach ($albums as $album)
						<option>{{ $album->name }}</option>
					@endforeach
				</select>
				<input type="text" class="form-control" id="upload-album-name" name="album-name" placeholder="Album name">
				<button type="button" id="upload-button" class="btn btn-primary pull-right form-control">Upload ! <span id="counter" class="badge">0</span></button>
			</div>
			<img src="img/upload.png" class="dz-logo" style="pointer-events:none;"/>
			<div class="fallback">
				<input name="files" type="file" multiple />
			</div>
		{{ Form::close() }}
	</div>
</div>
