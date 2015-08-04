<?php
// Tabs Content Wrapper
function memberlite_tabs_shortcode($atts, $content = null) {
	// $atts    ::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// examples: [memberlite_tabs class="text-center" items="Tab 1, Tab 2, Tab 3"][/tabs]
    extract(shortcode_atts(array(
		'class' => '',
		'items' => '',
    ), $atts));
	$items = explode(",",$items);
	
	//figure out the active tab and store in a global
	global $post, $memberlite_active_tabs;
	$cookie_name = 'memberlite_active_tabs_' . $post->ID . '_' . count($memberlite_active_tabs);
	if(!empty($_COOKIE[$cookie_name]))
		$cookie_value = $_COOKIE[$cookie_name];
	if(!empty($cookie_value))
		$memberlite_active_tabs[] = $cookie_value;
	else
		$memberlite_active_tabs[] = $items[0];
	
	//build tab menu
	$count = '1';
    $result = '<div class="memberlite_tabbable ' . $class . '">';
    $result .= '<ul class="memberlite_tabs">';
	foreach($items as $item)
	{	
		$item_id = sanitize_title_with_dashes($item);
		$result .= '<li';
		if($item == $memberlite_active_tabs[count($memberlite_active_tabs)-1])
			$result .= ' class="memberlite_active"';
		$result .= '><a href="#tab-' . $item_id . '" data-toggle="tab">' . $item . '</a></li>';
	}
	$result .= '</ul><div class="memberlite_tab_content">';
    $content = str_replace("]<br />", ']', $content);
    $content = str_replace("<br />\n[", '[', $content);
    $result .= do_shortcode($content);
    $result .= '</div></div>';
    return force_balance_tags($result);
}
add_shortcode('memberlite_tabs', 'memberlite_tabs_shortcode');

function memberlite_tab_shortcode($atts, $content = null) {
	// $atts    ::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// examples: [memberlite_tab class="text-center" item="Tab 1"]
    extract(shortcode_atts(array(
		'class' => '',
		'item' => '',
    ), $atts));
	global $memberlite_active_tabs;
	$item_id = sanitize_title_with_dashes($item);
    $result = '<div class="memberlite_tab_pane ' . $class;
	if($item == $memberlite_active_tabs[count($memberlite_active_tabs)-1])
		$result .= ' memberlite_active';
	$result .= '" id="tab-' . $item_id . '" >';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return force_balance_tags($result);
}
add_shortcode('memberlite_tab', 'memberlite_tab_shortcode');