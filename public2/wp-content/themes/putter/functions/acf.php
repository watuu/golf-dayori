<?php

// -------------------------------------------------------
//    ACFの設定
// -------------------------------------------------------

/**
 * ACF GoogleMap キー設定
 *
 */
function acf__googlemap( $api ){
    $api['key'] = GOOGLE_MAP_KEY;
    return $api;
}
add_filter('acf/fields/google_map/api', 'acf__googlemap');

