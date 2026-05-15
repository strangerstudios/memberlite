<?php
/**
 * Register custom block styles for Memberlite
 *
 * @package Memberlite
 *
 * @since 7.1
 */

/**
 * Register block styles.
 *
 * @since 7.1
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

	$button_styles = array(
		array(
			'name'  => 'pill',
			'label' => __( 'Pill', 'memberlite' ),
		),
		array(
			'name'  => 'sharp',
			'label' => __( 'Sharp', 'memberlite' ),
		),
		array(
			'name'  => 'arrow-fill',
			'label' => __( 'Arrow Fill', 'memberlite' ),
		),
		array(
			'name'  => 'arrow-plain',
			'label' => __( 'Arrow Plain', 'memberlite' ),
		),
	);

	foreach ( $button_styles as $style ) {
		register_block_style( 'core/button', $style );
	}
}
add_action( 'init', 'memberlite_register_block_styles' );
