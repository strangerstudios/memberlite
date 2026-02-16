<?php
/**
 * Displays the member info if logged in, or the login form
 *
 * @package Memberlite
 */
?>

<div id="meta-member">
	<div class="meta-member-inner">
		<?php
		global $current_user, $pmpro_pages;

		if ( memberlite_is_meta_login_active() && $current_user->ID ) {
			$get_account_url   = ! empty( $pmpro_pages ) ? pmpro_url( 'account' ) : admin_url( 'profile.php' );
			$user_account_link = '<a href="' . esc_url( $get_account_url ) . '">' . esc_html( preg_replace( '/\@.*/', '', $current_user->display_name ) ) . '</a>';
			?>
			<span class="user">
				<?php /* translators: a generated link to the user's account or profile page */
				echo Memberlite_Customize::sanitize_text_with_links( sprintf( __( 'Welcome, %s', 'memberlite' ), $user_account_link ) ); // WPCS: xss ok.
				?>
			</span>
			<?php

			wp_nav_menu(
				array(
					'theme_location'  => 'member',
					'container'       => 'nav',
					'container_id'    => 'member-navigation',
					'container_class' => 'member-navigation',
					'fallback_cb'     => 'memberlite_member_menu_cb',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				)
			);
		} else {
			wp_nav_menu(
				array(
					'theme_location'  => 'member-logged-out',
					'container'       => 'nav',
					'container_id'    => 'member-navigation',
					'container_class' => 'member-navigation',
					'fallback_cb'     => 'memberlite_member_menu_cb',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				)
			);
		} ?>
	</div><!-- .meta-member-inner -->
</div><!-- #meta-member -->
