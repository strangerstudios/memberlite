<?php
/**
 * Motion: the "Add Subtle Motion" setting and the in-view script for child themes.
 *
 * When the setting is on, memberlite_body_classes() adds `memberlite-has-motion` and the
 * theme's transitions run (see src/scss/base/_motion.scss). When it's off, nothing in the
 * theme animates. A visitor's `prefers-reduced-motion: reduce` setting turns motion off either way.
 *
 * @package Memberlite
 * @since TBD
 */

/**
 * Whether the "Add Subtle Motion" setting is on.
 *
 * @since TBD
 *
 * @return bool
 */
function memberlite_has_motion(): bool {
	global $memberlite_defaults;

	$default = isset( $memberlite_defaults['memberlite_motion'] ) ? $memberlite_defaults['memberlite_motion'] : true;

	/**
	 * Filter whether the theme's motion is on.
	 *
	 * @since TBD
	 *
	 * @param bool $has_motion True when the "Add Subtle Motion" setting is on.
	 */
	return (bool) apply_filters( 'memberlite_has_motion', (bool) get_theme_mod( 'memberlite_motion', $default ) );
}

/**
 * Crossfade between pages on the same site when motion is on.
 *
 * `@view-transition` can't be scoped to a body class, so it's printed only when the setting is on.
 *
 * @since TBD
 */
function memberlite_view_transitions_style() {
	if ( ! memberlite_has_motion() ) {
		return;
	}
	?>
	<style id="memberlite-view-transitions">@media (prefers-reduced-motion: no-preference) { @view-transition { navigation: auto; } }</style>
	<?php
}
add_action( 'wp_head', 'memberlite_view_transitions_style' );

/**
 * Register the in-view script. Child themes enqueue it with wp_enqueue_script( 'memberlite-motion' ).
 *
 * @since TBD
 */
function memberlite_register_motion_script() {
	wp_register_script(
		'memberlite-motion',
		MEMBERLITE_URL . '/js/memberlite-motion.js',
		array(),
		MEMBERLITE_VERSION,
		array(
			'in_footer' => false,
			'strategy'  => 'defer',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'memberlite_register_motion_script', 5 );
