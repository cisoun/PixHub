$(document).ready(function() {
	$('#editable_title').editable(function(value, settings) {
		return value;
	}, {
		//type      : 'textarea',
		//cancel    : 'Cancel',
		//submit    : 'OK',
		//indicator : '<img src="img/indicator.gif">',
		onblur		: 'submit',
		style		: 'display: block',
		tooltip		: 'Click to edit...'
	});
});

$(document).ready(function() {
	$('#photo-description').editable(function(value, settings) {
		return value;
	}, {
		type      : 'textarea',
		//cancel    : 'Cancel',
		//submit    : 'OK',
		//indicator : '<img src="img/indicator.gif">',
		onblur		: 'submit',
		tooltip		: 'Click to edit...'
	});
});
