<?php

/*
	Title: Menus
	Order: 10
	Tab: Common
	Sub Tab: Basic
	Setting: nalk-labs-settings
	Flow: Nalk-Labs Workflow
----------------------------------------------------------------------------------------------------------------------------------------------------- */

piklist('field', array(
	'type' => 'checkbox',
	'field' => NLK_OPT_MNS_ADMIN_BAR_SPECIAL,
	'label' => '<span class="nlk-unfinished">Admin bar special menu:</span>',
	'help' => '',
	'description' => '',
	'choices' => array(
		'first' => '',
	),
	'attributes' => array(
		'class' => 'nlk-choices-single',
	),
));

piklist('field', array(
	'type' => 'checkbox',
	'field' => NLK_OPT_MNS_FILTER,
	'label' => '<span class="nlk-focused">Admin menu filter:</span>',
	'help' => '',
	'description' => '',
	'choices' => array(
		'first' => '',
	),
	'attributes' => array(
		'class' => 'nlk-choices-single',
	),
));

piklist('field', array(
	'type' => 'checkbox',
	'field' => NLK_OPT_MNS_SETTINGS_SORT,
	'label' => '<span class="nlk-finished">Sort settings menu items:</span>',
	'help' => '',
	'description' => '',
	'choices' => array(
		'first' => '',
	),
	'attributes' => array(
		'class' => 'nlk-choices-single',
	),
));
