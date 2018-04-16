// MAIN.JS
define(['jquery', 'functions', 'events', 'gallery','socialbuttons'], function($, Functions, Events, Gallery, Socialbuttons) {

	var module = {

	};

	module.init = function() {

		log("Init module init");

		// set lt-ie9 flag
		if ($('html').hasClass('lt-ie9')) {
			globals.ltie9 = true;
		}

		// check for touch
		if ('ontouchstart' in window || navigator.msMaxTouchPoints) {
			$('html').addClass('touch');
		}

		// set current breakpoint
		globals.breakpoints.currentBreakpoint = Functions.getBreakpoint($(window).width());

		// init other two main modules
		Functions.init();
		Events.init();

		if ($('#gallery').length) {
			Gallery.init();
		}
		
		// Wrap anker around teaser
		if ($('.view-feed-view').length || $('.view-event-view').length || $('.view-blog').length || $('.view-blog-taxonomy-view').length) {
			Functions.wrapViewRowsWithLink();
		}

		// set saved state if available
		Functions.toggleMoreThanGreenState();

		// set mobile more handle if needed
		if (!$('aside.more').length) {
			$('#mobile-more-handle').hide();
		}
		
		//Move Console Messages
		if ($('#console').length > 0) {
			$('#console').appendTo( $('.title-container .title') );
		}

		// check for open mobile navi
		if ($('#mobile-navigation .active-trail').length) {
			// $('#mobile-navigation').addClass('open');
		}
		
		$('#social-share').dcSocialShare({
			buttons: 'facebook,twitter,plusone',
			classWrapper: 'social-share-buttons',
			size: 'horizontal'
		});

	}

	return module;

});