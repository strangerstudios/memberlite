<?php
/**
 * Displays the meta member login content
 *
 * @package Memberlite
 */
?>

<div id="meta-member">
	<div class="meta-member-inner">
	<?php
		global $current_user, $pmpro_pages;
		if ( $user_ID ) {
			if ( ! empty( $pmpro_pages ) ) {
				$account_page      = get_post( $pmpro_pages['account'] );
				$user_account_link = '<a href="' . esc_url( pmpro_url( 'account' ) ) . '">' . esc_html( preg_replace( '/\@.*/', '', $current_user->display_name ) ) . '</a>';
			} else {
				$user_account_link = '<a href="' . esc_url( admin_url( 'profile.php' ) ) . '">' . esc_html( preg_replace( '/\@.*/', '', $current_user->display_name ) ) . '</a>';
			}
			?>
			<span class="user">
				<?php
					/* translators: a generated link to the user's account or profile page */
					echo Memberlite_Customize::sanitize_text_with_links( sprintf( __( 'Welcome, %s', 'memberlite' ), $user_account_link ) );
				?>
			</span>
			<?php
		}
		if ( $user_ID ) {
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
		}
	?>
	</div><!-- .meta-member-inner -->
</div><!-- #meta-member -->
