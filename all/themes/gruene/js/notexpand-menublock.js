(function ($) {
  Drupal.behaviors.alterMenuBlock = {
    attach: function (context, settings) {
      $("#sub-navigation .menu-block-wrapper:not(.alterMenuBlock-processed)", context).each(function () {
        $(this).addClass('alterMenuBlock-processed').find("ul.menu li.expanded").each(function(){
          if ( ! $(this).hasClass('active-trail') ) {
            $(this).removeClass('expanded');
	  	    $(this).addClass('collapsed');
	        $(this).children().remove('ul.menu');
	      }
        });
      });
    }
  };
})(jQuery);