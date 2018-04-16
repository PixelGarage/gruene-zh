<?php
	global $base_path;
	$filepath = $base_path . 'sites/default/files/';
?>

<div class="middle">

	<div class="title-container user-reset">

		<div class="title">
			<h1>Einmalige Anmeldung</h1>
		</div>

		<div class="title-body">
			<?php print drupal_render_children($form); ?>
		</div>

	</div>

</div>