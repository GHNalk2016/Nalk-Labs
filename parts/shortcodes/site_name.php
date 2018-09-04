<?php

/*
	Shortcode: nlk_site_name
----------------------------------------------------------------------------------------------------------------------------------------------------- */

$site_name = get_option(NLKLBS_OPTIONS)[NLK_OPT_SC_SITE_NAME] ?? false;
if ( $site_name )
	echo get_bloginfo('name');
