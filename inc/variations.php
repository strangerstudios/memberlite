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
 *   1. Per-page post meta override (_memberlite_footer_override) — pages only
 *   2. Location-specific theme_mod (post, page, archives)
 *   3. Global footer theme_mod (memberlite_global_footer_slug)
 *   4. Default footer ('0')
 *
 * Location-specific controls use 'memberlite-global-footer' as the sentinel
 * value meaning "defer to the global setting". Choosing '0' in a location
 * control is always literal. It forces the default footer for that location
 * regardless of what the global setting is.
 *
 * The resolved value is passed through the 'memberlite_footer_post_name' filter
 * before being returned, allowing developers to override the footer based on
 * any runtime condition (e.g., post category, protected by membership level).
 *
 * @since 7.1
 *
 * @return string post_name of the memberlite_footer post, or '0' for default.
 */
function memberlite_get_current_footer_post_name() {
	$footer_variations = memberlite_get_footer_variations();
	$post_name         = '0';

	if ( ! empty( $footer_variations ) ) {
		// Per-page override takes priority over all Customizer settings (pages only).
		$override = is_singular( 'page' ) ? get_post_meta( get_the_ID(), '_memberlite_footer_override', true ) : '';

		if ( '' !== $override && isset( $footer_variations[ $override ] ) ) {
			$post_name = $override;
		} else {
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
			// fall back to the default footer rather than rendering nothing.
			if ( ! isset( $footer_variations[ $post_name ] ) ) {
				$post_name = '0';
			}
		}
	}

	/**
	 * Filters the resolved footer post_name before it is used.
	 *
	 * @since 7.1
	 *
	 * @param string $post_name The resolved post_name, or '0' for the default footer.
	 */
	return apply_filters( 'memberlite_footer_post_name', $post_name );
}

/**
 * Render a footer variation.
 *
 * Looks up the memberlite_footer CPT post by post_name (as stored in the
 * theme_mod) and renders its block content. Does nothing if the post is not
 * found; the default footer fallback is handled upstream in footer.php.
 *
 * @since 7.1
 * @param string $post_name The post_name of the memberlite_footer post to render.
 */
function memberlite_render_footer_variation( $post_name ): bool {
	if ( ! empty( $post_name ) && '0' !== $post_name ) {
		$footer_post = get_page_by_path( $post_name, OBJECT, 'memberlite_footer' );

		if ( $footer_post && 'publish' === $footer_post->post_status ) {
			echo do_shortcode( do_blocks( $footer_post->post_content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			return true;
		}
	}

	return false;
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

	$footer_choices = array();
	foreach ( $footer_posts as $footer_post ) {
		$footer_choices[ $footer_post->post_name ] = $footer_post->post_title;
	}

	set_transient( 'memberlite_footer_variations', $footer_choices, 12 * HOUR_IN_SECONDS );

	return $footer_choices;
}

/*
 * =========================================================================
 * Header Variations
 * =========================================================================
 */

/**
 * Get the post_name of the current header variation.
 *
 * Returns '0' if no CPT header variation is selected (default header).
 *
 * @since TBD
 * @return string
 */
function memberlite_get_current_header_post_name(): string {
	$post_name = get_theme_mod( 'memberlite_default_header_slug', '0' );
	return empty( $post_name ) ? '0' : $post_name;
}

/**
 * Render a header variation.
 *
 * Looks up the memberlite_header CPT post by post_name and renders its block
 * content. Returns true on success, false if the post was not found or is not
 * published; the default header fallback is handled upstream in header.php.
 *
 * @since TBD
 * @param string $post_name The post_name of the memberlite_header post to render.
 * @return bool True if the variation was rendered, false otherwise.
 */
function memberlite_render_header_variation( string $post_name ): bool {
	if ( ! empty( $post_name ) && '0' !== $post_name ) {
		$header_post = get_page_by_path( $post_name, OBJECT, 'memberlite_header' );

		if ( $header_post && 'publish' === $header_post->post_status ) {
			echo do_shortcode( do_blocks( $header_post->post_content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			return true;
		}
	}

	return false;
}

/**
 * Get memberlite_header posts for variation options.
 *
 * @since TBD
 * @param string $default_label Optional label for the default option.
 * @return array
 */
function memberlite_get_header_variations( string $default_label = '' ): array {
	if ( '' === $default_label ) {
		$default_label = __( '— Default —', 'memberlite' );
	}

	$header_posts = get_posts( array(
		'post_type'      => 'memberlite_header',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC',
	) );

	$header_choices = array(
		'0' => $default_label,
	);

	foreach ( $header_posts as $header_post ) {
		$header_choices[ $header_post->post_name ] = $header_post->post_title;
	}

	return $header_choices;
}

/**
 * Returns true when the active header variation is the default PHP-based header.
 *
 * @since TBD
 * @return bool
 */
function memberlite_is_default_header_active(): bool {
	$slug = get_theme_mod( 'memberlite_default_header_slug', '0' );
	return empty( $slug ) || '0' === $slug;
}

/**
 * Output an "Edit Header" link for users who can edit the current header post.
 *
 * Only renders for CPT-based headers (not the default header).
 *
 * @since TBD
 * @param string $post_name The post_name of the current header post.
 */
function memberlite_the_header_edit_link( string $post_name ): void {
	if ( empty( $post_name ) || '0' === $post_name ) {
		return;
	}

	$header_post = get_page_by_path( $post_name, OBJECT, 'memberlite_header' );

	if ( ! $header_post || ! current_user_can( 'edit_post', $header_post->ID ) ) {
		return;
	}

	$edit_url = get_edit_post_link( $header_post->ID );

	if ( ! $edit_url ) {
		return;
	}

	echo '<div class="memberlite-variation-part-edit-link row has-global-padding">';
	echo '<a href="' . esc_url( $edit_url ) . '">' . esc_html__( 'Edit Header', 'memberlite' ) . '</a>';
	echo '</div>';
}

/*
 * =========================================================================
 * Footer Variations (edit links)
 * =========================================================================
 */

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
 * Only renders for CPT-based footers (not the default footer). Uses the
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

	echo '<div class="memberlite-variation-part-edit-link row has-global-padding">';
	echo '<a href="' . esc_url( $edit_url ) . '">' . esc_html__( 'Edit Footer', 'memberlite' ) . '</a>';
	echo '</div>';
}
