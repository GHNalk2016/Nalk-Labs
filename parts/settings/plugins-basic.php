<?php

/*
	Title: Basic
	Order: 10
	Tab: Plugins
	Sub Tab: Basic
	Setting: nalk-labs-settings
	Flow: Nalk-Labs Workflow
----------------------------------------------------------------------------------------------------------------------------------------------------- */

piklist('field', array(
	'type' => 'group',
	'field' => NLK_OPT_PGNS_UI_GRP,
	'label' => '<span class="nlk-finished">UI customizations:</span>',
	'help' => '',
	'description' => '',
	'fields' => array(
		array(
			'type' => 'select',
			'field' => NLK_OPT_PGNS_UI_QUICK_EDIT_LINKS,
			'label' => 'Quick edit links style:',
			'help' => '',
			'choices' => array(
				'default' => 'Default',
				'compact' => 'Compact',
				'hide' => 'Hide',
			),
			'attributes' => array(
				'class' => '',
			),
		),
		nlklbs_spacing_px(5),
		array(
			'type' => 'checkbox',
			'field' => NLK_OPT_PGNS_UI_HIDE_DESCRIPTIONS,
			'list' => false,
			'label_position' => 'after',
			'label' => 'Hide descriptions',
			'help' => '',
			'choices' => array(
				'first' => '',
			),
			'attributes' => array(
				'class' => 'nlk-choices-single',
			),
		),
		nlklbs_spacing_px(5),
	),
));

piklist('field', array(
	'type' => 'checkbox',
	'field' => NLK_OPT_PGNS_INACTIVE_HIGHLIGHT,
	'label' => '<span class="nlk-finished">Inactive highlight:</span>',
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
	'field' => NLK_OPT_PGNS_CATEGORIZE_GRP,
	'label' => '<span class="nlk-finished">Extra color coding:</span>',
	'help' => '',
	'fields' => nlklbs_pgns_categorize_list(),
));

piklist('field', array(
	'type' => 'checkbox',
	'field' => NLK_OPT_PGNS_JP_MODULES_WHITELIST,
	'label' => '<span class="nlk-unfinished">JetPack modules whitelist:</span>',
	'help' => '',
	'choices' => array(
		'first' => '',
	),
	'attributes' => array(
		'class' => 'nlk-choices-single',
	),
));
