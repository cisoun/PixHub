<!doctype html>
<html>
<head>
	<title>User login test</title>
</head>
<body>

	{{ Form::open(array('url' => 'logintest')) }}
		<h1>Login</h1>

		<!-- if there are login errors, show them here -->
		<p>
			{{ $errors->first('mail') }}
			{{ $errors->first('password') }}
		</p>
		
		<p>
			{{ Form::label('mail', 'Email Address') }}
			{{ Form::text('mail', Input::old('mail'), array('placeholder' => 'example@example.com')) }}
		</p>

		<p>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</p>

		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}

</body>
</html>