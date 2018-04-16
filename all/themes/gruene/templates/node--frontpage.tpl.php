<?php if (user_is_logged_in()): ?>
	<div class="edit-node-link">
		<a href="/node/<?php print($nid); ?>/edit">Bearbeiten</a>
		<a href="/admin">Admin</a>
		<a href="/user/logout">Logout</a>
	</div>
<?php endif; ?>

<div class="middle frontpage">
	
	<div class="title-container frontpage wrapper">

		<?php
			if (isset($node->field_frontpage_big['und']['0'])) {
				$field_collection = entity_load('field_collection_item', array($node->field_frontpage_big['und']['0']['value']));
	            $keys = array_keys($field_collection);
	            $key = $keys[0];
				$imagepath = file_create_url($field_collection[$key]->field_frontpage_big_img['und'][0]['uri']);
				$title = $field_collection[$key]->field_frontpage_big_title['und'][0]['safe_value'];
				$text = $field_collection[$key]->field_frontpage_big_body['und'][0]['safe_value'];
				$link = url('node/' . $field_collection[$key]->field_frontpage_big_link['und'][0]['target_id']);
				$color = $field_collection[$key]->field_frontpage_big_color['und'][0]['value'];
				$frontpage_view = "";
				if (isset($field_collection[$key]->field_frontpage_big_view['und'][0]['value']) && !empty($field_collection[$key]->field_frontpage_big_view['und'][0]['value'])) {
					$frontpage_view = views_embed_view($field_collection[$key]->field_frontpage_big_view['und'][0]['value'], $display_id = 'default');
				}
				
				print('<div class="frontpage-box">');
				print('<a href="'.$link.'">');
				print('<div class="frontpage-box-content '.$color.'">');
				print('<div class="box-image" style="background-image:url('.$imagepath.');"></div>');
				print('<div class="box-inner"><h3>'.$title.'</h3>');
				if (!empty($frontpage_view)) {
					print('<div class="views-output">'.$frontpage_view.'</div>');
				} else {
					print('<p>'.$text.'</p>');
				}
				print('</div>');
				print('</div>');
				print('</a>');
				print('</div>');
			}
		?>
		
		<?php
			if (isset($node->field_frontpage_big['und']['1'])) {
				$field_collection = entity_load('field_collection_item', array($node->field_frontpage_big['und']['1']['value']));
	            $keys = array_keys($field_collection);
	            $key = $keys[0];
				$imagepath = file_create_url($field_collection[$key]->field_frontpage_big_img['und'][0]['uri']);
				$title = $field_collection[$key]->field_frontpage_big_title['und'][0]['safe_value'];
				$text = $field_collection[$key]->field_frontpage_big_body['und'][0]['safe_value'];
				$link = url('node/' . $field_collection[$key]->field_frontpage_big_link['und'][0]['target_id']);
				$color = $field_collection[$key]->field_frontpage_big_color['und'][0]['value'];
				$frontpage_view = "";
				if (isset($field_collection[$key]->field_frontpage_big_view['und'][0]['value']) && !empty($field_collection[$key]->field_frontpage_big_view['und'][0]['value'])) {
					$frontpage_view = views_embed_view($field_collection[$key]->field_frontpage_big_view['und'][0]['value'], $display_id = 'default');
				}
				
				print('<div class="frontpage-box">');
				print('<a href="'.$link.'">');
				print('<div class="frontpage-box-content '.$color.'">');
				print('<div class="box-image" style="background-image:url('.$imagepath.');"></div>');
				print('<div class="box-inner"><h3>'.$title.'</h3>');
				if (!empty($frontpage_view)) {
					print('<div class="views-output">'.$frontpage_view.'</div>');
				} else {
					print('<p>'.$text.'</p>');
				}
				print('</div>');
				print('</div>');
				print('</a>');
				print('</div>');
			}
		?>

		<div class="frontpage-box multiple-boxes wrapper">
			<?php
		        $t = count($node->field_frontpage_small['und']);
		        for ($i = 0; $i <= $t-1; $i++) {
		            $field_collection = entity_load('field_collection_item', array($node->field_frontpage_small['und'][$i]['value']));
		            $keys = array_keys($field_collection);
		            $key = $keys[0];
		            $imagepath = file_create_url($field_collection[$key]->field_frontpage_small_img['und'][0]['uri']);
		            $title = $field_collection[$key]->field_frontpage_small_title['und'][0]['value'];
					$link = url('node/' . $field_collection[$key]->field_frontpage_small_link['und'][0]['target_id']);
					$color = $field_collection[$key]->field_frontpage_small_color['und'][0]['value'];
					print('<div class="frontpage-box-content small '.$color.'"><a href="'.$link.'">');
					print('<div class="box-image" style="background-image:url('.$imagepath.');"></div>');
					print('<div class="box-inner"><h3>'.$title.'</h3></div>');
		            unset($field_collection);
		            print('</a></div>');
		        }
			?>
		</div>

		<?php
			if (isset($node->field_frontpage_big['und']['2'])) {
				$field_collection = entity_load('field_collection_item', array($node->field_frontpage_big['und']['2']['value']));
	            $keys = array_keys($field_collection);
	            $key = $keys[0];
				$imagepath = file_create_url($field_collection[$key]->field_frontpage_big_img['und'][0]['uri']);
				$title = $field_collection[$key]->field_frontpage_big_title['und'][0]['safe_value'];
				$text = $field_collection[$key]->field_frontpage_big_body['und'][0]['safe_value'];
				$link = url('node/' . $field_collection[$key]->field_frontpage_big_link['und'][0]['target_id']);
				$color = $field_collection[$key]->field_frontpage_big_color['und'][0]['value'];
				$frontpage_view = "";
				if (isset($field_collection[$key]->field_frontpage_big_view['und'][0]['value']) && !empty($field_collection[$key]->field_frontpage_big_view['und'][0]['value'])) {
					$frontpage_view = views_embed_view($field_collection[$key]->field_frontpage_big_view['und'][0]['value'], $display_id = 'default');
				}
				
				print('<div class="frontpage-box">');
				print('<a href="'.$link.'">');
				print('<div class="frontpage-box-content '.$color.'">');
				print('<div class="box-image" style="background-image:url('.$imagepath.');"></div>');
				print('<div class="box-inner"><h3>'.$title.'</h3>');
				if (!empty($frontpage_view)) {
					print('<div class="views-output">'.$frontpage_view.'</div>');
				} else {
					print('<p>'.$text.'</p>');
				}
				print('</div>');
				print('</div>');
				print('</a>');
				print('</div>');
			}
		?>

		<?php
			if (isset($node->field_frontpage_big['und']['3'])) {
				$field_collection = entity_load('field_collection_item', array($node->field_frontpage_big['und']['3']['value']));
	            $keys = array_keys($field_collection);
	            $key = $keys[0];
				$imagepath = file_create_url($field_collection[$key]->field_frontpage_big_img['und'][0]['uri']);
				$title = $field_collection[$key]->field_frontpage_big_title['und'][0]['safe_value'];
				$text = $field_collection[$key]->field_frontpage_big_body['und'][0]['safe_value'];
				$link = url('node/' . $field_collection[$key]->field_frontpage_big_link['und'][0]['target_id']);
				$color = $field_collection[$key]->field_frontpage_big_color['und'][0]['value'];
				$frontpage_view = "";
				if (isset($field_collection[$key]->field_frontpage_big_view['und'][0]['value']) && !empty($field_collection[$key]->field_frontpage_big_view['und'][0]['value'])) {
					$frontpage_view = views_embed_view($field_collection[$key]->field_frontpage_big_view['und'][0]['value'], $display_id = 'default');
				}
				
				print('<div class="frontpage-box">');
				print('<a href="'.$link.'">');
				print('<div class="frontpage-box-content '.$color.'">');
				print('<div class="box-image" style="background-image:url('.$imagepath.');"></div>');
				print('<div class="box-inner"><h3>'.$title.'</h3>');
				if (!empty($frontpage_view)) {
					print('<div class="views-output">'.$frontpage_view.'</div>');
				} else {
					print('<p>'.$text.'</p>');
				}
				print('</div>');
				print('</div>');
				print('</a>');
				print('</div>');
			}
		?>

		<?php
			$field_collection = entity_load('field_collection_item', array($node->field_frontpage_about['und'][0]['value']));
            $keys = array_keys($field_collection);
            $key = $keys[0];
			$imagepath = file_create_url($field_collection[$key]->field_frontpage_about_img['und'][0]['uri']);
			$title = $field_collection[$key]->field_frontpage_about_title['und'][0]['safe_value'];
			$link = url('node/' . $field_collection[$key]->field_frontpage_about_link['und'][0]['target_id']);
			$color = $field_collection[$key]->field_frontpage_about_color['und'][0]['value'];
		?>

		<div class="frontpage-box"><a href="<?php print($link); ?>">
			<div class="frontpage-box-content big <?php print($color); ?>">
				<div class="box-image" style="background-image:url(<?php print $imagepath; ?>);"></div>
				<div class="box-inner">
					<h3><?php print $title; ?></h3>
				</div>
			</div>
		</a></div>

		<?php
	        $t = count($node->field_frontpage_big['und']);
	        for ($i = 4; $i <= $t-1; $i++) {
	        	$field_collection = entity_load('field_collection_item', array($node->field_frontpage_big['und'][$i]['value']));
	            $keys = array_keys($field_collection);
	            $key = $keys[0];
	            $imagepath = file_create_url($field_collection[$key]->field_frontpage_big_img['und'][0]['uri']);
	            $title = $field_collection[$key]->field_frontpage_big_title['und'][0]['value'];
				$text = $field_collection[$key]->field_frontpage_big_body['und'][0]['safe_value'];
				$link = url('node/' . $field_collection[$key]->field_frontpage_big_link['und'][0]['target_id']);
				$color = $field_collection[$key]->field_frontpage_big_color['und'][0]['value'];
				$frontpage_view = "";
				if (isset($field_collection[$key]->field_frontpage_big_view['und'][0]['value']) && !empty($field_collection[$key]->field_frontpage_big_view['und'][0]['value'])) {
					$frontpage_view = views_embed_view($field_collection[$key]->field_frontpage_big_view['und'][0]['value'], $display_id = 'default');
				}
				print('<div class="frontpage-box">');
				print('<a href="'.$link.'">');
				print('<div class="frontpage-box-content '.$color.'">');
				print('<div class="box-image" style="background-image:url('.$imagepath.');"></div>');
				print('<div class="box-inner"><h3>'.$title.'</h3>');
				if (!empty($frontpage_view)) {
					print('<div class="views-output">'.$frontpage_view.'</div>');
				} else {
					print('<p>'.$text.'</p>');
				}
				print('</div>');
				print('</div>');
				print('</a>');
				print('</div>');
	        }
		?>
		
		<?php
			$knubbeltext = $node->field_frontpage_button_text['und'][0]['safe_value'];
			$knubbellink = url('node/' . $node->field_frontpage_button_link['und'][0]['target_id']);
		?>

		<div class="knubbel">
			<span><a href="<?php print($knubbellink); ?>"><?php print($knubbeltext); ?></a></span>
		</div>

	</div>

	<?php

		$domainGet = domain_get_domain();
		$domainId = $domainGet['domain_id'];
		
		if ($domainId == 1 || $domainId == 2) {
			//Kanton ZH
			print '<div id="social-stream-wrapper"><h3>Grünfutter</h3><div id="social-stream"></div></div>';
		}
		if ($domainId == 3) {
			//Winterthur
			print '<div id="social-stream-wrapper"><h3>Grünfutter</h3><div id="social-stream-winterthur"></div></div>';
		}

	?>

</div>

<aside class="more">
	<div class="social-media-icons">
		<div class="facebook-icon"></div>
		<div class="twitter-icon"></div>
		<div class="instagram-icon"></div>
	</div>
</aside>