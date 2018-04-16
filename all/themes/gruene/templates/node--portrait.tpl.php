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

<div class="middle wrapper">

	<div class="title-container <?php print $type; ?>">

		<div class="title">
			<h1><?php print $node->title; ?></h1>
		</div>

	</div>

	<div class="portrait-left">
		<?php if (isset($node->field_portrait_image) && !empty($node->field_portrait_image['und'][0]['uri'])): 
			$imagehtml = theme_image(array(
				'path' => $node->field_portrait_image['und'][0]['uri'],
				'attributes' => array('style' => 'max-width: 100%; height: auto;')
			));
		?>
		<div class="portrait-image"><?php print $imagehtml; ?></div>
		<?php endif ?>
	</div>

	<div class="portrait-right"<?php if(!isset($imagehtml)): ?> style="padding-left: 12px;"<?php endif ?>>
		<?php if (isset($node->field_portrait_name['und'][0]['value'])): ?>
		<div class="portrait-row">
			<span class="portrait-label">
				Name
			</span>
			<span class="portrait-value">
				<?php print($node->field_portrait_name['und'][0]['value']); ?>
			</span>
		</div>
		<?php endif; ?>
		<?php if (isset($node->field_portrait_bornin['und'][0]['value'])): ?>
		<div class="portrait-row">
			<span class="portrait-label">
				Jahrgang
			</span>
			<span class="portrait-value">
				<?php print($node->field_portrait_bornin['und'][0]['value']); ?>
			</span>
		</div>
		<?php endif; ?>
		<?php if (isset($node->field_portrait_electoralward['und'][0]['value'])): ?>
		<div class="portrait-row">
			<span class="portrait-label">
				Wahlkreis
			</span>
			<span class="portrait-value">
				<?php print($node->field_portrait_electoralward['und'][0]['value']); ?>
			</span>
		</div>
		<?php endif; ?>
		<?php if (isset($node->field_portrait_profession['und'][0]['value'])): ?>
		<div class="portrait-row">
			<span class="portrait-label">
				Beruf
			</span>
			<span class="portrait-value">
				<?php print($node->field_portrait_profession['und'][0]['value']); ?>
			</span>
		</div>
		<?php endif; ?>
		<?php if (isset($node->field_portrait_address['und'][0]['value'])): ?>
		<div class="portrait-row">
			<span class="portrait-label">
				Adresse
			</span>
			<span class="portrait-value">
				<?php print($node->field_portrait_address['und'][0]['value']); ?>
			</span>
		</div>
		<?php endif; ?>
		<?php if (isset($node->field_portrait_ilike['und'][0]['value'])): ?>
		<div class="portrait-row">
			<span class="portrait-label">
				Was ich mag
			</span>
			<span class="portrait-value">
				<?php print($node->field_portrait_ilike['und'][0]['value']); ?>
			</span>
		</div>
		<?php endif; ?>
		<?php if (isset($node->field_portrait_dontlike['und'][0]['value'])): ?>
		<div class="portrait-row">
			<span class="portrait-label">
				Was ich nicht mag
			</span>
			<span class="portrait-value">
				<?php print($node->field_portrait_dontlike['und'][0]['value']); ?>
			</span>
		</div>
		<?php endif; ?>
		<?php if (isset($node->field_portrait_hobby['und'][0]['value'])): ?>
		<div class="portrait-row">
			<span class="portrait-label">
				Hobbys
			</span>
			<span class="portrait-value">
				<?php print($node->field_portrait_hobby['und'][0]['value']); ?>
			</span>
		</div>
		<?php endif; ?>
		<?php if (isset($node->field_portrait_department['und'][0]['value'])): ?>
		<div class="portrait-row">
			<span class="portrait-label">
				Parteiamt
			</span>
			<span class="portrait-value">
				<?php print($node->field_portrait_department['und'][0]['value']); ?>
			</span>
		</div>
		<?php endif; ?>
		<?php if (isset($node->field_portrait_mandate['und'][0]['value'])): ?>
		<div class="portrait-row">
			<span class="portrait-label">
				Weitere Mandate
			</span>
			<span class="portrait-value">
				<?php print($node->field_portrait_mandate['und'][0]['value']); ?>
			</span>
		</div>
		<?php endif; ?>
		<?php if (isset($node->field_mainfocus['und'][0]['value'])): ?>
		<div class="portrait-row">
			<span class="portrait-label">
				Schwerpunkte
			</span>
			<span class="portrait-value">
				<?php print($node->field_mainfocus['und'][0]['value']); ?>
			</span>
		</div>
		<?php endif; ?>
		<?php if (isset($node->field_portrait_email['und'][0]['value'])): ?>
		<div class="portrait-row">
			<span class="portrait-label">
				Kontakt
			</span>
			<span class="portrait-value">
				<a href="mailto:<?php print $node->field_portrait_email['und'][0]['value']; ?>">E-Mail</a>
			</span>
		</div>
		<?php endif; ?>
		<?php if (isset($node->field_portrait_website['und'][0]['url'])): ?>
		<div class="portrait-row">
			<span class="portrait-label">
				Website
			</span>
			<span class="portrait-value">
				<a href="<?php print $node->field_portrait_website['und'][0]['url']; ?>" target="_blank">
				<?php
					if (isset($node->field_portrait_website['und'][0]['title'])) {
						print $node->field_portrait_website['und'][0]['title'];
					} else {
						print $node->field_portrait_website['und'][0]['url'];
					}
				?>
				</a>
			</span>
		</div>
		<?php endif; ?>
		<div class="portrait-body">
			<?php print($node->body['und'][0]['value']); ?>
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
