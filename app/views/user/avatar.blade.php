<h1>{{ trans('pixhub.user-avatar') }}</h1>
{{ Form::open(array('url' => '/user/' . $user->pseudo . '/avatar', 'files' => true)) }}
<div class="form-group">
	<label for="avatar">File input</label>
	<input type="file" id="avatar" name="file">
	<p class="help-block">Max size : 650 kb</p>
</div>
<button type="submit" class="btn btn-primary">Upload</button>
{{ Form::close() }}
