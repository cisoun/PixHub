<h1>Latest pictures from {{{ $user }}}</h1>
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
