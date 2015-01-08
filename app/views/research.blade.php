<?php
$imagesByTags = Tag::getImagesFromTag($research,5);
$imagesBySearch = Image::getImagesFromResearch($research,5);

$images = array_unique(array_merge($imagesByTags,$imagesBySearch), SORT_REGULAR  );
?>
<div id="research" class="container page">
	<div id="research-title">
		<div>
			<h1><b>Photos by research &gt; </b><?php echo $research; ?> </h1>
		</div>
	</div>
	<div id="research-gallery">
		@if(count($images) > 0)
			<div>
				<?php
					for ($i = 0; $i < count($images); $i++)
					{
						echo ('<div class="col-lg-12 user-grid-thumbnail">');
						echo (View::make('fragments/photo-thumbnail', array('id' => $images[$i]->id)));
						echo ('</div>');
					}
				?>
			</div>
		@else
			<h1>Awww nothing... :(</h1>
		@endif
	</div>
</div>
