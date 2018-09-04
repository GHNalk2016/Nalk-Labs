<?php

/*
	Links: https://wordpress.stackexchange.com/questions/136058/how-to-remove-admin-menu-pages-inserted-by-plugins/160523#160523
--------------------------------------------------------------------------------------------------- */

const NLK_ADMIN_MENUS_SELECTED_LIST = array(
	'index.php',
	'separator1',
	'edit.php',
	'upload.php',
	'edit.php?post_type=page',
	'edit-comments.php',
	'separator2',
	// 'themes.php',
	'plugins.php',
	'users.php',
	// 'tools.php',
	'options-general.php',
	'separator-last',

	// 'jetpack',
	// 'edit.php?post_type=content_block',
	// 'wpseo_dashboard',

	true
);

const NLK_ADMIN_SUBMENUS_SELECTED_ARRAY = array(
	'index.php' => [
		'index.php',
		'update-core.php',
		true],
	// // 'edit.php' => [
		// // 'edit.php',
		// // 'post-new.php',
		// // 'edit-tags.php?taxonomy=category',
		// // 'edit-tags.php?taxonomy=post_tag',
		// // true],
	// 'upload.php' => [
		// 'upload.php',
		// 'media-new.php',
		// true],
	// 'edit.php?post_type=page' => [
		// true],
	// 'edit-comments.php' => [
		// 'edit-comments.php',
		// true],
	// 'themes.php' => [
		// true],
	// 'plugins.php' => [
		// true],
	// 'users.php' => [
		// true],
	// 'tools.php' => [
		// true],
	// 'options-general.php' => [
		// 'options-general.php',
		// 'options-writing.php',
		// 'options-reading.php',
		// 'options-discussion.php',
		// 'options-media.php',
		// 'options-permalink.php',
		// 'separator_1',
		// 'sharing',
		// true],
);

function nlklbs_mns_filter() {
	global $current_user;

	if ( in_array($current_user->ID, array(NLK_SITE_ADMIN_MAIN, NLK_SITE_ADMIN_OWNER)) ) return;

	// Remove main menu
	$main_menus_selected_list = NLK_ADMIN_MENUS_SELECTED_LIST;
	$main_menu = $GLOBALS['menu'];
	if ( isset($main_menu) ) {
		$keepMenus = end($main_menus_selected_list);
		foreach ($main_menu as $k => $main_menu_array) {
			$isSelectedMenu = in_array($main_menu_array[2], $main_menus_selected_list, true);
			if ( $isSelectedMenu != $keepMenus ) {
				remove_menu_page($main_menu_array[2]);
			} else {

				// Remove submenu
				if ( array_key_exists($main_menu_array[2], NLK_ADMIN_SUBMENUS_SELECTED_ARRAY) ) {
					$submenus_selected_list = NLK_ADMIN_SUBMENUS_SELECTED_ARRAY[$main_menu_array[2]];
					$submenu = $GLOBALS['submenu'][$main_menu_array[2]];
					if ( isset($submenus_selected_list) && isset($submenu) ) {
						$keepSubmenus = end($submenus_selected_list);
						foreach ($submenu as $k => $submenu_array) {
							$isSelectedSubMenu = in_array($submenu_array[2], $submenus_selected_list, true);
							if ( $isSelectedSubMenu != $keepSubmenus )
								remove_submenu_page($main_menu_array[2], $submenu_array[2]);
						}
					}
				}
			}
		}
	}
}

$mns_filter = get_option(NLKLBS_OPTIONS)[NLK_OPT_MNS_FILTER] ?? false;
if ( $mns_filter )
	add_action('admin_init',  'nlklbs_mns_filter');

