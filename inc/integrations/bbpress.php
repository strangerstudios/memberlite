<?php
/**
 * Integration for bbPress
 *
 * @package Memberlite
 */

/**
 * Filter the page title for bbPress pages.
 *
 * @param string $page_title_html The page title HTML.
 * @return string The filtered page title HTML.
 */
function memberlite_bbpress_page_title( $page_title_html ) {
	if ( ! is_bbpress() && ! bbp_is_single_user() ) {
		return $page_title_html;
	}

	ob_start();
	?>
	<h1 id="page-title">
	<?php
	if ( bbp_is_search_results() ) {
		/* translators: %s: bbPress forum search terms */
		printf( esc_html__( 'Forum Search Results for: %s', 'memberlite' ), '<span>' . esc_html( bbp_get_search_terms() ) . '</span>' );
	} elseif ( bbp_is_search() ) {
		esc_html_e( 'Forum Search', 'memberlite' );
	} elseif ( bbp_is_single_forum() || bbp_is_single_topic() ) {
		the_title();
	} elseif ( bbp_is_single_user() ) {
		/* translators: %s: bbPress user profile display name */
		echo sprintf( esc_html__( '%s\'s Profile', 'memberlite' ), esc_html( get_userdata( bbp_get_user_id() )->display_name ) );
	} else {
		esc_html_e( 'Forums', 'memberlite' );
	}
	?>
	</h1>
	<?php

	return ob_get_clean();
}
add_filter( 'memberlite_get_page_title', 'memberlite_bbpress_page_title' );

/* Customizes the bbp_breadcrumb output */
function memberlite_bbp_breadcrumb( $args ) {
	global $memberlite_defaults;
	$args = array(
		'sep'       => get_theme_mod( 'delimiter', $memberlite_defaults['delimiter'] ),
		'home_text' => __( 'Home', 'memberlite' ),
		'before'    => '',
		'after'     => '',
	);
	return $args;
}
add_filter( 'bbp_before_get_breadcrumb_parse_args', 'memberlite_bbp_breadcrumb' );

/* Removes bbp_breadcrumb from bbpress templates */
add_filter( 'bbp_no_breadcrumb', '__return_true' );

/**
 * Fix so that bbPress search results page uses the assigned 'forum' post type sidebar, if specified, instead of the default sidebar.
 *
 * @param array $widget_areas Array of sidebar IDs.
 */
function memberlite_bbpress_search_widget_areas( $widget_areas ) {
	// Only modify widget areas for bbPress search results page, otherwise return the default widget areas.
	if ( ! bbp_is_search() ) {
		return $widget_areas;
	}

	// Get the assigned sidebar for the 'forum' post type.
	$forum_sidebar = memberlite_get_default_sidebar_by_post_type( 'forum' );
	if ( 'memberlite_sidebar_default' !== $forum_sidebar ) {
		return array( $forum_sidebar );
	}

	return $widget_areas;
}
add_filter( 'memberlite_get_widget_areas', 'memberlite_bbpress_search_widget_areas' );
