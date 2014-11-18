<?php
	$css = 				asset('css/pixhub.css');
	$css_bootstrap =	asset('css/bootstrap.min.css');
	$css_page = 		asset('css/pixhub-' . $page . '.css');
	$js = 				asset('js/pixhub.js');
	$js_page = 			asset('js/pixhub-' . $page . '.js');
	$js_bootstrap = 	asset('js/bootstrap.min.js');
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
		<link href="{{{ $css_bootstrap }}}" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="{{{ $css }}}" rel="stylesheet">
		<link href="{{{ $css_page }}}" rel="stylesheet">

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
			PixHub is a free and open source project created at Haute-École Arc |
			<a href="https://github.com/cisoun/PixHub">Check PixHub on GitHub</a>
		</div>

		<!-- Bootstrap core JavaScript ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="{{{ $js_bootstrap }}}"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="js/ie10-viewport-bug-workaround.js"></script>
		<script src="{{{ $js }}}"></script>
		<script src="{{{ $js_page }}}"></script>
	</body>
</html>