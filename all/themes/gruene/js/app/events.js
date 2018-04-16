// EVENTS.JS
define(['jquery', 'functions'], function($, Functions) {

	var module = {

	};

	module.init = function() {

        log("Events module init");

		// bind event handlers
		module.bindEvents();

	};

	module.bindEvents = function() {

        // window resize event
        $(window).resize(function() {

            newBreakpoint = Functions.getBreakpoint();

            // falling into new breakpoint?
            if (newBreakpoint != globals.breakpoints.currentBreakpoint) {

                globals.breakpoints.currentBreakpoint = Functions.getBreakpoint();

                log('new breakpoint: ' + globals.breakpoints.currentBreakpoint);

            }

        });
        
        // show submenu (per css display none und dann jquery show um flackern beim ausblenden der subnavi im template.php zu verhindern)
        //$('#sub-navigation').css('opacity', 1);

        // more than green
        $('#more-than-green a').click(function(event) {
            event.preventDefault();
            Functions.toggleMoreThanGreen();
        });
        
        // facebook-link
        $('.facebook-icon').click(function(event) {
        	if (document.location.hostname.search('winterthur') != -1) {
        		window.open('http://www.facebook.com/pages/Gr%C3%BCne-Winterthur/135939773133793','_blank');
        	} else {
        		window.open('http://www.facebook.com/gruenezuerich/','_blank');
        	}
        });
        // twitter-link
        $('.twitter-icon').click(function(event) {
            window.open('http://twitter.com/GrueneZuerich/','_blank');
        });
        // instagram-link
        $('.instagram-icon').click(function(event) {
            window.open('http://www.instagram.com/gruenezuerich/','_blank');
        });
        
        $('aside .item').last().addClass('last');

        // mobile menu handle
        $('#mobile-menu-handle').click(function(event) {
            event.preventDefault();
            Functions.toggleMobileMenu();
        });

        // mobile more handle
        $('#mobile-more-handle').click(function(event) {
            event.preventDefault();
            Functions.toggleMobileMore();
        });
        
        $('li.expanded').append( '<div class="openclose"></div>' );
        
        $('li.active-trail').children(".openclose").addClass("open");
        
        $('.openclose').click(function(event) {
            event.preventDefault();
            $(this).siblings("a").toggleClass("active active-trail");
            $(this).toggleClass("open");
        });
        
        // But anker in knubbel div
		if ($('.knubbel').length) {
			var link = $('.knubbel').find('a').attr('href');
			$('.knubbel').click(function(event) {
            	event.preventDefault();
            	window.location = link;
           });
		}

	};

	return module;

});