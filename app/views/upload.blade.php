<?php
	$user = Auth::user();
	$albums = $user->albums;

	$alertSuccess = '<b>Hurray</b> ! Your photos were successfully uploaded !';
	$alertSuccess = '<b>Oops</b> ! Your photos were not uploaded !';
?>
<div id="upload" class="container-fluid page">
	<div class="container">
		<h1>Upload your pictures</h1>
		{{ Form::open(array('url' => '/upload', 'files' => true, 'class' => 'dropzone', 'id' => 'upload-dropzone')) }}
			<div id="upload-toolbar" class="content form-inline">
				<select id="upload-album-list" class="selectpicker form-control">
					<option><b>New album</b></option>
					<option disabled>──────</option>
					@foreach ($albums as $album)
						<option>{{ $album->name }}</option>
					@endforeach
				</select>
				<input type="text" class="form-control" id="upload-album-name" name="album-name" placeholder="Album name" required>
				<span id="upload-message"><b>Ooops !</b> Seems like a file cannot be uploaded...</span>
				<button type="button" id="upload-button" class="btn btn-primary pull-right form-control">Upload ! <span id="counter" class="badge">0</span></button>
			</div>
			<img src="img/upload.png" class="dz-logo" style="pointer-events:none;"/>
			<div class="fallback">
				<input name="files" type="file" multiple/>
			</div>
		{{ Form::close() }}
	</div>
</div>
