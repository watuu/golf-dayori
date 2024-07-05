<?php

// -------------------------------------------------------
//    sitemap
// -------------------------------------------------------
add_filter (
    'wp_sitemaps_post_types',
    function( $post_types ) {
        // unset( $post_types['post_type'] );
        return $post_types;
    }
);
add_filter (
    'wp_sitemaps_taxonomies',
    function( $taxonomies ) {
        // unset( $taxonomies['taxonomy'] );
        return $taxonomies;
    }
);

function front_wp_sitemaps_add_provider($provider, $name) {
    if ( $name == 'users' ) {
        return null;
    }
    return $provider;
}
add_filter('wp_sitemaps_add_provider', 'front_wp_sitemaps_add_provider', 1, 2);
