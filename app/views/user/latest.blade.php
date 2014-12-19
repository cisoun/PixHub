<h1>{{{ trans('pixhub.user-latest-photos-from') }}}<b>{{{ $user->name }}}</b></h1>
<div id="user-latest-grid">
	<?php
		for ($i = 0; $i < 10; $i++)
		{
			$newline = ($i % 4 == 0);

			echo ('<div class="col-lg-12 user-grid-thumbnail">');
			echo (View::make('fragments/photo-thumbnail', array('title' => 'Photo #' . $i)));
			echo ('</div>');
		}
	?>
</div>
