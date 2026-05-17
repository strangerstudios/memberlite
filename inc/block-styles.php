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

	$separator_styles = array(
		array(
			'name'  => 'faded-edges',
			'label' => __( 'Faded Edges', 'memberlite' ),
		),
		array(
			'name'  => 'double',
			'label' => __( 'Double', 'memberlite' ),
		),
		array(
			'name'  => 'wave',
			'label' => __( 'Wave', 'memberlite' ),
		),
		array(
			'name'  => 'flourish-diamond',
			'label' => __( 'Diamond', 'memberlite' ),
		),
		array(
			'name'  => 'flourish-arrow',
			'label' => __( 'Arrow', 'memberlite' ),
		),
		array(
			'name'  => 'flourish-triple-diamond',
			'label' => __( 'Triple Diamond', 'memberlite' ),
		),
		array(
			'name'  => 'flourish-circle-diamond',
			'label' => __( 'Circle Diamond', 'memberlite' ),
		),
	);

	foreach ( $separator_styles as $separator_style ) {
		register_block_style( 'core/separator', $separator_style );
	}

	$search_styles = array(
		array( 'name' => 'filled-pill',   'label' => __( 'Filled Pill', 'memberlite' ) ),
		array( 'name' => 'filled-sharp',  'label' => __( 'Filled Sharp', 'memberlite' ) ),
		array( 'name' => 'icon-round',    'label' => __( 'Icon Round', 'memberlite' ) ),
		array( 'name' => 'icon-square',   'label' => __( 'Icon Square', 'memberlite' ) ),
	);

	foreach ( $search_styles as $style ) {
		register_block_style( 'core/search', $style );
	}

	register_block_style(
		'core/loginout',
		array(
			'name'         => 'loginout-button',
			'label'        => __( 'Button', 'memberlite' ),
		)
	);
}
add_action( 'init', 'memberlite_register_block_styles' );
