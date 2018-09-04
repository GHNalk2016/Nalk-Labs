<?php

/*
	Title: Listings
	Order: 20
	Tab: Common
	Sub Tab: Basic
	Setting: nalk-labs-settings
	Flow: Nalk-Labs Workflow
----------------------------------------------------------------------------------------------------------------------------------------------------- */

piklist('field', array(
	'type' => 'checkbox',
	'field' => NLK_OPT_CMN_LISTING_CUSTOM_ORDER,
	'label' => '<span class="nlk-focused">Change the order of listing page items:</span>',
	'help' => '',
	'description' => '',
	'choices' => array(
		'first' => '',
	),
	'attributes' => array(
		'class' => 'nlk-choices-single',
	),
));
