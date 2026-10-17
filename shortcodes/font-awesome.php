<?php
/**
 * Renders the [fa] shortcode as a Font Awesome icon element.
 *
 * Example: [fa icon="comment" color="primary" type="solid" size="3x"]
 *
 * @param array $atts {
 *     Shortcode attributes.
 *
 *     @type string $icon       Font Awesome icon slug, e.g. 'comment', 'star'. See memberlite_get_font_awesome_icons() for the full supported set. Default ''.
 *     @type string $type       Icon style. One of 'solid', 'regular', 'brand'. Auto-detected as 'brand' when $icon is a brand icon; otherwise falls back to the base 'fa' class if omitted. Default null.
 *     @type string $size       Font Awesome size keyword (e.g. 'sm', 'lg', '2x'), applied as the fa-{size} class — see the Font Awesome docs for supported values. Default null.
 *     @type string $color      Icon color. One of 'primary', 'secondary', 'action', 'white', 'text', 'site-background', 'site-navigation', 'site-navigation-background', 'footer-widgets', 'footer-widgets-background'. Default null.
 *     @type string $background Icon background color. Same options as $color. Default null.
 *     @type string $shape      Icon background shape. One of 'square', 'circle', 'squircle'. Default null.
 *     @type string $rotate     Rotation angle, per Font Awesome's fa-rotate-{value} classes. Default null.
 *     @type string $flip       Flip direction, per Font Awesome's fa-flip-{value} classes. Default null.
 *     @type string $animate    Animation name, per Font Awesome's fa-{animate} classes. Default null.
 * }
 * @param string|null $content Shortcode content. Unused.
 * @return string HTML markup for the icon (an <i> element with Font Awesome classes).
 */
function memberlite_fa_shortcode( $atts, $content = null ) {
	// extract() defines the PHP variables for $color, $background, $shape, etc. from the shortcode attributes.
	extract( shortcode_atts( array(
		'color' => null,
		'background' => null,
		'shape' => null,
		'icon' => '',
		'size' => null,
		'type' => null,
		'rotate' => null,
		'flip' => null,
		'animate' => null,
	), $atts ) );
	$r = '<i class="';

	$font_awesome_icons_brands = memberlite_get_font_awesome_icons( 'brand' );

	// Check if the icon is a "brand" icon and set the type attribute.
	if ( in_array( $icon, $font_awesome_icons_brands ) ) {
		$type = 'brand';
	}

	// Set a class based on supported Font Awesome types. If $type is empty/null, default to 'fa'.
	$classes = array();
	switch ( $type ) {
		case 'regular':
			$classes[] = 'far';
			break;
		case 'solid':
			$classes[] = 'fas';
			break;
		case 'brand':
			$classes[] = 'fab';
			break;
		default:
			$classes[] = 'fa';
	}

	$classes[] = 'fa-' . $icon;

	// Also applies to background colors
	$allowlist_colors = array(
		'primary',
		'secondary',
		'action',
		'white',
		'text',
		'site-background',
		'site-navigation',
		'site-navigation-background',
		'footer-widgets',
		'footer-widgets-background',
	);

	if ( $color && in_array( $color, $allowlist_colors, true ) ) {
		$classes[] = 'color-' . $color;
	}

	if ( $background && in_array( $background, $allowlist_colors, true ) ) {
		$classes[] = 'bg-' . $background;
	}

	if ( ! empty( $shape ) ) {
		if ( $shape === 'square' ) {
			$classes[] = 'shape-square';
		} elseif ( $shape === 'circle' ) {
			$classes[] = 'shape-circle';
		} elseif ( $shape === 'squircle' ) {
			$classes[] = 'shape-squircle';
		}
	}

	if ( ! empty( $size ) ) {
		$classes[] = 'fa-' . $size;
	}

	if ( ! empty( $rotate ) ) {
		$classes[] = 'fa-rotate-' . $rotate;
	}

	if ( ! empty( $flip ) ) {
		$classes[] = 'fa-flip-' . $flip;
	}

	if ( ! empty( $animate ) ) {
		$classes[] = 'fa-' . $animate;
	}

	return sprintf(
		'<i class="%1$s"></i>',
		esc_attr( implode( ' ', $classes ) )
	);
}
remove_shortcode( 'fa' );	//replace shortcode bundled with Memberlite 2.0 and prior or anywhere else
add_shortcode( 'fa', 'memberlite_fa_shortcode' );
