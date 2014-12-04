<!doctype html>
<html>
<head>
	<title>Create user test</title>
</head>
<body>
	{{ Form::open(array('url' => 'test/createusertest')) }}
		<h1>Create your account</h1>

		<!-- if there are login errors, show them here -->
		<p>
			{{ $errors->first('name') }}
			{{ $errors->first('mail') }}
			{{ $errors->first('password') }}
		</p>
		
		<p>
			{{ Form::label('pseudo', 'Your pseudo') }}
			{{ Form::text('pseudo') }}
		</p>
		
		<p>
			{{ Form::label('name', 'Your real name') }}
			{{ Form::text('name') }}
		</p>

		<p>
			{{ Form::label('mail', 'Email Address') }}
			{{ Form::text('mail', Input::old('mail'), array('placeholder' => 'example@example.com')) }}
		</p>

		<p>
			{{ Form::label('site', 'Your site') }}
			{{ Form::text('site')}}
		</p>

		<p>
			{{ Form::label('location', 'Your location') }}
			{{ Form::text('location')}}
		</p>

		<p>
			{{ Form::label('description', 'Who are you ?') }}
			{{ Form::text('description')}}
		</p>

		<p>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</p>

		<p>{{ Form::submit('Complete!') }}</p>
	{{ Form::close() }}

</body>
</html>
