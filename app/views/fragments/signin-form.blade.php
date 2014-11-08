{{ Form::open(array('url' => 'foo/bar')) }}
<div class="form-group">
	<label for="signinUsername">{{ trans('forms.username') }} : </label>
	<input type="text" class="form-control" id="signinUsername" placeholder="Enter user name">
</div>
<div class="form-group">
	<label for="signinPassword">{{ trans('forms.password') }} *</label>
	<input type="password" class="form-control" id="signinPassword" placeholder="Password" required>
</div>
<div class="form-group">
	<a class="signin-password-forgotten" href="#">{{ trans('forms.password-forgotten') }}</a>
	<button type="submit" class="btn btn-default pull-right">
		{{ trans('forms.logme') }} <span class="glyphicon glyphicon-ok-circle"></span>
	</button>
</div>
{{ Form::close() }}
