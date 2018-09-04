<?php

/*
	Shortcode: nlk_site_email
----------------------------------------------------------------------------------------------------------------------------------------------------- */

$site_email = get_option(NLKLBS_OPTIONS)[NLK_OPT_SC_SITE_EMAIL] ?? false;
if ( $site_email )
	echo get_bloginfo('admin_email');
