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
}
add_action( 'init', 'memberlite_register_blocks' );
