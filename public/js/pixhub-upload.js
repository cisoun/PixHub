var filesProcessed = 0;

Dropzone.options.uploadDropzone = {
	acceptedFiles: 'image/*',
	addRemoveLinks: true,
	autoProcessQueue: false,
	dictCancelUpload: '',
	dictRemoveFile: '',
	previewTemplate: '\
		<div class="dz-preview dz-file-preview">\
			<div class="dz-details"><img data-dz-thumbnail /></div>\
			<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>\
			<div>\
				<input type="text" class="dz-title" placeholder="Insert a title..." name="title"/>\<span class="glyphicon glyphicon-trash dz-remove" aria-hidden="true" data-dz-remove></span>\
			</div>\
			<div class="dz-success-mark"><span>✔</span></div>\
			<div class="dz-error-mark"><span>✘</span></div>\
			<div class="dz-error-message"><span data-dz-errormessage></span></div>\
		</div>',
	thumbnailHeight: 300,
	thumbnailWidth: 300,
	uploadMultiple: false,

	init: function() {
		var uploadDropzone = this;

		$("#upload-button").click(function(e) {
			uploadDropzone.processQueue(); // Tell Dropzone to process all queued files.
		});

		this.on("addedfile", function(file) {
			var titles = $(".dz-title");
			titles.eq(filesProcessed).attr('value', file.name);
			filesProcessed++;

			$("#counter").text(filesProcessed);
		});

		this.on("removedfile", function(file) {
			filesProcessed--;
			$("#counter").text(filesProcessed);
		});

		this.on("success", function(file) {
			$("#upload-alert").css('opacity', '1.0');
			//$("#upload-alert").css('display', 'block');


			setInterval(function () {
				$("#upload-alert").css('opacity', '0.0');
			}, 2000);

			setInterval(function () {
				//$("#upload-alert").css('display', 'none');
				$("#upload-alert").css('opacity', '0.0');
			}, 3000);
		});
	}
};

$('#upload-album-list').click(function(e){
	$('#upload-album-name').val($('#upload-album-list').val());
});
