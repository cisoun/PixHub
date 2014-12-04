<?php
$photo = asset('img/test.jpg');
?>
<div id="photo" class="container-fluid page">
	<div id="photo-container">
		<div class="container">
			<img src="{{{ $photo }}}" class="img-responsive photo" alt="photo"/>
		</div>
	</div>
	<div class="page-shadow">
		<div id="user-nav">
			<div class="page-tabs">
				<ul class="nav nav-pills">
					<li role="presentation">{{ link_to('', trans('pixhub.user-latest-photos'), $attributes = array(), $secure = null); }}</li>
					<li role="presentation" class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
							{{ trans('pixhub.user-albums') }} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							This user has no albums
						</ul>
					</li>
					<li role="presentation">{{ link_to('', trans('pixhub.user-about'), $attributes = array(), $secure = null); }}</li>
				</ul>
			</div>
		</div>
		<div id="photo-informations" class="container page">
			<div class="col-md-6 photo-panel">
				<div class="row">
					<div id="photo-title" class="row">
						<a href="/user/john/"><img id="photo-avatar" src="../img/avatar.png" class="avatar img-responsive pull-left" alt="Avatar"/></a>
						<div class="pull-left">
							<h1 id="editable_title" class="editable">Titre</h1>
							<h4><a href="/user/john/">John Doe</a></h4>
						</div>
					</div>
					<div id="photo-description" class="editable row">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer tempus a massa non bibendum. Nullam varius nibh quis consequat suscipit. Aliquam erat volutpat. Ut magna felis, bibendum nec sollicitudin non, lacinia sed leo. Morbi accumsan mattis suscipit. Integer scelerisque ex vitae neque posuere eleifend. Mauris tempus tincidunt dolor sodales ornare.<br/><br/>
						Etiam scelerisque ex felis, id vulputate urna aliquet vel. Etiam augue diam, lobortis sit amet eros non, porta cursus risus. Duis imperdiet auctor interdum. Proin vehicula ornare eleifend. Aliquam vel condimentum quam. Curabitur ut quam dolor. Nulla tristique, arcu vitae sollicitudin porta, augue felis pharetra tortor, quis blandit nunc elit et augue. Vestibulum fermentum purus vitae justo semper, nec porttitor erat laoreet. In ut viverra ex.
					</div>
				</div>
			</div>
			<div class="col-md-6 photo-panel separator">
				<h1>{{{ trans('pixhub.photo-informations') }}}</h1>
				<table>
					<tr><td class="photo-exif">{{{ trans('pixhub.views') }}}</td><td>9001</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.size') }}}</td><td>1000 × 800</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.camera-model') }}}</td><td>Nikon D700</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.camera-brand') }}}</td><td>Nikon</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.iso') }}}</td><td>400</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.aperture') }}}</td><td>f/2.8</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.exposure') }}}</td><td>1/200 s</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.focal') }}}</td><td>200 mm</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.flash') }}}</td><td>No flash</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.orientation') }}}</td><td>Landscape</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.date') }}}</td><td>20 september 2014</td></tr>
				</table>

				<h1>Tags</h1>
				<a href="#" class="tag">Example</a> <a href="#" class="tag">Example</a> <a href="#" class="tag">Example</a>
			</div>
		</div>
	</div>
</div>
