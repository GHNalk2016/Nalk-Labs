<?php

/*
	Shortcode: nlk_site_debug
----------------------------------------------------------------------------------------------------------------------------------------------------- */

$array0 = array();
$array1 = array();

// $out0 = get_option(NLKLBS_OPTIONS);

// $out0 = get_option('widget_pages');
// $out1 = get_option('widget_text');
// unset($out1['_multiwidget']);
// $array = array_filter(array_map('array_filter', $out1));


$ui_quick_edit_links = get_option(NLKLBS_OPTIONS)[NLK_OPT_PGNS_UI_GRP][NLK_OPT_PGNS_UI_QUICK_EDIT_LINKS] ?? '';

// var_dump($widgets_current_used_array);
echo '<p>---------------------------------------------------------------------------------------------------</p>';
// var_dump(get_plugins());
echo '<p>---------------------------------------------------------------------------------------------------</p>';
var_dump($ui_quick_edit_links);
