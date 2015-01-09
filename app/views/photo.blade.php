<?php
$image = Image::find($id);
$user = $image->user();
$exif = $image->exif;
$albums = User::find($user->id)->albums;
$hasExif = $exif->id == 1 ? false : true;
$editable = Auth::check() ? 'class="editable"' : '';
?>
<style>
@import url(http://weloveiconfonts.com/api/?family=zocial);

/* zocial */
[class*="zocial-"]:before {
  font-family: 'zocial', sans-serif;
}

.wrapper{
  width: 325px;
  height: 50px;
  position: absolute;
  top: 50%;
  left: 50%;
  margin-left: -162px;
  margin-top: -25px;
}

.icon{
  display: inline-block;
  position: relative;
  color: #bdbdbd;
  width:40px;
  height: 40px;
  text-align: center;
  font-size: 1.5em;
  line-height: 1.9em;
  background-color: #333333;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  -webkit-transition:background-color 250ms ease 0s;
  transition:background-color 250ms ease 0s;
}

.zocial-facebook{margin-left: -8px}

.icon.facebook:hover{background-color: #4986c7;}
.twitter:hover{background-color: #4cb6e8;}
.linkedin:hover{background-color: #29a0cc;}
.youtube:hover{background-color: #a32929;}
.flickr:hover{background-color: #c257ad;}
.email:hover{background-color: #d5b120;}

a{
  text-decoration: none;
}

.icon:hover{
  color: #fff;
  box-shadow: 0px 3px 0px #686868, 0px 3px 10px #7e7e7e;
}

.icon:active{
  box-shadow: inset 0px 1px 4px #3d3d3d, 0px 0px 0px #bdbdbd;
  top: 3px;
}
</style>
<script>
function fbs_click(width, height) {
    var leftPosition, topPosition;
    //Allow for borders.
    leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
    //Allow for title and status bars.
    topPosition = (window.screen.height / 2) - ((height / 2) + 50);
    var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
    u=location.href;
    t=document.title;
    window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer', windowFeatures);
    return false;
}
</script>
@include('fragments/popup', array('action' => '/photo/delete/' . $id, 'message' => 'You are going to remove this photo.<p><b>Are you sure to do this ?</b></p>', 'user' => $user))
<div id="photo" class="container-fluid page">
	<div id="photo-container">
		<div class="container">
			<img src="{{{ $image->path() }}}" class="img-responsive photo" alt="photo"/>
		</div>
	</div>
	<div class="page-shadow">
		<div>
			@include('fragments/navbar', array('cover' => true, 'delete' => true, 'image' => $id))
		</div>
		<div id="photo-informations" class="container page">
			<div class="col-md-6 photo-panel">
				<div class="row">
					<div id="photo-title-zone" class="row">
						<div class="col-md-2">
							<a href="{{ $user->url() }}"><img id="photo-avatar" src="../img/avatar.png" class="avatar img-responsive" alt="Avatar"/></a>
						</div>
						<div class="col-md-10">
							<h1 id="photo-title" {{ $editable }}>{{ $image->name }}</h1>
							<h4>In <a href="{{ $image->album->url() }}">{{ $image->album->name }}</a> from <a href="{{ $user->url() }}">{{ $user->name }}</a></h4>

						</div>
					</div>
					<div class="row">
						<div id="photo-description" {{ $editable }}>{{ nl2br($image->description) }}</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 photo-panel separator">
				<h1>{{{ trans('pixhub.photo-informations') }}}</h1>
				@if($hasExif)
				<table>
					<!---tr><td class="photo-exif">{{{ trans('pixhub.views') }}}</td><td>9001</td></tr-->
					<tr><td class="photo-exif">{{{ trans('exif.size') }}}</td><td>{{ $exif->height }} × {{ $exif->width }}</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.camera-model') }}}</td><td>{{ $exif->cameraModel }}</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.camera-brand') }}}</td><td>{{ $exif->cameraBrand }}</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.iso') }}}</td><td>{{ $exif->iso }}</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.aperture') }}}</td><td>{{ $exif->aperture }}</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.exposure') }}}</td><td>{{ $exif->exposure }} s</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.focal') }}}</td><td>{{ $exif->focal }} mm</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.flash') }}}</td><td>{{ trans('exif.flashes.' . $exif->flash) }}</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.orientation') }}}</td><td>{{ trans('exif.orientations.' . $exif->orientation) }}</td></tr>
					<tr><td class="photo-exif">{{{ trans('exif.date') }}}</td><td>{{ $exif->date }}</td></tr>
				</table>
				@else
				<span>No EXIF datas.</span>
				@endif
				<h1>Tags</h1>
				<?php 
				$tags = $image->tags; 
				if(count($tags) > 0)
				{
					foreach($tags as $tag)
					{					
						echo '<a href="/tag/'.$tag->name.'" class="tag">' . $tag->name . '</a>';
					}
				}
				else
					echo '-';
				?>
				
				<h1>Share</h1>
				<a class="icon facebook" href="http://www.facebook.com/share.php?u=<full " onClick="return fbs_click(400, 300)" target="_blank" title="Share This on Facebook"><span class="zocial-facebook"></span></a>
				<a class="icon twitter" href="javascript:(function(){
						window.twttr=window.twttr||{};var D=550,A=450,C=screen.height,B=screen.width,H=Math.round((B/2)-(D/2)),G=0,F=document,E;if(C>A){G=Math.round((C/2)-(A/2))}
						window.twttr.shareWin=window.open('http://twitter.com/share','','left='+H+',top='+G+',width='+D+',height='+A+',personalbar=0,toolbar=0,scrollbars=1,resizable=1');
						E=F.createElement('script');E.src='http://platform.twitter.com/bookmarklets/share.js?v=1';F.getElementsByTagName('head')[0].appendChild(E)}());"
				><span class="zocial-twitter"></span></a>
				<a class="icon email" onclick="javascript:window.open('https://plus.google.com/share?url=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>','',
					  'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span class="zocial-googleplus"></span></a>
			</div>
		</div>
	</div>
</div>
@if(Auth::check())
<script>
	$(document).ready(function() {
		$('#photo-title').editable('/photo/update/{{ $id }}', {
			type     	: 'text',
			//cancel    : 'Cancel',
			//submit    : 'OK',
			//indicator : '<img src="img/indicator.gif">',
			onblur		: 'submit',
			style		: 'display: block',
			placeholder	: 'Click here to add a title...'
			/*callback : function(value, settings) {
				$('#photo-title').text(value);
			}*/
		});
		$('#photo-description').editable('/photo/update/{{ $id }}', {
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
