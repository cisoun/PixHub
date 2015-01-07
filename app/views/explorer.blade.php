<?php
	$images = Image::getRandomImages(3);
?>
	<div id="album-gallery" class="page container">
		<?php
			/*for ($i = 0; $i < 10; $i++)
			{
				$newline = ($i % 4 == 0);

				echo ('<div class="col-lg-12 user-grid-thumbnail">');
				echo (View::make('fragments/photo-thumbnail', array('title' => 'Photo #' . $i)));
				echo ('</div>');
			}*/

			for ($i = 0; $i < count($images); $i++)
			{
				echo ('<div class="col-lg-12 user-grid-thumbnail">');
				echo (View::make('fragments/photo-thumbnail', array('id' => $images[$i]->id)));
				echo ('</div>');
			}
		?>
	</div>
</div>
