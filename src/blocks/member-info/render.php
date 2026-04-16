<?php
/**
 * Server-side render for the memberlite/member-info block.
 *
 * Available variables:
 *   $attributes  (array)          Block attributes.
 *   $content     (string)         Inner block content (unused — no inner blocks).
 *   $block       (WP_Block)       Block instance.
 *
 * Mirrors the logic of components/header/header-member-info.php but without
 * the memberlite_is_meta_login_active() gate — the block is explicitly placed.
 *
 * @package Memberlite
 * @since TBD
 */

global $current_user, $pmpro_pages;

$show_welcome = $attributes['showWelcomeMessage'] ?? true;

// Propagate the background color to sub-menus via a CSS custom property.
$nav_style_vars = '';
if ( ! empty( $attributes['backgroundColor'] ) ) {
	$slug           = sanitize_key( $attributes['backgroundColor'] );
	$nav_style_vars = '--memberlite-color-navigation-block-background:var(--wp--preset--color--' . $slug . ');';
} elseif ( ! empty( $attributes['style']['color']['background'] ) ) {
	$nav_style_vars = '--memberlite-color-navigation-block-background:' . esc_attr( $attributes['style']['color']['background'] ) . ';';
}

$extra_attrs = array();
if ( $nav_style_vars ) {
	$extra_attrs['style'] = $nav_style_vars;
}

$wrapper_attributes = get_block_wrapper_attributes( $extra_attrs );
?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
<div id="meta-member">
	<div class="meta-member-inner">
		<?php if ( $current_user->ID ) { ?>
			<?php if ( $show_welcome ) {
				$get_account_url   = ! empty( $pmpro_pages ) ? pmpro_url( 'account' ) : admin_url( 'profile.php' );
				$user_account_link = '<a href="' . esc_url( $get_account_url ) . '">' . esc_html( preg_replace( '/\@.*/', '', $current_user->display_name ) ) . '</a>';
				?>
				<span class="user">
					<span aria-hidden="true" class="fa fa-user"></span>
					<?php /* translators: a generated link to the user's account or profile page */
					echo Memberlite_Customize::sanitize_text_with_links( sprintf( __( 'Welcome, %s', 'memberlite' ), $user_account_link ) ); // WPCS: xss ok.
					?>
				</span>
			<?php } ?>
			<?php
			wp_nav_menu( array(
				'theme_location'  => 'member',
				'container'       => 'nav',
				'container_id'    => 'member-navigation',
				'container_class' => 'member-navigation',
				'fallback_cb'     => 'memberlite_member_menu_cb',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'walker'          => new Memberlite_Aria_Walker_Nav_Menu(),
				'depth'           => 2,
			) );
			?>
		<?php } else { ?>
			<?php
			wp_nav_menu( array(
				'theme_location'  => 'member-logged-out',
				'container'       => 'nav',
				'container_id'    => 'member-navigation',
				'container_class' => 'member-navigation',
				'fallback_cb'     => 'memberlite_member_menu_cb',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'walker'          => new Memberlite_Aria_Walker_Nav_Menu(),
			) );
			?>
		<?php } ?>
	</div><!-- .meta-member-inner -->
</div><!-- #meta-member -->
</div><!-- .wp-block-memberlite-member-info -->
