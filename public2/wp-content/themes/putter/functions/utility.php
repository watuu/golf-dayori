<?php

// -------------------------------------------------------
//    ユーティリティー
// -------------------------------------------------------

/**
 *  ページネーション
 *
 */
function theme_posts_pagination() {
    global $wp_query;
    $bignum = 999999999;

    $paginate_args = array(
        'base'      => str_replace($bignum, '%#%', esc_url(get_pagenum_link($bignum))),
        //'format'    => '',
        'format'    => '?page=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'prev_text'    => '前へ',
        'next_text'    => '次へ',
        'type'      => 'array',
        'mid_size'  => 3,
    );
    $paginate_links = paginate_links($paginate_args);

    $current = $paginate_args['current'];
    $allowed = [ //URL書式のパターン入力
        '/ current/u', //現在のページ
        '/prev /u', //前へ
        '/next /u', //次へ
        sprintf( '/\/page\/%d(\/|")/u', $current-2 ),
        sprintf( '/\/page\/%d(\/|")/u', $current-1 ),
        sprintf( '/\/page\/%d(\/|")/u', $current+1 ),
        sprintf( '/\/page\/%d(\/|")/u', $current+2 ),
    ];

    if(!empty($paginate_links)) {
        $paginate_links = array_filter(
            $paginate_links,
            function($value) use ($allowed) {
                foreach((array)$allowed as $tag) {
                    if(preg_match($tag, $value))
                        return true;
                }
                return false;
            }
        );
    }
    if (!empty($paginate_links)) {
        echo '<ul>';
        foreach($paginate_links as $k => $paginate_link) {
            if ($k == 0 && strpos($paginate_link, 'prev') == false) {
                echo sprintf('<li class="nav prev"><a href="#">前へ</a></li>');
            }
            if (strpos($paginate_link, 'current') !== false) {
                echo sprintf('<li class="number current"><a href="#">%s</a></li>', $paginate_link);
            } elseif(strpos($paginate_link, 'prev') !== false) {
                echo sprintf('<li class="nav prev">%s</li>', $paginate_link);
            } elseif(strpos($paginate_link, 'next') !== false) {
                echo sprintf('<li class="nav next">%s</li>', $paginate_link);
            } else {
                echo sprintf('<li class="number">%s</li>', $paginate_link);
            }
        }
        if (strpos($paginate_link, 'next') == false) {
            echo sprintf('<li class="nav next"><a href="#">次へ</a></li>');
        }
        echo '</ul>';
    }
}

/**
 * メインカテゴリー取得
 *
 * @params $return
 */
function get_main_category($return = 'full') {
    $categories = get_the_category();
    if ($categories) {
        $category = array_shift($categories);
        if ($return == 'full') {
            return $category;
        }
        return $category->{$return};
    }
    return false;
}

/**
 *  メインターム取得
 *
 *  @params $return
 */
function get_main_term($return = 'full') {
    $taxonomies = get_object_taxonomies(get_post_type());
    if (is_array($taxonomies)) {
        $taxonomy =  array_shift($taxonomies);
        $terms = get_the_terms(get_the_ID(), $taxonomy);
        if (is_array($terms)) {
            foreach ($terms as $term) {
                if ($return == 'full') {
                    return $term;
                }
                return $term->{$return};
            }
        }
    }
    return false;
}

/**
 * アーカイブページで情報取得
 *
 */
function get_current_term() {
    $id = '';
    $tax_slug = '';
    if (is_category()) {
        $tax_slug = "category";
        $id = get_query_var('cat');
    } else if (is_tag()) {
        $tax_slug = "post_tag";
        $id = get_query_var('tag_id');
    } else if (is_tax()) {
        $tax_slug = get_query_var('taxonomy');
        $term_slug = get_query_var('term');
        $term = get_term_by("slug",$term_slug,$tax_slug);
        $id = $term->term_id;
    }
    return get_term($id, $tax_slug);
}

/**
 * 記事テキストの抜粋
 *
 */
function get_excerpt_from_article($text = null, $count = 200) {
    return mb_strimwidth(htmlspecialchars(str_replace(array("\r\n", "\n", "\r", "&nbsp;", ''), '', strip_tags($text)), ENT_QUOTES), 0, $count, '...');
}
