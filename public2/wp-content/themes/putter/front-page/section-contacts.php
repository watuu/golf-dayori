<div class="front_page_section front_page_section_contacts<?php
	$putter_scheme = putter_get_theme_option( 'front_page_contacts_scheme' );
	if ( ! empty( $putter_scheme ) && ! putter_is_inherit( $putter_scheme ) ) {
		echo ' scheme_' . esc_attr( $putter_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( putter_get_theme_option( 'front_page_contacts_paddings' ) );
	if ( putter_get_theme_option( 'front_page_contacts_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$putter_css      = '';
		$putter_bg_image = putter_get_theme_option( 'front_page_contacts_bg_image' );
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
	$putter_anchor_icon = putter_get_theme_option( 'front_page_contacts_anchor_icon' );
	$putter_anchor_text = putter_get_theme_option( 'front_page_contacts_anchor_text' );
if ( ( ! empty( $putter_anchor_icon ) || ! empty( $putter_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_contacts"'
									. ( ! empty( $putter_anchor_icon ) ? ' icon="' . esc_attr( $putter_anchor_icon ) . '"' : '' )
									. ( ! empty( $putter_anchor_text ) ? ' title="' . esc_attr( $putter_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_contacts_inner
	<?php
	if ( putter_get_theme_option( 'front_page_contacts_fullheight' ) ) {
		echo ' putter-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$putter_css      = '';
			$putter_bg_mask  = putter_get_theme_option( 'front_page_contacts_bg_mask' );
			$putter_bg_color_type = putter_get_theme_option( 'front_page_contacts_bg_color_type' );
			if ( 'custom' == $putter_bg_color_type ) {
				$putter_bg_color = putter_get_theme_option( 'front_page_contacts_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_contacts_content_wrap content_wrap">
			<?php

			// Title and description
			$putter_caption     = putter_get_theme_option( 'front_page_contacts_caption' );
			$putter_description = putter_get_theme_option( 'front_page_contacts_description' );
			if ( ! empty( $putter_caption ) || ! empty( $putter_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				// Caption
				if ( ! empty( $putter_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_contacts_caption front_page_block_<?php echo ! empty( $putter_caption ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( $putter_caption, 'putter_kses_content' );
					?>
					</h2>
					<?php
				}

				// Description
				if ( ! empty( $putter_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_contacts_description front_page_block_<?php echo ! empty( $putter_description ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( wpautop( $putter_description ), 'putter_kses_content' );
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$putter_content = putter_get_theme_option( 'front_page_contacts_content' );
			$putter_layout  = putter_get_theme_option( 'front_page_contacts_layout' );
			if ( 'columns' == $putter_layout && ( ! empty( $putter_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				<div class="front_page_section_columns front_page_section_contacts_columns columns_wrap">
					<div class="column-1_3">
				<?php
			}

			if ( ( ! empty( $putter_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				<div class="front_page_section_content front_page_section_contacts_content front_page_block_<?php echo ! empty( $putter_content ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( $putter_content, 'putter_kses_content' );
					?>
				</div>
				<?php
			}

			if ( 'columns' == $putter_layout && ( ! empty( $putter_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div><div class="column-2_3">
				<?php
			}

			// Shortcode output
			$putter_sc = putter_get_theme_option( 'front_page_contacts_shortcode' );
			if ( ! empty( $putter_sc ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_output front_page_section_contacts_output front_page_block_<?php echo ! empty( $putter_sc ) ? 'filled' : 'empty'; ?>">
					<?php
					putter_show_layout( do_shortcode( $putter_sc ) );
					?>
				</div>
				<?php
			}

			if ( 'columns' == $putter_layout && ( ! empty( $putter_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>

		</div>
	</div>
</div>
