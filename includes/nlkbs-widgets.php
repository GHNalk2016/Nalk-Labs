<?php

$wgts_hide_descriptions = get_option(NLKLBS_OPTIONS)[NLK_OPT_WGTS_AREAS_EXPAND] ?? false;
if ( $wgts_hide_descriptions ) {
	add_action('admin_head-widgets.php', function() {
		echo '<style type="text/css">
		#available-widgets .widget .widget-description { display: none; }
		</style>';
	});
}

/*
	Links: https://wordpress.stackexchange.com/questions/118684/get-a-list-of-all-widgets-registered-in-wordpress-admin-widgets-area/118688#118688, https://rogerpadilla.wordpress.com/2009/08/21/remove-empty-items-from-array/
----------------------------------------------------------------------------------------------------------------------------------------------------- */
function nlklbs_wgts_filter_list($used = false) {
	$widgets_current_used_array = array();
	$widgets_current_unused_array = array();
	$widgets = $GLOBALS['wp_widget_factory']->widgets;
	foreach($widgets as $key=>$item) {
		$widget_options = get_option($item->option_name);
		unset($widget_options['_multiwidget']);
		$widget_options = array_filter(array_map('array_filter', $widget_options));
		if ( $widget_options ) {
			$widgets_current_used_array[$key] = $item->name . ' (currently being used)';
		} else {
			$widgets_current_unused_array[$key] = $item->name;
		}
	}
	// $widgets_current_array = array_combine(array_keys($widgets), array_column($widgets, 'name'));
	$widgets_saved = get_option(NLKLBS_OPTIONS)[NLK_OPT_WGTS_FILTER_GRP][NLK_OPT_WGTS_FILTER_LIST_FULL] ?? '[]';
	$widgets_saved_array = json_decode($widgets_saved, true);
	$widgets_selected_ids = get_option(NLKLBS_OPTIONS)[NLK_OPT_WGTS_FILTER_GRP][NLK_OPT_WGTS_FILTER_LIST] ?? array();
	$widgets_selected_array = array_intersect_key($widgets_saved_array, array_flip($widgets_selected_ids));
	if ( $used ) {
		$widgets_array = array_filter($widgets_current_used_array);
	} else {
		$widgets_array = array_merge($widgets_current_unused_array, $widgets_selected_array);
	}
	return $widgets_array;
}

/*
	Links: https://premium.wpmudev.org/blog/how-to-remove-default-wordpress-widgets-and-clean-up-your-widgets-page/
------------------------------------------------------------------------------------------------ */
function nlklbs_wgts_filter() {
	$widgets = get_option(NLKLBS_OPTIONS)[NLK_OPT_WGTS_FILTER_GRP][NLK_OPT_WGTS_FILTER_LIST] ?? array();
	foreach($widgets as $item) {
		unregister_widget($item);
	}
}
add_action('widgets_init', 'nlklbs_wgts_filter', 11);

/*
	Links: https://gist.github.com/carasmo/a00eb27bdee8e83aed743e88c6f33f48, https://wordpress.stackexchange.com/questions/114716/how-to-make-the-first-widget-box-to-be-closed-instead-of-open-in-admin/114724#114724
----------------------------------------------------------------------------------------------------------------------------------------------------- */
function nlklbs_wgts_areas_expand() {
	$script = '<script type="text/javascript">';
	$script .= "jQuery(document).ready(function($) {";
	// $script .= "$('#widgets-right .sidebars-column-1 .widgets-holder-wrap:first').addClass('closed');";
	$script .= "$('#widgets-right .sidebars-column-1 .widgets-holder-wrap:eq(1)').removeClass('closed');";
	$script .= "$('#widgets-right .sidebars-column-1 .widgets-holder-wrap:eq(2)').removeClass('closed');";
	$script .= "$('#widgets-right .sidebars-column-1 .widgets-holder-wrap:eq(3)').removeClass('closed');";
	$script .= "$('#widgets-right .sidebars-column-2 .widgets-holder-wrap:eq(0)').removeClass('closed');";
	$script .= "$('#widgets-right .sidebars-column-2 .widgets-holder-wrap:eq(1)').removeClass('closed');";
	$script .= "$('#widgets-right .sidebars-column-2 .widgets-holder-wrap:eq(2)').removeClass('closed');";
	$script .= "$('#widgets-right .sidebars-column-2 .widgets-holder-wrap:eq(3)').removeClass('closed');";
	$script .= "$('#widgets-right').css('opacity', '1');";
	$script .= "});";
	$script .= '</script>';
	echo $script;
}

$areas_expand = get_option(NLKLBS_OPTIONS)[NLK_OPT_WGTS_AREAS_EXPAND] ?? false;
if ( $areas_expand ) {
	add_action('admin_footer-widgets.php', 'nlklbs_wgts_areas_expand');
	add_action('admin_head-widgets.php', function() {
		echo '<style type="text/css">
		#widgets-right { opacity: 0; transition: opacity 0.5s ease-out; }
		.no-js #widgets-right {opacity: 1; }
		</style>';
	});
}

/*
	Links: https://wordpress.org/plugins/remove-widget-titles/
----------------------------------------------------------------------------------------------------------------------------------------------------- */
function nlklbs_widget_title( $widget_title ) {
	if ( substr($widget_title, 0, 1) == '!' )
		return;
	else
		return $widget_title;
}

$titles_switch = get_option(NLKLBS_OPTIONS)[NLK_OPT_WGTS_TITLES_SWITCH] ?? false;
if ( $titles_switch )
	add_filter( 'widget_title', 'nlklbs_widget_title' );

/*
	Links: https://basicwp.com/exclude-categories-from-category-widgets-in-wordpress/
----------------------------------------------------------------------------------------------------------------------------------------------------- */
function nlklbs_widget_categories_args($args) {
	$exclude_ids = get_option(NLKLBS_OPTIONS)[NLK_OPT_WGT_CATEGORIES_MODIFY_GRP][NLK_OPT_WGT_CATEGORIES_MODIFY_EXCLUDE_IDS] ?? '';
	$args['exclude'] = $exclude_ids;
	return $args;
}

$categories_modify = get_option(NLKLBS_OPTIONS)[NLK_OPT_WGT_CATEGORIES_MODIFY_GRP][NLK_OPT_WGT_CATEGORIES_MODIFY] ?? false;
if ( $categories_modify )
	add_filter('widget_categories_args', 'nlklbs_widget_categories_args');
