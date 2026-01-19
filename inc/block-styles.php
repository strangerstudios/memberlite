<?php
/**
 * Register custom block styles for the theme.
 *
 * @package Memberlite
 * @since 6.1
 */

/**
 * Register a shadow card block style for various block types.
 *
 * @since 6.1
 */
function memberlite_register_block_styles() {
	$shadow_card_block_types = array( 'core/group', 'core/paragraph', 'core/columns', 'core/column' );
	foreach ( $shadow_card_block_types as $block_type ) {
		register_block_style(
			$block_type,
			array(
				'name'  => 'pmpro-card',
				'label' => __( 'Shadow Card', 'memberlite' ),
			)
		);
	}
}
add_action( 'init', 'memberlite_register_block_styles' );
