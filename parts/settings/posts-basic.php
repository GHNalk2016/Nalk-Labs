<?php

/*
	Title: Basic
	Order: 10
	Tab: Posts
	Sub Tab: Basic
	Setting: nalk-labs-settings
	Flow: Nalk-Labs Workflow
----------------------------------------------------------------------------------------------------------------------------------------------------- */

piklist('field', array(
	'type' => 'group',
	'field' => NLK_OPT_PSTS_META_BOXES_REARRANGE_GRP,
	'label' => '<span class="nlk-finished">Rearrange meta boxes:</span>',
	'help' => '',
	'description' => '',
	'fields' => array(
		array(
			'type' => 'checkbox',
			'field' => NLK_OPT_PSTS_META_BOXES_REARRANGE,
			'label' => 'Meta boxes to be rearranged,',
			'choices' => nlklbs_psts_meta_boxes_rearrange_list(),
			'attributes' => array(
				'class' => 'nlk-choices-multiple',
			),
		),
		// nlklbs_spacing_px(12),
		nlklbs_spacing_px(5),
	),
));
