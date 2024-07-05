<?php

// -------------------------------------------------------
//    管理画面設定
// -------------------------------------------------------

/*
 * 管理画面並び順
 * カスタム投稿の場合デフォルトで名前順
 */
function admin_post__types_order($wp_query){
    if(is_admin()){
        $post_type = $wp_query->query['post_type'];
        if($post_type == 'office' || $post_type == 'store'){
            $wp_query->set('orderby','publish_date');
            $wp_query->set('order','DESC');
            //$wp_query->set('orderby', [
            //    'publish_date' => 'DESC',
            //    'ID'           => 'ASC',
            //]);
        }
    }
}
add_filter('pre_get_posts', 'admin_post__types_order');


/*
 * taxonomy 順番をID順に変更
 */
function admin_post__taxonomy_orderby( $orderby, $args ) {
    $orderby = 't.term_id';
    $args['order']  = 'ASC';
    return $orderby;
}
add_filter( 'get_terms_orderby', 'admin_post__taxonomy_orderby', 10, 2 );


/*
 * カスタム投稿一覧にカラム追加
 */
function manage_posttype_columns($columns) {
    $columns['カテゴリ'] = "カテゴリ";
    return $columns;
}
function admin_post__custom_column($column, $post_id) {
    $post_type = get_post($post_id)->post_type;
    if( $column == 'カテゴリ' ) {
        $output = get_post_meta($post_id, 'カテゴリ', true);
        // $output = get_the_post_thumbnail($post_id, 'thumb100', array( 'style'=>'width:75px;height:auto;' ));
        echo $output;
    }
}
// add_filter( 'manage_edit-posttype_columns', 'manage_posttype_columns' );
// add_action( 'manage_posts_custom_column', 'admin_post__custom_column', 10, 2 );



