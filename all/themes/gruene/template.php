<?php
	
	// add variables
	function gruene_preprocess_page(&$variables) {

		global $_domain;

		$variables['domain'] = $_domain;

		// add submenu variable to page.tpl.php
		$main_menu_tree = menu_tree_all_data('menu-kanton-zuerich');
		$variables['main_menu_expanded'] = menu_tree_output($main_menu_tree);

		// add search form variable to page.tpl.php
		$search_box = drupal_get_form('search_form');
		$variables['search_box'] = drupal_render($search_box);

		// add content type template suggestion
		if (!empty($variables['node']) && !empty($variables['node']->type)) {
			$variables['theme_hook_suggestions'][] = 'page__node__' . $variables['node']->type;
		}
		
		// twist für context modul (damit das context modul funktioniert musste das menu im menu_block expandiert dargestellt werden und wird hier mit javascript wieder ausgeblendet)
		drupal_add_js(drupal_get_path('theme', 'gruene') . '/js/notexpand-menublock.js');
		$vars['scripts'] = drupal_get_js(); // necessary in D7?
		
		// For disabling message-printing on PAGE displays
		//$variables['show_messages'] = FALSE;
	}

	function gruene_preprocess_node(&$variables) {
		// For printing $messages on NODE displays
    	//$variables['messages'] = theme('status_messages');
	}

	// change forms
	function gruene_form_alter(&$form, &$form_state, $form_id) {

		if ($form_id == 'search_form') {
			$form['basic']['keys']['#attributes']['placeholder'] = t('Search');
			$form['basic']['keys']['#title_display'] = 'invisible';
		}

	}
	
	function gruene_form_comment_form_alter(&$form, &$form_state) {
		unset($form['_author']);
		unset($form['actions']['preview']);
	}

	// change css
	function gruene_css_alter(&$css) {

	    unset($css[drupal_get_path('theme','tao').'/reset.css']);
	    unset($css[drupal_get_path('theme','tao').'/base.css']);
	    unset($css[drupal_get_path('theme','tao').'/drupal.css']);
	    unset($css[drupal_get_path('module','webform').'/css/webform.css']);

	}

	// customize breadcrumb
	function gruene_breadcrumb($variables) {

		$breadcrumb = $variables['breadcrumb'];

		if (!empty($breadcrumb)) {

			// remove 'home' from breadcrumb
			array_shift($breadcrumb);

			// add current page title to breadcrumb
			$title = drupal_get_title();
			$title = (strlen($title)>72) ? substr($title, 0, 72).'...' : $title;
			$breadcrumb[] = $title;

			$output = '<div class="breadcrumb">' . implode(' › ', $breadcrumb) . '</div>';

			return $output;

		}

	}

	function gruene_preprocess_search_result(&$variables) {
	  // Add node object to result, so we can display imagefield images in results.
	  $n = node_load($variables['result']['node']->nid);
	  $n && ($variables['node'] = $n);
	}

	// customize the login form
	function gruene_theme() {

		$items = array();

		$items['user_login'] = array(
			'render element' => 'form',
			'path' => drupal_get_path('theme', 'gruene') . '/templates',
			'template' => 'user-login',
			'preprocess functions' => array(
			'gruene_preprocess_user_login')
		);

		$items['user_register_form'] = array(
			'render element' => 'form',
			'path' => drupal_get_path('theme', 'gruene') . '/templates',
			'template' => 'user-register-form',
			'preprocess functions' => array(
			'gruene_preprocess_user_register_form')
		);

		$items['user_pass'] = array(
			'render element' => 'form',
			'path' => drupal_get_path('theme', 'gruene') . '/templates',
			'template' => 'user-pass',
			'preprocess functions' => array(
			'gruene_preprocess_user_pass')
		);
		
		$items['user_profile_form'] = array(
			'render element' => 'form',
			'path' => drupal_get_path('theme', 'gruene') . '/templates',
			'template' => 'user-profile-form'
		);
		
		return $items;
		
	}
	
	function gruene_preprocess_search_results(&$variables) {
		//Sort Search Results for Current Domain
		//https://api.drupal.org/api/drupal/modules%21search%21search.pages.inc/function/template_preprocess_search_results/7
		global $_domain;
		$current_domain_id = $_domain['domain_id'];
		
		$results_on_current_domain = array();
		$results_on_different_domain = array();

		foreach ($variables['results'] as $result) {
			foreach ($result['node']->domains as $domain) {
				$result_domain_id = $domain;
			}	
			if ($result_domain_id == $current_domain_id) {
				$results_on_current_domain[] = $result;
			} else {
				$results_on_different_domain[] = $result;
			}
		}

		$sorted_results = array_merge($results_on_current_domain, $results_on_different_domain);
		
		$variables['search_results'] = '';
		if (!empty($variables['module'])) {
			$variables['module'] = check_plain($variables['module']);
		}
		foreach ($sorted_results as $result) {
			$variables['search_results'] .= theme('search_result', array('result' => $result, 'module' => $variables['module']));
		}
		$variables['pager'] = theme('pager', array('tags' => NULL));
		$variables['theme_hook_suggestions'][] = 'search_results__' . $variables['module'];
	}

?>