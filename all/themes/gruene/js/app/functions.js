// FUNCTIONS.JS
define(['jquery'], function($) {

    var module = {

    };

	module.init = function() {

		log("Functions module init");

        // add new functions to jquery
        module.addJqueryFunctions();

	}

    // toggle mobile menu
    module.toggleMobileMenu = function() {

        $('#mobile-navigation').toggleClass('open');

    }

    // toggle mobile menu
    module.toggleMobileMore = function() {

        $('aside.more').toggleClass('open');

    }
    
    // wrap feed view rows with link
    module.wrapViewRowsWithLink = function() {

        $('.view-feed-view .views-row, .view-event-view .views-row, .view-blog .views-row, .view-blog-taxonomy-view .views-row').each(function() {
        	var link = $('a', this).attr('href');
            $(this).wrapInner('<a href="'+link+'"></a>');
        });

    }

    // toggle more than green and save state to sessionstorage
    module.toggleMoreThanGreen = function() {

        $('#page-wrap').toggleClass('pink-variant');

        if (window.sessionStorage) {

            var state = 0;

            if (sessionStorage.getItem('state')) {
                if (sessionStorage.getItem('state') == "1") {
                    sessionStorage.setItem('state', "0");
                    state = 0;
                } else {
                    sessionStorage.setItem('state', "1");
                    state = 1;
                }
            } else {
                sessionStorage.setItem('state', "1");
                state = 1;
            }

            switch(state) {
                case 0:
                    $('#page-wrap').removeClass('pink-variant');
                break;
                case 1:
                    $('#page-wrap').addClass('pink-variant');
                break;
            }

        }

    }

    module.toggleMoreThanGreenState = function() {

        if (window.sessionStorage) {

            var state = 0;

            if (sessionStorage.getItem('state')) {

                if (sessionStorage.getItem('state') == "1") {
                    state = 1;
                } else {
                    state = 0;
                }

                switch(state) {
                    case 0:
                        $('#page-wrap').removeClass('pink-variant');
                    break;
                    case 1:
                        $('#page-wrap').addClass('pink-variant');
                    break;
                }

            }

        }

    }

    // function to get back the current breakpoint
    module.getBreakpoint = function() {

        var result,
            winWidth = $(window).width();

        if (winWidth <= globals.breakpoints.mobile) {
            result = 'mobile';
        } else if (winWidth <= globals.breakpoints.tablet) {
            result = 'tablet';
        } else if (winWidth <= globals.breakpoints.small) {
            result = 'small';
        } else if (winWidth <= globals.breakpoints.medium) {
            result = 'medium';
        } else if (winWidth <= globals.breakpoints.large) {
            result = 'large';
        } else if (winWidth > globals.breakpoints.large) {
            result = 'huge';
        }

        return result;

    }

    // add functions to jquery
    module.addJqueryFunctions = function() {

        $.fn.slideFadeToggle = function(speed, easing, callback) {
            return this.animate({
                opacity: 'toggle',
                height: 'toggle'
            }, speed, easing, callback);
        };

        $.fn.animateAuto = function(prop, speed, callback) {
            var elem, height, width;
            return this.each(function(i, el) {
                el = jQuery(el), elem = el.clone().css({"height":"auto","width":"auto"}).appendTo("body");
                height = elem.css("height"),
                width = elem.css("width"),
                elem.remove();
                
                if(prop === "height")
                    el.animate({"height":height}, speed, callback);
                else if(prop === "width")
                    el.animate({"width":width}, speed, callback);  
                else if(prop === "both")
                    el.animate({"width":width,"height":height}, speed, callback);
            });  
        }

    }

    // get highest height from set of elements
    module.getMaxHeightOfElements = function(elements) {

        var maxH = 0;
        
        $(elements).each(function() {
            var currentH = $(this).height();
            if (currentH > maxH) {
                maxH = currentH;
            }
        });

        return maxH;

    }

    // get element which is on the most left side
    module.getMostLeftElement = function(elements) {

        var minL = 99999;
        var minLeftElement = $();

        $(elements).each(function() {
            var currentL = $(this).offset().left;
            if (currentL < minL) {
                minL = currentL;
                minLeftElement = $(this);
            }
        });

        return minLeftElement;

    }

    // get element which is on the most right side
    module.getMostRightElement = function(elements) {

        var maxR = 0;
        var maxRightElement = $();

        $(elements).each(function() {
            var currentR = $(this).offset().left + $(this).width();
            if (currentR > maxR) {
                maxR = currentR;
                maxRightElement = $(this);
            }
        });

        return maxRightElement;

    }

    // see if a value is in tolerance of another value
    module.isAround = function(probe, value, tolerance) {

        if ((probe >= value - tolerance) && (probe <= value + tolerance)) {
            return true;
        }

        return false;

    }

    // is a value numeric
    module.isNumeric = function(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }

    // get url parameters as json
    module.getJsonFromUrl = function(query) {

        if (query.charAt(0) === '?') {
            query = query.substr(1);
        }

        var data = query.split("&");
        var result = {};

        for(var i = 0; i < data.length; i++) {
            var item = data[i].split("=");
            result[item[0]] = item[1];
        }

        return result;

    }

    // update query string parameter
    module.updateQueryStringParameter = function(uri, key, value) {

        var re = new RegExp("([?|&])" + key + "=.*?(&|$)", "i");

        separator = uri.indexOf('?') !== -1 ? "&" : "?";

        if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
        } else {
            return uri + separator + key + "=" + value;
        }

    }

    // generate a random color
    module.getRandomColor = function() {

        var letters = '0123456789ABCDEF'.split('');
        var color = '#';

        for (var i = 0; i < 6; i++ ) {
            color += letters[Math.round(Math.random() * 15)];
        }

        return color;
        
    }

    return module;

});