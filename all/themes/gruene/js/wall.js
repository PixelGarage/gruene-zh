jQuery(document).ready(function($) {
	
	$('#social-stream').dcSocialStream({
		feeds: {
			twitter: {
				id: 'GrueneZuerich',
				intro: 'Getwittert'
			},
			facebook: {
				id: '627220684023668',
				intro: 'Geposted'
			},
			instagram: {
				id: '!3017768010',
				clientId: 'b256cd40b800451390fa624f1753e85e',
				accessToken: '3017768010.b256cd4.cbc5f5d7a9484346b7099694365a5ac8',
				intro: 'Geposted'
			}
		},
		rotate: {
			delay: 0
		},
		control: false,
		filter: true,
		wall: true,
		cache: false,
		order: 'date',
		max: 'limit',
		limit:	10,
		iconPath: '/sites/all/themes/gruene/elements/social-stream-images/dcsns-dark/',
		imagePath: '/sites/all/themes/gruene/elements/social-stream-images/dcsns-dark/'
	});
	
	$('#social-stream-winterthur').dcSocialStream({
		feeds: {
			twitter: {
				id: 'GrueneZuerich',
				intro: 'Getwittert'
			},
			facebook: {
				id: '135939773133793',
				intro: 'Geposted',
				text: 'content'
			},
			instagram: {
				id: '!3017768010',
				clientId: 'b256cd40b800451390fa624f1753e85e',
				accessToken: '3017768010.b256cd4.cbc5f5d7a9484346b7099694365a5ac8'
			}
		},
		rotate: {
			delay: 0
		},
		control: false,
		filter: true,
		wall: true,
		cache: false,
		order: 'date',
		max: 'limit',
		limit:	10,
		iconPath: '/sites/all/themes/gruene/elements/social-stream-images/dcsns-dark/',
		imagePath: '/sites/all/themes/gruene/elements/social-stream-images/dcsns-dark/'
	});
	
	setTimeout(function() {
		$('.dcsns-facebook .section-text a').each(function(i){
	        var txt = jQuery(this).attr('href'), href = decodeURIComponent(txt.replace("http://l.facebook.com/l.php?u=", "")).split('&');
	        jQuery(this).attr('href',href[0]);
	        
	    });
	    $(".dcsns-facebook .section-text a > img").unwrap();
	}, 2000);
	
}(jQuery));
	