<?php
	$images = Image::getRandomImages(5);
?>
<div id="explore" class="page container">
	<div id="explore-title">
		<h1>Let's explore some photos the users have uploaded !</h1>
		<a href="#explore-gallery"><span class="glyphicon glyphicon-chevron-down"></span></a>
	</div>
	<a id="explore-gallery"></a>
	<?php
		for ($i = 0; $i < count($images); $i++)
		{
			echo ('<div class="col-lg-12 user-grid-thumbnail">');
			echo (View::make('fragments/photo-thumbnail', array('id' => $images[$i]->id)));
			echo ('</div>');
		}
	?>
</div>
