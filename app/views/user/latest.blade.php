<?php
	$photos = $user->getLatestImages();
?>

<h1>{{{ trans('pixhub.user-latest-photos-from') }}}</h1>
<div id="user-latest-grid">
	<?php
		/*for ($i = 0; $i < 10; $i++)
		{
			$newline = ($i % 4 == 0);

			echo ('<div class="col-lg-12 user-grid-thumbnail">');
			echo (View::make('fragments/photo-thumbnail', array('title' => 'Photo #' . $i)));
			echo ('</div>');
		}*/

		for ($i = 0; $i < count($photos); $i++)
		{
			echo ('<div class="col-lg-12 user-grid-thumbnail">');
			//echo (View::make('fragments/photo-thumbnail', array('title' => $photos[$i]->name, 'avatar' => asset('img/avatar.png'), 'image' => Image::find($photos[$i]->id)->path())));
			echo (View::make('fragments/photo-thumbnail', array('id' => $photos[$i]->id)));
			echo ('</div>');
		}
	?>
</div>
