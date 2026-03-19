<?php
/**
 * Register the memberlite_footer custom post type and related helpers.
 *
 * @package Memberlite
 * @since 7.0
 */

/**
 * Register the memberlite_footer CPT.
 *
 * Not public-facing; only accessible in the admin.
 *
 * @since 7.0
 * @return void
 */
function memberlite_register_footer_cpt(): void {
	$labels = array(
		'name'               => __( 'Footers', 'memberlite' ),
		'singular_name'      => __( 'Footer', 'memberlite' ),
		'add_new'            => __( 'Add New Footer', 'memberlite' ),
		'add_new_item'       => __( 'Add New Footer', 'memberlite' ),
		'edit_item'          => __( 'Edit Footer', 'memberlite' ),
		'new_item'           => __( 'New Footer', 'memberlite' ),
		'view_item'          => __( 'View Footer', 'memberlite' ),
		'search_items'       => __( 'Search Footers', 'memberlite' ),
		'not_found'          => __( 'No footers found.', 'memberlite' ),
		'not_found_in_trash' => __( 'No footers found in Trash.', 'memberlite' ),
		'all_items'          => __( 'All Footers', 'memberlite' ),
		'menu_name'          => __( 'Footers', 'memberlite' ),
	);

	register_post_type(
		'memberlite_footer',
		array(
			'labels'              => $labels,
			'public'              => false,
			'publicly_queryable'  => false,
			'show_ui'             => true,
			'show_in_menu'        => false,  // placed under Memberlite menu manually
			'show_in_rest'        => true,   // required for block editor support
			'supports'            => array( 'title', 'editor', 'revisions' ),
			'rewrite'             => false,
			'query_var'           => false,
			'has_archive'         => false,
		)
	);
}
add_action( 'init', 'memberlite_register_footer_cpt' );

/**
 * Get the default footer post.
 *
 * Looks for a post flagged as the default via the `_memberlite_is_default_footer`
 * meta key. Falls back to the most-recently published footer if none is flagged.
 *
 * @since 7.0
 * @return WP_Post|null The footer post, or null if none exist.
 */
function memberlite_get_default_footer(): ?WP_Post {
	// Check for an explicitly chosen default first (set via Customizer).
	$default_id = (int) get_theme_mod( 'memberlite_default_footer_id', 0 );
	if ( $default_id ) {
		$post = get_post( $default_id );
		if ( $post && 'memberlite_footer' === $post->post_type && 'publish' === $post->post_status ) {
			return $post;
		}
	}

	// Fall back to the most-recently published footer.
	$footers = get_posts(
		array(
			'post_type'      => 'memberlite_footer',
			'post_status'    => 'publish',
			'posts_per_page' => 1,
			'orderby'        => 'date',
			'order'          => 'DESC',
		)
	);

	return $footers[0] ?? null;
}
