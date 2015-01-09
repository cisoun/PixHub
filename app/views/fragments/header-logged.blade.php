<li><a href="/upload"><span class="glyphicon glyphicon-upload"></span> Upload</a></li>
<li><a href="/signoff"><span class="glyphicon glyphicon-remove-circle"></span> Sign off</a></li>
<li>
	<a href="/user/{{{ User::getCurrentUser()->pseudo }}}">
		{{{ User::getCurrentUser()->name }}}
		@include('fragments/avatar', array('user' => Auth::id()))
	</a>
</li>
