<?php
/**
 * Tools Page for Memberlite Theme
 *
 * @package Memberlite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Settings page for Memberlite > Tools
 *
 * @since TBD
 */
function memberlite_tools() {
	/**
	 * Load the Memberlite dashboard-area header
	 */
	require_once __DIR__ . '/admin_header.php'; ?>

	<hr class="wp-header-end">

	<h1><?php esc_html_e( 'Memberlite Tools', 'memberlite' ); ?></h1>
	<p>
		<?php esc_html_e( 'Import, export, or reset your Memberlite theme settings using the tools below.', 'memberlite' ); ?>
		<?php
			echo '<a href="https://www.paidmembershipspro.com/documentation/memberlite/tools/?utm_source=plugin&utm_medium=memberlite-admin-tools-page&utm_campaign=documentation" target="_blank" rel="noopener noreferrer">' . esc_html__( 'Learn more about tools in Memberlite', 'memberlite' ) . '</a>';
		?>
	</p>

	<?php
		// Initialize notice variables.
		$message = '';
		$class   = 'notice-error';

		// Display notices based on query parameters.
		if ( ! empty( $_GET['memberlite_import_notice'] ) ) {
			$code = sanitize_key( $_GET['memberlite_import_notice'] );

			switch ( $code ) {
				case 'no_file':
					$message = __( 'No file was uploaded. Please choose a settings file to import.', 'memberlite' );
					break;
				case 'read_error':
					$message = __( 'There was a problem reading the uploaded file.', 'memberlite' );
					break;
				case 'invalid_file':
					$message = __( 'The uploaded file does not appear to be a valid Memberlite theme settings export.', 'memberlite' );
					break;
				case 'wrong_theme':
					$message = __( 'The settings file does not match the currently active theme.', 'memberlite' );
					break;
				case 'import_ok':
					$message = __( 'Memberlite theme settings were imported successfully.', 'memberlite' );
					$class   = 'notice-success';
					break;
			}
		}

		if ( ! empty( $_GET['memberlite_reset_notice'] ) ) {
			$code = sanitize_key( $_GET['memberlite_reset_notice'] );

			if ( 'reset_ok' === $code ) {
				$message = __( 'Memberlite theme settings have been reset to their defaults.', 'memberlite' );
				$class   = 'notice-success';
			}
		}

		if ( $message ) {
			printf(
				'<div class="notice %1$s is-dismissible"><p>%2$s</p></div>',
				esc_attr( $class ),
				esc_html( $message )
			);
		}
	?>

	<?php
		// Load all the separate tool sections.
		require_once( get_template_directory() . '/adminpages/tools/import-settings.php' );
		require_once( get_template_directory() . '/adminpages/tools/export-settings.php' );
		require_once( get_template_directory() . '/adminpages/tools/reset.php' );
	?>

	<?php
	/**
	 * Load the Memberlite dashboard-area footer
	 */
	require_once __DIR__ . '/admin_footer.php';
}

/**
 * Exports theme settings as a JSON file.
 *
 * @since TBD
 */
function memberlite_export_theme_settings() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to export theme settings.', 'memberlite' ) );
	}

	check_admin_referer( 'memberlite_export_theme_settings' );

	$template = get_option( 'stylesheet' );

	// All theme mods = all Customizer settings for the active theme.
	$mods = get_theme_mods();
	if ( ! is_array( $mods ) ) {
		$mods = array();
	}

	// Extra options we care about.
	$option_keys = apply_filters(
		'memberlite_export_option_keys',
		array(
			'site_icon',
			'memberlite_cpt_sidebars',
			'memberlite_custom_sidebars',
		)
	);

	$options = array();

	foreach ( $option_keys as $key ) {
		$value = get_option( $key, null );
		if ( null !== $value ) {
			$options[ $key ] = $value;
		}
	}

	$data = array(
		'template' => $template,
		'mods'     => $mods,
		'options'  => $options,
	);

	if ( function_exists( 'wp_get_custom_css' ) ) {
		$data['wp_css'] = wp_get_custom_css();
	}

	$json = wp_json_encode( $data );

	if ( false === $json ) {
		wp_die( esc_html__( 'Error encoding export data.', 'memberlite' ) );
	}

	$filename = 'memberlite-theme-settings-' . date( 'Y-m-d' ) . '.json';

	nocache_headers();
	header( 'Content-Type: application/json; charset=utf-8' );
	header( 'Content-Disposition: attachment; filename=' . $filename );
	header( 'Expires: 0' );

	echo $json;
	exit;
}
add_action( 'admin_post_memberlite_export_theme_settings', 'memberlite_export_theme_settings' );

/**
 * Handle Memberlite theme settings import.
 *
 * @since TBD
 */
