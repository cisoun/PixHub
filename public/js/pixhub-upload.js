var filesProcessed = 0;

Dropzone.options.uploadDropzone = {
	acceptedFiles: "image/*",
	addRemoveLinks: true,
	dictCancelUpload: '',
	dictRemoveFile: '',
	previewTemplate: '\
		<div class="dz-preview dz-file-preview">\
			<div class="dz-details">\
				<img data-dz-thumbnail />\
			</div>\
			<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>\
			<div>\
				<input type="text" class="dz-title" placeholder="Insert a title..."/>\<span class="glyphicon glyphicon-trash dz-remove" aria-hidden="true" data-dz-remove></span>\
			</div>\
		</div>',
	thumbnailHeight: 300,
	thumbnailWidth: 300,
	uploadMultiple: true,

	processing: function(file) {
		var titles = $(".dz-title");
		titles.eq(filesProcessed).attr('placeholder', file.name);
		filesProcessed++;

		$("#counter").text(filesProcessed);
	},

	init: function() {
		this.on("removedfile", function(file) {
			filesProcessed--;
			$("#counter").text(filesProcessed);
		});
	}
};
