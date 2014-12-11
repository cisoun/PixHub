<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload image test</title>

	<!-- CSS -->
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<style>
		body { padding-top:50px; } /* add some padding to the top of our site */
	</style>
</head>
<body class="container">
<div class="col-sm-8 col-sm-offset-2">

	{{ Form::open(array('url' => 'test/uploadtest','files' => true)) }}
		<h1>File upload</h1>
		<p>
			{{ Form::file('file') }}
			{{ Form::hidden('albumID', 15) }} 	<!-- Au lieu de 4 mettre l'id de l'album -->
		</p>

		<p>{{ Form::submit('Upload image!') }}</p>
	{{ Form::close() }}

</div>
</body>
</html>