<?php
/**
 * The memberlite_tabs shortcode.
 * This shortcode is a wrapper for each
 * individual membership_tab shortcode.
 *
 * Note: The JS for handling tabs is in the Memberlite theme.
 */
function memberlite_tabs_shortcode($atts, $content = null) {
	global $post, $memberlite_active_tabs;
    
    // $atts    ::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// examples: [memberlite_tabs class="text-center" items="Tab 1, Tab 2, Tab 3"][/tabs]
    extract(shortcode_atts(array(
		'class' => '',
		'items' => '',
    ), $atts));
	$items = explode(",",$items);
	// figure out the active tab and store in a global
	
	// wrapping div
    $result = '<div class="memberlite_tabbable ' . esc_attr( $class ) . '">';
    
    // tabs
    $result .= '<ul class="memberlite_tabs">';
    $count = '1';
    foreach($items as $item) {	
		$item_id = sanitize_title_with_dashes($item);
		$result .= '<li';
        // first tab is active. JS will change it.
        if ( $count == 1 ) {
            $result .= ' class="memberlite_active"';
            $memberlite_active_tabs[] = $item;
            $count++;
        }
        $result .= '><a href="#tab-' . esc_attr( $item_id ) . '" data-toggle="tab" data-value="#' . esc_attr( $item_id ) . '">' . esc_html( $item ) . '</a></li>';
	}
	$result .= '</ul>';
    
    // render tabs inside
    $result .= '<div class="memberlite_tab_content">';
    $content = str_replace("]<br />", ']', $content);
    $content = str_replace("<br />\n[", '[', $content);    
    $result .= do_shortcode($content);
    $result .= '</div>';
    
    // closing wrapper
    $result .= '</div>';
    
    return force_balance_tags($result);
}
remove_shortcode('memberlite_tabs');	//replace shortcode bundled with Memberlite 2.0 and prior or anywhere else
add_shortcode('memberlite_tabs', 'memberlite_tabs_shortcode');

/**
 * The memberlite_tab shortcode.
 * These shortcodes should be inside of a memberlite_tabs shortcode.
 */
function memberlite_tab_shortcode($atts, $content = null) {
	global $memberlite_active_tabs;
    
    // $atts    ::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// examples: [memberlite_tab class="text-center" item="Tab 1"]
    extract(shortcode_atts(array(
		'class' => '',
		'item' => '',
    ), $atts));
	$item_id = sanitize_title_with_dashes( $item );
    $result = '<div class="memberlite_tab_pane ' . esc_attr( $class );
    if($item == $memberlite_active_tabs[count($memberlite_active_tabs)-1]) {
        $result .= ' memberlite_active';
    }
	$result .= '" id="tab-' . esc_attr( $item_id ) . '" >';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return force_balance_tags($result);
}
add_shortcode('memberlite_tab', 'memberlite_tab_shortcode');