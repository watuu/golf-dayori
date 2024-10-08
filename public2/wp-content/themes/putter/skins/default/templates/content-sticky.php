<?php
/**
 * The Sticky template to display the sticky posts
 *
 * Used for index/archive
 *
 * @package PUTTER
 * @since PUTTER 1.0
 */

$putter_columns     = max( 1, min( 3, count( get_option( 'sticky_posts' ) ) ) );
$putter_post_format = get_post_format();
$putter_post_format = empty( $putter_post_format ) ? 'standard' : str_replace( 'post-format-', '', $putter_post_format );

?><div class="column-1_<?php echo esc_attr( $putter_columns ); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php
	post_class( 'post_item post_layout_sticky post_format_' . esc_attr( $putter_post_format ) );
	putter_add_blog_animation( $putter_template_args );
	?>
>

	<?php
	if ( is_sticky() && is_home() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}

	// Featured image
	putter_show_post_featured(
		array(
			'thumb_size' => putter_get_thumb_size( 1 == $putter_columns ? 'big' : ( 2 == $putter_columns ? 'med' : 'avatar' ) ),
		)
	);

	if ( ! in_array( $putter_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			the_title( sprintf( '<h5 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
			// Post meta
			putter_show_post_meta( apply_filters( 'putter_filter_post_meta_args', array(), 'sticky', $putter_columns ) );
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>
</article></div><?php

// div.column-1_X is a inline-block and new lines and spaces after it are forbidden
