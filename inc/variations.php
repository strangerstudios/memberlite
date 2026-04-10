<?php
/**
 * Helper functions for variations.
 *
 * @package Memberlite
 *
 * @since 7.1
 */

/**
 * Resolve which footer post_name to use for the current request.
 *
 * Priority order (highest to lowest):
 *   1. Per-page post meta override (_memberlite_footer_override)
 *   2. Location-specific theme_mod (post, page, archives)
 *   3. Global footer theme_mod (memberlite_global_footer_slug)
 *   4. Legacy footer (returned as '0')
 *
 * Location-specific controls use 'memberlite-global-footer' as the sentinel
 * value meaning "defer to the global setting". Choosing '0' in a location
 * control is always literal — it forces the legacy footer for that location
 * regardless of what the global setting is.
 *
 * @since 7.1
 *
 * @return string post_name of the memberlite_footer post, or '0' for legacy.
 */
function memberlite_get_current_footer_post_name() {
	$footer_variations = memberlite_get_footer_variations();
	$post_name         = '0';

	// If no footer posts exist, fall back to legacy immediately.
	if ( empty( $footer_variations ) || ( count( $footer_variations ) === 1 && isset( $footer_variations['0'] ) ) ) {
		return $post_name; // return '0'
	}

	// Per-page override takes priority over all Customizer settings.
	if ( is_singular() ) {
		$override = get_post_meta( get_the_ID(), '_memberlite_footer_override', true );
		if ( '' !== $override && isset( $footer_variations[ $override ] ) ) {
			return $override;
		}
		// Invalid override — fall through to Customizer settings.
	}

	if ( is_singular( 'post' ) ) {
		$post_name = get_theme_mod( 'memberlite_post_footer_slug', 'memberlite-global-footer' );
	} elseif ( is_page() ) {
		$post_name = get_theme_mod( 'memberlite_page_footer_slug', 'memberlite-global-footer' );
	} elseif ( is_archive() || is_home() ) {
		$post_name = get_theme_mod( 'memberlite_archives_footer_slug', 'memberlite-global-footer' );
	}

	// 'memberlite-global-footer' means the location is set to inherit from the global setting.
	if ( 'memberlite-global-footer' === $post_name ) {
		$post_name = get_theme_mod( 'memberlite_global_footer_slug', '0' );
	}

	// Validate that the resolved post still exists. If it has been deleted,
	// fall back to the legacy footer rather than rendering nothing.
	if ( '0' !== $post_name && ! isset( $footer_variations[ $post_name ] ) ) {
		return '0';
	}

	return $post_name;
}

/**
 * Render a footer variation.
 *
 * Looks up the memberlite_footer CPT post by post_name (as stored in the
 * theme_mod) and renders its block content. Does nothing if the post is not
 * found; the legacy footer fallback is handled upstream in footer.php.
 *
 * @since 7.1
 * @param string $post_name The post_name of the memberlite_footer post to render.
 */
function memberlite_render_footer_variation( $post_name ) {
	if ( ! empty( $post_name ) && '0' !== $post_name ) {
		$footer_post = get_page_by_path( $post_name, OBJECT, 'memberlite_footer' );

		if ( $footer_post ) {
			echo do_shortcode( do_blocks( $footer_post->post_content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

/**
 * Get memberlite_footer posts for our variation options
 *
 * Results are cached in a transient for 12 hours. The cache is busted
 * automatically whenever a memberlite_footer post is saved, trashed, or
 * permanently deleted, so the Customizer always sees an accurate list.
 *
 * @since 7.1
 *
 * @return array
 */
function memberlite_get_footer_variations(): array {
	$cached = get_transient( 'memberlite_footer_variations' );
	if ( false !== $cached ) {
		return $cached;
	}

	$footer_posts = get_posts( array(
		'post_type'      => 'memberlite_footer',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC',
	) );

	// '0' is always present so the global control always has the legacy option,
	// including for existing users whose saved value is '0'. Location-specific
	// controls strip it separately via unset( $footer_choices_context['0'] ).
	$footer_choices = array(
		'0' => __( '— Use Legacy Footer —', 'memberlite' ),
	);

	foreach ( $footer_posts as $footer_post ) {
		$footer_choices[ $footer_post->post_name ] = $footer_post->post_title;
	}

	set_transient( 'memberlite_footer_variations', $footer_choices, 12 * HOUR_IN_SECONDS );

	return $footer_choices;
}

/**
 * Clear the footer variations transient cache.
 *
 * Hooked to save_post_memberlite_footer, which fires on publish, update,
 * trash, and untrash — covering every status transition for the CPT.
 *
 * @since 7.1
 * @return void
 */
function memberlite_flush_footer_variations_cache(): void {
	delete_transient( 'memberlite_footer_variations' );
}
add_action( 'save_post_memberlite_footer', 'memberlite_flush_footer_variations_cache' );

/**
 * Clear the footer variations cache when a memberlite_footer post is permanently deleted.
 *
 * save_post does not fire for permanent deletion, so this covers that gap.
 *
 * @since 7.1
 * @param int     $post_id The post ID being deleted.
 * @param WP_Post $post    The post object being deleted.
 * @return void
 */
function memberlite_flush_footer_variations_cache_on_delete( int $post_id, WP_Post $post ): void {
	if ( $post->post_type === 'memberlite_footer' ) {
		memberlite_flush_footer_variations_cache();
	}
}
add_action( 'deleted_post', 'memberlite_flush_footer_variations_cache_on_delete', 10, 2 );

/**
 * Output an "Edit Footer" link for users who can edit the current footer post.
 *
 * Only renders for CPT-based footers (not the legacy footer). Uses the
 * standard WordPress edit post link.
 *
 * @since 7.1
 *
 * @param string $post_name The post_name of the current footer post.
 */
function memberlite_the_footer_edit_link( string $post_name ): void {
	if ( empty( $post_name ) || $post_name === '0' ) {
		return;
	}

	$footer_post = get_page_by_path( $post_name, OBJECT, 'memberlite_footer' );

	if ( ! $footer_post || ! current_user_can( 'edit_post', $footer_post->ID ) ) {
		return;
	}

	$edit_url = get_edit_post_link( $footer_post->ID );

	if ( ! $edit_url ) {
		return;
	}

	echo '<div class="memberlite-variation-part-edit-link">';
	echo '<a href="' . esc_url( $edit_url ) . '">' . esc_html__( 'Edit Footer', 'memberlite' ) . '</a>';
	echo '</div>';
}
