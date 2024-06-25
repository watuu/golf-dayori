<?php

// -------------------------------------------------------
//    ショートコード
// -------------------------------------------------------

// トップページ最新投稿取得
function sc_topnews() {
    /*
    $args = array(
        'paged' => 1,
        'posts_per_page' => 3,
    );
    $the_query = new WP_Query($args);
    $html = sprintf('<ul>');
    if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
        $html .= sprintf('<li>');
        $html .= sprintf('	<span class="date">%s</span>', get_the_time('Y/m/d'));
        $html .= sprintf('	<span class="subject"><a href="%s">%s</a></span>', get_the_permalink(), get_the_title());
        $html .= sprintf('</li>');
    endwhile; endif; wp_reset_postdata();
    $html .= sprintf('</ul>');
    return $html;
    */
}
add_shortcode('sc_topnews', 'sc_topnews');

function wp_home(){
    return home_url();
}
add_shortcode('wp_home','wp_home');

function wp_theme_parent(){
    return get_template_directory_uri();
}
add_shortcode('wp_theme_parent','wp_theme_parent');

function wp_theme_child(){
    return get_stylesheet_directory_uri();
}
add_shortcode('wp_theme_child','wp_theme_child');



