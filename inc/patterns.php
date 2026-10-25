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
		'memberlite-accordion'    => __( 'Memberlite - Accordion', 'memberlite' ),
		'memberlite-cta'          => __( 'Memberlite - Call to Action', 'memberlite' ),
		'memberlite-community'    => __( 'Memberlite - Community', 'memberlite' ),
		'memberlite-content'      => __( 'Memberlite - Content', 'memberlite' ),
		'memberlite-courses'      => __( 'Memberlite - Courses', 'memberlite' ),
		'memberlite-features'     => __( 'Memberlite - Features', 'memberlite' ),
		'memberlite-footer'       => __( 'Memberlite - Footer Variations', 'memberlite' ),
		'memberlite-header'       => __( 'Memberlite - Header Variations', 'memberlite' ),
		'memberlite-hero'         => __( 'Memberlite - Hero', 'memberlite' ),
		'memberlite-media'        => __( 'Memberlite - Media', 'memberlite' ),
		'memberlite-pricing'      => __( 'Memberlite - Pricing', 'memberlite' ),
		'memberlite-query-loops'  => __( 'Memberlite - Query Loops', 'memberlite' ),
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
	global $menu;

	// Bail if there is already a menu item for wp_block.
	if ( is_array( $menu ) ) {
		foreach ( $menu as $menu_item ) {
			if ( isset( $menu_item[2] ) && 'edit.php?post_type=wp_block' === $menu_item[2] ) {
				return;
			}
		}
	}

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

/**
 * Get the checkout URL for a membership level, for use in pattern markup.
 *
 * Pattern files are loaded even when Paid Memberships Pro is inactive, so fall back
 * to the default checkout page path instead of calling pmpro_url() directly.
 *
 * @since 8.0
 *
 * @param int $level_id Membership level ID.
 * @return string
 */
function memberlite_get_pattern_checkout_url( int $level_id ): string {
	if ( function_exists( 'pmpro_url' ) ) {
		return pmpro_url( 'checkout', '?pmpro_level=' . $level_id );
	}

	return home_url( '/membership-checkout/?pmpro_level=' . $level_id );
}

/**
 * Encode a value as JSON for use inside a block comment in pattern markup.
 *
 * Uses core's block attribute serialization so a translated string containing "--", "<" or ">"
 * can't end the block comment early.
 *
 * @since 8.0
 *
 * @param string $value The attribute value, usually a translated string.
 * @return string The JSON-encoded string, including the surrounding quotes.
 */
function memberlite_get_pattern_attr_json( string $value ): string {
	return substr( serialize_block_attributes( array( $value ) ), 1, -1 );
}
