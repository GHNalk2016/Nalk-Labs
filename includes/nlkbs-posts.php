<?php

/*
	From Admin Tweaks plugin
----------------------------------------------------------------------------------------------------------------------------------------------------- */
function nlklbs_psts_meta_boxes_remove() {
	$meta_boxes = get_option(NLKLBS_OPTIONS)[NLK_OPT_PSTS_META_BOXES_REARRANGE_GRP][NLK_OPT_PSTS_META_BOXES_REARRANGE] ?? array();
	foreach ( get_post_types( '', 'names' ) as $post_type ) {
		if ( in_array($post_type . '-author', $meta_boxes) )
			remove_meta_box( 'authordiv', $post_type, 'normal' );
		if ( in_array($post_type . '-discussion', $meta_boxes) )
			remove_meta_box( 'commentstatusdiv', $post_type, 'normal' );
		if ( in_array($post_type . '-slug', $meta_boxes) )
			remove_meta_box( 'slugdiv', $post_type, 'normal' );
	}
}

function nlklbs_submitbox_misc_actions() {
	global $post;
	$post_type = $post->post_type;
	$meta_box = false;
	$meta_boxes = get_option(NLKLBS_OPTIONS)[NLK_OPT_PSTS_META_BOXES_REARRANGE_GRP][NLK_OPT_PSTS_META_BOXES_REARRANGE] ?? array();
	$meta_box_custom_css = '';
	if ( in_array($post_type . '-author', $meta_boxes) ) {
		echo '<div id="authordiv" class="misc-pub-section" style="padding: 5px 12px 0;">Author: ';
		post_author_meta_box( $post );
		echo '</div>';
		$meta_box = true;
	}
	if ( in_array($post_type . '-discussion', $meta_boxes) ) {
		echo '<div id="commentstatusdiv" class="misc-pub-section nlkbs" style="padding: 0 12px;">';
		post_comment_status_meta_box( $post );
		echo '</div>';
		$meta_box = true;
		// $meta_box_custom_css .= '#commentstatusdiv .meta-options { margin: 0.5em 0; }';
	}
	if ( in_array($post_type . '-slug', $meta_boxes) ) {
		echo '<div id="slugdiv" class="misc-pub-section nlkbs" style="padding: 5px 15px 0 12px;">' . get_post_type_object($post->post_type)->labels->singular_name. ' slug: ';
		post_slug_meta_box( $post );
		echo '</div>';
		$meta_box = true;
		// $meta_box_custom_css .= '#slugdiv #post_name { margin-top: 5px; width: 100%; }';
	}
	if ($meta_box)
		echo '<div style="margin-bottom: 15px;"></div>';
}

function nlklbs_psts_meta_boxes_rearrange_list() {
	$choices = array();
	foreach ( get_post_types( '', 'names' ) as $post_type ) {
		if ( (post_type_supports($post_type, 'author') && post_type_supports($post_type, 'editor')) || $post_type == 'attachment' ) {
			$choices[$post_type . '-author'] = get_post_type_object($post_type)->labels->singular_name . ' - Author';
			$choices[$post_type . '-slug'] = get_post_type_object($post_type)->labels->singular_name . ' - Slug';
		}
		if ( post_type_supports($post_type, 'comments') )
			$choices[$post_type . '-discussion'] = get_post_type_object($post_type)->labels->singular_name . ' - Discussion';
	}
	return $choices;
}

add_action('admin_menu', 'nlklbs_psts_meta_boxes_remove');
add_action('post_submitbox_misc_actions', 'nlklbs_submitbox_misc_actions');
add_action('attachment_submitbox_misc_actions', 'nlklbs_submitbox_misc_actions', 999);
