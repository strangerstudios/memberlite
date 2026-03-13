<?php
/**
 * Admin Header for Memberlite Theme Admin Pages
 *
 * @since 6.1
 */

// Get the current view.
$view = '';
if ( isset( $_REQUEST['page'] ) ) {
	$view = sanitize_text_field( wp_unslash( $_REQUEST['page'] ) );
}
?>
<div class="wrap memberlite_admin <?php echo ! empty( $view ) ? 'memberlite_admin-' . esc_attr( $view ) : ''; ?>">

<?php
	$settings_tabs = array(
		'memberlite-dashboard',
		'memberlite-custom-menus',
		'memberlite-custom-sidebars',
		'memberlite-tools'
	);
	if ( in_array( $view, $settings_tabs ) ) { ?>
		<nav class="memberlite-nav-primary" aria-labelledby="memberlite-admin-menu">
			<h2 id="memberlite-admin-menu" class="screen-reader-text"><?php esc_html_e( 'Memberlite Area Menu', 'memberlite' ); ?></h2>
			<ul>
				<li><a href="<?php echo esc_url( add_query_arg( array( 'page' => 'memberlite-dashboard' ), admin_url( 'admin.php' ) ) );?>"<?php echo ( $view == 'memberlite-dashboard' ) ? ' class="current"' : ''; ?>><?php esc_html_e( 'Dashboard', 'memberlite' );?></a></li>
				<li><a href="<?php echo esc_url( add_query_arg( array( 'page' => 'memberlite-custom-menus' ), admin_url( 'admin.php' ) ) );?>"<?php echo ( $view == 'memberlite-custom-menus' ) ? ' class="current"' : ''; ?>><?php esc_html_e( 'Custom Menus', 'memberlite' );?></a></li>
				<li><a href="<?php echo esc_url( add_query_arg( array( 'page' => 'memberlite-custom-sidebars' ), admin_url( 'admin.php' ) ) );?>"<?php echo ( $view == 'memberlite-custom-sidebars' ) ? ' class="current"' : ''; ?>><?php esc_html_e( 'Custom Sidebars', 'memberlite' );?></a></li>
				<li><a href="<?php echo esc_url( add_query_arg( array( 'page' => 'memberlite-tools' ), admin_url( 'admin.php' ) ) );?>"<?php echo ( $view == 'memberlite-tools' ) ? ' class="current"' : ''; ?>><?php esc_html_e( 'Tools', 'memberlite' );?></a></li>
			</ul>
		</nav>
		<?php
	}
?>
