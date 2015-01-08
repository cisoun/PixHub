<?php
	$photos = $user->getLatestImages();
?>
<h1>{{{ trans('pixhub.user-latest-photos-from') . $user->name }}}</h1>
<div id="user-latest-grid">
	<?php
		for ($i = 0; $i < count($photos); $i++)
		{
			echo ('<div class="col-lg-12 user-grid-thumbnail">');
			echo (View::make('fragments/photo-thumbnail', array('id' => $photos[$i]->id)));
			echo ('</div>');
		}
	?>
</div>
