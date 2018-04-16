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

		<div class="pagination">
			<!-- TODO render by js -->
		</div>

		<div class="title-body">
			<div class="date">
			<?php if (isset($node->field_event_datetime['und'][0]['value'])): ?>
				<strong><?php print format_date($node->field_event_datetime['und'][0]['value'], 'date_gruene_medium'); ?></strong> <?php print format_date($node->field_event_datetime['und'][0]['value'], 'custom', 'G:i'); ?>
			<?php endif; ?>
			<?php if (isset($node->field_event_datetime['und'][0]['value2'])): ?>
				- <?php print format_date($node->field_event_datetime['und'][0]['value2'], 'custom', 'G:i'); ?>
			<?php endif; ?>
			</div>
			<?php if (isset($node->field_event_location['und'][0]['safe_value'])): ?>
				<div class="location">Ort: <?php print $node->field_event_location['und'][0]['safe_value']; ?></div>
			<?php endif; ?>
			<?php if (isset($node->body)) print $node->body['und'][0]['value']; ?>
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

