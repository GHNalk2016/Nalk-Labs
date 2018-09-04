<?php

/*
	Title: Basic
	Order: 10
	Tab: Users
	Sub Tab: Basic
	Setting: nalk-labs-settings
	Flow: Nalk-Labs Workflow
----------------------------------------------------------------------------------------------------------------------------------------------------- */

piklist('field', array(
	'type' => 'checkbox',
	'field' => NLK_OPT_USRS_ID_COLUMN,
	'label' => '<span class="nlk-finished">Users listing - ID column:</span>',
	'help' => 'Add an ID column to the users list.',
	'choices' => array(
		'first' => '',
	),
	'attributes' => array(
		'class' => 'nlk-choices-single',
	),
));
