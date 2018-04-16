<?php

/**
 * @file
 * Default theme implementation for displaying search results.
 *
 * This template collects each invocation of theme_search_result(). This and
 * the child template are dependent to one another sharing the markup for
 * definition lists.
 *
 * Note that modules may implement their own search type and theme function
 * completely bypassing this template.
 *
 * Available variables:
 * - $search_results: All results as it is rendered through
 *   search-result.tpl.php
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 *
 *
 * @see template_preprocess_search_results()
 *
 * @ingroup themeable
 */
?>

<div class="middle">

	<div class="title-container search_results">
		<div class="title">
			<h1>Suchresultate</h1>
		</div>
	</div>

	<div id="search-results">
		<?php if ($search_results): ?>
			<?php if ($pager): ?>
				<div id="pager" class="wrapper">
					<span class="label">Seite</span>
					<?php print $pager; ?>
				</div>
			<?php endif; ?>
			<div class="views-container search_results">
				<?php print $search_results; ?>
			</div>
		<?php else : ?>
			<h2><?php print t('Your search yielded no results');?></h2>
		<?php endif; ?>
	</div>

</div>

<aside class="more">
		<div class="social-media-icons">
		<div class="facebook-icon"></div>
		<div class="twitter-icon"></div>
		<div class="instagram-icon"></div>
	</div>
</aside>

<div id="more-than-green">
	<a href="#">
		<div class="circle outer"></div>
		<div class="circle inner"></div>
		Mehr als Grün
	</a>
</div>