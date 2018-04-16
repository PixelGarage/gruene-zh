<?php
	global $base_path;
	$filepath = $base_path . 'sites/default/files/';
?>

<div class="middle">

	<div class="title-container standard_page">

		<div class="title">
			<h1><?php print $node->title; ?></h1>
		</div>

		<div class="pagination">
			<!-- TODO render by js -->
		</div>

		<div class="title-body">
			<div class="webform-confirmation">
			  <?php if ($confirmation_message): ?>
			    <?php print $confirmation_message ?>
			  <?php else: ?>
			    <p><?php print t('Vielen Dank, das Formular wurde erfolgreich übermittelt.'); ?></p>
			  <?php endif; ?>
			</div>
		</div>

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