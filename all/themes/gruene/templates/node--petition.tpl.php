<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php if (user_is_logged_in()): ?>
	<div class="edit-node-link">
		<a href="/node/<?php print($nid); ?>/edit">Bearbeiten</a>
		<a href="/admin">Admin</a>
		<a href="/user/logout">Logout</a>
	</div>
<?php endif; ?>

<?php drupal_add_css('
	#petition input {border: 1px solid #003d1f;}
	#petition .form-type-checkbox {margin-left: 124px;}
	#petition .form-submit {float: right;}
	#petition .status {border: 1px solid #003d1f; padding: 10px; background-image: none; margin-bottom: 20px;}
	#petition .error {border: 1px solid red; padding: 10px; background-image: none; margin-bottom: 20px;}
	#petition .signers {font-weight: bold}
	#petition .signatures caption {font-weight: bold}
	#petition .signatures table {width: 100%; border-collapse: collapse; margin-bottom: 0px;}
	#petition .signatures table td {padding-left: 10px; padding-right: 10px;}
	#petition .signatures table td:nth-child(1) {width: 50px; text-align: right}
	#petition .signatures table td:nth-child(3) {width: 200px;}
    #petition .signatures table tr {border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;}
    #petition .signatures table tr.odd td {background-color: #f6f6f6}
    #petition .signatures table tr.even td {background-color: #eee}
    #petition .signatures .pager ul {list-style-type: none; padding: 0; margin: 0;}
    #petition .signatures .pager ul li {display: inline-block}
    #petition .signatures .pager ul li a, #petition .signatures .pager ul li span {display: block; padding: 0 5px 0 5px}
    #petition .signatures .pager ul.pager-list {float: left}
    #petition .signatures .pager ul.pager-links {float: right}
    #petition .signatures .pager ul.pager-links li.active a {color: #003d1f}
    
	#share {clear: both; text-align: center; width: 594px;}
	#share .fb-share-button, #share .twitter-share-button {display: inline-block; vertical-align: middle; margin: 20px 10px}
', array('group' => CSS_THEME, 'type' => 'inline')); ?>

<div class="middle">
	<div id="petition">
		<div class="title-container standard_page">
			<?php if (isset($node->field_standardpage_image) && !empty($node->field_standardpage_image['und'][0]['uri'])): ?>
				<div class="title-image" style="background-image:url(<?php print file_create_url($node->field_standardpage_image['und'][0]['uri']); ?>);"></div>
			<?php endif; ?>
			<div class="title">
				<h1><?php print $node->title; ?></h1>
			</div>
			<div class="title-body">
				<?php if ($node->status_messages): ?>
					<div class="status">
						<?php print $node->status_messages['status'][0].'<br>'; ?>
					</div>
				<?php endif; ?>
				<?php if (!$node->status_messages): ?>
					<div class="form-container">
						<?php if ($node->error_messages): ?>
							<div class="error">
								<?php foreach ($node->error_messages['error'] as $validation_error) {
									print $validation_error.'<br>';
								} ?>
							</div>
						<?php endif; ?>
						<?php print render($content['petition']); ?>
					</div>
				<?php endif; ?>
				<div class="signers">
					<p><strong>Bisher <?php print $signature_count; ?> Unterschriften online gesammelt</strong></p>
				</div>
				<?php print render($content['body']); ?>
				<div class="signatures">
					<?php print render($content['signatures']); ?>
				</div>
			</div>
			<?php if (isset($node->field_standardpage_file['und'])): ?>
			<div class="files">
				<div class="files-header wrapper">
					<div class="file-description">
						<?php
							if(isset($node->field_standardpage_file_title['und'][0]['value']) && !empty($node->field_standardpage_file_title['und'][0]['value'])) {
								print($node->field_standardpage_file_title['und'][0]['value'] );
							} else {
								print "Downloads";
							}
						?>
					</div>
					<div class="file-size">Grösse</div>
					<div class="file-type">Dateityp</div>
				</div>
				<div class="files-table wrapper">
					<?php foreach ($node->field_standardpage_file['und'] as $key => $value): ?>
						<div class="file wrapper">
							<span class="file-description"><?php print l($value['description'], file_create_url($value['uri']), array('attributes' => array('target' => '_blank'))) ?></span>
							<span class="file-size"><? print format_size($value['filesize'], $langcode = NULL) ?></span>
							<span class="file-type"><?php print pathinfo($value['filename'], PATHINFO_EXTENSION) ?></span>
						</div>
					<?php endforeach ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
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
<div id="share">
	<div class="fb-share-button" data-href="<?php print url(current_path(), array('absolute' => TRUE)); ?>" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php print rawurlencode(url(current_path(), array('absolute' => TRUE))); ?>;src=sdkpreparse">Teilen</a></div>
	<a href="https://twitter.com/share" class="twitter-share-button" data-size="large">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</div>