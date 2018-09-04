<?php

/*
	Shortcode: nlk_site_url
	Links: http://wpsnacks.com/wordpress-code-snippets/how-to-create-a-shortcode-to-display-the-wordpress-site-url/
----------------------------------------------------------------------------------------------------------------------------------------------------- */

$site_url = get_option(NLKLBS_OPTIONS)[NLK_OPT_SC_SITE_URL] ?? false;
if ( $site_url )
	echo get_bloginfo('url');
