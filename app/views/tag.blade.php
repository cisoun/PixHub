<?php
$images = Tag::getImagesFromTag($tag,10);
?>
<div id="tag" class="container page">
	<div id="tag-title">
		<div>
			<h1><b>Photos with tag &gt; </b><?php echo $tag; ?> </h1>
		</div>
	</div>
	<div id="tag-gallery">
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
