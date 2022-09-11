<?php
/**
 * Deprecated hooks, filters and functions
 *
 * @package Memberlite
 */

/**
 * Handle renamed hooks
 */
global $memberlite_map_deprecated_hooks;

$memberlite_map_deprecated_hooks = array(
	'memberlite_before_page'            => 'before_page',
	'memberlite_after_page'             => 'after_page',
	'memberlite_before_mobile_nav'      => 'before_mobile_nav',
	'memberlite_after_mobile_nav'       => 'after_mobile_nav',
	'memberlite_before_site_header'     => 'before_site_header',
	'memberlite_before_site_navigation' => 'before_site_navigation',
	'memberlite_before_masthead'        => 'before_masthead',
	'memberlite_after_masthead'         => 'after_masthead',
	'memberlite_before_masthead_inner'  => 'before_masthead_inner',
	'memberlite_after_masthead_inner'   => 'after_masthead_inner',
	'memberlite_before_content'         => 'before_content',
	'memberlite_after_content'          => 'after_content',
	'memberlite_before_main'            => 'before_main',
	'memberlite_after_main'             => 'after_main',
	'memberlite_before_loop'            => 'before_loop',
	'memberlite_after_loop'             => 'after_loop',
	'memberlite_before_content_page'    => 'before_content_page',
	'memberlite_after_content_page'     => 'after_content_page',
	'memberlite_before_content_single'  => 'before_content_single',
	'memberlite_after_content_single'   => 'after_content_single',
	'memberlite_before_sidebar'         => 'before_sidebar',
	'memberlite_after_sidebar'          => 'after_sidebar',
	'memberlite_before_sidebar_widgets' => 'before_sidebar_widgets',
	'memberlite_after_sidebar_widgets'  => 'after_sidebar_widgets',
	'memberlite_before_footer'          => 'before_footer',
	'memberlite_after_footer'           => 'after_footer',
	'memberlite_before_footer_widgets'  => 'before_footer_widgets',
	'memberlite_after_footer_widgets'   => 'after_footer_widgets',
	'memberlite_before_site_info'       => 'before_site_info',
	'memberlite_after_site_info'        => 'after_site_info',
);

// anonymous function used below is only supported in php 5.3+
foreach ( $memberlite_map_deprecated_hooks as $new => $old ) {
	// assumes hooks with no parameters
	if ( version_compare( phpversion(), '5.3.0', '>=' ) ) {
		// Using anonmyous functions for PHP 5.3+
		$func = function() use ( $new, $old ) {
			memberlite_maybe_show_deprecated_hook_message( $new, $old );
		};
	} else {
		// Using create_function for PHP 5.2
		$func = create_function( '', "memberlite_maybe_show_deprecated_hook_message( '$new', '$old' );" );
	}
	add_action( $new, $func );
}

function memberlite_maybe_show_deprecated_hook_message( $new, $old ) {
	if ( has_filter( $old ) ) {
		/* translators: 1: the old hook name, 2: the new or replacement hook name */
		trigger_error( sprintf( esc_html__( 'The %1$s hook has been deprecated since version 3.1 of Memberlite. Please use the %2$s hook instead.', 'memberlite' ), esc_html( $old ), esc_html( $new ) ) );
		do_action( $old );
	}
}
