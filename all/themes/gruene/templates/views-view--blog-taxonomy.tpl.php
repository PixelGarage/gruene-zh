<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>

<?php
	global $base_path;
	$filepath = $base_path . 'sites/default/files/';
?>

<?php if (user_is_logged_in()): ?>
	<div class="edit-node-link">
		<a href="/node/<?php print($nid); ?>/edit">Bearbeiten</a>
		<a href="/admin">Admin</a>
		<a href="/user/logout">Logout</a>
	</div>
<?php endif; ?>

<div class="middle">
	<div class="title-container <?php print $css_name; ?>">
		<?php $node = node_load(302); ?>
		
		<?php if (isset($node->field_blog_image)): ?>
			<div class="title-image" style="background-image:url(<?php print str_replace('public://', $filepath, $node->field_blog_image['und'][0]['uri']); ?>);"></div>
		<?php endif; ?>

		<div class="title">
			<h1><?php print $node->title; ?></h1>
		</div>
	</div>
	
	<div class="views-container <?php print $css_name; ?>">
		<?php
			print views_embed_view('blog_taxonomy', $display_id = 'default');
		?>
		<!-- <div class="<?php print $classes; ?>">
		  <?php print render($title_prefix); ?>
		  <?php if ($title): ?>
		    <?php print $title; ?>
		  <?php endif; ?>
		  <?php print render($title_suffix); ?>
		  <?php if ($header): ?>
		    <div class="view-header">
		      <?php print $header; ?>
		    </div>
		  <?php endif; ?>
		
		  <?php if ($exposed): ?>
		    <div class="view-filters">
		      <?php print $exposed; ?>
		    </div>
		  <?php endif; ?>
		
		  <?php if ($attachment_before): ?>
		    <div class="attachment attachment-before">
		      <?php print $attachment_before; ?>
		    </div>
		  <?php endif; ?>
		  
		  <?php if ($pager): ?>
		    <div id="pager" class="wrapper">
		      <span class="label">Seite</span>
		      <?php print $pager; ?>
		    </div>
		  <?php endif; ?>
		
		  <?php if ($rows): ?>
		    <div class="view-content">
		      <?php print $rows; ?>
		    </div>
		  <?php elseif ($empty): ?>
		    <div class="view-empty">
		      <?php print $empty; ?>
		    </div>
		  <?php endif; ?>
		
		  <?php if ($attachment_after): ?>
		    <div class="attachment attachment-after">
		      <?php print $attachment_after; ?>
		    </div>
		  <?php endif; ?>
		
		  <?php if ($more): ?>
		    <?php print $more; ?>
		  <?php endif; ?>
		
		  <?php if ($footer): ?>
		    <div class="view-footer">
		      <?php print $footer; ?>
		    </div>
		  <?php endif; ?>
		
		  <?php if ($feed_icon): ?>
		    <div class="feed-icon">
		      <?php print $feed_icon; ?>
		    </div>
		  <?php endif; ?>
		
		</div><?php /* class view */ ?> -->
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