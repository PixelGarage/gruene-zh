// GALLERY.JS
define(['jquery', 'functions'], function($, Functions) {

	var module = {
		imagelegendTimeout: undefined
	};

	module.init = function() {

		log("Gallery module init");
		
		// Show Imglegend of first image for 3 seconds
		if ($('#gallery .imagelegend').html().length >= 1) {
			$('#gallery .imagelegend').fadeIn(400, function() {
				// Animation complete
				module.imagelegendTimeout = setTimeout(module.onImageLegendTimeout, 3000);
			});
		}
		
		// mark first thumbnail as active
		$('#gallery .thumbnail').first().addClass('active');

		module.initEvents();
		module.updateControls();

	};

	module.initEvents = function() {
		
		// change image on thumbnail click
		$('#gallery .thumbnail img').click(function(event) {
			// set active status class on thumbnail div
			$('#gallery .active').removeClass('active');
			$(this).parent('div').addClass('active');
			// get the image informations
			var imgSrc = $(this).attr('data-src');
			var imgLegend = $(this).attr('alt');
			module.changeImage(imgSrc, imgLegend);
		});
		
		// show next image on main image click
		$('#gallery #active-image').click(function(event) {
			// find active Thumbnail
			var activeThumb = $('#thumbnails').find('.active');
			// find next Thumbnail
			var nextThumb = activeThumb.next();
			// set active status class on thumbnail div
			activeThumb.removeClass('active');
			nextThumb.addClass('active');
			// get the image informations
			var imgSrc = nextThumb.find('img').attr('data-src');
			var imgLegend = nextThumb.find('img').attr('alt');
			module.changeImage(imgSrc, imgLegend);
		});

		$('#gallery .gallery-control a').click(function(event) {
			event.preventDefault();
			var direction = '';
			if ($(this).parent().hasClass('left')) {
				direction = 'left';
			} else {
				direction = 'right';
			}
			module.moveThumbnails(direction);
		});
		
		$('#gallery #active-image').mouseenter(function(event) {
			if ($('.imagelegend').text()!= '') {
				$(this).children().fadeIn();
			}
		});
		$('#gallery #active-image').mouseleave(function(event) {
			//console.log("out");
			$(this).children().fadeOut();
		});

	};

	module.changeImage = function(imgSrc, imgLegend) {
		//clear timeout
		if (typeof module.imagelegendTimeout !== 'undefined') {
			clearTimeout(module.imagelegendTimeout);
			//console.log('timeout cleared');
		}
		$('#gallery #active-image .imagelegend').fadeOut();
		$('#active-image').fadeOut(function() {
			$(this).css('background-image', 'url('+imgSrc+')').fadeIn(function() {
				if (imgLegend.length >= 1) {
					$(this).html('<div class="imagelegend">'+imgLegend+'</div>');
					$(this).find('.imagelegend').fadeIn(400, function() {
						// Animation complete
						module.imagelegendTimeout = setTimeout(module.onImageLegendTimeout, 3000);
					});
				} else {
					$(this).html('<div class="imagelegend"></div>');
				}
			});
		});

	};
	
	
	module.onImageLegendTimeout = function() {
		$('.imagelegend').hide();
		module.imagelegendTimeout = undefined;
	};

	module.updateControls = function() {

		if (parseInt($('#gallery #thumbnails .inner').css('left')) < 0) {
			$('#gallery .gallery-control.left').show();
		} else {
			$('#gallery .gallery-control.left').hide();
		}

		var condition = parseInt($('#gallery #thumbnails .inner').css('left')) < $('#thumbnails').width() - $('.thumbnail:last').position().left - $('.thumbnail').outerWidth();

		if (condition) {
			$('#gallery .gallery-control.right').hide();
		} else {
			$('#gallery .gallery-control.right').show();
		}

	};

	module.moveThumbnails = function(direction) {

		var moveDir = 1;

		if (direction == 'left') {
			moveDir = -1;
		}

		$('#gallery #thumbnails .inner').animate({
			'left': parseInt($('#gallery #thumbnails .inner').css('left')) - ($('.thumbnail').outerWidth() + parseInt($('.thumbnail').css('margin-right'))) * moveDir
		}, function() {
			module.updateControls();
		});

	};

	return module;

});