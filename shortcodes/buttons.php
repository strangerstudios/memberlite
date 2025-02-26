<?php
function memberlite_btn_shortcode($atts, $content = null) {
	// $atts    ::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// examples: [memberlite_btn style="success" href="http://www.paidmembershipspro.com" text="Paid Memberships Pro" icon="info"]
    extract(shortcode_atts(array(
		'style' => 'default',
		'class' => '',
		'href' => '#',
		'icon' => '',
		'icon_position' => '',
		'target' => 'self',
		'text' => 'Go to Link'
    ), $atts));

    //css classes based on styles
    $styles = explode(",", $style);
	$style_classes = array();
	foreach($styles as $onestyle) {
		$style_classes[] = 'btn_'.trim($onestyle);
	}

    $font_awesome_icons_brands = memberlite_get_font_awesome_icons( 'brand' );

    // Check if the icon is a "brand" icon and set the type attribute.
    if ( in_array( $icon, $font_awesome_icons_brands ) ) {
        $icon_class = 'fab';
    } else {
        $icon_class = 'fa';
    }

	//combine with classes passed in as an attribute
	if( $style === 'link' ) {
		$class = trim(implode(' ', $style_classes) . ' ' . $class);
	} else {
		$class = trim('btn ' . implode(' ', $style_classes) . ' ' . $class);
	}

	$r = '<a class="' . esc_attr( $class ) . '" href="' . esc_url( $href ) . '" target="_' . esc_attr( $target ) . '">';

	if( !empty( $icon ) && ( empty($icon_position) || ($icon_position == 'before') ) ) {
        $r .= '<i class="' . esc_attr( $icon_class ) . ' fa-' . esc_attr( $icon ) . '"></i>';
	}
    $r .= $text;
	if( !empty( $icon ) && ( $icon_position == 'after' ) ) {
		$r .= '<i class="' . esc_attr( $icon_class ) . ' fa-' . esc_attr( $icon ) . '"></i>';
	}
    $r .= '</a>';
    return $r;
}
remove_shortcode('memberlite_btn');
add_shortcode('memberlite_btn', 'memberlite_btn_shortcode');
