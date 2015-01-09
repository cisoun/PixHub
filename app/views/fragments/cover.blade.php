<?php
if(!isset($blurred)) $blurred = false;
if(!isset($cover)) $cover = asset('img/cover.jpg');
if(!isset($fixed)) $fixed = true;
?>
<div id="cover" class="cover {{ $blurred ? ' cover-blurred' : '' }}{{ $fixed ? ' cover-fixed' : '' }}" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.7)), url('{{ $cover }}');"></div>
