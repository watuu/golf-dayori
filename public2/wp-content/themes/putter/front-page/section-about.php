<div class="front_page_section front_page_section_about<?php
	$putter_scheme = putter_get_theme_option( 'front_page_about_scheme' );
	if ( ! empty( $putter_scheme ) && ! putter_is_inherit( $putter_scheme ) ) {
		echo ' scheme_' . esc_attr( $putter_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( putter_get_theme_option( 'front_page_about_paddings' ) );
	if ( putter_get_theme_option( 'front_page_about_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$putter_css      = '';
		$putter_bg_image = putter_get_theme_option( 'front_page_about_bg_image' );
		if ( ! empty( $putter_bg_image ) ) {
			$putter_css .= 'background-image: url(' . esc_url( putter_get_attachment_url( $putter_bg_image ) ) . ');';
		}
		if ( ! empty( $putter_css ) ) {
			echo ' style="' . esc_attr( $putter_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$putter_anchor_icon = putter_get_theme_option( 'front_page_about_anchor_icon' );
	$putter_anchor_text = putter_get_theme_option( 'front_page_about_anchor_text' );
if ( ( ! empty( $putter_anchor_icon ) || ! empty( $putter_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_about"'
									. ( ! empty( $putter_anchor_icon ) ? ' icon="' . esc_attr( $putter_anchor_icon ) . '"' : '' )
									. ( ! empty( $putter_anchor_text ) ? ' title="' . esc_attr( $putter_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_about_inner
	<?php
	if ( putter_get_theme_option( 'front_page_about_fullheight' ) ) {
		echo ' putter-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$putter_css           = '';
			$putter_bg_mask       = putter_get_theme_option( 'front_page_about_bg_mask' );
			$putter_bg_color_type = putter_get_theme_option( 'front_page_about_bg_color_type' );
			if ( 'custom' == $putter_bg_color_type ) {
				$putter_bg_color = putter_get_theme_option( 'front_page_about_bg_color' );
			} elseif ( 'scheme_bg_color' == $putter_bg_color_type ) {
				$putter_bg_color = putter_get_scheme_color( 'bg_color', $putter_scheme );
			} else {
				$putter_bg_color = '';
			}
			if ( ! empty( $putter_bg_color ) && $putter_bg_mask > 0 ) {
				$putter_css .= 'background-color: ' . esc_attr(
					1 == $putter_bg_mask ? $putter_bg_color : putter_hex2rgba( $putter_bg_color, $putter_bg_mask )
				) . ';';
			}
			if ( ! empty( $putter_css ) ) {
				echo ' style="' . esc_attr( $putter_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_about_content_wrap content_wrap">
			<?php
			// Caption
			$putter_caption = putter_get_theme_option( 'front_page_about_caption' );
			if ( ! empty( $putter_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_about_caption front_page_block_<?php echo ! empty( $putter_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $putter_caption, 'putter_kses_content' ); ?></h2>
				<?php
			}

			// Description (text)
			$putter_description = putter_get_theme_option( 'front_page_about_description' );
			if ( ! empty( $putter_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_about_description front_page_block_<?php echo ! empty( $putter_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $putter_description ), 'putter_kses_content' ); ?></div>
				<?php
			}

			// Content
			$putter_content = putter_get_theme_option( 'front_page_about_content' );
			if ( ! empty( $putter_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_content front_page_section_about_content front_page_block_<?php echo ! empty( $putter_content ) ? 'filled' : 'empty'; ?>">
					<?php
					$putter_page_content_mask = '%%CONTENT%%';
					if ( strpos( $putter_content, $putter_page_content_mask ) !== false ) {
						$putter_content = preg_replace(
							'/(\<p\>\s*)?' . $putter_page_content_mask . '(\s*\<\/p\>)/i',
							sprintf(
								'<div class="front_page_section_about_source">%s</div>',
								apply_filters( 'the_content', get_the_content() )
							),
							$putter_content
						);
					}
					putter_show_layout( $putter_content );
					?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
