<?php
/**
 * Helper functions for variations.
 *
 * @package Memberlite
 *
 * @since 7.0
 */

/*
 * Checks location-specific theme_mods first (single post, page, archives),
 * then falls back to the global default footer setting.
 *
 * @since TBD
 *
 * @return string post_name of the memberlite_footer post, or '0' if none is set.
 */
function memberlite_get_current_footer_post_name() {
	// Per-page override takes priority over all Customizer settings.
	if ( is_singular() ) {
		$override = get_post_meta( get_the_ID(), '_memberlite_footer_override', true );
		if ( '' !== $override ) {
			return $override;
		}
	}

	$post_name = '0';

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

	return $post_name;
}

/**
 * Render a footer variation.
 *
 * Looks up the memberlite_footer CPT post by post_name (as stored in the
 * theme_mod) and renders its block content. Does nothing if the post is not
 * found; the legacy footer fallback is handled upstream in footer.php.
 *
 * @since TBD
 * @param string $post_name The post_name of the memberlite_footer post to render.
 */
function memberlite_render_footer_variation( $post_name ) {
	if ( ! empty( $post_name ) && '0' !== $post_name ) {
		$footer_post = get_page_by_path( $post_name, OBJECT, 'memberlite_footer' );

		if ( $footer_post ) {
			echo do_blocks( $footer_post->post_content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

/**
 * Get memberlite_footer posts for our variation options
 *
 * @since TBD
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
		'0' => __( '— Use legacy footer —', 'memberlite' ),
	);

	if ( ! empty( $footer_posts ) ) {
		foreach ( $footer_posts as $footer_post ) {
			$footer_choices[ $footer_post->post_name ] = $footer_post->post_title;
		}
	}

	return $footer_choices;
}
