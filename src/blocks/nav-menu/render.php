<?php
/**
 * Server-side render for the memberlite/nav-menu block.
 *
 * Available variables:
 *   $attributes  (array)          Block attributes.
 *   $content     (string)         Inner block content (unused — no inner blocks).
 *   $block       (WP_Block)       Block instance.
 *
 * @package Memberlite
 * @since TBD
 */

$menu_location = sanitize_key( $attributes['menuLocation'] ?? 'primary' );

if ( ! has_nav_menu( $menu_location ) ) {
	return;
}

$registered_menus = get_registered_nav_menus();
$aria_label       = $registered_menus[ $menu_location ] ?? __( 'Navigation', 'memberlite' );

// Propagate the background color to sub-menus via a CSS custom property.
$nav_style_vars = '';
if ( ! empty( $attributes['backgroundColor'] ) ) {
	$slug           = sanitize_key( $attributes['backgroundColor'] );
	$nav_style_vars = '--memberlite-color-navigation-block-background:var(--wp--preset--color--' . $slug . ');';
} elseif ( ! empty( $attributes['style']['color']['background'] ) ) {
	$nav_style_vars = '--memberlite-color-navigation-block-background:' . esc_attr( $attributes['style']['color']['background'] ) . ';';
}

//@todo: Easiest fix I think is to apply a class and then add that class to the header.scss styles for site-navigation...
$extra_attrs = array(
	'class'      => 'memberlite-nav-menu',
	'role'       => 'navigation',
	'aria-label' => $aria_label,
);
if ( $nav_style_vars ) {
	$extra_attrs['style'] = $nav_style_vars;
}

$wrapper_attributes = get_block_wrapper_attributes( $extra_attrs );
?>
<nav <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php
	wp_nav_menu( array(
		'theme_location' => $menu_location,
		'container'      => false,
		'fallback_cb'    => false,
		'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'menu_class'     => 'menu',
		'walker'         => new Memberlite_Aria_Walker_Nav_Menu(),
	) );
	?>
</nav><!-- #site-navigation -->
