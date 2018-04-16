// jquery is loaded outside/before of require.js
define('jquery', [], function() {
    return jQuery;
});

requirejs.config({
	paths: {
		'browserupdate': 'vendor/browser-update',
		'imagesloaded': 'vendor/imagesloaded.pkgd',
		'placeholders': 'plugins/placeholders.jquery.min',
		'socialbuttons': 'plugins/jquery.social.share.2.2.min',
		'globals': 'globals',
		'main': 'app/main',
		'functions': 'app/functions',
		'events': 'app/events',
		'gallery': 'app/gallery'
	},
	urlArgs: 'bust=' + (new Date()).getTime() // CACHE BUSTING - REMOVE ON PRODUCTION
});

require(['jquery', 'globals', 'browserupdate'], function($) {

	require(['main', 'placeholders', 'socialbuttons'], function(Main) {
		$(document).ready(function() {
			Main.init();
		});	
	});

});
