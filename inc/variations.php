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
			$footer_variations = memberlite_get_footer_variations();
			if ( isset( $footer_variations[ $override ] ) ) {
				return $override;
			}
			// Invalid override — fall through to Customizer settings
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
			echo do_shortcode( do_blocks( $footer_post->post_content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
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
function memberlite_get_footer_variations( string $default_label = '' ): array {
	if ( '' === $default_label ) {
		$default_label = __( '— Use Legacy Footer —', 'memberlite' );
	}

	$footer_posts = get_posts( array(
		'post_type'      => 'memberlite_footer',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC',
	) );

	$footer_choices = array(
		'0' => $default_label,
	);

	if ( ! empty( $footer_posts ) ) {
		foreach ( $footer_posts as $footer_post ) {
			$footer_choices[ $footer_post->post_name ] = $footer_post->post_title;
		}
	}

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
 * Returns '0' if no CPT header variation is selected (legacy header).
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
 * content. Does nothing if the post is not found; the legacy header fallback
 * is handled upstream in header.php.
 *
 * @since TBD
 * @param string $post_name The post_name of the memberlite_header post to render.
 */
function memberlite_render_header_variation( string $post_name ): void {
	if ( empty( $post_name ) || '0' === $post_name ) {
		return;
	}

	$header_post = get_page_by_path( $post_name, OBJECT, 'memberlite_header' );

	if ( $header_post ) {
		echo do_shortcode( do_blocks( $header_post->post_content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

/**
 * Get memberlite_header posts for variation options.
 *
 * @since TBD
 * @param string $default_label Optional label for the legacy option.
 * @return array
 */
function memberlite_get_header_variations( string $default_label = '' ): array {
	if ( '' === $default_label ) {
		$default_label = __( '— Use Legacy Header —', 'memberlite' );
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
 * Returns true when the active header variation is the legacy PHP-based header.
 *
 * @since TBD
 * @return bool
 */
function memberlite_is_legacy_header_active(): bool {
	$slug = get_theme_mod( 'memberlite_default_header_slug', '0' );
	return empty( $slug ) || '0' === $slug;
}

/**
 * Output an "Edit Header" link for users who can edit the current header post.
 *
 * Only renders for CPT-based headers (not the legacy header).
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

	echo '<div class="memberlite-variation-part-edit-link">';
	echo '<a href="' . esc_url( $edit_url ) . '">' . esc_html__( 'Edit Header', 'memberlite' ) . '</a>';
	echo '</div>';
}

/*
 * =========================================================================
 * Footer Variations (edit links)
 * =========================================================================
 */

/**
 * Output an "Edit Footer" link for users who can edit the current footer post.
 *
 * Only renders for CPT-based footers (not the legacy footer). Uses the
 * standard WordPress edit post link.
 *
 * @since TBD
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
