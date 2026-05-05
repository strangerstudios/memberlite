<?php
/**
 * Register custom post types for Memberlite
 */

/**
 * Register the memberlite_header CPT for header variations.
 *
 * Not public-facing; only accessible in the admin.
 *
 * @since 7.1
 * @return void
 */
function memberlite_register_header_cpt(): void {
	$labels = array(
		'name'               => __( 'Header Variations', 'memberlite' ),
		'singular_name'      => __( 'Header Variation', 'memberlite' ),
		'add_new'            => __( 'Add New Header Variation', 'memberlite' ),
		'add_new_item'       => __( 'Add New Header Variation', 'memberlite' ),
		'edit_item'          => __( 'Edit Header Variation', 'memberlite' ),
		'new_item'           => __( 'New Header Variation', 'memberlite' ),
		'view_item'          => __( 'View Header Variation', 'memberlite' ),
		'search_items'       => __( 'Search Header Variations', 'memberlite' ),
		'not_found'          => __( 'No header variations found.', 'memberlite' ),
		'not_found_in_trash' => __( 'No header variations found in Trash.', 'memberlite' ),
		'all_items'          => __( 'All Header Variations', 'memberlite' ),
		'menu_name'          => __( 'Header Variations', 'memberlite' ),
	);

	register_post_type(
		'memberlite_header',
		array(
			'labels'              => $labels,
			'public'              => false,
			'publicly_queryable'  => false,
			'show_ui'             => true,
			'show_in_menu'        => false,  // placed under Memberlite menu manually
			'show_in_rest'        => true,   // required for block editor support
			'supports'            => array( 'title', 'editor', 'revisions', 'custom-fields' ),
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
add_action( 'init', 'memberlite_register_header_cpt' );

/**
 * Auto-generate a title and slug for memberlite_header posts saved without one.
 *
 * Assigns a name like "Header 123" (using the post ID) and a matching slug,
 * replacing the bare numeric slug WordPress assigns to untitled posts.
 *
 * @since 7.1
 * @param int     $post_id The post ID.
 * @param WP_Post $post    The post object.
 * @return void
 */
function memberlite_header_auto_title( int $post_id, WP_Post $post ): void {
	if ( wp_is_post_revision( $post_id ) || $post->post_status === 'auto-draft' ) {
		return;
	}

	if ( ! empty( $post->post_title ) ) {
		return;
	}

	$auto_title = sprintf( __( 'Header %d', 'memberlite' ), $post_id );
	$auto_slug  = 'header-' . $post_id;

	remove_action( 'save_post_memberlite_header', 'memberlite_header_auto_title', 10 );

	wp_update_post( array(
		'ID'         => $post_id,
		'post_title' => $auto_title,
		'post_name'  => $auto_slug,
	) );

	add_action( 'save_post_memberlite_header', 'memberlite_header_auto_title', 10, 2 );
}
add_action( 'save_post_memberlite_header', 'memberlite_header_auto_title', 10, 2 );

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

/*
 * =========================================================================
 * Cleanup of theme_mod assignments when header/footer posts are removed
 * =========================================================================
 *
 * Theme_mods reference header/footer variations by post_name. When the
 * referenced post is permanently deleted, the frontend already falls back
 * to the default header/footer, but the Customizer dropdown is left with
 * an orphan value. Cleanup runs only on permanent deletion so that
 * trash/untrash preserves the original assignment; the Customizer JS in
 * customizer-controls.js handles the trashed-but-not-yet-deleted case.
 */

/**
 * Clear theme_mods and per-page overrides referencing a deleted memberlite_header post.
 *
 * @since TBD
 * @param int $post_id The post being trashed or deleted.
 * @return void
 */
function memberlite_cleanup_header_assignment_on_delete( int $post_id ): void {
	$post = get_post( $post_id );
	if ( ! $post || $post->post_type !== 'memberlite_header' ) {
		return;
	}

	// WordPress appends '__trashed' to post_name when a post is moved to trash;
	// strip it so we match the original slug stored in theme_mods and post meta.
	$slug = $post->post_name;
	if ( str_ends_with( $slug, '__trashed' ) ) {
		$slug = substr( $slug, 0, -strlen( '__trashed' ) );
	}

	if ( get_theme_mod( 'memberlite_default_header_slug', '0' ) === $slug ) {
		remove_theme_mod( 'memberlite_default_header_slug' );
	}

	// Clear per-page header overrides that reference the deleted slug.
	delete_metadata( 'post', 0, '_memberlite_header_override', $slug, true );
}
add_action( 'before_delete_post', 'memberlite_cleanup_header_assignment_on_delete' );

/**
 * Clear theme_mods and per-page overrides referencing a deleted memberlite_footer post.
 *
 * @since TBD
 * @param int $post_id The post being trashed or deleted.
 * @return void
 */
function memberlite_cleanup_footer_assignment_on_delete( int $post_id ): void {
	$post = get_post( $post_id );
	if ( ! $post || $post->post_type !== 'memberlite_footer' ) {
		return;
	}

	// WordPress appends '__trashed' to post_name when a post is moved to trash;
	// strip it so we match the original slug stored in theme_mods and post meta.
	$slug = $post->post_name;
	if ( str_ends_with( $slug, '__trashed' ) ) {
		$slug = substr( $slug, 0, -strlen( '__trashed' ) );
	}

	$location_mods = array(
		'memberlite_post_footer_slug',
		'memberlite_page_footer_slug',
		'memberlite_archives_footer_slug',
	);
	foreach ( $location_mods as $mod ) {
		if ( get_theme_mod( $mod, 'memberlite-global-footer' ) === $slug ) {
			remove_theme_mod( $mod );
		}
	}

	if ( get_theme_mod( 'memberlite_global_footer_slug', '0' ) === $slug ) {
		remove_theme_mod( 'memberlite_global_footer_slug' );
	}

	// Clear per-page footer overrides that reference the deleted slug.
	delete_metadata( 'post', 0, '_memberlite_footer_override', $slug, true );
}
add_action( 'before_delete_post', 'memberlite_cleanup_footer_assignment_on_delete' );
