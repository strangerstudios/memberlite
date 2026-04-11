<?php
/**
 * Register custom post types for Memberlite
 */

/**
 * Register the memberlite_footer CPT for footer variations.
 *
 * Not public-facing; only accessible in the admin.
 *
 * @since 7.1
 * @return void
 */
function memberlite_register_footer_cpt(): void {
	$labels = array(
		'name'               => __( 'Footer Variations', 'memberlite' ),
		'singular_name'      => __( 'Footer Variation', 'memberlite' ),
		'add_new'            => __( 'Add New Footer Variation', 'memberlite' ),
		'add_new_item'       => __( 'Add New Footer Variation', 'memberlite' ),
		'edit_item'          => __( 'Edit Footer Variation', 'memberlite' ),
		'new_item'           => __( 'New Footer Variation', 'memberlite' ),
		'view_item'          => __( 'View Footer Variation', 'memberlite' ),
		'search_items'       => __( 'Search Footer Variations', 'memberlite' ),
		'not_found'          => __( 'No footer variations found.', 'memberlite' ),
		'not_found_in_trash' => __( 'No footer variations found in Trash.', 'memberlite' ),
		'all_items'          => __( 'All Footer Variations', 'memberlite' ),
		'menu_name'          => __( 'Footer Variations', 'memberlite' ),
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
			'capabilities'        => array(
				'read_post'              => 'edit_theme_options',
				'read_private_posts'     => 'edit_theme_options',
				'edit_post'              => 'edit_theme_options',
				'edit_posts'             => 'edit_theme_options',
				'edit_others_posts'      => 'edit_theme_options',
				'edit_private_posts'     => 'edit_theme_options',
				'edit_published_posts'   => 'edit_theme_options',
				'publish_posts'          => 'edit_theme_options',
				'delete_post'            => 'edit_theme_options',
				'delete_posts'           => 'edit_theme_options',
				'delete_private_posts'   => 'edit_theme_options',
				'delete_published_posts' => 'edit_theme_options',
				'delete_others_posts'    => 'edit_theme_options',
				'create_posts'           => 'edit_theme_options',
			),
		)
	);
}
add_action( 'init', 'memberlite_register_footer_cpt' );

/**
 * Auto-generate a title and slug for memberlite_footer posts saved without one.
 *
 * Assigns a name like "Footer 123" (using the post ID) and a matching slug,
 * replacing the bare numeric slug WordPress assigns to untitled posts.
 *
 * @since 7.1
 * @param int     $post_id The post ID.
 * @param WP_Post $post    The post object.
 * @return void
 */
function memberlite_footer_auto_title( int $post_id, WP_Post $post ): void {
	if ( wp_is_post_revision( $post_id ) || $post->post_status === 'auto-draft' ) {
		return;
	}

	if ( ! empty( $post->post_title ) ) {
		return;
	}

	$auto_title = sprintf( __( 'Footer %d', 'memberlite' ), $post_id );
	$auto_slug  = 'footer-' . $post_id;

	remove_action( 'save_post_memberlite_footer', 'memberlite_footer_auto_title', 10 );

	wp_update_post( array(
		'ID'         => $post_id,
		'post_title' => $auto_title,
		'post_name'  => $auto_slug,
	) );

	add_action( 'save_post_memberlite_footer', 'memberlite_footer_auto_title', 10, 2 );
}
add_action( 'save_post_memberlite_footer', 'memberlite_footer_auto_title', 10, 2 );
