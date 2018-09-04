<?php

/*
	Title: Site Information
	Order: 10
	Tab: Shortcodes
	Sub Tab: Basic
	Setting: nalk-labs-settings
	Flow: Nalk-Labs Workflow
----------------------------------------------------------------------------------------------------------------------------------------------------- */

piklist('field', array(
	'type' => 'checkbox',
	'field' => NLK_OPT_SC_SITE_NAME,
	'label' => '<span class="nlk-finished">Name:</span>',
	'help' => '',
	'description' => 'Shortcode: [nlk_site_name]',
	'choices' => array(
		'first' => '',
	),
	'attributes' => array(
		'class' => 'nlk-choices-single',
	),
));

piklist('field', array(
	'type' => 'checkbox',
	'field' => NLK_OPT_SC_SITE_URL,
	'label' => '<span class="nlk-finished">URL:</span>',
	'help' => '',
	'description' => 'Shortcode: [nlk_site_url]',
	'choices' => array(
		'first' => '',
	),
	'attributes' => array(
		'class' => 'nlk-choices-single',
	),
));

piklist('field', array(
	'type' => 'checkbox',
	'field' => NLK_OPT_SC_SITE_EMAIL,
	'label' => '<span class="nlk-finished">Email:</span>',
	'help' => '',
	'description' => 'Shortcode: [nlk_site_email]',
	'choices' => array(
		'first' => '',
	),
	'attributes' => array(
		'class' => 'nlk-choices-single',
	),
));

piklist('field', array(
	'type' => 'group',
	'field' => NLK_OPT_SC_SITE_COPYRIGHT_GRP,
	'label' => '<span class="nlk-finished">Copyright:</span>',
	'help' => '',
	'description' => 'Shortcode with optional parameters: [nlk_site_copyright start_year=2015 additional_text=". All rights reserved."]',
	'fields' => array(
		array(
			'type' => 'checkbox',
			'field' => NLK_OPT_SC_SITE_COPYRIGHT,
			'label' => '',
			'choices' => array(
				'first' => '',
			),
			'attributes' => array(
				'class' => 'nlk-choices-single',
			),
		),
		nlklbs_spacing_px(5),
		array(
			'type' => 'number',
			'field' => NLK_OPT_SC_SITE_COPYRIGHT_START_YEAR,
			'label' => 'Start year:',
			// 'value' => date('Y'),
			'attributes' => array(
				'min' => 1900,
				'max' => 2100,
				'placeholder' => date('Y'),
				'style' => 'float: left; margin-right: 10px; width: 80px;',
			),
		),
		array(
			'type' => 'text',
			'field' => NLK_OPT_SC_SITE_COPYRIGHT_ADDITIONAL_TEXT,
			'label' => 'Additional text:',
			'attributes' => array(
				'placeholder' => '. All rights reserved.',
				'style' => 'width: 320px;',
			),
		),
	)
));
