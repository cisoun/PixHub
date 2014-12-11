<?php
	//print_r(Auth::user());
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>PixHub</title>

		<!-- Bootstrap core CSS -->
		{{ HTML::style('css/bootstrap.min.css') }}

		<!-- Custom styles for this template -->
		{{ HTML::style('css/pixhub.css') }}
		{{ HTML::style('css/pixhub-' . $page . '.css') }}

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		@include('header')

		@include($page)

		<div id="footer" class="container-fluid">
			PixHub is a free and open source project created at the Haute-École Arc Engineering School of Neuchâtel |
			<a href="https://github.com/cisoun/PixHub">Check PixHub on GitHub</a>
		</div>

		<!-- Bootstrap core JavaScript ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}
		{{ HTML::script('js/jquery.jeditable.min.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		{{ HTML::script('js/ie10-viewport-bug-workaround.js') }}
		{{ HTML::script('js/pixhub.js') }}
		{{ HTML::script('js/pixhub-' . $page . '.js') }}
	</body>
</html>
