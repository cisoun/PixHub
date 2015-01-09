$('#navbar-remove').click(function() {
	$('#photo-remove-popup').css('opacity', '1.0');
	$('#photo-remove-popup').css('top', '100px');
});

$('#photo-remove-no').click(function() {
	$('#photo-remove-popup').css('opacity', '0.0');
	$('#photo-remove-popup').css('top', '-25%');
});
