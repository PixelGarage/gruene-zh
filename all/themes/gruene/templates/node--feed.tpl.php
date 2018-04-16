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

		<div class="title-body">
			<?php if (isset($node->created)): ?>
				<div class="date"><?php print format_date($node->created, 'date_gruene_medium'); ?></div>
			<?php endif; ?>
			<?php if (isset($node->body)) print $node->body['und'][0]['value']; ?>
		</div>

		<?php if (isset($node->field_standardpage_imagetext2col['und'])): ?>
		<div class="imgtext">
			<?php
		        $t = count($node->field_standardpage_imagetext2col['und']);
		        for ($i = 0; $i <= $t-1; $i++) {
		        	print('<div class="item wrapper">');
		            $field_collection = entity_load('field_collection_item', array($node->field_standardpage_imagetext2col['und'][$i]['value']));
		            $keys = array_keys($field_collection);
		            $key = $keys[0];
					if (isset($field_collection[$key]->field_standard_imgtxt2col_img['und'][0]['uri'])) {
						$imagepath = true;
					} else {
						$imagepath = false;
					}
		            $body = $field_collection[$key]->field_standard_imgtxt2col_body['und'][0]['value'];
					// Inetrner Link (Entity Reference Beitrag)
					if (isset($field_collection[$key]->field_standard_imgtxt2col_link['und'][0]['target_id'])) {
						$link = 'node/' . $field_collection[$key]->field_standard_imgtxt2col_link['und'][0]['target_id'];
					}
					// Datei verlinkt (Entity Reference Datei)
					if (isset($field_collection[$key]->field_standard_imgtxt2col_link2['und'][0]['entity']->uri)) {
						$link = file_create_url($field_collection[$key]->field_standard_imgtxt2col_link2['und'][0]['entity']->uri);
					}
		            if ($imagepath) {
		            	print('<div class="column imgtext-image">');
						$imagehtml = theme_image(array(
							'path' => $field_collection[$key]->field_standard_imgtxt2col_img['und'][0]['uri'],
							'attributes' => array('style' => 'max-width: 100%; height: auto;')
						));
							
						if (isset($link)) {
							print l($imagehtml, $link, array('html' => true));
						} else {
							print $imagehtml;
						}
						print('</div>');
		            }
		            print('<div class="column imgtext-text">'.$body.'</div>');
		            print('</div>');
					unset($field_collection);
					unset($link);
		        }
			?>
		</div>
		<?php endif; ?>

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