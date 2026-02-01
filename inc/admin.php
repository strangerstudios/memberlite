<?php
/**
 * Custom admin theme pages and scripts
 *
 * @package Memberlite
 */

/**
 * Add Memberlite admin pages.
 */
function memberlite_add_pages() {
	// Top level menu right under Appearance.
	add_menu_page( __( 'Memberlite', 'memberlite' ), __( 'Memberlite', 'memberlite' ), 'edit_theme_options', 'memberlite-dashboard', 'memberlite_dashboard', 'dashicons-privacy', 61 );

	// Memberlite admin subpages.
	add_submenu_page( 'memberlite-dashboard', __( 'Dashboard', 'memberlite' ), __( 'Dashboard', 'memberlite' ), 'edit_theme_options', 'memberlite-dashboard', 'memberlite_dashboard' );

	add_submenu_page( 'memberlite-dashboard', __( 'Custom Menus', 'memberlite' ), __( 'Custom Menus', 'memberlite' ), 'edit_theme_options', 'memberlite-custom-menus', 'memberlite_custom_menus' );

	add_submenu_page( 'memberlite-dashboard', __( 'Custom Sidebars', 'memberlite' ), __( 'Custom Sidebars', 'memberlite' ), 'edit_theme_options', 'memberlite-custom-sidebars', 'memberlite_custom_sidebars' );

	add_submenu_page( 'memberlite-dashboard', __( 'Tools', 'memberlite' ), __( 'Tools', 'memberlite' ), 'edit_theme_options', 'memberlite-tools', 'memberlite_tools' );
}
add_action( 'admin_menu', 'memberlite_add_pages' );

/**
 * Show an action button for the specified plugin
 * @param string $slug The plugin slug
 * @param string $plugin_file The plugin file (includes slug/plugin.php)
 * @param string $download_link Get the download link for the plugin. If 'org' is set assume it's on WordPress.org and search in the WP dashboard for the plugin.
 */
function memberlite_plugin_action_button( $slug, $plugin_file, $download_link = 'org' ) {
	$plugin_file_abs = ABSPATH . 'wp-content/plugins/' . $plugin_file;
	if ( is_plugin_active( $plugin_file ) ) {
		$status = 'active';
	} elseif ( file_exists( $plugin_file_abs ) ) {
		$status = 'inactive';
	} else {
		$status = 'uninstalled';
	}

	if ( $status === 'active' ) {
		$r = '<a class="button button-disabled">' . __( 'Active', 'memberlite' ) . '</a>';
	} elseif ( $status === 'inactive' ) {
		$r = '<a class="install-now button" href="' . esc_url( add_query_arg( array( 's' => $slug ), admin_url( 'plugins.php' ) ) ) . '">' . __( 'Activate', 'memberlite' ) . '</a>';
	} else {
		// Adjust the download link based on the download_link that is passed in.
		if ( $download_link === 'org' ) {
			$plugin_url = is_multisite() ? add_query_arg( array( 's' => $slug, 'tab' => 'search' ), network_admin_url( 'plugin-install.php' ) ) : add_query_arg( array( 's' => $slug, 'tab' => 'search' ), admin_url( 'plugin-install.php' ) );
			$target = '';
		} else {
			$plugin_url = $download_link;
			$target = ' target=_blank'; // esc_attr is wrapping the values in between quotes when outputting so we can ommit them here.
		}

		$r = '<a href="' . esc_url( $plugin_url ) . '" class="install-now button" aria-label="' . esc_attr__( 'Install', 'memberlite' ) . '"' . esc_attr( $target ) . '>' . __( 'Install', 'memberlite' ) . '</a>';
		
	}
	return $r;
}

/*
	Load any notifications.

	1. Show link to the welcome page the first time the theme is activated
*/
// check for notifications
function memberlite_admin_init_notifications() {
	global $wpdb;

	// Avoid notices on some screens.
	$script_name = isset( $_SERVER['SCRIPT_NAME'] ) ? sanitize_text_field( wp_unslash( $_SERVER['SCRIPT_NAME'] ) ) : '';
	$script = esc_html( wp_basename( $script_name ) );
	$maybe_installing = in_array( $script, array( 'update.php', 'plugins.php' ), true );

	// 1. Show link to the welcome page the first time the theme is activated
	$welcome_link_dismissed = get_option( 'memberlite_notice_welcome_link_dismissed', false );
	if ( ! $welcome_link_dismissed && ! $maybe_installing ) {
		wp_enqueue_script( 'memberlite-admin-dismiss-notice', MEMBERLITE_URL . '/js/admin-dismiss-notice.js', array( 'jquery' ), MEMBERLITE_VERSION, true );
		add_action( 'admin_notices', 'memberlite_admin_notice_welcome_link' );
	}
}
add_action( 'admin_init', 'memberlite_admin_init_notifications' );

