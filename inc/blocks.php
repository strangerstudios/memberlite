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
