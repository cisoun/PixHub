<nav class="navbar navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home">
				Pix<b>Hub</b>
			</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class=""><a href="#"><span class="glyphicon glyphicon-search"></span> Explore</a></li>
			</ul>
			<form class="navbar-form navbar-left" role="search">
				<div class="input-group navbar-search">
					<input type="text" class="form-control">
					<span class="input-group-btn">glyphicon glyphicon-ok-circle
						<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
					</span>
				</div>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li id="header-signin">
					<a href="signin"><span class="glyphicon glyphicon-ok-circle"></span> Sign in</a>
					<div id="header-signin-panel">
						@include('fragments/signin-form')
					</div>
				</li>
				<li class=""><a href="signup"><span class="glyphicon glyphicon-upload"></span> Sign up</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>
