<?php

/*
----------------------------------------------------------------------------------------------------------------------------------------------------- */
function nlklbs_pgns_categorize() {
	$custom_css = '';
	$ui_quick_edit_links = get_option(NLKLBS_OPTIONS)[NLK_OPT_PGNS_UI_GRP][NLK_OPT_PGNS_UI_QUICK_EDIT_LINKS] ?? '';
	switch ( $ui_quick_edit_links ) {
	case 'compact';
		$custom_css .= '.wp-list-table.plugins .plugin-title { /* white-space: normal; */ }
	.wp-list-table.plugins .plugin-title strong, .wp-list-table.plugins .row-actions, .wp-list-table.plugins .row-actions * { display: inline; }
	.wp-list-table.plugins .row-actions::before { content: "   -   "; white-space: pre; }
	.wp-list-table.plugins .row-actions::after { /* content: "   ]"; white-space: pre; */ }
	';
		break;
	case 'hide';
		$custom_css .= '.wp-list-table.plugins .row-actions { display: none; }
	';
		break;
	}
	$ui_hide_descriptions = get_option(NLKLBS_OPTIONS)[NLK_OPT_PGNS_UI_GRP][NLK_OPT_PGNS_UI_HIDE_DESCRIPTIONS] ?? false;
	if ( $ui_hide_descriptions )
		$custom_css .= '.wp-list-table.plugins .plugin-description { display: none; }
	';
	$inactive_highlight = get_option(NLKLBS_OPTIONS)[NLK_OPT_PGNS_INACTIVE_HIGHLIGHT] ?? false;
	if ( $inactive_highlight )
		$custom_css .= '.wp-list-table.plugins tr.inactive td { background-color: #dd9933 !important; }
	';
	$categorize_list = get_option(NLKLBS_OPTIONS)[NLK_OPT_PGNS_CATEGORIZE_GRP] ?? array();
	$first_tool_plugins = true;
	$first_important_plugins = true;
	$first_reserved_plugins = true;
	$custom_css_tool_plugins = '';
	$custom_css_important_plugins = '';
	$custom_css_reserved_plugins = '';
	foreach($categorize_list as $key=>$item) {
		if ( isset($item[0]) ) {
			switch ( $item[0] ) {
			case 'tool';
				if (!$first_tool_plugins) $custom_css_tool_plugins .= ", ";
				$custom_css_tool_plugins .= '.wp-list-table.plugins [data-plugin^="' . $key . '"]';
				$first_tool_plugins = false;
				break;
			case 'important';
				if (!$first_important_plugins) $custom_css_important_plugins .= ", ";
				$custom_css_important_plugins .= '.wp-list-table.plugins [data-plugin^="' . $key . '"]';
				$first_important_plugins = false;
				break;
			case 'reserved';
				if (!$first_reserved_plugins) $custom_css_reserved_plugins .= ", ";
				$custom_css_reserved_plugins .= '.wp-list-table.plugins [data-plugin^="' . $key . '"]';
				$first_reserved_plugins = false;
				break;
			}
		}
	}
	if ( !$first_tool_plugins || !$first_important_plugins || !$first_reserved_plugins ) {
		// First, clear the background color of active plugins.
		$custom_css .= '.wp-list-table.plugins tr.active th, .wp-list-table.plugins tr.active td { background-color: rgba(255, 255, 255, 0); }
	' . $custom_css_tool_plugins . ' { background-color: #eeee22 !important; }
	' . $custom_css_important_plugins . ' { background-color: #81d742 !important; }
	' . $custom_css_reserved_plugins . ' { background-color: #c6eff3 !important; }';
	}
	global $pagenow;
	if ( $pagenow == 'plugins.php' ) {
		echo '<style type="text/css">
	' . $custom_css . '
</style>';
	}
}

//https://stackoverflow.com/questions/20488264/how-do-i-get-activated-plugin-list-in-wordpress-plugin-development/20489708#20489708
//Down Arrow with Tip Right: &#8627; Right Triple Arrow: &#8667; Black Right Arrowhead: &#10148; – | ➔
function nlklbs_pgns_categorize_list() {
	$all_plugins = get_plugins();
	$categorize_list = get_option(NLKLBS_OPTIONS)[NLK_OPT_PGNS_CATEGORIZE_GRP] ?? array();
	$plugins_list[] = array(
		'type' => 'html',
		'value' => '<strong>To remove a plugin from being colorized, please click on the it\' name.</strong>',
		'attributes' => array(
			'style' => 'margin-bottom: 7px; padding-top: 0;',
		),
	);
	$choices = array(
		'tool' => '<span class="nlk-choice nlk-tool">Tool</span> &nbsp;',
		'important' => '<span class="nlk-choice nlk-important">Important</span> &nbsp;',
		'reserved' => '<span class="nlk-choice nlk-reserved">Reserved</span>',
	);
	foreach ( $all_plugins as $item ) {
		$plugins_list[] = array(
			'type' => 'radio',
			'field' => $item['TextDomain'],
			'label' => '_&nbsp;',
			'list' => false,
			'choices' => array('normal' => '<span class="nlk-choice nlk-normal">' . $item['Name'] . '</span> &#10596; &nbsp;') + $choices,
			'attributes' => array(
				'class' => 'nlk-radio-button',
			),
		);
	}
	$plugins_list[] = nlklbs_spacing_px(12);
	return $plugins_list;
}

add_action('admin_head', 'nlklbs_pgns_categorize');

/*
	Build a whitelist of Jetpack modules to be available on a site.
	Links: https://wordpress.org/support/topic/definitive-list-of-modules-for-filtering/, https://jeremy.hu/customize-the-list-of-modules-available-in-jetpack/, https://jetpack.com/2013/10/07/do-not-automatically-activate-a-jetpack-module/
----------------------------------------------------------------------------------------------------------------------------------------------------- */
const NLK_JETPACK_MODULES_WHITELIST = array(
	'enhanced-distribution',
	'json-api',
	'lazy-images',
	//'manage',
	'monitor',
	'photon',
	'protect',
	'publicize',
	'related-posts',
	'stats',
	//'tiled-gallery',
);

const NLK_JETPACK_MODULES_AUTO_ACTIVATE_LIST = array(
	// 'enhanced-distribution',
	// 'json-api',
	// 'monitor',
	// 'photon',
	// 'protect',
	// 'publicize',
	// 'related-posts',
	// 'stats',
);

function nlklbs_jetpack_get_available_modules($modules, $min_version, $max_version) {
	$my_modules = NLK_JETPACK_MODULES_WHITELIST;
	foreach ( $modules as $name => $intro_version ) {
		if ( !in_array($name, $my_modules) ) {
			unset( $modules[$name] );
		}
	}
	return $modules;
}

// Choose which modules are activated by default
function nlklbs_jetpack_get_default_modules() {
	return NLK_JETPACK_MODULES_AUTO_ACTIVATE_LIST;
}

$pgns_jp_modules_whitelist = get_option(NLKLBS_OPTIONS)[NLK_OPT_PGNS_JP_MODULES_WHITELIST] ?? false;
if ( $pgns_jp_modules_whitelist ) {
	add_filter( 'jetpack_get_available_modules', 'nlklbs_jetpack_get_available_modules', 20, 3 );
	add_filter( 'jetpack_get_default_modules', 'nlklbs_jetpack_get_default_modules' );
}
