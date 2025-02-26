<?php
/**
 * Accordion Wrapper
 */
function memberlite_accordion_shortcode( $atts, $content = null ) {
	// $atts    ::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// examples: [memberlite_accordion class="text-center"][/memberlite_accordion]
	extract( shortcode_atts( array(
		'class' => '',
	), $atts ) );

	// Build the classes.
	$classes = array( 'memberlite_accordion' );
	if ( ! empty( $class ) ) {
		$classes[] = $class;
	}
	$class = implode( ' ', $classes );

	// Build accordion wrapper.
	$result = '<div class="' . esc_attr( $class ) . '">';
	$content = str_replace( ']<br />', ']', $content );
	$content = str_replace( '<br />\n[', '[', $content );
	$result .= do_shortcode( $content );
	$result .= '</div>';
	return force_balance_tags( $result );
}
add_shortcode( 'memberlite_accordion', 'memberlite_accordion_shortcode' );

/**
 * Accordion Item Wrapper
 */
function memberlite_accordion_item_shortcode( $atts, $content = null ) {
	// $atts    ::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// examples: [memberlite_accordion_item title="Sample Accordion Item 1" class="text-2x"]
	extract( shortcode_atts( array(
		'class' => '',
		'title' => '',
	), $atts ) );

	// Build the classes.
	$classes = array( 'memberlite_accordion-item' );
	if ( ! empty( $class ) ) {
		$classes[] = $class;
	}
	$class = implode( ' ', $classes );

	// Build the accordion items.
	static $count = 0;
	$count++;
	$result = '<div id="memberlite_accordion-item_' . esc_attr( $count ) . '" class="' . esc_attr( $class ) . '">';
	$result .= '<h2>' . wp_kses_post( $title ) . '</h2>';
	$result .= '<div class="memberlite_accordion-item-content">';
	$result .= do_shortcode( $content );
	$result .= '</div></div>';
	return force_balance_tags( $result );
}
add_shortcode( 'memberlite_accordion_item', 'memberlite_accordion_item_shortcode' );
