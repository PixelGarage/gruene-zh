<?php
	global $base_path;
	$filepath = $base_path . 'sites/default/files/';
?>

<div class="middle">

	<div class="title-container user-profile">

		<div class="title">
			<h1>Passwort ändern</h1>
		</div>

		<div class="form-container party-form">
			<?php print drupal_render_children($form); ?>
		</div>

	</div>

</div>