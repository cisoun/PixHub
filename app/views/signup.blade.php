<div id="signup" class="container-fluid page">
	<div class="container">
		<div class="col-md-8">
			<h1>{{ trans('signup.title') }}</h1>
			{{ Form::open(array('url' => 'foo/bar')) }}
				<div class="form-group">
					<label for="signupName">Name or pseudo *</label>
					<input type="text" class="form-control" id="signupName" placeholder="Enter name" required>
				</div>
				<div class="form-group">
					<label for="signupEmail">Email address *</label>
					<input type="email" class="form-control" id="signupEmail" placeholder="Enter email" required>
				</div>
				<div class="form-group">
					<label for="signupPassword">Password *</label>
					<input type="password" class="form-control" id="signupPassword" placeholder="Password" required>
				</div>
				<div class="form-group">
					<label for="signupPasswordConfirm">Confirm Password *</label>
					<input type="password" class="form-control" id="signupPasswordConfirm" placeholder="Password" required>
				</div>
				<div id="captcha">
					<?php echo(Form::captcha()); ?>
				</div>
			<button type="submit" class="btn btn-lg btn-default">Let's go ! <span class="glyphicon glyphicon-upload"></span></button>
			{{ Form::close() }}
			<p class="form-info">* {{ trans('forms.reminders.filled') }}</p>
		</div>
		<div class="col-md-4">
			<img src="img/signup.png" alt="sign up" class="img-responsive img-center">
		</div>
	</div>
</div>