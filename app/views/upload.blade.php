<div id="upload" class="container-fluid page">
	<div class="container">
		<h1>Upload your pictures</h1>
		<form action="{{ url('/upload') }}" class="dropzone" id="upload-dropzone">
			<div id="upload-toolbar" class="content form-inline">
				<select class="selectpicker form-control">
					<option><b>New album</b></option>
					<option disabled>──────</option>
					<option>Ketchup</option>
					<option>Relish</option>
				</select>
				<input type="text" class="form-control" id="upload-album-name" placeholder="Album name">
				<button type="button" class="btn btn-primary pull-right form-control">Upload ! (<span id="counter">0</span> photos)</button>
			</div>
			<div class="fallback">
				<input name="file" type="file" multiple />
			</div>
		</form>
	</div>
</div>
