<?php
/**
 * Register custom pattern categories for Memberlite theme.
 *
 * @package Memberlite
 * @since 7.0
 */

/**
 * Register pattern categories for Memberlite theme.
 *
 * @since 7.0
 * @return void
 */
function memberlite_register_pattern_categories(): void {
	$categories = array(
		'memberlite-about'        => __( 'Memberlite - About', 'memberlite' ),
		'memberlite-community'    => __( 'Memberlite - Community', 'memberlite' ),
		'memberlite-content'      => __( 'Memberlite - Content', 'memberlite' ),
		'memberlite-courses'      => __( 'Memberlite - Courses', 'memberlite' ),
		'memberlite-cta'          => __( 'Memberlite - Call to Action', 'memberlite' ),
		'memberlite-media'        => __( 'Memberlite - Media', 'memberlite' ),
		'memberlite-team'         => __( 'Memberlite - Team', 'memberlite' ),
		'memberlite-testimonials' => __( 'Memberlite - Testimonials', 'memberlite' ),
	);

	foreach ( $categories as $category_id => $category_name ) {
		register_block_pattern_category(
			$category_id,
			array( 'label' => $category_name )
		);
	}
}
add_action( 'init', 'memberlite_register_pattern_categories' );

/**
 * Make sure the wp_block post type is shown in the menu.
 *
 * @since 7.0
 * @return void
 */
function memberlite_add_patterns_menu_item(): void {
	add_menu_page(
		__( 'Patterns', 'memberlite' ),
		__( 'Patterns', 'memberlite' ),
		'edit_posts',
		'edit.php?post_type=wp_block',
		'',
		'dashicons-layout',
		26
	);
}
add_action( 'admin_menu', 'memberlite_add_patterns_menu_item' );
