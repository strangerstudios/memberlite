<?php
function memberlite_fa_shortcode($atts, $content = null) {
	// $atts    ::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// examples: [fa icon="comment" color="primary"]

    extract(shortcode_atts(array(
		'icon' => '',
		'color' => '',
    ), $atts));
    $r = '<i class="fa fa-' . $icon;
	if(!empty($color))
	{
		$r .= ' ' . $color;
	}
	$r .= '"></i>';
    return $r;
}
add_shortcode('fa', 'memberlite_fa_shortcode');
