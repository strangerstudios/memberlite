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
 * @since 6.1
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
 * @since 6.1
 * @since 7.0 Added optional navigation menu export.
 */
function memberlite_export_theme_settings() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to export theme settings.', 'memberlite' ) );
	}

	if ( empty( $_POST['memberlite_export_theme_settings_nonce'] ) ) {
		wp_die( esc_html__( 'Invalid export request.', 'memberlite' ) );
	}

	check_admin_referer( 'memberlite_export_theme_settings', 'memberlite_export_theme_settings_nonce' );

	$template = get_option( 'template' );

	$data = array(
		'template' => $template,
	);

	// Export theme mods if selected.
	if ( ! empty( $_POST['memberlite_export_theme_mods'] ) ) {
		// All theme mods = all Customizer settings for the active theme.
		$mods = get_theme_mods();
		if ( ! is_array( $mods ) ) {
			$mods = array();
		}
		$data['mods'] = $mods;

		/**
		 * Filter the option keys to export when exporting Memberlite theme settings.
		 * By default, we export the site title, tagline, custom sidebars, and sidebar assignments for custom post types.
		 *
		 * Note: This same filter is used for resetting options in memberlite_reset_theme_settings().
		 *
		 * @since 6.1
		 * @param array $option_keys Array of option keys to export.
		 */
		$option_keys = apply_filters(
			'memberlite_export_option_keys',
			array(
				'blogname',
				'blogdescription',
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

		$data['options'] = $options;

		if ( function_exists( 'wp_get_custom_css' ) ) {
			$data['wp_css'] = wp_get_custom_css();
		}

		// Export attachment references (site icon, custom logo) with absolute URLs so they can be resolved on import.
		$attachments_data = array();

		$site_icon_id = (int) get_option( 'site_icon' );
		if ( $site_icon_id ) {
			$site_icon_url = wp_get_attachment_url( $site_icon_id );
			if ( $site_icon_url ) {
				$attachments_data['site_icon'] = array(
					'id'       => $site_icon_id,
					'url'      => $site_icon_url,
					'filename' => basename( wp_parse_url( $site_icon_url, PHP_URL_PATH ) ),
				);
			}
		}

		// Strip the raw ID only after capturing a portable reference, so a broken logo isn't silently dropped.
		$custom_logo_id = (int) get_theme_mod( 'custom_logo' );
		if ( $custom_logo_id ) {
			$custom_logo_url = wp_get_attachment_url( $custom_logo_id );
			if ( $custom_logo_url ) {
				$attachments_data['custom_logo'] = array(
					'id'       => $custom_logo_id,
					'url'      => $custom_logo_url,
					'filename' => basename( wp_parse_url( $custom_logo_url, PHP_URL_PATH ) ),
				);
				// Only strip once we've captured a resolvable reference — otherwise a broken logo would disappear silently.
				unset( $data['mods']['custom_logo'] );
			}
		}

		if ( ! empty( $attachments_data ) ) {
			$data['attachments'] = $attachments_data;
		}
	}

	// Export menus if selected.
	if ( ! empty( $_POST['memberlite_export_menus'] ) && ! empty( $_POST['memberlite_export_menu_ids'] ) ) {
		$menu_ids = array_map( 'intval', $_POST['memberlite_export_menu_ids'] );
		$menus_data = array();

		// Get current menu location assignments to export with menus.
		$menu_locations = get_nav_menu_locations();
		$menu_id_to_locations = array();
		foreach ( $menu_locations as $location => $assigned_menu_id ) {
			if ( ! empty( $assigned_menu_id ) ) {
				if ( ! isset( $menu_id_to_locations[ $assigned_menu_id ] ) ) {
					$menu_id_to_locations[ $assigned_menu_id ] = array();
				}
				$menu_id_to_locations[ $assigned_menu_id ][] = $location;
			}
		}

		foreach ( $menu_ids as $menu_id ) {
			$menu = wp_get_nav_menu_object( $menu_id );
			if ( ! $menu ) {
				continue;
			}

			$menu_items = wp_get_nav_menu_items( $menu_id );
			$items_data = array();

			if ( ! empty( $menu_items ) ) {
				// Build index map for parent references.
				$id_to_index = array();
				foreach ( $menu_items as $index => $item ) {
					$id_to_index[ $item->db_id ] = $index;
				}

				foreach ( $menu_items as $index => $item ) {
					// Determine parent index (null if top-level).
					$parent_index = null;
					if ( ! empty( $item->menu_item_parent ) && isset( $id_to_index[ $item->menu_item_parent ] ) ) {
						$parent_index = $id_to_index[ $item->menu_item_parent ];
					}

					// Make internal URLs relative for portability across environments.
					$item_url = $item->url;
					$site_url = home_url();
					if ( strpos( $item_url, $site_url ) === 0 ) {
						$item_url = substr( $item_url, strlen( $site_url ) );
						// Ensure empty path becomes root slash.
						if ( empty( $item_url ) ) {
							$item_url = '/';
						}
					}

					$items_data[] = array(
						'label'       => $item->title,
						'url'         => $item_url,
						'target'      => $item->target,
						'attr_title'  => $item->attr_title,
						'description' => $item->description,
						'classes'     => array_filter( (array) $item->classes ),
						'xfn'         => $item->xfn,
						'parent'      => $parent_index,
					);
				}
			}

			$menu_export_data = array(
				'name'  => $menu->name,
				'items' => $items_data,
			);

			// Include location assignments for this menu.
			if ( isset( $menu_id_to_locations[ $menu_id ] ) ) {
				$menu_export_data['locations'] = $menu_id_to_locations[ $menu_id ];
			}

			$menus_data[] = $menu_export_data;
		}

		if ( ! empty( $menus_data ) ) {
			$data['menus'] = $menus_data;
		}
	}

	$json = wp_json_encode( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES );

	if ( false === $json ) {
		wp_die( esc_html__( 'Error encoding export data.', 'memberlite' ) );
	}

	$filename = 'memberlite-theme-settings-' . wp_date( 'Y-m-d' ) . '.json';

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
 * @since 6.1
 * @since 7.0 Added navigation menu import support.
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
	$upload_error = isset( $_FILES['memberlite_import_file']['error'] ) ? (int) $_FILES['memberlite_import_file']['error'] : UPLOAD_ERR_NO_FILE;
	if ( UPLOAD_ERR_OK !== $upload_error || empty( $_FILES['memberlite_import_file']['tmp_name'] ) || ! is_uploaded_file( $_FILES['memberlite_import_file']['tmp_name'] ) ) {
		memberlite_import_settings_redirect( 'no_file' );
	}

	$raw = file_get_contents( $_FILES['memberlite_import_file']['tmp_name'] );
	if ( ! $raw ) {
		memberlite_import_settings_redirect( 'read_error' );
	}

	// Decode JSON created by the export tool.
	$data = json_decode( $raw, true );

	// Validate file structure - must have template and either mods or menus.
	if ( ! is_array( $data ) || empty( $data['template'] ) || ( ! isset( $data['mods'] ) && ! isset( $data['menus'] ) ) ) {
		memberlite_import_settings_redirect( 'invalid_file' );
	}

	$current_template   = get_option( 'template' );
	$current_stylesheet = get_option( 'stylesheet' );

	// Ensure the file is for this theme (or a child of the same parent theme).
	// Check against both template and stylesheet for backwards compatibility with older exports from parent theme installations.
	if ( $data['template'] !== $current_template && $data['template'] !== $current_stylesheet ) {
		memberlite_import_settings_redirect( 'wrong_theme' );
	}

	// Overwrite current theme mods if present.
	if ( isset( $data['mods'] ) && is_array( $data['mods'] ) ) {
		// Clear existing mods so we don't leave stale ones behind.
		remove_theme_mods();

		// Drop mods whose values are source-site IDs that wouldn't resolve here.
		// custom_logo is rebuilt via $data['attachments']; nav_menu_locations is rebuilt from imported menus.
		unset( $data['mods']['custom_logo'], $data['mods']['nav_menu_locations'] );

		// Get all color setting keys.
		$color_keys = memberlite_get_color_setting_keys();

		// Deprecated mods to skip on import.
		$deprecated_mods = array( 'memberlite_darkcss' );

		foreach ( $data['mods'] as $key => $value ) {
			// Skip deprecated settings.
			if ( in_array( $key, $deprecated_mods, true ) ) {
				continue;
			}

			// Sanitize color values to remove # prefix
			if ( in_array( $key, $color_keys, true ) && is_string( $value ) ) {
				$value = sanitize_hex_color_no_hash( $value );

				// Skip if sanitization failed (returns null for invalid colors)
				if ( $value === null ) {
					continue;
				}

				// Lowercase for consistency
				$value = strtolower( $value );
			}

			set_theme_mod( $key, $value );
		}

		// Now detect if the imported color scheme is legacy or modern
		$imported_scheme = isset( $data['mods']['memberlite_color_scheme'] ) ? $data['mods']['memberlite_color_scheme'] : '';
		$final_scheme = 'custom'; // Default to custom if we can't determine the color scheme

		// Type safety: ensure it's a string before using as array key
		if ( is_string( $imported_scheme ) && ! empty( $imported_scheme ) && $imported_scheme !== 'custom' ) {
			// Check if it's a modern scheme
			$modern_schemes = memberlite_get_color_schemes();

			if ( isset( $modern_schemes[ $imported_scheme ] ) ) {
				// It's a valid modern scheme, keep it as-is
				$final_scheme = $imported_scheme;
			}
		}

		// Anything legacy or a malformed color scheme will default to "custom"
		set_theme_mod( 'memberlite_color_scheme', $final_scheme );
	}

	// Restore extra options (sidebars, blogname, etc.), if present.
	if ( ! empty( $data['options'] ) && is_array( $data['options'] ) ) {
		foreach ( $data['options'] as $key => $value ) {
			update_option( $key, $value );
		}
	}

	// Restore Additional CSS if we exported it.
	if ( ! empty( $data['wp_css'] ) && function_exists( 'wp_update_custom_css_post' ) ) {
		wp_update_custom_css_post( $data['wp_css'] );
	}

	// Resolve attachment references (site_icon, custom_logo) to local attachment IDs.
	if ( ! empty( $data['attachments'] ) && is_array( $data['attachments'] ) ) {
		foreach ( $data['attachments'] as $target => $info ) {
			if ( empty( $info['url'] ) ) {
				continue;
			}

			$source_url  = esc_url_raw( $info['url'] );
			$id_hint     = isset( $info['id'] ) ? (int) $info['id'] : 0;
			$resolved_id = memberlite_resolve_imported_attachment( $source_url, $id_hint );

			if ( ! $resolved_id ) {
				continue;
			}

			if ( 'site_icon' === $target ) {
				update_option( 'site_icon', $resolved_id );
			} elseif ( 'custom_logo' === $target ) {
				set_theme_mod( 'custom_logo', $resolved_id );
			}
		}
	}

	// Import navigation menus if present.
	if ( ! empty( $data['menus'] ) && is_array( $data['menus'] ) ) {
		// Track location assignments to apply after all menus are created.
		$location_assignments = array();

		// Check if user wants to replace existing menus.
		$replace_existing = ! empty( $_POST['memberlite_replace_existing_menus'] );

		foreach ( $data['menus'] as $menu_data ) {
			if ( empty( $menu_data['name'] ) ) {
				continue;
			}

			$menu_name = sanitize_text_field( $menu_data['name'] );

			// Check if a menu with this exact name already exists.
			$existing_menu = wp_get_nav_menu_object( $menu_name );

			if ( $existing_menu ) {
				if ( $replace_existing ) {
					// Replace mode: Delete existing menu items and import new ones into existing menu.
					$menu_id = $existing_menu->term_id;
					$location_menu_id = $menu_id;

					$existing_items = wp_get_nav_menu_items( $menu_id );
					if ( ! empty( $existing_items ) ) {
						foreach ( $existing_items as $item ) {
							wp_delete_post( $item->db_id, true );
						}
					}
				} else {
					// Non-replace mode: Create duplicate menu, but assign original to locations.
					$location_menu_id = $existing_menu->term_id;

					// Create duplicate with numbered name.
					$duplicate_name = $menu_name;
					$counter = 1;
					while ( wp_get_nav_menu_object( $duplicate_name ) ) {
						$counter++;
						$duplicate_name = $menu_name . ' (' . $counter . ')';
					}

					$menu_id = wp_create_nav_menu( $duplicate_name );

					if ( is_wp_error( $menu_id ) ) {
						continue;
					}
				}
			} else {
				// Menu doesn't exist - create it and use it for locations.
				$menu_id = wp_create_nav_menu( $menu_name );

				if ( is_wp_error( $menu_id ) ) {
					continue;
				}

				$location_menu_id = $menu_id;
			}

			// Track location assignments using the appropriate menu ID.
			if ( ! empty( $menu_data['locations'] ) && is_array( $menu_data['locations'] ) ) {
				foreach ( $menu_data['locations'] as $location ) {
					$location_assignments[ sanitize_key( $location ) ] = $location_menu_id;
				}
			}

			// Import menu items.
			if ( ! empty( $menu_data['items'] ) && is_array( $menu_data['items'] ) ) {
				// Map of old index to new menu item ID for parent relationships.
				$index_to_new_id = array();

				foreach ( $menu_data['items'] as $index => $item_data ) {
					$label = isset( $item_data['label'] ) ? sanitize_text_field( $item_data['label'] ) : '';
					$url   = isset( $item_data['url'] ) ? $item_data['url'] : '';

					// Convert relative URLs to absolute using the current site URL.
					if ( ! empty( $url ) && strpos( $url, '/' ) === 0 && strpos( $url, '//' ) !== 0 ) {
						$url = home_url( $url );
					}

					$url = esc_url_raw( $url );

					if ( empty( $label ) || empty( $url ) ) {
						continue;
					}

					// Determine parent menu item ID.
					$parent_id = 0;
					if ( isset( $item_data['parent'] ) && is_int( $item_data['parent'] ) && isset( $index_to_new_id[ $item_data['parent'] ] ) ) {
						$parent_id = $index_to_new_id[ $item_data['parent'] ];
					}

					// Prepare menu item data.
					$menu_item_data = array(
						'menu-item-title'     => $label,
						'menu-item-url'       => $url,
						'menu-item-status'    => 'publish',
						'menu-item-type'      => 'custom',
						'menu-item-parent-id' => $parent_id,
					);

					// Add optional fields if present.
					if ( ! empty( $item_data['target'] ) ) {
						$menu_item_data['menu-item-target'] = sanitize_text_field( $item_data['target'] );
					}

					if ( ! empty( $item_data['attr_title'] ) ) {
						$menu_item_data['menu-item-attr-title'] = sanitize_text_field( $item_data['attr_title'] );
					}

					if ( ! empty( $item_data['description'] ) ) {
						$menu_item_data['menu-item-description'] = sanitize_textarea_field( $item_data['description'] );
					}

					if ( ! empty( $item_data['classes'] ) && is_array( $item_data['classes'] ) ) {
						$menu_item_data['menu-item-classes'] = implode( ' ', array_map( 'sanitize_html_class', $item_data['classes'] ) );
					}

					if ( ! empty( $item_data['xfn'] ) ) {
						$menu_item_data['menu-item-xfn'] = sanitize_text_field( $item_data['xfn'] );
					}

					// Insert the menu item.
					$new_item_id = wp_update_nav_menu_item( $menu_id, 0, $menu_item_data );

					if ( ! is_wp_error( $new_item_id ) ) {
						$index_to_new_id[ $index ] = $new_item_id;
					}
				}
			}
		}

		// Apply menu location assignments after all menus are created.
		if ( ! empty( $location_assignments ) ) {
			$current_locations = get_nav_menu_locations();
			foreach ( $location_assignments as $location => $menu_id ) {
				$current_locations[ $location ] = $menu_id;
			}
			set_theme_mod( 'nav_menu_locations', $current_locations );
		}
	}

	memberlite_import_settings_redirect( 'import_ok' );
}
add_action( 'admin_post_memberlite_import_theme_settings', 'memberlite_import_theme_settings' );

/**
 * Helper: redirect back to the Tools page with a status flag.
 *
 * @since 6.1
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
 * Resolve an imported attachment reference to a local attachment ID.
 *
 * Tries, in order: existing ID with matching filename, media library filename match,
 * sideload from the absolute URL.
 *
 * @since TBD
 *
 * @param string $url     Absolute URL of the source attachment.
 * @param int    $id_hint Attachment ID from the source site (optional).
 * @return int Resolved attachment ID, or 0 if it could not be resolved.
 */
function memberlite_resolve_imported_attachment( $url, $id_hint = 0 ) {
	$filename = basename( wp_parse_url( $url, PHP_URL_PATH ) );
	if ( empty( $filename ) ) {
		return 0;
	}

	// 1. Same ID locally with matching filename — handles re-importing on the same site.
	if ( $id_hint > 0 && 'attachment' === get_post_type( $id_hint ) && wp_attachment_is_image( $id_hint ) ) {
		$existing_file = get_attached_file( $id_hint );
		if ( $existing_file && basename( $existing_file ) === $filename ) {
			return $id_hint;
		}
	}

	// 2. Find any attachment in the media library with the same filename.
	// Require an image so we don't bind a logo/icon to an unrelated same-named PDF, ZIP, etc.
	$found_id = memberlite_find_attachment_by_filename( $filename );
	if ( $found_id && wp_attachment_is_image( $found_id ) ) {
		return $found_id;
	}

	// 3. Sideload from the absolute URL.
	// Reject anything that isn't an http(s) URL — admin-gated, but we don't want file://, ftp://, etc. fetched.
	$scheme = wp_parse_url( $url, PHP_URL_SCHEME );
	if ( ! in_array( $scheme, array( 'http', 'https' ), true ) ) {
		return 0;
	}

	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$tmp = download_url( $url );
	if ( is_wp_error( $tmp ) ) {
		return 0;
	}

	$file_array = array(
		'name'     => $filename,
		'tmp_name' => $tmp,
	);

	$new_id = media_handle_sideload( $file_array, 0 );

	if ( is_wp_error( $new_id ) ) {
		@unlink( $tmp );
		return 0;
	}

	// Reject anything that came back as a non-image — we're only resolving site_icon / custom_logo here.
	if ( ! wp_attachment_is_image( $new_id ) ) {
		wp_delete_attachment( $new_id, true );
		return 0;
	}

	return (int) $new_id;
}

/**
 * Look up an attachment by its filename via the _wp_attached_file meta.
 *
 * @since TBD
 *
 * @param string $filename The filename to search for (e.g. "icon-512.png").
 * @return int Attachment ID, or 0 if not found.
 */
function memberlite_find_attachment_by_filename( $filename ) {
	global $wpdb;

	$like = '%/' . $wpdb->esc_like( $filename );

	$id = $wpdb->get_var(
		$wpdb->prepare(
			"SELECT post_id FROM {$wpdb->postmeta}
			WHERE meta_key = '_wp_attached_file'
			AND ( meta_value = %s OR meta_value LIKE %s )
			LIMIT 1",
			$filename,
			$like
		)
	);

	return $id ? (int) $id : 0;
}

/**
 * Handle Memberlite theme settings reset.
 *
 * @since 6.1
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

	// Reset the site_logo.
	delete_option( 'site_logo' );

	/**
	 * Filter the option keys to reset when resetting Memberlite theme settings.
	 * By default, we reset the site icon, custom sidebars, and sidebar assignments for custom post types.
	 *
	 * @since 6.1
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
