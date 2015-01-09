<?php
$avatar = asset('img/avatar.png');

$user = User::getUserFromPseudo($user);
$albums = $user->albums;

// Avatar
$avatar = User::getAvatar($user->id);

// Cover
$cover = asset('img/cover.jpg');
if ($image = Image::find($user->cover))
	$cover = $image->path();
?>
<div id="user">
	@include('fragments/cover', array('cover' => $cover))
	<div id="user-cover" class="text-shadow cover cover-overlay cover-fixed">
		<!--img id="user-avatar" src="{{ $avatar }}" class="img-responsive img-circle avatar" alt="avatar"/-->
		@include('fragments/avatar', array('id' => 'user-avatar', 'user' => $user->id))
		<div id="user-name">{{{ $user->name }}}</div>
		<div id="user-location">{{{ $user->location }}}</div>
		<div id="user-website"><a href="{{{ $user->site }}}">{{{ $user->site }}}</a></div>
	</div>
	<div id="user-body" class="page-shadow container page page-overlay">
		<div id="user-nav">
			@include('fragments/navbar', array('avatar' => true, 'cover' => false))
		</div>
		<div id="user-page" class="container">
			@include('user/' . $section)
		</div>
	</div>
</div>
