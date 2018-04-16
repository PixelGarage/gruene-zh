<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
  <head profile="<?php print $grddl_profile; ?>">
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <meta name="robots" content="index, follow">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- HTML5SHIV -->
    <!--[if lt IE 9]><script type="text/javascript" src="/sites/all/themes/gruene/js/vendor/html5shiv.js"></script><![endif]-->

    <!-- IONICONS -->
    <!-- <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css"> -->
    
    <!-- Social Media Stream Wall -->
    <link rel="stylesheet" type="text/css" href="/sites/all/themes/gruene/css/dcsns_wall.css">
    <!-- Social Media Share Buttons -->
    <link rel="stylesheet" type="text/css" href="/sites/all/themes/gruene/css/social.css">
    
    <?php print $styles; ?>
    <?php print $scripts; ?>
    
  </head>

  <body class="<?php print $classes; ?>" <?php print $attributes;?>>

    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>

	<script type="text/javascript" src="/sites/all/themes/gruene/js/plugins/jquery.social.stream.wall.1.6.js"></script>
	<script type="text/javascript" src="/sites/all/themes/gruene/js/plugins/jquery.social.stream.1.5.16.js"></script>
	<script type="text/javascript" src="/sites/all/themes/gruene/js/wall.js"></script>

    <!-- require.js -->
    <script data-main="/sites/all/themes/gruene/js/app" src="/sites/all/themes/gruene/js/vendor/require.min.js"></script>
    
    <!-- MEDIA QUERIES FOR LTIE9 -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="/sites/all/themes/gruene/js/vendor/respond.min.js"></script>
    <![endif]-->

    <?php
    	// Different Tracking Code per Domain
		$domainGet = domain_get_domain();
		$domainId = $domainGet['domain_id'];
		//Kanton ZH = 1 / Stadt ZH = 2 / Winterthur = 3
	?>
	<?php if ($domainId == 1): ?>
		<!-- Piwik -->
		<script type="text/javascript">
		  var _paq = _paq || [];
		  _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
		  _paq.push(['trackPageView']);
		  _paq.push(['enableLinkTracking']);
		  (function() {
		    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://stats.gruene-zh.ch/";
		    _paq.push(['setTrackerUrl', u+'piwik.php']);
		    _paq.push(['setSiteId', 1]);
		    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
		    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
		  })();
		</script>
		<noscript><p><img src="http://stats.gruene-zh.ch/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
		<!-- End Piwik Code -->
		<!-- reaisenow -->
		<script language="javascript" src="https://widget.raisenow.com/widgets/lema/grnek-85d9/js/dds-init-widget-de.js" type="text/javascript"></script>
	<?php endif; ?>
	
	<?php if ($domainId == 2): ?>
		<!-- Piwik -->
		<script type="text/javascript">
		  var _paq = _paq || [];
		  _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
		  _paq.push(['trackPageView']);
		  _paq.push(['enableLinkTracking']);
		  (function() {
		    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://stats.gruene-zh.ch/";
		    _paq.push(['setTrackerUrl', u+'piwik.php']);
		    _paq.push(['setSiteId', 2]);
		    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
		    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
		  })();
		</script>
		<noscript><p><img src="http://stats.gruene-zh.ch/piwik.php?idsite=2" style="border:0;" alt="" /></p></noscript>
		<!-- End Piwik Code -->
		<!-- reaisenow -->
        <script language="javascript" src="https://widget.raisenow.com/widgets/lema/grnes-c83e/js/dds-init-widget-de.js" type="text/javascript"></script>
	<?php endif; ?>
	
	<?php if ($domainId == 3): ?>
		<!-- Piwik -->
		<script type="text/javascript">
		  var _paq = _paq || [];
		  _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
		  _paq.push(['trackPageView']);
		  _paq.push(['enableLinkTracking']);
		  (function() {
		    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://stats.gruene-zh.ch/";
		    _paq.push(['setTrackerUrl', u+'piwik.php']);
		    _paq.push(['setSiteId', 3]);
		    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
		    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
		  })();
		</script>
		<noscript><p><img src="http://stats.gruene-zh.ch/piwik.php?idsite=3" style="border:0;" alt="" /></p></noscript>
		<!-- End Piwik Code -->
	<?php endif; ?>

  </body>
</html>