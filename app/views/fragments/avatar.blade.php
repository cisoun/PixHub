<?php
if(!isset($id)) $id = '';
$avatar = asset('img/avatar.png');
if(isset($user))
	$avatar = User::getAvatar($user);
?>
<div id="{{ $id }}" class="avatar" style="background-image: url('{{ $avatar }}');"></div>
