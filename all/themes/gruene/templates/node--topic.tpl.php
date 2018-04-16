<?php if (user_is_logged_in()): ?>
	<div class="edit-node-link">
		<a href="/node/<?php print($nid); ?>/edit">Bearbeiten</a>
		<a href="/admin">Admin</a>
		<a href="/user/logout">Logout</a>
	</div>
<?php endif; ?>

<div class="middle">

	<div class="title-container <?php print $type; ?>">

		<?php if (isset($node->field_topic_image['und']) && !empty($node->field_topic_image['und'][0]['uri'])): ?>
			<div class="title-image" style="background-image:url(<?php print file_create_url($node->field_topic_image['und'][0]['uri']); ?>);"></div>
		<?php endif; ?>

		<div class="title">
			<h1><?php print $node->title; ?></h1>
		</div>

		<div class="title-body">
			<?php if (isset($node->body['und'][0]['value'])) print $node->body['und'][0]['value']; ?>
		</div>

	</div>

	<?php if (count(mi_core_get_menu_children_nids()) != 0): ?>
			
			<?php
				//$view = views_get_view_result('topic_view');
				$view = views_get_view_result('topic_view2');
				$submenu_items = mi_core_get_menu_children_nids();
				$topicitems = array();
				
				//print_r($view);

				foreach ($view as $key => $value) {
					if (in_array($value->nid, $submenu_items)) {
						//print_r($value);
						$counter = array_search($value->nid, $submenu_items); 
						$topicitems[$counter]['title'] = $value->node_title;
						$topicitems[$counter]['content'] = $value->field_body[0]['raw']['summary'];
						$topicitems[$counter]['url'] = url('node/' . $value->nid);
						$topicitems[$counter]['teaserimage_topic'] = $value->field_field_topic_teaserimage;
						$topicitems[$counter]['teaserimage_standardpage'] = $value->field_field_standardpage_teaserimage;
						$topicitems[$counter]['teaserimage_portrait'] = $value->field_field_portrait_image;
						$topicitems[$counter]['teaserimage_gallery'] = $value->field_field_gallery_teaserimage;
						$topicitems[$counter]['teaserimage_memberform'] = $value->field_field_memberform_teaserimage;
						$topicitems[$counter]['teaserimage_contactform'] = $value->field_field_contactform_teaserimage;
						$topicitems[$counter]['teaserimage_feed_overview'] = $value->field_field_feed_overview_teaserimage;
						$topicitems[$counter]['teaserimage_event_overview'] = $value->field_field_event_overview_teaserimage;
					}
				}

				ksort($topicitems);
				
				if (!empty($topicitems)) {
					print '<div class="views-container '.$type.'">';
					if (isset($node->field_topic_view_title['und'])) {
						print '<div class="views-title"><h3>' . $node->field_topic_view_title['und'][0]['safe_value'] . '</h3></div>';
					}
				}
				
				foreach ($topicitems as $value) {
					print('<div class="view_result wrapper"><a href="' . $value['url'] . '">');
					if ($value['teaserimage_topic']):
						print('<div class="view_result_image" style="background-image:url(' . file_create_url($value['teaserimage_topic'][0]['raw']['uri']) . ')"></div>');
					endif;
					if ($value['teaserimage_standardpage']):
						print('<div class="view_result_image" style="background-image:url(' . file_create_url($value['teaserimage_standardpage'][0]['raw']['uri']) . ')"></div>');
					endif;
					if ($value['teaserimage_portrait']):
						print('<div class="view_result_image" style="background-size:contain; background-image:url(' . file_create_url($value['teaserimage_portrait'][0]['raw']['uri']) . ')"></div>');
					endif;
					if ($value['teaserimage_gallery']):
						print('<div class="view_result_image" style="background-image:url(' . file_create_url($value['teaserimage_gallery'][0]['raw']['uri']) . ')"></div>');
					endif;
					if ($value['teaserimage_memberform']):
						print('<div class="view_result_image" style="background-image:url(' . file_create_url($value['teaserimage_memberform'][0]['raw']['uri']) . ')"></div>');
					endif;
					if ($value['teaserimage_contactform']):
						print('<div class="view_result_image" style="background-image:url(' . file_create_url($value['teaserimage_contactform'][0]['raw']['uri']) . ')"></div>');
					endif;
					if ($value['teaserimage_feed_overview']):
						print('<div class="view_result_image" style="background-image:url(' . file_create_url($value['teaserimage_feed_overview'][0]['raw']['uri']) . ')"></div>');
					endif;
					if ($value['teaserimage_event_overview']):
						print('<div class="view_result_image" style="background-image:url(' . file_create_url($value['teaserimage_event_overview'][0]['raw']['uri']) . ')"></div>');
					endif;
					print('<h3 class="view_result_title">' . $value['title'] . '</h3>');
					print('<div class="view_result_content">' . $value['content'] . '</div>');
					print('</a></div>');
				}
				
				if (!empty($topicitems)) {
					print '</div>';
				}
			?>

	<?php endif; ?>

	<?php if (isset($node->field_topic_contentblock['und'])): ?>

		<div class="content-blocks">
			<?php
				$t = count($node->field_topic_contentblock['und']);
		        for ($i = 0; $i <= $t-1; $i++) {
		        	print('<div class="content-block">');
		            $field_collection = entity_load('field_collection_item', array($node->field_topic_contentblock['und'][$i]['value']));
		            $keys = array_keys($field_collection);
		            $key = $keys[0];
		            print('<div class="content-block-title"><h3>');
		            print($field_collection[$key]->field_topic_contentblock_title['und'][0]['safe_value']);
		            print('</h3></div>');
		            print('<div class="inner">');
		            print($field_collection[$key]->field_topic_contentblock_body['und'][0]['value']);
		            print('</div>');
		            unset($field_collection);
		            print('</div>');
		        }
			?>
		</div>

	<?php endif; ?>

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

<div id="more-than-green">
	<a href="#">
		<div class="circle outer"></div>
		<div class="circle inner"></div>
		Mehr als Grün
	</a>
</div>