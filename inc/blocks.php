<?php
/**
 * Register custom blocks for Memberlite.
 *
 * @package Memberlite
 * @since TBD
 */

/**
 * Register custom Memberlite blocks.
 *
 * @since TBD
 * @return void
 */
function memberlite_register_blocks(): void {
	$memberlite_blocks = array(
		'nav-menu',
		'member-info',
	);

	foreach ( $memberlite_blocks as $memberlite_block ) {
		register_block_type( get_template_directory() . '/build/blocks/' . $memberlite_block );
	}

	wp_localize_script('memberlite-block-nav-menu-editor', 'active_pmpro_plugins',
		array(
			'nav_menu_plugin_active' => function_exists( 'pmpro_is_plugin_active' ) && pmpro_is_plugin_active( 'pmpro-nav-menus/pmpro-nav-menus.php')
		)
	);
}
add_action( 'init', 'memberlite_register_blocks' );

/**
 * Only allow Memberlite's Nav Menu block on the memberlite_header and memberlite_footer post types.
 *
 * @param $allowed_block_types
 * @param $editor_context
 *
 * @return array
 */
function memberlite_allowed_blocks( $allowed_block_types, $editor_context ) {
	$disallowed_blocks = array();

	if ( ! isset( $editor_context->post->post_type ) ) {
		return $allowed_block_types;
	}

	$post_type = $editor_context->post->post_type;

	if ( ! in_array( $post_type, array( 'memberlite_footer', 'memberlite_header' ), true ) ) {
		$disallowed_blocks = array(
			'memberlite/nav-menu',
		);
	}

	// Get all registered blocks if $allowed_block_types is not already set.
	if ( ! is_array( $allowed_block_types ) || empty( $allowed_block_types ) ) {
		$registered_blocks   = WP_Block_Type_Registry::get_instance()->get_all_registered();
		$allowed_block_types = array_keys( $registered_blocks );
	}

	// Create a new array for the allowed blocks.
	$filtered_blocks = array();

	// Loop through each block in the allowed blocks list.
	foreach ( $allowed_block_types as $block ) {

		// Check if the block is not in the disallowed blocks list.
		if ( ! in_array( $block, $disallowed_blocks, true ) ) {

			// If it's not disallowed, add it to the filtered list.
			$filtered_blocks[] = $block;
		}
	}

	// Return the filtered list of allowed blocks
	return $filtered_blocks;
}
add_filter( 'allowed_block_types_all', 'memberlite_allowed_blocks', 10, 2 );

/**
 * Enqueue JS for custom block inserter icon for our Memberlite block category.
 *
 * @since TBD
 * @return void
 */
function memberlite_enqueue_block_inserter_icon(): void {
	$asset_path = get_template_directory() . '/build/editor/block-inserter.asset.php';

	if ( ! file_exists( $asset_path ) ) {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			// Log in debug mode. See docs/build-process.md for more info on the build process.
			error_log( 'Memberlite: Missing asset file at ' . $asset_path );
		}

		return;
	}

	$asset_file = include $asset_path;

	wp_enqueue_script(
		'memberlite-block-inserter-icons',
		get_template_directory_uri() . '/build/editor/block-inserter.js',
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'memberlite_enqueue_block_inserter_icon' );

/**
 * Register a block category for Memberlite blocks.
 *
 * @since TBD
 * @param array $categories Existing block categories.
 * @return array
 */
function memberlite_register_block_categories( array $categories ): array {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'memberlite',
				'title' => __( 'Memberlite', 'memberlite' ),
				'icon'  => null,
			),
		)
	);
}
add_filter( 'block_categories_all', 'memberlite_register_block_categories' );
