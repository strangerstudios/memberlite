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
			array( 'name' => 'arrow-fill', 'label' => __( 'Arrow Fill', 'memberlite' ) ),
			array( 'name' => 'arrow-plain', 'label' => __( 'Arrow Plain', 'memberlite' ) ),
		),
		'core/separator' => array(
			array( 'name' => 'faded-edges', 'label' => __( 'Faded Edges', 'memberlite' ) ),
			array( 'name' => 'double', 'label' => __( 'Double', 'memberlite' ) ),
			array( 'name' => 'flourish-diamond', 'label' => __( 'Diamond', 'memberlite' ) ),
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
			array( 'name' => 'scroll-indicator', 'label' => __( 'Scroll Indicator', 'memberlite' ) ),
			array( 'name' => 'slant-bottom-right', 'label' => __( 'Slant: Bottom Right', 'memberlite' ) ),
			array( 'name' => 'slant-bottom-left', 'label' => __( 'Slant: Bottom Left', 'memberlite' ) ),
		),
		'core/accordion'  => array(
			array( 'name' => 'accrdn-caret', 'label' => __( 'Caret', 'memberlite' ) ),
		),
		'core/heading' => array(
			array(
				'name'  => 'heading-rule',
				'label' => __( 'Rule', 'memberlite' )
			),
		),
		'core/post-title' => array(
			array( 'name'  => 'title-podcast', 'label' => __( 'Podcast', 'memberlite' ) ),
			array( 'name'  => 'title-video', 'label' => __( 'Video', 'memberlite' ) ),
		),
		'core/group'      => array(
			array( 'name' => 'card', 'label' => __( 'Card', 'memberlite' ) ),
		),
		'core/columns'    => array(
			array( 'name' => 'card', 'label' => __( 'Card', 'memberlite' ) ),
		),
		'core/column'     => array(
			array( 'name' => 'card', 'label' => __( 'Card', 'memberlite' ) ),
		),
		'core/post-template' => array(
			array( 'name' => 'card', 'label' => __( 'Card', 'memberlite' ) ),
		),
		'pmpro/single-level' => array(
			array( 'name' => 'card', 'label' => __( 'Card', 'memberlite' ) ),
		),
	);

	foreach ( $block_styles as $block_name => $styles ) {
		foreach ( $styles as $style ) {
			register_block_style( $block_name, $style );
		}
	}
}
add_action( 'init', 'memberlite_register_block_styles' );

/**
 * Enqueue the Texture control and the texture styles its swatches preview.
 *
 * Texture classes are documented in DESIGN.md. The editor canvas gets the
 * same styles through add_editor_style() in memberlite_setup().
 *
 * @since TBD
 * @return void
 */
function memberlite_enqueue_texture_control(): void {
	$asset_path = get_template_directory() . '/build/editor/textures.asset.php';

	if ( ! file_exists( $asset_path ) ) {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			// Log in debug mode. See docs/build-process.md for more info on the build process.
			error_log( 'Memberlite: Missing asset file at ' . $asset_path );
		}

		return;
	}

	$asset_file = include $asset_path;

	wp_enqueue_style(
		'memberlite-textures',
		get_template_directory_uri() . '/build/css/textures.css',
		array(),
		MEMBERLITE_VERSION
	);

	wp_enqueue_script(
		'memberlite-texture-control',
		get_template_directory_uri() . '/build/editor/textures.js',
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'memberlite_enqueue_texture_control' );
