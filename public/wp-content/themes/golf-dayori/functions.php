<?php

const THEME_SUPPORT_EYTCHATCH = ['post', 'mst_member'];
const THEME_DISABLED_EDITOR = [];
const THEME_DISABLED_BLOCK_EDITOR = ['page', 'mw-wp-form'];
const THEME_ENABLED_CLASSIC_EDITOR = [];
const THEME_MEDIA_SIZES = [
    ['thumbnail', 720, 480, true ],
    ['medium', 720, 480, true ],
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
