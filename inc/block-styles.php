<?php
/**
 * Register custom block styles for Memberlite
 *
 * @package Memberlite
 *
 * @since 7.0
 */

/**
 * Register block styles.
 *
 * @since 7.0
 * @return void
 */
function memberlite_register_block_styles(): void {
	register_block_style(
		'core/list',
		array(
			'name'         => 'plain',
			'label'        => __( 'Plain', 'memberlite' ),
			'inline_style' => '
				.wp-block-list.is-style-plain {
					list-style: none;
					padding-left: 0;
					margin-left: 0;
				}
			',
		)
	);
}
add_action( 'init', 'memberlite_register_block_styles' );
