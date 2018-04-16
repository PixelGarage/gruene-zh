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

	<div class="title-container <?php print $type; ?>">
		
		<?php if (isset($node->field_contactform_image) && !empty($node->field_contactform_image['und'][0]['uri'])): ?>
			<div class="title-image" style="background-image:url(<?php print file_create_url($node->field_contactform_image['und'][0]['uri']); ?>);"></div>
		<?php endif; ?>

		<div class="title">
			<h1><?php print $node->title; ?></h1>
		</div>
		
		<?php if (isset($node->body) && !empty($node->body['und'][0]['value'])): ?>
			<div class="title-body"><?php if (isset($node->body['und'][0]['value'])) print $node->body['und'][0]['value']; ?></div>
		<?php endif; ?>

		<div class="form-container party-form">
			<?php
				$emailaddress = $node->field_contactform_email['und'][0]['value'];
				$name = "Test";
				webform_format_email_address($emailaddress, $name, 270);
				$webformnode = node_load(270);
				//print_r($webformnode);
				// Start Anpassungen Formular
				// Überschreibt den standard Email Empfänger mit dem in der Seite eingegebenen Email Feld
				if (!empty($node->field_contactform_email['und'][0]['value'])) {
					$webformnode->webform['emails'][1]['email'] = $node->field_contactform_email['und'][0]['value'];
				}
				if (isset($node->field_contactform_successmessage['und'][0]['value'])) {
					$webformnode->webform['confirmation'] =  $node->field_contactform_successmessage['und'][0]['value'];
				}
				// Ende Anpassungen Formular
				// Formular ausgeben
				webform_node_view($webformnode,'full');
				if (isset($webformnode->body['und'][0]['safe_value'])) print('<div class="pre-instructions">'.$webformnode->body['und'][0]['safe_value']).'</div>';
				print theme_webform_view($webformnode->content);
			?>
		</div>
		
		<div class="title-body">
			<?php if (isset($node->field_contactform_text)) print $node->field_contactform_text['und'][0]['value']; ?>
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

