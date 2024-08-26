<?php

// -------------------------------------------------------
//    フロント側 初期設定
// -------------------------------------------------------

/* 不要タグ削除 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

/* タイトルタグの自動出力 */
add_theme_support( 'title-tag' );

/**
 * 投稿件数設定
 *
 */
function front_load__pre_get_posts($query) {
    if ( is_admin() || ! $query->is_main_query() ){
        return;
    }
    if (is_post_type_archive('news')) {
        $query->set('posts_per_page', THEME_COMMON_ARCHIVE_NUM ?: get_option('posts_per_page'));
        // $query->set('nopaging', 1);
    }
}
add_action('pre_get_posts', 'front_load__pre_get_posts');


/**
 *  style.cssの読み込み
 *
 */
function front_load__header_styles() {
    wp_enqueue_style( 'theme-css', get_template_directory_uri() . '/style.css');
}
// add_action( 'wp_enqueue_scripts', 'front_load__header_styles' );

/**
 * wp_headに CSS追加
 *
 */
function front_load__head_css(){
    echo '<style></style>';
}
// add_action('wp_head', 'front_load__head_css');

/**
 * the_contentの処理
 */
function front_load__disable_wpautop($content){
    if ( is_page() ) {
        remove_filter( 'the_content', 'wpautop' );
    }
    return $content;
}
add_filter('the_content', 'front_load__disable_wpautop');

function is_parent_slug()
{
    global $post;
    if (is_page()){
        if ($post->post_parent) {
            $post_data = get_post($post->post_parent);
            return $post_data->post_name;
        }
    }
    return false;
}

function theme_get_picture( $attachment, $size = 'thumbnail' ) {
    if (isset($attachment['sizes'])) {
        return $attachment['sizes'][$size];
    }
    $src = wp_get_attachment_image_src($attachment, $size);
    return ($src) ? array_shift($src): null;
}

/**
 * フォーム wpautop
 */
//function mvwpform_autop_filter() {
//    if (class_exists('MW_WP_Form_Admin')) {
//        $mw_wp_form_admin = new MW_WP_Form_Admin();
//        $forms = $mw_wp_form_admin->get_forms();
//        foreach ($forms as $form) {
//            add_filter('mwform_content_wpautop_mw-wp-form-' . $form->ID, '__return_false');
//        }
//    }
//}
//mvwpform_autop_filter();


