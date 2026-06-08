<?php
/**
 * One-time clone of Memberlite parent theme settings to a freshly activated child theme.
 *
 * When a user activates a Memberlite child theme that doesn't yet have its own
 * customizations, we copy the parent's Customizer settings (theme_mods) and
 * Additional CSS into the child so the site appearance doesn't shift dramatically.
 *
 * The gate is data-driven: if the child already has meaningful theme_mods, we
 * leave it alone. That way this naturally runs only once per child theme.
 *
 * @package Memberlite
 * @since TBD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * On child theme activation, copy parent Memberlite settings to the child if the
 * child has no meaningful theme_mods of its own yet.
 *
 * @since TBD
 */
function memberlite_maybe_clone_parent_settings_on_activation() {
	// Only act when a child theme of Memberlite is now active.
	if ( ! is_child_theme() || 'memberlite' !== get_template() ) {
		return;
	}

	$child_stylesheet = get_stylesheet();

	// Bail if the child already has its own customizations.
	// Ignore noise that WP / plugins add automatically: numeric-keyed sentinels,
	// WP-seeded `nav_menu_locations`, and auto-created `custom_css_post_id`.
	$child_mods = get_option( 'theme_mods_' . $child_stylesheet, null );
	if ( is_array( $child_mods ) ) {
		$ignored = array( 'nav_menu_locations', 'custom_css_post_id' );
		foreach ( $child_mods as $key => $value ) {
			if ( ! is_string( $key ) || in_array( $key, $ignored, true ) ) {
				continue;
			}
			// Real Customizer setting found. Leave the child alone.
			return;
		}
	}

	// Pull parent settings.
	$parent_mods = get_option( 'theme_mods_memberlite', null );
	if ( ! is_array( $parent_mods ) || empty( $parent_mods ) ) {
		return;
	}

	// Strip keys that shouldn't cross theme boundaries.
	// `custom_css_post_id` points to a parent-scoped CSS post; we handle CSS separately below.
	// `memberlite_darkcss` is a deprecated mod.
	$skip_keys = array( 'custom_css_post_id', 'memberlite_darkcss' );
	foreach ( array_keys( $parent_mods ) as $key ) {
		if ( ! is_string( $key ) ) {
			continue;
		}
		if ( in_array( $key, $skip_keys, true ) || 0 === strpos( $key, '_transient_' ) ) {
			unset( $parent_mods[ $key ] );
		}
	}

	if ( empty( $parent_mods ) ) {
		return;
	}

	// One write instead of N set_theme_mod() calls. This MUST run before the CSS copy
	// below: wp_update_custom_css_post() will set_theme_mod( 'custom_css_post_id', ... )
	// on the active theme, and a wholesale option write here would clobber it.
	update_option( 'theme_mods_' . $child_stylesheet, $parent_mods );

	// Copy Additional CSS from the parent into the child's own CSS post.
	$parent_css = wp_get_custom_css( 'memberlite' );
	if ( ! empty( $parent_css ) && function_exists( 'wp_update_custom_css_post' ) ) {
		wp_update_custom_css_post( $parent_css, array( 'stylesheet' => $child_stylesheet ) );
	}

	// Flag the admin notice so the user knows what happened.
	set_transient( 'memberlite_cloned_parent_settings', 1, HOUR_IN_SECONDS );
}
add_action( 'after_switch_theme', 'memberlite_maybe_clone_parent_settings_on_activation' );

/**
 * Show a one-time admin notice after we cloned parent theme settings into a child.
 *
 * @since TBD
 */
function memberlite_cloned_parent_settings_notice() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	if ( ! get_transient( 'memberlite_cloned_parent_settings' ) ) {
		return;
	}

	delete_transient( 'memberlite_cloned_parent_settings' );

	echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Memberlite automatically copied your parent theme settings (colors, fonts, layout, menus, and Additional CSS) to this child theme so your site keeps the same look.', 'memberlite' ) . '</p></div>';
}
add_action( 'admin_notices', 'memberlite_cloned_parent_settings_notice' );
