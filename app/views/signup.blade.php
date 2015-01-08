<div id="signup" class="container-fluid page">
	<div class="container">
		<div class="col-md-8">
			<h1>{{ trans('signup.title') }}</h1>
			{{ Form::open(array('url' => 'signup')) }}
				<!--- <div class="form-group">
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
					 <?php //echo(Form::captcha()); ?>
				</div>
				
				<button type="submit" class="btn btn-lg btn-default">Let's go ! <span class="glyphicon glyphicon-upload"></span></button>
				-->
				<div class="form-group">				
					<label for="signupPseudo">Pseudo</label>
					<!--{{ HTML::decode(Form::label('firstName', 'Test', array('class' => 'form-control'))) }}-->
					{{ HTML::decode(Form::text('signupPseudo', Input::old('mail'), array('placeholder' => '','class' => 'form-control'))) }}
				</div>
				<div class="form-group">
					<label for="signupName">Real name</label>
					<!--{{ HTML::decode(Form::label('firstName', 'Test', array('class' => 'form-control'))) }}-->
					{{ HTML::decode(Form::text('signupName', Input::old('mail'), array('placeholder' => 'Name','class' => 'form-control'))) }}
				</div>
				<div class="form-group">				
					<label for="signupEmail">Email</label>
					{{ HTML::decode(Form::text('signupEmail', Input::old('mail'), array('placeholder' => 'example@example.com','class' => 'form-control'))) }}
				</div>
				<div class="form-group">				
					<label for="signupPassword">Password</label>
					{{ HTML::decode(Form::password('signupPassword',array('class' => 'form-control'))) }}
				</div>
				<div class="form-group">				
					<label for="confirmedSignupPassword">Confirm password</label>
					{{ HTML::decode(Form::password('confirmedSignupPassword',array('class' => 'form-control'))) }}
				</div>
			
				<button type="submit" class="btn btn-default">
					{{ trans('forms.signme') }} <span class="glyphicon glyphicon-ok-circle"></span>
				</button>
			{{ Form::close() }}
			<p class="form-info">* {{ trans('forms.reminders.filled') }}</p>
		</div>
		<div class="col-md-4">
			<img src="img/signup.png" alt="sign up" class="img-responsive img-center">
		</div>
	</div>
</div>
