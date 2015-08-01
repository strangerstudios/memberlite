<?php
function memberlite_btn_shortcode($atts, $content = null) {
	// $atts    ::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// examples: [memberlite_btn style="success" href="http://www.paidmembershipspro.com" text="Paid Memberships Pro" icon="info"]
    extract(shortcode_atts(array(
		'style' => 'default',
		'href' => '#',
		'icon' => '',
		'target' => 'self',
		'text' => 'Go to Link'
    ), $atts));
	
	if($style == 'link')
		$r = '<a class="btn_link" href="' . $href . '" target="_' . $target . '">';
	else
		$r = '<a class="btn btn_' . $style . '" href="' . $href . '" target="_' . $target . '">';
	if(!empty($icon))
		$r .= '<i class="fa fa-' . $icon . '"></i>';	
    $r .= $text;
    $r .= '</a>';
    return $r;
}
add_shortcode('memberlite_btn', 'memberlite_btn_shortcode');