function memberlite_import_theme_settings() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to import theme settings.', 'memberlite' ) );
	}

	// Check nonce.
	if ( empty( $_POST['memberlite_import_theme_settings_nonce'] ) ) {
		wp_die( esc_html__( 'Invalid import request.', 'memberlite' ) );
	}

	check_admin_referer( 'memberlite_import_theme_settings', 'memberlite_import_theme_settings_nonce' );

	// Validate file upload.
	if ( empty( $_FILES['memberlite_import_file']['tmp_name'] ) || ! is_uploaded_file( $_FILES['memberlite_import_file']['tmp_name'] ) ) {
		memberlite_import_settings_redirect( 'no_file' );
	}

	$raw = file_get_contents( $_FILES['memberlite_import_file']['tmp_name'] );
	if ( ! $raw ) {
		memberlite_import_settings_redirect( 'read_error' );
	}

	// Decode JSON created by the export tool.
	$data = json_decode( $raw, true );

	if ( ! is_array( $data ) || empty( $data['template'] ) || ! isset( $data['mods'] ) ) {
		memberlite_import_settings_redirect( 'invalid_file' );
	}

	$current_template = get_option( 'stylesheet' );

	// Ensure the file is for this theme.
	if ( $data['template'] !== $current_template ) {
		memberlite_import_settings_redirect( 'wrong_theme' );
	}

	// Overwrite current theme mods.
	if ( isset( $data['mods'] ) && is_array( $data['mods'] ) ) {
		// Clear existing mods so we don't leave stale ones behind.
		remove_theme_mods();

		foreach ( $data['mods'] as $key => $value ) {
			set_theme_mod( $key, $value );
		}
	}

	// Restore extra options (site_icon, sidebars, etc.), if present.
	if ( ! empty( $data['options'] ) && is_array( $data['options'] ) ) {
		foreach ( $data['options'] as $key => $value ) {
			update_option( $key, $value );
		}
	}

	// Restore Additional CSS if we exported it.
	if ( ! empty( $data['wp_css'] ) && function_exists( 'wp_update_custom_css_post' ) ) {
		wp_update_custom_css_post( $data['wp_css'] );
	}

	memberlite_import_settings_redirect( 'import_ok' );
}
add_action( 'admin_post_memberlite_import_theme_settings', 'memberlite_import_theme_settings' );

/**
 * Helper: redirect back to the Tools page with a status flag.
 *
 * @since TBD
 *
 * @param string $code
 */
function memberlite_import_settings_redirect( $code ) {
	$redirect = wp_get_referer();

	// Fallback if no referer.
	if ( ! $redirect ) {
		$redirect = add_query_arg( array( 'page' => 'memberlite-tools' ), admin_url( 'admin.php' ) );
	}

	$redirect = add_query_arg( 'memberlite_import_notice', $code, $redirect );
	wp_safe_redirect( $redirect );
	exit;
}

/**
 * Handle Memberlite theme settings reset.
 *
 * @since TBD
 */
function memberlite_reset_theme_settings() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to reset theme settings.', 'memberlite' ) );
	}

	if ( empty( $_POST['memberlite_reset_theme_settings_nonce'] ) ) {
		wp_die( esc_html__( 'Invalid reset request.', 'memberlite' ) );
	}

	check_admin_referer( 'memberlite_reset_theme_settings', 'memberlite_reset_theme_settings_nonce' );

	// Reset all theme mods.
	remove_theme_mods();

	/**
	 * Filter the option keys to reset when resetting Memberlite theme settings.
	 * By default, we reset the site icon, custom sidebars, and sidebar assignments for custom post types.
	 *
	 * @since TBD
	 * @param array $option_keys Array of option keys to reset.
	 */
	$option_keys = apply_filters(
		'memberlite_export_option_keys',
		array(
			'site_icon',
			'memberlite_cpt_sidebars',
			'memberlite_custom_sidebars',
		)
	);

	$option_keys = array_unique( array_filter( (array) $option_keys ) );

	foreach ( $option_keys as $option_key ) {
		delete_option( $option_key );
	}

	// Clear Additional CSS for the current theme.
	if ( function_exists( 'wp_update_custom_css_post' ) ) {
		wp_update_custom_css_post( '' );
	}

	// Redirect back to the Tools page with a status flag.
	$redirect = wp_get_referer();
	if ( ! $redirect ) {
		$redirect = add_query_arg( array( 'page' => 'memberlite-tools' ), admin_url( 'admin.php' ) );
	}

	$redirect = add_query_arg( 'memberlite_reset_notice', 'reset_ok', $redirect );
	wp_safe_redirect( $redirect );
	exit;
}
add_action( 'admin_post_memberlite_reset_theme_settings', 'memberlite_reset_theme_settings' );