// AJAX to handle notice dismissal
function memberlite_wp_ajax_dismiss_notice() {
	// whitelist of notices
	$notices = array( 'welcome_link' );

	// Get and validate the notice.
	$notice = sanitize_key( wp_unslash( $_REQUEST['notice'] ?? '' ) );
	if ( ! in_array( $notice, $notices, true ) ) {
		wp_die( esc_html__( 'Invalid notice.', 'text-domain' ) );
	}

	// update option and leave
	update_option( 'memberlite_notice_' . $notice . '_dismissed', 1, 'no' );

	exit;
}
add_action( 'wp_ajax_nopriv_memberlite_dismiss_notice', 'memberlite_wp_ajax_dismiss_notice' );
add_action( 'wp_ajax_memberlite_dismiss_notice', 'memberlite_wp_ajax_dismiss_notice' );

// Welcome Link Notice
function memberlite_admin_notice_welcome_link() {
	// notice HTML
	?>
	<div id="memberlite-admin-notice-welcome_link" class="notice notice-info is-dismissible memberlite-notice">
		<p><strong><?php esc_html_e( 'Memberlite', 'memberlite' ); ?>:</strong>
		<?php
			echo esc_html__( 'We have documentation and recommended plugins to help you get started with Memberlite Theme.', 'memberlite' );
			$click_link = add_query_arg( 'page', 'memberlite-support', admin_url( 'themes.php' ) );
			$click_text = __( 'Click here to view the Memberlite welcome page.', 'memberlite' );
			echo ' <a href="' . esc_url( $click_link ) . '">' . esc_html( $click_text ) . '</a>';
		?>
		</p>
	</div>
	<?php
}

/**
 * Adds the Memberlite admin header to Memberlite admin pages.
 *
 * @since 6.1
 */
function memberlite_admin_header() {
	// Assume we should not show our header.
	$show_header = false;

	// Show header on our settings pages.
	if ( ! empty( $_GET['page'] ) && strpos( $_GET['page'], 'memberlite-' ) === 0 ) {
		$show_header = true;
	}

	if ( empty( $show_header ) ) {
		return;
	} ?>
	<div class="memberlite_banner">
		<div class="memberlite_banner_wrapper">
			<div class="memberlite_logo">
				<h1>
					<span class="screen-reader-text"><?php esc_html_e( 'Memberlite', 'memberlite' ); ?></span>
					<a target="_blank" rel="noopener noreferrer" href="https://www.paidmembershipspro.com/themes/memberlite/?utm_source=plugin&utm_medium=memberlite-admin-header&utm_campaign=homepage"><img src="<?php echo esc_url( MEMBERLITE_URL . '/assets/images/Memberlite.png' ); ?>" width="300" border="0" alt="Memberlite(c) - All Rights Reserved" /></a>
				</h1>
				<span class="memberlite_version">v<?php echo esc_html( MEMBERLITE_VERSION ); ?></span>
			</div>
			<div class="memberlite_meta">
				<a target="_blank" rel="noopener noreferrer" href="https://www.paidmembershipspro.com/documentation/memberlite/?utm_source=plugin&utm_medium=memberlite-admin-header&utm_campaign=documentation"><?php esc_html_e('Documentation', 'memberlite' ); ?></a>
				<a target="_blank" href="https://www.paidmembershipspro.com/support/?utm_source=plugin&utm_medium=memberlite-admin-header&utm_campaign=pricing&utm_content=get-support"><?php esc_html_e('Get Support', 'memberlite' );?></a>
			</div> <!-- end memberlite_meta -->
		</div> <!-- end memberlite_banner_wrapper -->
	</div> <!-- end memberlite_banner -->
	<?php
}
add_action( 'admin_notices', 'memberlite_admin_header', 1 );

/**
 * Replace the default WordPress footer text on Memberlite pages.
 */
function memberlite_admin_footer_text( $text ) {
	// Show footer on our pages in admin, but not on the block editor.
	if (
		! isset( $_REQUEST['page'] ) ||
		( isset( $_REQUEST['page'] ) && 'memberlite-' !== substr( $_REQUEST['page'], 0, 11 ) )
	) {
		return $text;
	}

	return sprintf(
		wp_kses(
			/* translators: $1$s - Memberlite theme name; $2$s - testimonial link; $3$s - Paid Memberships Pro */
			__( 'Please <a href="%1$s" target="_blank" rel="noopener noreferrer">submit a testimonial</a> to help others find %2$s. Thank you from the %3$s team!', 'memberlite' ),
			[
				'a' => [
					'href'   => [],
					'target' => [],
					'rel'    => [],
				],
				'p' => [
					'class'  => [],
				],
			]
		),
		'https://www.paidmembershipspro.com/submit-testimonial/',
		'Memberlite',
		'Paid Memberships Pro'
	);
}
add_filter( 'admin_footer_text', 'memberlite_admin_footer_text' );

