<?php

// -------------------------------------------------------
//    エディター設定 Gutenberg
// -------------------------------------------------------

/*
 * 投稿画面タイトルプレースホルダー書き換え
 */
function editor__title_placeholder_change( $title ) {
    $screen = get_current_screen();
    if ( $screen->post_type == '***' ) {
        $title = '';
    }
    return $title;
}
// add_filter( 'enter_title_here', 'editor__title_placeholder_change' );

/**
 * クラシックエディター
 */
function editor_classic( $use_block_editor, $post_type ) {
  if ( in_array($post_type, THEME_ENABLED_CLASSIC_EDITOR) ) return false;
  return $use_block_editor;
}
add_filter( 'use_block_editor_for_post_type', 'editor_classic', 10, 2 );

/**
 * グーテンベルグ無効化
 */
function editor_disable_block(){
    global $typenow;
    if( in_array( $typenow, THEME_DISABLED_BLOCK_EDITOR ) ){
        add_filter('user_can_richedit', function(){
            return false;
        });
    }
}
add_action( 'load-post.php', 'editor_disable_block' );
add_action( 'load-post-new.php', 'editor_disable_block' );

/**
 * エディター無効化
 */
add_action( 'init', function() {
    foreach (THEME_DISABLED_EDITOR as $post_type) {
        remove_post_type_support( $post_type, 'editor' );
    }
}, 99);


/**
 * クラシックエディターのスタイルシート追加
 */
function editor__editor_styles() {
    global $post;

    add_theme_support( 'editor-styles' );
    add_editor_style("assets/css/editor-classic.css");

    if (THEME_ENABLED_CLASSIC_EDITOR) {
        foreach (THEME_ENABLED_CLASSIC_EDITOR as $post_type) {
            // 新規投稿 (initフック).
            if ( stristr( $_SERVER['REQUEST_URI'], 'post-new.php' ) !== false
                && ( isset( $_GET['post_type'] ) === true && $post_type == $_GET['post_type'] ) ) {
                add_editor_style( 'assets/css/editor-classic-' . $post_type . '.css' );
            }

            // 投稿の編集 (pre_get_postsフック).
            if ( stristr( $_SERVER['REQUEST_URI'], 'post.php' ) !== false
                && is_object( $post )
                && $post_type == get_post_type( $post->ID ) ) {
                add_editor_style( 'assets/css/editor-classic-' . $post_type . '.css' );
            }
        }
    }
}
add_action( 'init',          'editor__editor_styles' );
add_action( 'pre_get_posts', 'editor__editor_styles' );

/**
 * ブロックエディターのスタイルシート追加
 */
function editor__block_styles() {
    if (is_admin() || $pagenow == 'edit.php') {
        $posttype = get_post_type();
        wp_enqueue_style('block-style', get_stylesheet_directory_uri() . '/assets/css/editor.css');
        if (file_exists(get_stylesheet_directory() . '/assets/css/editor-'.$posttype.'.css')) {
            wp_enqueue_style('blog-block-style', get_stylesheet_directory_uri() . '/assets/css/editor-'.$posttype.'.css');
        }
    }
}
add_action( 'enqueue_block_editor_assets', 'editor__block_styles' );

/*
 * 不要なパターンの削除
 */
function editor__remove_patterns() {
    $patterns = [
        'buttons',
        'columns',
        'gallery',
        'header',
        'text',
        'query',
    ];
    foreach ( $patterns as $pattern ) {
        unregister_block_pattern_category( $pattern );
    }
}
add_action( 'init', 'editor__remove_patterns' );
add_filter('should_load_remote_block_patterns', '__return_false');

/**
 * タグ有効化
 */
function editor_kses_allowed_html( $tags, $context ) {
    if ( $context == 'post' ) {
        $tags['svg'] = [
            'width' => true,
            'height' => true,
        ];
        $tags['use'] = [
            'href' => true,
        ];
        $tags['input'] = [
            'id' => true,
            'type' => true,
            'name' => true,
        ];
    }
    return $tags;
}
add_filter( 'wp_kses_allowed_html', 'editor_kses_allowed_html', 10, 2 );
