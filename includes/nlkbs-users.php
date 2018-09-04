<?php

/*
	Links: https://rudrastyh.com/wordpress/get-user-id.html, https://code.tutsplus.com/articles/quick-tip-make-your-custom-column-sortable--wp-25095
----------------------------------------------------------------------------------------------------------------------------------------------------- */
function nlklbs_manage_users_columns($columns) {
	$columns['reveal_id'] = 'ID';
	return $columns;
}

function nlklbs_manage_users_custom_column($value, $column_name, $reveal_id) {
	if ( 'reveal_id' == $column_name )
		return $reveal_id;

	return $value;
}

/*
	Links: https://www.tipsandtricks-hq.com/adding-a-custom-column-to-the-users-table-in-wordpress-7378
----------------------------------------------------------------------------------------------------------------------------------------------------- */
function nlklbs_usrs_id_column_custom_css() {
	echo '
<style type="text/css">
	.column-reveal_id { width: 30px; }
</style>
';
}

$id_column = get_option(NLKLBS_OPTIONS)[NLK_OPT_USRS_ID_COLUMN] ?? false;
if ( $id_column ) {
	add_filter('manage_users_columns', 'nlklbs_manage_users_columns');
	add_action('manage_users_custom_column', 'nlklbs_manage_users_custom_column', 10, 3);
	add_action('admin_head', 'nlklbs_usrs_id_column_custom_css');
}
