<?php
$avatar = asset('img/avatar.png');

$user = User::getUserFromPseudo($user);
$albums = $user->albums;

// Cover
$cover = asset('img/cover.jpg');
if ($image = Image::find($user->cover))
	$cover = $image->path();
?>
<div id="user">
	@include('fragments/cover', array('cover' => $cover))
	<div id="user-cover" class="text-shadow cover cover-overlay cover-fixed">
		<img id="user-avatar" src="{{{ $avatar }}}" class="img-responsive img-circle" alt="avatar"/>
		<div id="user-name">{{{ $user->name }}}</div>
		<div id="user-location">{{{ $user->location }}}</div>
		<div id="user-website"><a href="{{{ $user->site }}}">{{{ $user->site }}}</a></div>
	</div>
	<div id="user-body" class="page-shadow container page page-overlay">
		<div id="user-nav">
			@include('fragments/navbar', array('cover' => false))
		</div>
		<div id="user-page" class="container">
			@include('user/' . $section)
		</div>
	</div>
</div>
