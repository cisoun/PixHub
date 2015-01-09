<?php
if(!isset($action)) $action = '';
if(!isset($message)) $message = '';
if(!isset($user)) $user = User::find(Auth::id());
?>
@if(Auth::check() && $user->id == Auth::id())
<div id="popup">
	{{ Form::open(array('url' => $action)) }}
	{{ $message }}
	<button id="popup-yes" type="submit" class="btn btn-danger">Yes !</button>
	<button id="popup-no" type="button" class="btn btn-default">Nope.</button>
	{{ Form::close() }}
</div>
@endif
