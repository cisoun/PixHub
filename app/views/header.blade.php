<nav class="navbar navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Pix<b>Hub</b></a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="/explore"><span class="glyphicon glyphicon-search"></span> Explore</a></li>
			</ul>
			{{ Form::open(array('url' => 'research', 'class' => 'navbar-form navbar-left')) }}
				<div class="input-group navbar-search">
					{{ Form::text('research', '', array('placeholder' => '','class' => 'form-control')) }}
					<span class="input-group-btn">glyphicon glyphicon-ok-circle
						<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
					</span>
				</div>
			{{ Form::close() }}
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
					@include('fragments/header-logged')
				@else
					@include('fragments/header-default')
				@endif
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>
