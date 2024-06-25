<?php

// -------------------------------------------------------
//    サイト設定
// -------------------------------------------------------
/**
 * メディアの設定
 *
 */
add_theme_support( 'post-thumbnails', THEME_SUPPORT_EYTCHATCH );
if (THEME_MEDIA_SIZES) {
    foreach (THEME_MEDIA_SIZES as $media) {
        add_image_size( $media[0], $media[1], $media[2], $media[3] );
    }
}

/**
 * ログイン画面変更
 *
 */
function setting__login_logo() {
    $path = get_stylesheet_directory_uri();
    echo <<< __EOT__
<style type="text/css"> 
	body.login div#login h1 a {
	width: auto;
	background: url('{$path}/images/logo.svg') center center/90% auto no-repeat;
	padding-bottom: 30px; 
} 
</style>
__EOT__;
}
add_action( 'login_enqueue_scripts', 'setting__login_logo' );

// ロゴのリンク先を指定
function setting__login_logo_url()
{
    return get_bloginfo('url');
}
add_filter('login_headerurl', 'setting__login_logo_url');

/**
 * 管理者以外にアップデートのお知らせ非表示
 *
 */
function setting__update_nag_admin_only() {
    if ( ! current_user_can( 'administrator' ) ) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_init', 'setting__update_nag_admin_only' );

/**
 * 管理画面CSS
 *
 */
function setting__admin_css() {
    echo <<< __EOT__
<style type="text/css">
.acf_postbox .field textarea {min-height:0 !important;}
</style>
__EOT__;
}
add_filter('admin_head','setting__admin_css');

/**
 * 管理画面JS
 *
 */
function setting__admin_script(){
    wp_enqueue_script( 'setting__admin_script', get_template_directory_uri().'/admin_script.js', array('jquery'));
}
// add_action( 'admin_enqueue_scripts', 'setting__admin_script' );

/**
 * 固定ページ子ページ階層化
 *
 */
function setting__page_templates($templates) {
    global $wp_query;

    $template = get_page_template_slug();
    $pagename = $wp_query->query['pagename'];

    if ($pagename && ! $template) {
        $pagename = str_replace('/', '__', $pagename);
        $decoded = urldecode($pagename);

        if ($decoded == $pagename) {
            array_unshift($templates, "page-{$pagename}.php");
        }
    }
    return $templates;
}
add_filter('page_template_hierarchy', 'setting__page_templates');


/**
 * Webp許可
 *
 */
function setting__upload_mimes( $mimes ) {
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter( 'upload_mimes', 'setting__upload_mimes' );