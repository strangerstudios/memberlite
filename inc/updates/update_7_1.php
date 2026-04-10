<?php
/**
 * Memberlite 7.1 Update Functions
 *
 * @package Memberlite
 * @since 7.1
 */

/**
 * Seed a default footer post from the footer-01 pattern.
 *
 * Creates a single memberlite_footer post for users who don't have any yet.
 * For new installs, also sets the default footer theme_mod so the block-based
 * footer is active out of the box. For existing/legacy users, leaves the
 * default unset so the legacy footer continues to render.
 *
 * Hooked to init at priority 20 so the memberlite_footer CPT is registered
 * (priority 10) before we attempt to insert a post of that type.
 *
 * @since 7.1
 * @return void
 */
function memberlite_seed_default_footer(): void {
	// Skip if any footer posts already exist.
	$existing = get_posts( array(
		'post_type'      => 'memberlite_footer',
		'post_status'    => 'publish',
		'posts_per_page' => 1,
		'fields'         => 'ids',
	) );

	if ( ! empty( $existing ) ) {
		return;
	}

	// Capture the pattern file output via output buffering since it contains PHP.
	$pattern_file = get_template_directory() . '/patterns/footer-01.php';
	if ( ! file_exists( $pattern_file ) ) {
		return;
	}

	ob_start();
	require $pattern_file;
	$content = ob_get_clean();

	$post_id = wp_insert_post( array(
		'post_type'    => 'memberlite_footer',
		'post_status'  => 'publish',
		'post_title'   => __( 'Footer 01', 'memberlite' ),
		'post_name'    => 'memberlite-footer-01',
		'post_content' => $content,
	) );

	// Use the actual post_name WordPress assigned rather than the intended slug.
	// If a slug collision exists (e.g. a trashed post with the same name), WordPress
	// will suffix the slug (e.g. memberlite-footer-01-2), and hardcoding the intended
	// slug in the theme_mod would point to a post that doesn't exist.
	if ( is_wp_error( $post_id ) || empty( $post_id ) ) {
		return;
	}

	// For new installs only, set the global default footer so the block-based footer
	// is active immediately. Location-specific mods default to 'memberlite-global-footer'
	// (inherit from global), so changing the global in the Customizer affects all locations.
	// Existing/legacy users keep the legacy footer.
	$is_fresh_activation = get_option( 'memberlite_fresh_activation', false );
	if ( $is_fresh_activation ) {
		$seeded_post = get_post( $post_id );
		set_theme_mod( 'memberlite_global_footer_slug', $seeded_post->post_name );
		delete_option( 'memberlite_fresh_activation' );
	}
}
// Hook to init so the memberlite_footer CPT is registered before we insert.
add_action( 'init', 'memberlite_seed_default_footer', 20 );
