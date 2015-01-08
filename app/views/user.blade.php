<?php
$avatar = asset('img/avatar.png');

$user = User::getUserFromPseudo($user);
$albums = $user->albums;
?>
<div id="user">
	<div id="user-cover" class="text-shadow cover">
		<img id="user-avatar" src="{{{ $avatar }}}" class="img-responsive img-circle" alt="avatar"/>
		<div id="user-name">{{{ $user->name }}}</div>
		<div id="user-location">{{{ $user->location }}}</div>
		<div id="user-website"><a href="{{{ $user->site }}}">{{{ $user->site }}}</a></div>
	</div>
	<div id="user-body" class="page-shadow container">
		<div id="user-nav">
			<div class="page-tabs">
				<ul class="nav nav-pills">
					<li role="presentation">{{ link_to('user/' . $user->pseudo . '/latest', trans('pixhub.user-latest-photos'), $attributes = array(), $secure = null); }}</li>
					<li role="presentation" class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
							{{ trans('pixhub.user-albums') }} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							@forelse($albums as $album)
								<li><a href="/album/{{ $album->id }}">{{ $album->name }}</a></li>
							@empty
								<li>This user has no albums</li>
							@endforelse
						</ul>
					</li>
					<li role="presentation">{{ link_to('user/' . $user->pseudo . '/about', trans('pixhub.user-about') . $user->name, $attributes = array(), $secure = null); }}</li>
				</ul>
			</div>
		</div>
		<div id="user-page" class="container">
			@include('user/' . $section)
		</div>
	</div>
</div>
