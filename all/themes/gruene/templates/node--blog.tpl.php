<?php if (user_is_logged_in()): ?>
	<div class="edit-node-link">
		<a href="/node/<?php print($nid); ?>/edit">Bearbeiten</a>
		<a href="/admin">Admin</a>
		<a href="/user/logout">Logout</a>
	</div>
<?php endif; ?>

<div class="middle">

	<div class="title-container <?php print $type; ?>">
		
		<?php if (isset($node->field_blog_image) && !empty($node->field_blog_image['und'][0]['uri'])): ?>
			<div class="title-image" style="background-image:url(<?php print file_create_url($node->field_blog_image['und'][0]['uri']); ?>);"></div>
		<?php endif; ?>

		<div class="title">
			<h1><?php print $node->title; ?></h1>
		</div>

		<div class="title-body">
			
			<div class="bloginfo">
				<div class="blogauthor-image">
					<?php
						if (isset($node->field_blog_author_image) && !empty($node->field_blog_author_image['und'][0]['uri'])) {
							$imagehtml = theme_image(array(
								'path' => $node->field_blog_author_image['und'][0]['uri']
							));
							print $imagehtml;
						}
					?>
				</div>
				<div class="blogauthor-name">
					<?php print render($content['field_blog_author']); ?><?php if (isset($node->created) && !empty($node->created)): ?><div class="date">, <?php print format_date($node->created, 'date_gruene_medium'); ?></div><?php endif; ?>
				</div>
			</div>
			<?php if (isset($node->body)) print $node->body['und'][0]['value']; ?>
			<?php print render($content['field_blog_tags']); ?>
		</div>
		
		<?php
			print render(comment_node_page_additions($node));
		?>

	</div>
	
	<div id="social-share"></div>

</div>

<aside class="more">
	<?php if (isset($node->field_infobox_aside['und'])): ?>
	<?php
        $t = count($node->field_infobox_aside['und']);
        for ($i = 0; $i <= $t-1; $i++) {
        	print('<div class="item">');
            $field_collection = entity_load('field_collection_item', array($node->field_infobox_aside['und'][$i]['value']));
            $keys = array_keys($field_collection);
            $key = $keys[0];
            print('<h3>');
            print($field_collection[$key]->field_infobox_aside_title['und'][0]['safe_value']);
            print('</h3>');
            print('<div class="inner">');
            print($field_collection[$key]->field_infobox_aside_body['und'][0]['value']);
            print('</div>');
            unset($field_collection);
            print('</div>');
        }
	?>
	<?php endif; ?>
	<div class="social-media-icons">
		<div class="facebook-icon"></div>
		<div class="twitter-icon"></div>
		<div class="instagram-icon"></div>
	</div>
</aside>