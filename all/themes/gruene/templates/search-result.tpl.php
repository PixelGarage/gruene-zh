<?php

/**
 * @file
 * Default theme implementation for displaying a single search result.
 *
 * This template renders a single search result and is collected into
 * search-results.tpl.php. This and the parent template are
 * dependent to one another sharing the markup for definition lists.
 *
 * Available variables:
 * - $url: URL of the result.
 * - $title: Title of the result.
 * - $snippet: A small preview of the result. Does not apply to user searches.
 * - $info: String of all the meta information ready for print. Does not apply
 *   to user searches.
 * - $info_split: Contains same data as $info, split into a keyed array.
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Default keys within $info_split:
 * - $info_split['module']: The module that implemented the search query.
 * - $info_split['user']: Author of the node linked to users profile. Depends
 *   on permission.
 * - $info_split['date']: Last update of the node. Short formatted.
 * - $info_split['comment']: Number of comments output as "% comments", %
 *   being the count. Depends on comment.module.
 *
 * Other variables:
 * - $classes_array: Array of HTML class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $title_attributes_array: Array of HTML attributes for the title. It is
 *   flattened into a string within the variable $title_attributes.
 * - $content_attributes_array: Array of HTML attributes for the content. It is
 *   flattened into a string within the variable $content_attributes.
 *
 * Since $info_split is keyed, a direct print of the item is possible.
 * This array does not apply to user searches so it is recommended to check
 * for its existence before printing. The default keys of 'type', 'user' and
 * 'date' always exist for node searches. Modules may provide other data.
 * @code
 *   <?php if (isset($info_split['comment'])): ?>
 *     <span class="info-comment">
 *       <?php print $info_split['comment']; ?>
 *     </span>
 *   <?php endif; ?>
 * @endcode
 *
 * To check for all available data within $info_split, use the code below.
 * @code
 *   <?php print '<pre>'. check_plain(print_r($info_split, 1)) .'</pre>'; ?>
 * @endcode
 *
 * @see template_preprocess()
 * @see template_preprocess_search_result()
 * @see template_process()
 *
 * @ingroup themeable
 *
<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
 <?php print render($title_prefix); ?>
  <h3 class="title"<?php print $title_attributes; ?>>
    <a href="<?php print $url; ?>"><?php print $title; ?></a>
  </h3>
  <?php print render($title_suffix); ?>
  <div class="search-snippet-info">
    <?php if ($snippet): ?>
      <p class="search-snippet"<?php print $content_attributes; ?>><?php print $snippet; ?></p>
    <?php endif; ?>
  </div>
</div>
 */
?>

<div class="view_result wrapper">
	<a href="<?php print $url; ?>">
		<?php if ($node->field_standardpage_teaserimage): ?>
			<div class="view_result_image" style="background-image:url('<?php print file_create_url($node->field_standardpage_teaserimage['und'][0]['uri']); ?>')"></div>
		<?php endif; ?>
		<?php if ($node->field_topic_teaserimage): ?>
			<div class="view_result_image" style="background-image:url('<?php print file_create_url($node->field_topic_teaserimage['und'][0]['uri']); ?>')"></div>
		<?php endif; ?>
		<?php if ($node->field_gallery_teaserimage): ?>
			<div class="view_result_image" style="background-image:url('<?php print file_create_url($node->field_gallery_teaserimage['und'][0]['uri']); ?>')"></div>
		<?php endif; ?>
		<h3 class="view_result_title"><?php print $title ?></h3>
		<div class="view_result_content">
			<?php 
				if (!empty($node->body['und'][0]['summary'])) {
					print strip_tags($node->body['und'][0]['summary'], '<p><br>');
				} else {
					$trimmedbody = preg_replace("/[^ ]*$/", '', substr($node->body['und'][0]['value'], 0, 200));
					print strip_tags($trimmedbody, '<p><br>');
					if ($trimmedbody != $node->body['und'][0]['value']) {
						print '...';
					}
				}
			?>
		</div>
	</a>
    <?php if ($info): ?>
      <!-- <p class="search-info"><?php print $info; ?></p> -->
    <?php endif; ?>
</div>