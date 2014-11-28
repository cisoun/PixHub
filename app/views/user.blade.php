<?php
	$avatar = asset('img/avatar.png');
?>
<div id="user">
	<div id="user-cover" class="text-shadow">
		<img id="user-avatar" src="{{{ $avatar }}}" class="img-responsive img-circle" alt="avatar"/>
		<div id="user-name">{{{ $user }}}</div>
		<div id="user-location"><span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span> {{ trans('pixhub.location') }} : Everywhere, Earth</div>
		<div id="user-website"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> {{ trans('pixhub.website') }} : <a href="http://johndoe.com">http://johndoe.com</a></div>
	</div>
	<div id="user-body" class="page-shadow container">
		<div id="user-nav">
			<div id="user-tabs">
				<ul class="nav nav-pills">
					<li role="presentation">{{ link_to('user/' . $user . '/latest', trans('pixhub.user-latest-photos'), $attributes = array(), $secure = null); }}</li>
					<li role="presentation" class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
							{{ trans('pixhub.user-albums') }} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							This user has no albums
						</ul>
					</li>
					<li role="presentation">{{ link_to('user/' . $user . '/about', trans('pixhub.user-about'), $attributes = array(), $secure = null); }}</li>
				</ul>
			</div>
		</div>
		<div id="user-page" class="container">
			@include('user/' . $section)
		</div>
	</div>
</div>
