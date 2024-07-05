<?php
/**
 * The template to display Admin notices
 *
 * @package PUTTER
 * @since PUTTER 1.0.64
 */

$putter_skins_url  = get_admin_url( null, 'admin.php?page=trx_addons_theme_panel#trx_addons_theme_panel_section_skins' );
$putter_skins_args = get_query_var( 'putter_skins_notice_args' );
?>
<div class="putter_admin_notice putter_skins_notice notice notice-info is-dismissible" data-notice="skins">
	<?php
	// Theme image
	$putter_theme_img = putter_get_file_url( 'screenshot.jpg' );
	if ( '' != $putter_theme_img ) {
		?>
		<div class="putter_notice_image"><img src="<?php echo esc_url( $putter_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'putter' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="putter_notice_title">
		<?php esc_html_e( 'New skins are available', 'putter' ); ?>
	</h3>
	<?php

	// Description
	$putter_total      = $putter_skins_args['update'];	// Store value to the separate variable to avoid warnings from ThemeCheck plugin!
	$putter_skins_msg  = $putter_total > 0
							// Translators: Add new skins number
							? '<strong>' . sprintf( _n( '%d new version', '%d new versions', $putter_total, 'putter' ), $putter_total ) . '</strong>'
							: '';
	$putter_total      = $putter_skins_args['free'];
	$putter_skins_msg .= $putter_total > 0
							? ( ! empty( $putter_skins_msg ) ? ' ' . esc_html__( 'and', 'putter' ) . ' ' : '' )
								// Translators: Add new skins number
								. '<strong>' . sprintf( _n( '%d free skin', '%d free skins', $putter_total, 'putter' ), $putter_total ) . '</strong>'
							: '';
	$putter_total      = $putter_skins_args['pay'];
	$putter_skins_msg .= $putter_skins_args['pay'] > 0
							? ( ! empty( $putter_skins_msg ) ? ' ' . esc_html__( 'and', 'putter' ) . ' ' : '' )
								// Translators: Add new skins number
								. '<strong>' . sprintf( _n( '%d paid skin', '%d paid skins', $putter_total, 'putter' ), $putter_total ) . '</strong>'
							: '';
	?>
	<div class="putter_notice_text">
		<p>
			<?php
			// Translators: Add new skins info
			echo wp_kses_data( sprintf( __( "We are pleased to announce that %s are available for your theme", 'putter' ), $putter_skins_msg ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="putter_notice_buttons">
		<?php
		// Link to the theme dashboard page
		?>
		<a href="<?php echo esc_url( $putter_skins_url ); ?>" class="button button-primary"><i class="dashicons dashicons-update"></i> 
			<?php
			// Translators: Add theme name
			esc_html_e( 'Go to Skins manager', 'putter' );
			?>
		</a>
	</div>
</div>
