<?php
if (!isset($cover)) $cover = false;
if (!isset($delete)) $delete = false;
if (!isset($image)) $image = 0;
?>
<div class="page-tabs">
	<ul class="nav nav-pills">
		<!--li role="presentation">{{ link_to('/user/' . $user->pseudo . '/latest', trans('pixhub.user-latest-photos'), $attributes = array(), $secure = null); }}</li-->
		<li role="presentation"><a href="/user/{{ $user->pseudo }}/latest"><span class="glyphicon glyphicon-time"></span> {{ trans('pixhub.user-latest-photos') }}</a></li>
		<li role="presentation" class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				<span class="glyphicon glyphicon-book"></span> {{ trans('pixhub.user-albums') }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				@forelse($albums as $album)
				<li><a href="/album/{{ $album->id }}">{{ $album->name }}</a></li>
				@empty
				<li>This user has no albums</li>
				@endforelse
			</ul>
		</li>
		<!--li role="presentation">{{ link_to('/user/' . $user->pseudo . '/about', trans('pixhub.user-about'), $attributes = array(), $secure = null); }}</li-->
		<li role="presentation"><a href="/user/{{ $user->pseudo }}/about"><span class="glyphicon glyphicon-user"></span> {{ trans('pixhub.user-about') }}</a></li>
		@if(Auth::check() && $user->id === Auth::id())
		@if($cover)
		<li role="presentation"><a id="navbar-cover" href="/photo/cover/{{ $image }}"><span class="glyphicon glyphicon-picture"></span> {{ trans('pixhub.actions.cover') }}</a></li>
		@endif
		@if($delete)
		<li role="presentation"><a id="navbar-delete" href="#"><span class="glyphicon glyphicon-trash"></span> {{ trans('pixhub.actions.delete') }}</a></li>
		@endif
		@endif
	</ul>
</div>
