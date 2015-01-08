var filesProcessed = 0;

//
// Dropzone configuration
//
Dropzone.options.uploadDropzone = {
	acceptedFiles: 'image/*',
	addRemoveLinks: true,
	autoProcessQueue: false,
	dictCancelUpload: '',
	dictRemoveFile: '',
	maxFiles: 256,
	parallelUploads: 256,
	previewTemplate: '\
		<div class="dz-preview dz-file-preview">\
			<div class="dz-details"><img data-dz-thumbnail /></div>\
			<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>\
			<div>\
				<input type="text" class="dz-title" placeholder="Insert a title..." name="title"/>\<span class="glyphicon glyphicon-trash dz-remove" aria-hidden="true" data-dz-remove></span>\
			</div>\
			<div class="dz-success-mark"><span class="glyphicon glyphicon-ok-sign"></span></div>\
			<div class="dz-error-mark"><span class="glyphicon glyphicon-remove-sign"></span></div>\
			<!--div class="dz-error-message"><span data-dz-errormessage></span></div-->\
		</div>',
	thumbnailHeight: 300,
	thumbnailWidth: 300,
	uploadMultiple: false,

	init: function() {
		var uploadDropzone = this;

		//$('#upload-button').attr('disabled', 'disabled');

		$("#upload-button").click(function(e) {
			error = false;
			uploadDropzone.processQueue(); // Tell Dropzone to process all queued files.
		});

		//
		// Dropzone events
		//

		this.on("addedfile", function(file) {
			// Manage the file's title.
			var titles = $(".dz-title");
			titles.eq(filesProcessed).attr('placeholder', file.name);
			titles.last().attr('name', btoa(file.name)); // Encoding the name in base64 to avoid POST problems (dots/spaces).

			// Show how much files are ready to be uploaded.
			filesProcessed++;
			$("#counter").text(filesProcessed);
		});

		this.on("error", function(file) {
			message(false);
		});

		this.on("removedfile", function(file) {
			// Show how much files are ready to be uploaded.
			filesProcessed--;
			$("#counter").text(filesProcessed);
		});

		// TODO : Add a success message.
		/*this.on("success", function(file) {
			message(true);
		});*/
	}
};

//
// Events
//

// Replace album's name input text by the current option selected in the drop list.
$('#upload-album-list').click(function(e) {
	$('#upload-album-name').val($('#upload-album-list').val());
});

// Enable upload button if an album name was entered.
$('#upload-album-name').change(function() {
	var nameLength = $('#upload-album-name').val().length;
	if (nameLength > 0)
		$('#upload-button').removeAttr('disabled');
	else
		$('#upload-button').attr('disabled', 'disabled');
});

// Show a message about the upload's state.
message = function(isSuccess) {
	//var style = isSuccess ? 'message-success' : 'message-danger';

	//$("#upload-message").addClass(style);
	$("#upload-message").css('opacity', '1.0');

	setInterval(function() {
		$("#upload-message").css('opacity', '0.0');
	}, 6000);

	setInterval(function() {
		$("#upload-message").css('opacity', '0.0');
		//$("#upload-message").removeClass(style);
	}, 7000);
};
