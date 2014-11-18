<!doctype html>
<html>
<head>
	<title>User login test</title>
</head>
<body>

	{{ Form::open(array('url' => 'test/createalbum')) }}
		<h1>Create Album</h1>
		
		<p>
			{{ Form::label('name', 'Album name') }}
			{{ Form::text('name') }}
		</p>

		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}

</body>
</html>
