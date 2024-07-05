<?php

const THEME_SUPPORT_EYTCHATCH = ['post', 'indoor', 'outdoor'];
const THEME_DISABLED_EDITOR = ['mst_shop', 'indoor', 'outdoor'];
const THEME_DISABLED_BLOCK_EDITOR = ['page', 'mw-wp-form'];
const THEME_ENABLED_CLASSIC_EDITOR = [];
const THEME_MEDIA_SIZES = [
    ['thumbnail', 400, 400, false ],
    ['medium', 600, 450, true ],
    ['shop', 1024, 450, true ],
    ['large', 1024, 1024, false ],
];
const THEME_COMMON_ARCHIVE_NUM = null;
const GOOGLE_MAP_KEY = "xxx";

// -------------------------------------------------------
//    サイト設定
// -------------------------------------------------------
require_once('functions/setting.php');

// -------------------------------------------------------
//    管理画面設定
// -------------------------------------------------------
require_once('functions/admin.php');

// -------------------------------------------------------
//    エディター設定 Gutenberg
// -------------------------------------------------------
require_once('functions/editor.php');

// -------------------------------------------------------
//    ACFの設定
// -------------------------------------------------------
require_once('functions/acf.php');

// -------------------------------------------------------
//    フロント側 初期設定
// -------------------------------------------------------
require_once('functions/front.php');
require_once('functions/sitemap.php');

// -------------------------------------------------------
//    ショートコード
// -------------------------------------------------------
require_once('functions/shortcode.php');

// -------------------------------------------------------
//    ユーティリティー
// -------------------------------------------------------
require_once('functions/utility.php');
