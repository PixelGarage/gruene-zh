<div id="page-wrap">

	<header id="header" class="wrapper">

		<div id="mobile-menu-handle">
			<a href="#"><img src="/sites/all/themes/gruene/elements/navicon-hambrger.png" style="margin: 13px 16px 16px 16px;" alt="Mobile Navigation" /></a>
		</div>

		<div id="site-logo">
			<?php
				$logopath = "";
				$domainId = $domain['domain_id'];
				if ($domainId == 1) {
					//Kanton ZH
					$logopath = "/sites/all/themes/gruene/elements/logo_kantonzh.png";
				} else if ($domainId == 2) {
					//Stadt ZH
					$logopath = "/sites/all/themes/gruene/elements/logo_stadtzh.png";
				} else if ($domainId == 3) {
					//Winterthur
					$logopath = "/sites/all/themes/gruene/elements/logo_stadtw.png";
				}
			?>
			<a href="/">
				<img src="<?php print($logopath); ?>" alt="">
			</a>
		</div>

		<div id="site-title">
			<h1><?php print $site_name ?></h1>
		</div>

		<div id="meta">
			<div id="meta-navigation">
				<?php
					$domainId = $domain['domain_id'];
					$contact = "/";
					if ($domainId == 1) {
						//Kanton ZH
						$contact = url('node/272');
					} else if ($domainId == 2) {
						//Stadt ZH
						$contact = url('node/465');
					} else if ($domainId == 3) {
						//Winterthur
						$contact = url('node/271');
					}
				?>
				<ul class="links">
					<li class="first"><a href="/">Home</a></li>
					<li><a href="<?php print $contact; ?>">Kontakt</a></li>
					<li><a href="<?php print url('node/1151'); ?>">Impressum</a></li>
					<li class="last"><a href='#' onclick="javascript:window.print();returnfalse">Drucken</a></li>
				</ul>
			</div>
			<div id="search">
				<?php print $search_box; ?>
			</div>
		</div>

		<div id="mobile-more-handle">
			<a href="#">+</a>
		</div>

	</header>

	<nav id="main-navigation">
		<?php
			$domainId = $domain['domain_id'];
			if ($domainId == 1) {
				//Kanton ZH
				$block_mainnav3 = module_invoke('menu_block', 'block_view', '3');
				print render($block_mainnav3['content']);
			} else if ($domainId == 2) {
				//Stadt ZH
				$block_mainnav5 = module_invoke('menu_block', 'block_view', '5');
				print render($block_mainnav5['content']);
			} else if ($domainId == 3) {
				//Winterthur
				$block_mainnav7 = module_invoke('menu_block', 'block_view', '7');
				print render($block_mainnav7['content']);
			}
		?>
	</nav>

	<nav id="mobile-navigation">
		<div id="mobile-search">
			<?php print $search_box; ?>
		</div>
		<?php
			$domainId = $domain['domain_id'];
			if ($domainId == 1) {
				//Kanton ZH
				$mobileMenu = module_invoke('menu_block', 'block_view', '9');
				print render($mobileMenu['content']);
			} else if ($domainId == 2) {
				//Stadt ZH
				$mobileMenu = module_invoke('menu_block', 'block_view', '10');
				print render($mobileMenu['content']);
			} else if ($domainId == 3) {
				//Winterthur
				$mobileMenu = module_invoke('menu_block', 'block_view', '11');
				print render($mobileMenu['content']);
			}
		?>
	</nav>

	<div id="page-inner" class="wrapper">

		<?php if (!drupal_is_front_page()): ?>
			<div id="sub-navigation">
				<?php
					$domainId = $domain['domain_id'];
					if ($domainId == 1) {
						//Kanton ZH
						$block_mainnav4 = module_invoke('menu_block', 'block_view', '4');
						print render($block_mainnav4['content']);
					} else if ($domainId == 2) {
						//Stadt ZH
						$block_mainnav6 = module_invoke('menu_block', 'block_view', '6');
						print render($block_mainnav6['content']);
					} else if ($domainId == 3) {
						//Winterthur
						$block_mainnav8 = module_invoke('menu_block', 'block_view', '8');
						print render($block_mainnav8['content']);
					}
				?>
			</div>
		<?php endif; ?>
	
	  <?php
	  	$frontpage_class = "";
	  	if (drupal_is_front_page()) {
	  		$frontpage_class = "frontpage";
	  	}
	  ?>
	  <?php
	  $search_class = "";
		if (arg(0) == 'search') {
		  $search_class = "search-results";
		}
	  ?>
	  <div id="content" class="wrapper <?php print $frontpage_class; print $search_class; ?>">
	  	<?php
	  		if (drupal_is_front_page()) {
		  		$domainId = $domain['domain_id'];
		  		$frontpage_nid = null;
				if ($domainId == 1) {
					//Kanton ZH
					$frontpage_nid = 11;
				} else if ($domainId == 2) {
					//Stadt Zürich
					$frontpage_nid = 13;
				} else if ($domainId == 3) {
					//Winterthur
					$frontpage_nid = 180;
				}
	  			$frontpage_node = node_view(node_load($frontpage_nid));
	  			print drupal_render($frontpage_node);
				
	  		} else {
	  			if ($breadcrumb) print $breadcrumb;
	  			print render($page['content']);
	  		}
	  	?>
	  	<?php if ($page['help'] || ($show_messages && $messages)): ?>
		<div id="console">
			<?php print render($page['help']); ?>
			<?php if ($show_messages && $messages): print $messages; endif; ?>
		</div>
		<?php endif; ?>
	  </div>
	
	</div>

</div>