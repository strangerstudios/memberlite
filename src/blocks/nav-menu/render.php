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

$wrapper_attributes = get_block_wrapper_attributes( array(
	'id'         => 'site-navigation',
	'role'       => 'navigation',
	'aria-label' => $aria_label,
) );
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