function generate_my_toc( $content ){
    // 投稿ページのメインループ内のときのみ
    if ( (is_singular('other') || is_singular('goods')) && in_the_loop() && is_main_query() ) {
        global $post;
        global $settings;

        // 目次コード用
        $toc_code = '';

        // 番号あり : ol, 番号なし : ul
        $list_tag = 'ol';

        // 階層レベルチェック用
        $top_level = $current_level = $previous_level = 1;

        // カウンター
        $index = 0;

        // 見出しタグ抽出用
        $reg = "/(<h([1-6]).*?>)(.*?)(<\/h[1-6]>)/";

        // 本文テキストをブロックごとにパース
        $blocks = parse_blocks( $content );

        // パースしたブロックを順番に処理
        foreach ( $blocks as $key => $block ) {
            // 見出しブロックの場合
            if ( $block['blockName'] == 'core/heading' ) {

                // 見出しタグを解析
                if ( preg_match( $reg, $block['innerHTML'], $m1 ) ) {

                    // 現在のレベルを取得
                    $current_level = (int)$m1[2];

                    // 1番目の見出しレベルを保持
                    if ( $index == 0 ) $top_level = $current_level;

                    // 本文内の見出しタグの置換
                    $content = preg_replace_callback( "/(<h[1-6].*?>)(" . preg_quote( $m1[3], '/' ) . ")(<\/h[1-6]>)/", function( $m2 ) use ( &$index ) {
                        // 見出しタグ内を span で括って ID を付けて入れ替える
                        return $m2[1] . '<span id="i-' . $index . '">' . $m2[2] . '</span>' . $m2[3];
                    }, $content );

                    // 1番目または現在の見出しレベルと直前の見出しレベルが同じとき
                    if ( $index == 0 || $current_level == $previous_level ) {

                        // 1番目以外は直前の見出しレベルに閉じタグ(</li>)を付ける
                        if ( $index > 0  ) {
                            $toc_code .= '</li>';
                        }

                        $toc_code .= '<li><a href="#i-' . $index . '">' . $m1[3] . '</a>';

                    } else if ( $current_level < $previous_level ) {

                        // 現在の見出しレベルが直前よりも高いとき
                        $toc_code .= '</li>'. str_repeat( '</' . $list_tag . '></li>', $previous_level - $current_level ) . '<li><a href="#i-' . $index . '">' . $m1[3] . '</a>';
                    } else {

                        // 現在の見出しレベルが直前よりも低いとき
                        $toc_code .= '<' . $list_tag . '><li><a href="#i-' . $index . '">' . $m1[3] . '</a>';
                    }

                    // 現在の見出しレベルを保持
                    $previous_level = (int)$m1[2];

                    // インクリメント
                    ++$index;
                }
            }
        }

        if ( !empty( $toc_code ) ) {
            // 目次リストの整形
//            $toc_code = '<div class="cm-article-index"><div class="cm-article-index__head"><p>目次</p></div><div class="cm-article-index__list">
//                    <' . $list_tag . '>' . $toc_code . '</li>' . str_repeat( '</' . $list_tag . '></li>', ( $previous_level - $top_level ) ) . '</' . $list_tag . '></div></div>'
//            ;
            if (is_singular('goods')) {
                $toc_code = $toc_code . '</li>' . str_repeat( '</' . $list_tag . '></li>', ( $previous_level - $top_level ) );

                if (isset($settings['clubs']) && $settings['clubs']) {
                    $_tag = sprintf('<li><a href="#i-club">%sのおすすめ%s選</a><ol>',
                        $settings['heading'],
                        $settings['clubs_count']
                    );
                    foreach ($settings['clubs'] as $k => $club) {
                        $_tag .= sprintf('<li><a href="#h1-%s">%s</a></li>',
                            $k + 1,
                            get_the_title($club['クラブ']),
                        );
                    }
                    $_tag .= '</ol></li>';
                    $toc_code .= $_tag;
                }
                if (isset($settings['clubs']) && $settings['clubs']) {
                    $toc_code .= sprintf('<li><a href="#i-compare">%s比較一覧</a></li>',
                        $settings['heading']
                    );
                }

                if (isset($settings['まとめ']) && !empty($settings['まとめ'])) {
                    $toc_code .= '<li><a href="#i-matome">まとめ</a></li>';
                }
                if (isset($settings['記事監修者紹介']) && !empty($settings['記事監修者紹介'])) {
                    $toc_code .= '<li><a href="#i-author">記事監修者紹介</a></li>';
                }

                $tag = '<div class="cm-article-index"><div class="cm-article-index__head"><p>目次</p></div><div class="cm-article-index__list"><ol>
                    '.$toc_code.'
                    </ol></div></div>';
            }

            if (is_singular('other')) {
                $toc_code = $toc_code . '</li>' . str_repeat( '</' . $list_tag . '></li>', ( $previous_level - $top_level ) );
                if (isset($settings['まとめ']) && !empty($settings['まとめ'])) {
                    $toc_code .= '<li><a href="#i-matome">まとめ</a></li>';
                }
                if (isset($settings['記事監修者紹介']) && !empty($settings['記事監修者紹介'])) {
                    $toc_code .= '<li><a href="#i-author">記事監修者紹介</a></li>';
                }

                $tag = '<div class="cm-article-index"><div class="cm-article-index__head"><p>目次</p></div><div class="cm-article-index__list"><ol>
                    '.$toc_code.'
                    </ol></div></div>';
            }

            // 本文の先頭に目次リストを追加
            return $tag . '<div class="cm-article-editor">'.$content.'</div>';
        }
    }

    return '<div class="cm-article-editor">'.$content.'</div>';
}

add_filter( 'the_content', 'generate_my_toc', 1 );



