<?php

/*
	Title: Basic
	Order: 10
	Tab: Widgets
	Sub Tab: Basic
	Setting: nalk-labs-settings
	Flow: Nalk-Labs Workflow
----------------------------------------------------------------------------------------------------------------------------------------------------- */

//http://usabilitypost.com/2011/04/19/pure-css-slideout-interface/
//https://www.w3.org/Style/Examples/007/menus
//https://www.w3.org/Style/Examples/007/sliding
//https://codepen.io/callis/pen/azwLYj
piklist('field', array(
	'type' => 'submit',
	'field' => 'submit_save_settings',
	'value' => 'Save Settings',
	'attributes' => array(
		'class' => '',
		'style' => 'position: fixed; top: 200px; right: 0;',
	),
));

piklist('field', array(
	'type' => 'checkbox',
	'field' => NLK_OPT_WGTS_HIDE_DESCRIPTIONS,
	'label' => '<span class="nlk-finished">Hide descriptions:</span>',
	'help' => '',
	'choices' => array(
		'first' => '',
	),
	'attributes' => array(
		'class' => 'nlk-choices-single',
	),
));

piklist('field', array(
	'type' => 'group',
	'field' => NLK_OPT_WGTS_FILTER_GRP,
	'label' => '<span class="nlk-finished">Remove unused:</span>',
	'help' => '',
	'description' => '',
	'fields' => array(
		array(
			'type' => 'hidden',
			'field' => NLK_OPT_WGTS_FILTER_LIST_FULL,
			'value' => json_encode(nlklbs_wgts_filter_list()),
		),
		array(
			'type' => 'checkbox',
			'label' => 'Listed below are all the widgets in your site including the ones currently being selected to remove (unregister),',
			'field' => NLK_OPT_WGTS_FILTER_LIST,
			'choices' => nlklbs_wgts_filter_list(),
			'attributes' => array(
				'class' => 'nlk-choices-multiple',
			),
		),
		nlklbs_spacing_px(3),
		array(
			'type' => 'checkbox',
			'field' => NLK_OPT_WGTS_FILTER_LIST_USED,
			'choices' => nlklbs_wgts_filter_list(true),
			'attributes' => array(
				'disabled' => 'disabled',
				'class' => 'nlk-choices-multiple',
			),
		),
		nlklbs_spacing_px(12),
	),
));

piklist('field', array(
	'type' => 'checkbox',
	'field' => NLK_OPT_WGTS_AREAS_EXPAND,
	'label' => '<span class="nlk-finished">Expand areas:</span>',
	'help' => 'Expand all the widget areas by default.',
	'choices' => array(
		'first' => '',
	),
	'attributes' => array(
		'class' => 'nlk-choices-single',
	),
));

piklist('field', array(
	'type' => 'checkbox',
	'field' => NLK_OPT_WGTS_TITLES_SWITCH,
	'label' => '<span class="nlk-finished">Remove titles, selectively:</span>',
	'help' => 'Remove the widget title, but only if the first character is "!"',
	'choices' => array(
		'first' => '',
	),
	'attributes' => array(
		'class' => 'nlk-choices-single',
	),
));

piklist('field', array(
	'type' => 'group',
	'field' => NLK_OPT_WGT_CATEGORIES_MODIFY_GRP,
	'label' => '<span class="nlk-finished">Modify category widget:</span>',
	'description' => '',
	'help' => 'Modifies the default category widget.',
	'fields' => array(
		array(
			'type' => 'checkbox',
			'field' => NLK_OPT_WGT_CATEGORIES_MODIFY,
			'choices' => array(
				'first' => '',
			),
			'attributes' => array(
				'class' => 'nlk-choices-single',
			),
		),
		nlklbs_spacing_px(5),
		array(
			'type' => 'text',
			'field' => NLK_OPT_WGT_CATEGORIES_MODIFY_EXCLUDE_IDS,
			'label' => 'Categories to be excluded:',
			'attributes' => array(
				'placeholder' => 'An array of category IDs (eg. 1, 4, 7, etc.)',
				'style' => 'width: 320px;',
			),
		),
	)
));
