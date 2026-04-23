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

$selected_menu = sanitize_text_field( $attributes['selectedMenu'] ?? '' );
$menu_type     = '';
$slug          = '';
$id            = 0;

if ( empty( $selected_menu ) ) {
	return;
}

// Uses prefix to distinguish between location and menu.
if ( strpos( $selected_menu, 'location:' ) === 0 && function_exists( 'pmpro_is_plugin_active' ) && pmpro_is_plugin_active( 'pmpro-nav-menus/pmpro-nav-menus.php') ) {
	$slug = substr( $selected_menu, strlen( 'location:' ) );
	if ( ! has_nav_menu( $slug ) ) {
		return;
	}
	$menu_type = 'location';
}

if ( strpos( $selected_menu, 'menu:' ) === 0 ) {
	$id = (int) substr( $selected_menu, strlen( 'menu:' ) );

	if ( ! is_nav_menu( $id ) ) {
		return;
	}
	$menu_type = 'menu';
}

if ( empty( $menu_type ) ) {
	return;
}

$default_aria_label = __( 'Navigation', 'memberlite' );

if ( $menu_type === 'location' ) {
	$registered_menus = get_registered_nav_menus();
	$aria_label       = $registered_menus[ $slug ] ?? $default_aria_label;
} else {
	$menu_object = wp_get_nav_menu_object( $id );
	$aria_label  = $menu_object ? $menu_object->name : $default_aria_label;
}

$nav_style_vars = '';

if ( ! empty( $attributes['backgroundColor'] ) ) {
	$bg_slug        = sanitize_key( $attributes['backgroundColor'] );
	$nav_style_vars = '--memberlite-color-navigation-block-background:var(--wp--preset--color--' . $bg_slug . ');';
} elseif ( ! empty( $attributes['style']['color']['background'] ) ) {
	$nav_style_vars = '--memberlite-color-navigation-block-background:' . esc_attr( $attributes['style']['color']['background'] ) . ';';
}

$extra_attrs = array(
	'class'      => 'memberlite-nav-menu',
	'role'       => 'navigation',
	'aria-label' => $aria_label,
);

if ( $nav_style_vars ) {
	$extra_attrs['style'] = $nav_style_vars;
}

$menu_args = array(
	'container'  => false,
	'fallback_cb' => false,
	'echo'        => false,
	'items_wrap'  => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'menu_class'  => 'menu',
	'walker'      => new Memberlite_Aria_Walker_Nav_Menu(),
);

$menu_args = array_merge(
	$menu_args,
	$menu_type === 'location'
		? array( 'theme_location' => $slug )
		: array( 'menu' => $id )
);

$nav_menu_output = wp_nav_menu( $menu_args );

if ( empty( $nav_menu_output ) ) {
	return;
}

$wrapper_attributes = get_block_wrapper_attributes( $extra_attrs );
?>
<nav <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php echo $nav_menu_output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</nav><!-- #site-navigation -->
