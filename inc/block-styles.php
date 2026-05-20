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
	$block_styles = array(
		'core/list'      => array(
			array( 'name' => 'plain', 'label' => __( 'Plain', 'memberlite' ) ),
			array( 'name' => 'horizontal-left', 'label' => __( 'Horizontal Left', 'memberlite' ) ),
			array( 'name' => 'horizontal-center', 'label' => __( 'Horizontal Center', 'memberlite' ) ),
		),
		'core/button'    => array(
			array( 'name' => 'pill', 'label' => __( 'Pill', 'memberlite' ) ),
			array( 'name' => 'sharp', 'label' => __( 'Sharp', 'memberlite' ) ),
			array( 'name' => 'arrow-fill', 'label' => __( 'Arrow Fill', 'memberlite' ) ),
			array( 'name' => 'arrow-plain', 'label' => __( 'Arrow Plain', 'memberlite' ) ),
		),
		'core/separator' => array(
			array( 'name' => 'faded-edges', 'label' => __( 'Faded Edges', 'memberlite' ) ),
			array( 'name' => 'double', 'label' => __( 'Double', 'memberlite' ) ),
			array( 'name' => 'wave', 'label' => __( 'Wave', 'memberlite' ) ),
			array( 'name' => 'flourish-diamond', 'label' => __( 'Diamond', 'memberlite' ) ),
			array( 'name' => 'flourish-arrow', 'label' => __( 'Arrow', 'memberlite' ) ),
			array( 'name' => 'flourish-triple-diamond', 'label' => __( 'Triple Diamond', 'memberlite' ) ),
			array( 'name' => 'flourish-circle-diamond', 'label' => __( 'Circle Diamond', 'memberlite' ) ),
		),
		'core/search'    => array(
			array( 'name' => 'filled-pill', 'label' => __( 'Filled Pill', 'memberlite' ) ),
			array( 'name' => 'filled-sharp', 'label' => __( 'Filled Sharp', 'memberlite' ) ),
			array( 'name' => 'icon-round', 'label' => __( 'Icon Round', 'memberlite' ) ),
			array( 'name' => 'icon-square', 'label' => __( 'Icon Square', 'memberlite' ) ),
		),
		'core/loginout'  => array(
			array( 'name' => 'loginout-button', 'label' => __( 'Button', 'memberlite' ) ),
		),
		'core/cover'     => array(
			array( 'name' => 'slant-bottom-right', 'label' => __( 'Slant: Bottom Right', 'memberlite' ) ),
			array( 'name' => 'slant-bottom-left', 'label' => __( 'Slant: Bottom Left', 'memberlite' ) ),
			array( 'name' => 'wavy-bottom', 'label' => __( 'Wavy Bottom', 'memberlite' ) ),
		),
	);

	foreach ( $block_styles as $block_name => $styles ) {
		foreach ( $styles as $style ) {
			register_block_style( $block_name, $style );
		}
	}
}
add_action( 'init', 'memberlite_register_block_styles' );
