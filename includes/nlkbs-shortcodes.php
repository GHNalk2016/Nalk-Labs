<?php

function nlklbs_auto_copyright($year = 'auto') {
	if (intval($year) == 'auto') { return date('Y'); }
	if (intval($year) == date('Y')) { return intval($year); }
	if (intval($year) < date('Y')) { return intval($year) . ' - ' . date('Y'); }
	if (intval($year) > date('Y')) { return date('Y'); }
}
