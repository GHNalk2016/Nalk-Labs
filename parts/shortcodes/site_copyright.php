<?php

/*
	Shortcode: nlk_site_copyright
----------------------------------------------------------------------------------------------------------------------------------------------------- */

$site_copyright = get_option(NLKLBS_OPTIONS)[NLK_OPT_SC_SITE_COPYRIGHT_GRP][NLK_OPT_SC_SITE_COPYRIGHT] ?? false;
if ( $site_copyright ) {
	$start_year = $arguments['start_year'] ?? get_option(NLKLBS_OPTIONS)[NLK_OPT_SC_SITE_COPYRIGHT_GRP][NLK_OPT_SC_SITE_COPYRIGHT_START_YEAR] ?? '';
	$additonal_text = $arguments['additional_text'] ?? get_option(NLKLBS_OPTIONS)[NLK_OPT_SC_SITE_COPYRIGHT_GRP][NLK_OPT_SC_SITE_COPYRIGHT_ADDITIONAL_TEXT] ?? '';
	echo '&copy; ' . nlklbs_auto_copyright($start_year) . ' ' . get_bloginfo('name') . $additonal_text;
}
