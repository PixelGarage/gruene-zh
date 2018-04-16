<?php if (user_is_logged_in()): ?>
	<div class="edit-node-link">
		<a href="/node/<?php print($nid); ?>/edit">Bearbeiten</a>
		<a href="/admin">Admin</a>
		<a href="/user/logout">Logout</a>
	</div>
<?php endif; ?>

<div class="middle">

	<div class="title-container <?php print $type; ?>">

		<div class="title">
			<h1><?php print $node->title; ?></h1>
		</div>

		<?php if (isset($node->body) && !empty($node->body['und'][0]['value'])): ?>
			<div class="title-body"><?php if (isset($node->body['und'][0]['value'])) print $node->body['und'][0]['value']; ?></div>
		<?php endif; ?>

		<div id="gallery">
			<figure id="active-image" style="background-image:url(<?php print file_create_url($node->field_gallery_image['und'][0]['uri']); ?>);"><div class="imagelegend"><?php print $node->field_gallery_image['und'][0]['alt']; ?></div></figure>		
			<div id="thumbnails">
				<div class="inner wrapper">
					<?php
						foreach ($node->field_gallery_image['und'] as $key => $value) {
							$uri = $value['uri'];
							$thumb_uri = image_style_url('gallery_thumbnail', $uri);
							print('<div class="thumbnail"><img src="'.$thumb_uri.'" data-src="'.file_create_url($value['uri']).'" alt="'.$value['alt'].'"></div>');
						}
					?>
				</div>
				<div class="gallery-control left"><a href="#">‹</a></div>
				<div class="gallery-control right"><a href="#">›</a></div>
			</div>
		</div>

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
