<?php

/*
	Links: https://wordpress.stackexchange.com/questions/55505/can-i-leave-out-if-defined-when-defining-plugin-constants/55507#55507, https://wordpress.stackexchange.com/questions/157505/override-constants-in-child-theme/157506#157506
----------------------------------------------------------------------------------------------------------------------------------------------------- */
defined('NLK_SITE_ADMIN_MAIN') or define('NLK_SITE_ADMIN_MAIN', 1); // User IDs start from 1
defined('NLK_SITE_ADMIN_OWNER') or define('NLK_SITE_ADMIN_OWNER', 0);

/*
----------------------------------------------------------------------------------------------------------------------------------------------------- */
defined('NLKLBS_Title') or define('NLKLBS_Title', 'Nalk-Labs');
defined('NLKLBS_Slug') or define('NLKLBS_Slug', strtolower(NLKLBS_Title));
defined('NLKLBS_OPTIONS') or define('NLKLBS_OPTIONS', NLKLBS_Slug . '-settings');
defined('NLKLBS_STYLES_VERSION') or define('NLKLBS_STYLES_VERSION', 1.0);

/*
----------------------------------------------------------------------------------------------------------------------------------------------------- */
defined('NLK_OPT_CMN_LISTING_CUSTOM_ORDER') or define('NLK_OPT_CMN_LISTING_CUSTOM_ORDER', 'chk_cmn_listing_custom_order');

/*
----------------------------------------------------------------------------------------------------------------------------------------------------- */
defined('NLK_OPT_MNS_ADMIN_BAR_SPECIAL') or define('NLK_OPT_MNS_ADMIN_BAR_SPECIAL', 'chk_mns_admin_bar_special');
defined('NLK_OPT_MNS_FILTER') or define('NLK_OPT_MNS_FILTER', 'chk_mns_filter');
defined('NLK_OPT_MNS_SETTINGS_SORT') or define('NLK_OPT_MNS_SETTINGS_SORT', 'chk_mns_settings_sort');

/*
----------------------------------------------------------------------------------------------------------------------------------------------------- */
defined('NLK_OPT_SC_SITE_NAME') or define('NLK_OPT_SC_SITE_NAME', 'chk_sc_site_name');
defined('NLK_OPT_SC_SITE_URL') or define('NLK_OPT_SC_SITE_URL', 'chk_sc_site_url');
defined('NLK_OPT_SC_SITE_EMAIL') or define('NLK_OPT_SC_SITE_EMAIL', 'chk_sc_site_email');

defined('NLK_OPT_SC_SITE_COPYRIGHT_GRP') or define('NLK_OPT_SC_SITE_COPYRIGHT_GRP', 'grp_sc_site_copyright');
defined('NLK_OPT_SC_SITE_COPYRIGHT') or define('NLK_OPT_SC_SITE_COPYRIGHT', 'chk_sc_site_copyright');
defined('NLK_OPT_SC_SITE_COPYRIGHT_START_YEAR') or define('NLK_OPT_SC_SITE_COPYRIGHT_START_YEAR', 'num_sc_start_year');
defined('NLK_OPT_SC_SITE_COPYRIGHT_ADDITIONAL_TEXT') or define('NLK_OPT_SC_SITE_COPYRIGHT_ADDITIONAL_TEXT', 'txt_sc_additional_text');

/*
----------------------------------------------------------------------------------------------------------------------------------------------------- */
defined('NLK_OPT_PGNS_UI_GRP') or define('NLK_OPT_PGNS_UI_GRP', 'grp_pgns_ui');
defined('NLK_OPT_PGNS_UI_HIDE_DESCRIPTIONS') or define('NLK_OPT_PGNS_UI_HIDE_DESCRIPTIONS', 'chk_pgns_ui_hide_descriptions');
defined('NLK_OPT_PGNS_UI_QUICK_EDIT_LINKS') or define('NLK_OPT_PGNS_UI_QUICK_EDIT_LINKS', 'select_pgns_ui_quick_edit_links');

defined('NLK_OPT_PGNS_INACTIVE_HIGHLIGHT') or define('NLK_OPT_PGNS_INACTIVE_HIGHLIGHT', 'chk_pgns_inactive_highlight');

defined('NLK_OPT_PGNS_CATEGORIZE_GRP') or define('NLK_OPT_PGNS_CATEGORIZE_GRP', 'grp_pgns_categorize');

defined('NLK_OPT_PGNS_JP_MODULES_WHITELIST') or define('NLK_OPT_PGNS_JP_MODULES_WHITELIST', 'chk_pgns_jp_modules_whitelist');

/*
----------------------------------------------------------------------------------------------------------------------------------------------------- */
defined('NLK_OPT_PSTS_META_BOXES_REARRANGE_GRP') or define('NLK_OPT_PSTS_META_BOXES_REARRANGE_GRP', 'grp_psts_meta_boxes_rearrange');
defined('NLK_OPT_PSTS_META_BOXES_REARRANGE') or define('NLK_OPT_PSTS_META_BOXES_REARRANGE', 'chk_psts_meta_boxes_rearrange');

/*
----------------------------------------------------------------------------------------------------------------------------------------------------- */
defined('NLK_OPT_USRS_ID_COLUMN') or define('NLK_OPT_USRS_ID_COLUMN', 'chk_usrs_id_column');

/*
----------------------------------------------------------------------------------------------------------------------------------------------------- */
defined('NLK_OPT_WGTS_HIDE_DESCRIPTIONS') or define('NLK_OPT_WGTS_HIDE_DESCRIPTIONS', 'chk_wgts_hide_descriptions');

defined('NLK_OPT_WGTS_REMOVE_UNUSED_GRP') or define('NLK_OPT_WGTS_FILTER_GRP', 'grp_wgts_filter');
defined('NLK_OPT_WGTS_FILTER_LIST_HIDDEN') or define('NLK_OPT_WGTS_FILTER_LIST_FULL', 'hdn_wgts_filter_list_full');
defined('NLK_OPT_WGTS_FILTER_LIST') or define('NLK_OPT_WGTS_FILTER_LIST', 'chk_wgts_filter_list');
defined('NLK_OPT_WGTS_FILTER_LIST_USED') or define('NLK_OPT_WGTS_FILTER_LIST_USED', 'chk_wgts_filter_list_used');

defined('NLK_OPT_WGTS_AREAS_EXPAND') or define('NLK_OPT_WGTS_AREAS_EXPAND', 'chk_wgts_areas_expand');
defined('NLK_OPT_WGTS_TITLES_SWITCH') or define('NLK_OPT_WGTS_TITLES_SWITCH', 'chk_wgts_titles_switch');

defined('NLK_OPT_WGT_CATEGORIES_MODIFY_GRP') or define('NLK_OPT_WGT_CATEGORIES_MODIFY_GRP', 'grp_wgts_categories_modify');
defined('NLK_OPT_WGT_CATEGORIES_MODIFY') or define('NLK_OPT_WGT_CATEGORIES_MODIFY', 'chk_wgts_categories_modify');
defined('NLK_OPT_WGT_CATEGORIES_MODIFY_EXCLUDE_IDS') or define('NLK_OPT_WGT_CATEGORIES_MODIFY_EXCLUDE_IDS', 'txt_wgts_exclude_ids');
