
wpml = wpml || {};

var images;

wpml = {
	media: {
		init: undefined,
		images: undefined,
		posters: undefined
	}
};

wpml.media.images = images = {

	detailsContainerId: '#attachment-details',
	settingsContainerId: '#attachment-settings',

	frame: function() {

		if ( this._frame )
			return this._frame;

		this._frame = wp.media({
			title: 'Import images from "' + $('#tmdb_data_title').val() + '"',
			frame: 'select',
			searchable: false,
			library: {
				// Dummy: avoid any image to be loaded
				type : 'gallery',
				post__in:[ $('#post_ID').val() ],
				post__not_in:[0],
				s: 'TMDb_ID='+$('#tmdb_data_tmdb_id').val()+''
			},
			multiple: true,
			button: {
				text: 'Import images'
			}
		}),

		this._frame.state('library').unset('router');
		this._frame.options.button.reset = false;
		this._frame.options.button.close = false;

		this._frame.state('library').unbind('select').on('select', this.select);

		return this._frame;
	},

	select: function() {

		var $content = $(images._frame.content.selector);

		if ( ! $('#progressbar_bg').length )
			$content.append('<div id="progressbar_bg"><div id="progressbar"><div id="progress"></div></div><div id="progress_status">Please wait while the images are uploading.</div>');

		$('#progressbar_bg, #progressbar').show();

		var settings = wp.media.view.settings,
		    selection = this.get('selection'),
		    total = selection.length;

		$('.added').remove();

		images.total = total;
		selection.map( images.upload );

		return;
	},

	upload: function( image, i ) {

		var index = i + 1;
		var progress = index == images.total ? 100 : Math.round( ( index * 100 ) / images.total );

		$.ajax({
			type: 'GET',
			url: ajax_object.ajax_url,
			data: {
				action: 'wpml_upload_image',
				wpml_check: ajax_object.wpml_check,
				image: image.attributes.tmdb_data,
				title: ajax_object.image_from + ' ' + $('#tmdb_data_title').val(),
				post_id: $('#post_ID').val(),
				tmdb_id: $('#tmdb_data_tmdb_id').val()
			},
			success: function(_r) {
				if ( ! isNaN( _r ) && parseInt( _r ) == _r ) {
					$('#tmdb_images_preview').append('<div class="tmdb_movie_images tmdb_movie_imported_image"><img width="' + image.attributes.sizes.medium.width + '" height="' + image.attributes.sizes.medium.height + '" src="' + image.attributes.sizes.medium.url + '" class="attachment-medium" class="attachment-medium" alt="' + $('#tmdb_data_title').val() + '" /></div>');
				}
			},
			complete: function() {
				$('#progressbar #progress').width(''+progress+'%');
				if ( index == images.total ) {
					$('#progress_status').text('Done!');
					window.setTimeout( function() { $('#progressbar_bg, #progressbar').remove(); images._frame.close(); }, 2000 );
				}
				else {
					var t = $('#progress_status').text();
					$('#progress_status').text(t+' .');
				}
			}
		});
	},

	init: function() {
		images.frame().open();
	}
};

wpml.media.init = function() {
	$('#tmdb_save_images').on('click', function(e) {
		e.preventDefault();
		wpml.movie.images.save();
	});

	$('#tmdb_load_images').on('click', function(e) {
		e.preventDefault();
		wpml.media.images.init();
	});
};

wpml.media.init();