/*
	Links: https://davidwalsh.name/add-submenu-wordpress-admin-bar, https://www.easywebdesigntutorials.com/adding-links-in-the-top-admin-toolbar-menu/
------------------------------------------------------------------------------------------------ */
function nlklbs_mns_admin_bar_special() {
	global $wp_admin_bar, $current_user;
	if ( in_array($current_user->ID, array(NLK_SITE_ADMIN_MAIN, NLK_SITE_ADMIN_OWNER)) ) {
		$menu_id = 'nlk';
		$wp_admin_bar->add_menu(array('id' => $menu_id, 'title' => __('NLK'), 'href' => '/'));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Tools - Code Snippets'), 'id' => 'nlk-tools-code-snippets', 'href' => '/wp-admin/admin.php?page=snippets&orderby=name&order=asc'));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Tools - Custom CSS'), 'id' => 'nlk-tools-custom-css', 'href' => '/wp-admin/admin.php?page=edit-snippet&id=32'));
		
		//$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Tools - Shortcodes, Actions and Filters'), 'id' => 'nlk-tools-ShortcodesActionsFilters', 'href' => '/wp-admin/tools.php?page=ShortcodesActionsFilters&orderby=name&order=asc'));
		//$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Tools - Widget Importer & Exporter'), 'id' => 'nlk-tools-widget-importer-exporter', 'href' => '/wp-admin/tools.php?page=widget-importer-exporter'));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Tools - Import/Export Widgets'), 'id' => 'nlk-tools-import-export-widgets', 'href' => '/wp-admin/tools.php?page=widgetopts_migrator_settings'));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Tools - Jetpack Modules'), 'id' => 'nlk-tools-jetpack_modules', 'href' => '/wp-admin/admin.php?page=jetpack_modules'));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Tools - Optimize Database'), 'id' => 'nlk-tools-optimize-database', 'href' => '/wp-admin/tools.php?page=rvg-optimize-database&action=run'));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Tools - ARI Adminer'), 'id' => 'nlk-tools-ari-adminer', 'href' => '/wp-admin/admin.php?page=ari-adminer-run-adminer&action=run&noheader=1'));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Tools - Plugins: Active'), 'id' => 'nlk-tools-plugin-active', 'href' => '/wp-admin/plugins.php?plugin_status=active'));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Tools - Plugins: Inactive'), 'id' => 'nlk-tools-plugin-inactive', 'href' => '/wp-admin/plugins.php?plugin_status=inactive'));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Posts - Drafts'), 'id' => 'nlk-posts-drafts', 'href' => 'edit.php?post_status=draft&post_type=post'));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Posts - Private'), 'id' => 'nlk-posts-private', 'href' => 'edit.php?post_status=private&post_type=post'));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Pages (View) - DEBUG'), 'id' => 'nlk-pages-debug', 'href' => '/_debug', 'meta' => array('target' => '_blank')));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Pages (View) - About Us'), 'id' => 'nlk-pages-about-us', 'href' => '/about-us', 'meta' => array('target' => '_blank')));
		
		$cpanel_path = 'https://secure169.sgcpanel.com:2083/cpsess5974508365';
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('cPanel - Account Statistics'), 'id' => 'nlk-external-account-statistics', 'href' => $cpanel_path . '/frontend/Crystal/sg_cpustats/', 'meta' => array('target' => '_blank')));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('cPanel - Cloudflare'), 'id' => 'nlk-cpanel-cloudflare', 'href' => $cpanel_path . '/frontend/Crystal/cf/index.html', 'meta' => array('target' => '_blank')));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('cPanel - File Manager'), 'id' => 'nlk-cpanel-filemanager', 'href' => $cpanel_path . '/frontend/Crystal/filemanager/index.html?showhidden=1&dir=/public_html', 'meta' => array('target' => '_blank')));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('cPanel - phpMyAdmin'), 'id' => 'nlk-cpanel-phpmyadmin', 'href' => $cpanel_path . '/3rdparty/phpMyAdmin/index.php', 'meta' => array('target' => '_blank')));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('cPanel - SuperCacher'), 'id' => 'nlk-cpanel-supercacher', 'href' => $cpanel_path . '/frontend/Crystal/SGCache/', 'meta' => array('target' => '_blank')));
		
		$hosting_support_path = 'https://ua.siteground.com/support';
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Hosting Support - Index'), 'id' => 'nlk-hosting-support-index', 'href' => $hosting_support_path . '/index.htm', 'meta' => array('target' => '_blank')));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Hosting Support - Wordpress'), 'id' => 'nlk-hosting-support-wordpress', 'href' => $hosting_support_path . '/post_wordpress_issue.htm', 'meta' => array('target' => '_blank')));
		$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Hosting Support - Ticket 2560938'), 'id' => 'nlk-hosting-support-ticket-2560938', 'href' => $hosting_support_path . '/ticket/2560938.htm', 'meta' => array('target' => '_blank')));
	}
}

$mns_admin_bar_special = get_option(NLKLBS_OPTIONS)[NLK_OPT_MNS_ADMIN_BAR_SPECIAL] ?? false;
if ( $mns_admin_bar_special )
	add_action('admin_bar_menu', 'nlklbs_mns_admin_bar_special', 2000);

/*
	From Admin Tweaks plugin
	Links: https://wordpress.stackexchange.com/questions/2331/sort-admin-menu-items/78640#78640
----------------------------------------------------------------------------------------------------------------------------------------------------- */
function nlklbs_mns_settings_sort() {
	global $submenu;
	if( !isset($submenu['options-general.php']) )
		return;

	// Sort default items
	$default = array_slice($submenu['options-general.php'], 0, 6, true);
	//usort($default, 'sort_arra_asc_so_1597736');

	// Sort rest of items
	$length = count($submenu['options-general.php']);
	$extra = array_slice($submenu['options-general.php'], 6, $length, true);
	usort($extra, 'sort_arra_asc_so_1597736');

	// Apply
	$sep = array(array('<span style="opacity: 0.3;">· · · · · · · · · · · · · · ·</span>', 'manage_options', '#'));
	$submenu['options-general.php'] = array_merge($default, $sep, $extra);
}

function sort_arra_asc_so_1597736($item1, $item2) {
	if ( $item1[0] == $item2[0] ) return 0;
	return ( $item1[0] > $item2[0] ) ? 1 : -1;
}

$mns_settings_sort = get_option(NLKLBS_OPTIONS)[NLK_OPT_MNS_SETTINGS_SORT] ?? false;
if ( $mns_settings_sort )
	add_action('admin_menu', 'nlklbs_mns_settings_sort', 999);

/*
	Links: https://wordpress.stackexchange.com/questions/81939/how-to-order-posts-of-a-custom-post-type-by-date-desc-in-dashboard-admin/125889#125889
----------------------------------------------------------------------------------------------------------------------------------------------------- */
function nlklbs_cmn_listing_custom_order($wp_query) {
	if ( is_admin() && !isset($_GET['orderby']) ) {
		// Get the post type from the query
		$post_type = $wp_query->query['post_type'];
		if ( in_array($post_type, array('page')) ) {
			// $wp_query->set('orderby', 'menu_order');
			// $wp_query->set('order', 'ASC');
		} elseif ( in_array($post_type, array('content_block')) ) {
			$wp_query->set('orderby', 'title');
			$wp_query->set('order', 'ASC');
		}
	}
}

$cmn_listing_custom_order = get_option(NLKLBS_OPTIONS)[NLK_OPT_CMN_LISTING_CUSTOM_ORDER] ?? false;
if ( $cmn_listing_custom_order )
	add_filter('pre_get_posts', 'nlklbs_cmn_listing_custom_order');
