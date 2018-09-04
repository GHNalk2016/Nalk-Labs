<?php

/*
 * Plugin Name: Nalk-Labs
 * Plugin URI: http://example.com/wp-plugins/nalk-labs/
 * Description: This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version: 1.0.3
 * Author: PixelNest Design
 * Author URI: http://www.pixelnest.design/
 * Plugin Type: Piklist
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: nalk-labs
 * Domain Path: /languages
 * GitHub Plugin URI: https://github.com/GHNalk2016/nalk-labs
----------------------------------------------------------------------------------------------------------------------------------------------------- */

require_once('settings.php');
require_once('functions.php');
require_once('includes/nlkbs-common.php');
require_once('includes/nlkbs-shortcodes.php');
require_once('includes/nlkbs-plugins.php');
require_once('includes/nlkbs-posts.php');
require_once('includes/nlkbs-users.php');
require_once('includes/nlkbs-widgets.php');

/*
----------------------------------------------------------------------------------------------------------------------------------------------------- */
function nlklbs_piklist_admin_pages($pages) {
	$pages[] = array(
		'page_title' => __(NLKLBS_Title),
		'menu_title' => __(NLKLBS_Title, 'piklist'),
		'sub_menu' => 'options-general.php',
		'capability' => 'manage_options',
		'menu_slug' => NLKLBS_OPTIONS,
		'setting' => NLKLBS_OPTIONS,
		'menu_icon' => plugins_url('piklist/parts/img/piklist-icon.png'),
		'page_icon' => plugins_url('piklist/parts/img/piklist-page-icon-32.png'),
		// 'single_line' => true,
		// 'default_tab' => '',
		'save_text' => 'Save Settings',
	);
	return $pages;
}
add_filter('piklist_admin_pages', 'nlklbs_piklist_admin_pages');

/*
----------------------------------------------------------------------------------------------------------------------------------------------------- */
function nlklbs_init() {
	if ( is_admin() ) {
		include_once('includes/class-piklist-checker.php');
		if ( !piklist_checker::check(__FILE__) ) {
			return;
		}
	}
}
add_action('init', 'nlklbs_init');

/*
	Links: https://wordpress.stackexchange.com/questions/110895/adding-custom-stylesheet-to-wp-admin/110899#110899
----------------------------------------------------------------------------------------------------------------------------------------------------- */
function nlklbs_admin_enqueue_scripts() {
	wp_enqueue_style('nlklbs-styles-admin', plugin_dir_url(__FILE__) . 'css/admin.css', '', nlklbs_styles_version());
	wp_enqueue_style( 'nlklbs-styles-fields', plugin_dir_url(__FILE__) . 'css/fields.css', '', nlklbs_styles_version() );
	wp_enqueue_style( 'nlklbs-styles-testing', plugin_dir_url(__FILE__) . 'css/testing.css', '', nlklbs_styles_version() );
}

/*
	Links: http://wpengineer.com/2292/force-reload-of-scripts-and-stylesheets-in-your-plugin-or-theme/
--------------------------------------------------------------------------------------------------- */
function nlklbs_styles_version( $caching = true ) {
	if ( !WP_DEBUG ) return NLKLBS_STYLES_VERSION;
	return time();
}

add_action('admin_enqueue_scripts', 'nlklbs_admin_enqueue_scripts');

/*
----------------------------------------------------------------------------------------------------------------------------------------------------- */
function nlklbs_spacing_px( $size = 0 ) {
	if ( $size !== 0 )
		$size .= 'px';
	$spacing_block = array(
		'type' => 'html',
		// 'value' => '',
		'attributes' => array(
			// 'class' => '',
			'style' => 'margin: 0; padding: ' . $size . ';',
		),
	);
	return $spacing_block;
}
