<?php
/**
 * Helper functions for variations.
 *
 * @package Memberlite
 *
 * @since 7.1
 */

/*
 * Checks post_meta override first,
 * then checks location-specific theme_mods (single post, page, archives),
 * then falls back to the global default footer setting.
 *
 * @since 7.1
 *
 * @return string post_name of the memberlite_footer post, or '0' if none is set.
 */
function memberlite_get_current_footer_post_name() {
	$footer_variations = memberlite_get_footer_variations();
	$post_name         = '0';

	// If no footer posts exist, fall back to legacy immediately.
	if ( count( $footer_variations ) === 1 ) {
		return $post_name;
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
		$post_name = get_theme_mod( 'memberlite_post_footer_slug', '0' );
	} elseif ( is_page() ) {
		$post_name = get_theme_mod( 'memberlite_page_footer_slug', '0' );
	} elseif ( is_archive() || is_home() ) {
		$post_name = get_theme_mod( 'memberlite_archives_footer_slug', '0' );
	}

	// Fall back to the global default if the context-specific setting is unset.
	if ( empty( $post_name ) || '0' === $post_name ) {
		$post_name = get_theme_mod( 'memberlite_default_footer_slug', '0' );
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
 * @since 7.1
 *
 * @return array
 */
function memberlite_get_footer_variations(): array {
	$footer_posts = get_posts( array(
		'post_type'      => 'memberlite_footer',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC',
	) );

	$footer_choices = array(
		'0' => __( '— Use Legacy Footer —', 'memberlite' ),
	);

	if ( ! empty( $footer_posts ) ) {
		foreach ( $footer_posts as $footer_post ) {
			$footer_choices[ $footer_post->post_name ] = $footer_post->post_title;
		}
	}

	return $footer_choices;
}

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
	if ( empty( $post_name ) || '0' === $post_name ) {
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
