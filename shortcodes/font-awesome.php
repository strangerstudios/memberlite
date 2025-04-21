<?php
function memberlite_fa_shortcode($atts, $content = null) {
	// $atts	::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// examples: [fa icon="comment" color="primary" type="solid" size="3x"]

	extract(shortcode_atts(array(
		'color' => null,
		'icon' => '',
		'size' => null,
		'type' => null,
		'rotate' => null,
		'flip' => null,
		'animate' => null,
	), $atts));
	$r = '<i class="';

	$font_awesome_icons_brands = memberlite_get_font_awesome_icons( 'brand' );

	// Check if the icon is a "brand" icon and set the type attribute.
	if ( in_array( $icon, $font_awesome_icons_brands ) ) {
		$type = 'brand';
	}

	if ( ! empty( $type ) ) {
		if ( $type === 'regular' ) {
			$classes[] = 'far';
		} elseif ( $type === 'solid' ) {
			$classes[] = 'fas';
		} elseif ( $type === 'brand' ) {
			$classes[] = 'fab';
		}
	} else {
		$classes[] = 'fa';
	}

	$classes[] = ' fa-' . $icon;

	if ( ! empty( $color ) ) {
		$classes[] = ' ' . $color;
	}

	if ( ! empty($size ) ) {
		$classes[] = ' fa-' . $size;
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
remove_shortcode('fa');	//replace shortcode bundled with Memberlite 2.0 and prior or anywhere else
add_shortcode('fa', 'memberlite_fa_shortcode');