/**
 * Hide non-Memberlite notices from Memberlite dashboard pages.
 *
 * @since 6.1
 */
function memberlite_hide_non_memberlite_notices() {
	global $wp_filter;

	// Make sure we're on a Memberlite page.
	if ( ! isset( $_REQUEST['page'] )
			|| substr( sanitize_text_field( $_REQUEST['page'] ), 0, 10 ) !== 'memberlite-' ) {
		return;
	}

	// Handle notices added through these hooks.
	$hooks = ['admin_notices', 'all_admin_notices'];

	foreach ( $hooks as $hook ) {
		// If no callbacks are registered, skip.
		if ( ! isset( $wp_filter[$hook] ) ) {
			continue;
		}

		// Loop through the callbacks and remove any that aren't Memberlite.
		foreach ( $wp_filter[$hook]->callbacks as $priority => $callbacks ) {
			foreach ( $callbacks as $key => $callback ) {
				if ( is_string( $callback['function' ] ) ) {
					// Check the function name.
					// Ex. add_action( 'admin_notices', 'memberlite_admin_notice' );
					$name_to_check = $callback['function'];
				} elseif ( is_array( $callback['function'] ) && is_string( $callback['function'][0] ) ) {
					// Check the class name for the static method.
					// Ex. add_action( 'admin_notices', array( 'Memberlite_Admin', 'admin_notice' ) );
					$name_to_check = $callback['function'][0];
				} elseif ( is_array( $callback['function'] ) && is_object( $callback['function'][0] ) ) {
					// Check the class name for the non-static method.
					// Ex. add_action( 'admin_notices', array( $some_object, 'admin_notice' ) );
					$name_to_check = get_class( $callback['function'][0] );
				} else {
					// Ex. add_action( 'admin_notices', function() { echo 'Hello World'; } );
					// We don't use closures in Memberlite, so we don't need to check for them.
					$name_to_check = '';
				}

				// Trim slashes for namespaces and lowercase the name.
				$name_to_check = strtolower( trim( $name_to_check, '\\' ) );

				// If the function name starts with 'memberlite', then we don't want to remove it.
				if ( strpos( $name_to_check, 'memberlite' ) !== 0 ) {
					unset( $wp_filter[$hook]->callbacks[$priority][$key] );
				}
			}
		}
	}
}
add_action( 'in_admin_header', 'memberlite_hide_non_memberlite_notices' );

/**
 * Add "Manage with Memberlite" link to Appearance > Menus page.
 *
 * @since 6.2
 */
function memberlite_add_menus_page_link() {
	$screen = get_current_screen();
	if ( ! $screen || $screen->base !== 'nav-menus' ) {
		return;
	}

	$custom_menus_url = admin_url( 'admin.php?page=memberlite-custom-menus' );
	?>
	<script>
	(function() {
		// Create the Memberlite link.
		var memberliteLink = document.createElement( 'a' );
		memberliteLink.href = '<?php echo esc_url( $custom_menus_url ); ?>';
		memberliteLink.className = 'page-title-action';
		memberliteLink.textContent = '<?php echo esc_js( __( 'Manage with Memberlite', 'memberlite' ) ); ?>';

		// Find all page-title-action links and insert after the last one.
		var pageTitleActions = document.querySelectorAll( '.wrap .page-title-action' );
		if ( pageTitleActions.length > 0 ) {
			var lastAction = pageTitleActions[ pageTitleActions.length - 1 ];
			lastAction.parentNode.insertBefore( memberliteLink, lastAction.nextSibling );
			return;
		}

		// Fallback: insert before wp-header-end.
		var headerEnd = document.querySelector( '.wrap hr.wp-header-end' );
		if ( headerEnd ) {
			headerEnd.parentNode.insertBefore( memberliteLink, headerEnd );
			return;
		}

		// Last fallback: insert after the h1.
		var pageTitle = document.querySelector( '.wrap h1' );
		if ( pageTitle ) {
			pageTitle.parentNode.insertBefore( memberliteLink, pageTitle.nextSibling );
		}
	})();
	</script>
	<?php
}
add_action( 'admin_footer', 'memberlite_add_menus_page_link' );
