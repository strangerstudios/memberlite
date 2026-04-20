<?php
/**
 * Register custom blocks for Memberlite.
 *
 * @package Memberlite
 * @since TBD
 */

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

/**
 * Register custom Memberlite blocks.
 *
 * Each block's editor script handle is registered first so that
 * register_block_type() (which reads the named handle from block.json)
 * can resolve it correctly.
 *
 * @since TBD
 * @return void
 */
function memberlite_register_blocks(): void {
	// Nav Menu block.
	wp_register_script(
		'memberlite-block-nav-menu-editor',
		get_template_directory_uri() . '/build/blocks/nav-menu/index.js',
		array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-i18n' ),
		MEMBERLITE_VERSION,
		true
	);
	register_block_type( get_template_directory() . '/build/blocks/nav-menu' );

	// Member Info block.
	wp_register_script(
		'memberlite-block-member-info-editor',
		get_template_directory_uri() . '/build/blocks/member-info/index.js',
		array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-i18n' ),
		MEMBERLITE_VERSION,
		true
	);
	register_block_type( get_template_directory() . '/build/blocks/member-info' );
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
function memberlite_allowed_blocks( $allowed_block_types, $editor_context ): array {
	$post_type         = $editor_context->post->post_type ?? '';
	$disallowed_blocks = array();

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
