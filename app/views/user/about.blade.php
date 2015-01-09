<?php
$hasRights = Auth::check() && $user->id == Auth::id();
$editable = $hasRights ? 'class="editable"' : '';
?>
<div>
	<h1>{{{ trans('pixhub.user-about') }}}</h1>
	<div id="user-description" {{ $editable }}>{{ nl2br($user->description) }}</div>
</div>
@if($hasRights)
<script>
	$(document).ready(function() {
		$('#user-description').editable('/user/{{ $user->pseudo }}/update', {
			type      : 'textarea',
			//cancel    : 'Cancel',
			//submit    : 'OK',
			//indicator : '<img src="img/indicator.gif">',
			onblur		: 'submit',
			placeholder	: 'Click here to add a description...',
			callback: function(value,settings) {
				var retval = value.replace(/\n/gi, "<br>\n");
				$(this).html(retval);
			},
			data: function(value,settings) {
				value = value.replace(/\r/gi, "");
				value = value.replace(/\n/gi, "");
				var retval = value.replace(/<br>/gi, "\n");
				return retval;
			}
		});
	});
</script>
@endif
