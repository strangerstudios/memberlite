<?php
/**
 * Register custom pattern categories for Memberlite theme.
 *
 * @package Memberlite
 * @since 7.0
 */

/**
 * Register block pattern categories.
 */
function memberlite_register_pattern_categories() {
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
