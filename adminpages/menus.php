<?php
/**
 * Custom Menus Page for Memberlite Theme
 *
 * @package Memberlite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Process menu actions (duplicate/delete) before headers are sent.
 *
 * @since 7.0
 */
function memberlite_process_menu_actions() {
	// Only process on our custom menus admin page.
	if ( ! isset( $_GET['page'] ) ) {
		return;
	}

	$page = sanitize_key( wp_unslash( $_GET['page'] ) );
	if ( $page !== 'memberlite-custom-menus' ) {
		return;
	}

	// Handle "Add New Menu" form (POST).
	if ( ! empty( $_POST['memberlite_new_menu_name'] ) ) {
		// Verify nonce.
		if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'memberlite_add_menu' ) ) {
			wp_die( esc_html__( 'Security check failed.', 'memberlite' ) );
		}

		// Check capabilities.
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			wp_die( esc_html__( 'You do not have permission to do this.', 'memberlite' ) );
		}

		$new_menu_name = sanitize_text_field( wp_unslash( $_POST['memberlite_new_menu_name'] ) );
		$source_menu_id = isset( $_POST['memberlite_source_menu'] ) ? intval( $_POST['memberlite_source_menu'] ) : 0;

		if ( '' === $new_menu_name ) {
			wp_safe_redirect( admin_url( 'admin.php?page=memberlite-custom-menus&error=empty_name' ) );
			exit;
		}

		if ( wp_get_nav_menu_object( $new_menu_name ) ) {
			wp_safe_redirect( admin_url( 'admin.php?page=memberlite-custom-menus&error=name_exists' ) );
			exit;
		}

		// Create the new menu, optionally duplicating items from source.
		if ( $source_menu_id > 0 ) {
			$new_menu_id = memberlite_duplicate_menu( $source_menu_id, $new_menu_name );
		} else {
			$new_menu_id = wp_create_nav_menu( $new_menu_name );
		}

		if ( $new_menu_id && ! is_wp_error( $new_menu_id ) ) {
			// Redirect back to the custom menus page with success message.
			wp_safe_redirect( admin_url( 'admin.php?page=memberlite-custom-menus&created=' . $new_menu_id ) );
			exit;
		} else {
			wp_safe_redirect( admin_url( 'admin.php?page=memberlite-custom-menus&error=create' ) );
			exit;
		}
	}

	// Check for duplicate action.
	$action = isset( $_GET['action'] ) ? sanitize_key( wp_unslash( $_GET['action'] ) ) : '';
	if ( $action === 'duplicate' && isset( $_GET['menu'] ) ) {
		// Verify nonce.
		if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'memberlite_duplicate_menu_' . intval( $_GET['menu'] ) ) ) {
			wp_die( esc_html__( 'Security check failed.', 'memberlite' ) );
		}

		// Check capabilities.
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			wp_die( esc_html__( 'You do not have permission to do this.', 'memberlite' ) );
		}

		$menu_id = intval( $_GET['menu'] );
		$source_menu = wp_get_nav_menu_object( $menu_id );

		if ( $source_menu ) {
			/* translators: %s: original menu name */
			$new_menu_name = sprintf( __( '%s (Copy)', 'memberlite' ), $source_menu->name );
			$new_menu_id = memberlite_duplicate_menu( $menu_id, $new_menu_name );

			if ( $new_menu_id ) {
				wp_safe_redirect( admin_url( 'admin.php?page=memberlite-custom-menus&duplicated=' . $new_menu_id ) );
				exit;
			}
		}

		wp_safe_redirect( admin_url( 'admin.php?page=memberlite-custom-menus&error=duplicate' ) );
		exit;
	}

	// Check for delete action.
	if ( $action === 'delete' && isset( $_GET['menu'] ) ) {
		// Verify nonce.
		if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'memberlite_delete_menu_' . intval( $_GET['menu'] ) ) ) {
			wp_die( esc_html__( 'Security check failed.', 'memberlite' ) );
		}

		// Check capabilities.
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			wp_die( esc_html__( 'You do not have permission to do this.', 'memberlite' ) );
		}

		$menu_id = intval( $_GET['menu'] );
		$result = wp_delete_nav_menu( $menu_id );

		if ( $result && ! is_wp_error( $result ) ) {
			wp_safe_redirect( admin_url( 'admin.php?page=memberlite-custom-menus&deleted=1' ) );
		} else {
			wp_safe_redirect( admin_url( 'admin.php?page=memberlite-custom-menus&error=delete' ) );
		}
		exit;
	}
}
add_action( 'admin_init', 'memberlite_process_menu_actions' );

/**
 * Display admin notices for menu actions on the nav-menus.php page.
 *
 * @since 7.0
 */
function memberlite_menu_admin_notices() {
	$screen = get_current_screen();
	if ( ! $screen || $screen->base !== 'nav-menus' ) {
		return;
	}

	if ( isset( $_GET['memberlite_duplicated'] ) ) {
		?>
		<div class="notice notice-success is-dismissible">
			<p><?php esc_html_e( 'Menu duplicated successfully. You are now editing the new menu.', 'memberlite' ); ?></p>
		</div>
		<?php
	}

	if ( isset( $_GET['memberlite_created'] ) ) {
		?>
		<div class="notice notice-success is-dismissible">
			<p><?php esc_html_e( 'Menu created successfully. You are now editing the new menu.', 'memberlite' ); ?></p>
		</div>
		<?php
	}
}
add_action( 'admin_notices', 'memberlite_menu_admin_notices' );

/**
 * Render the Custom Menus admin page.
 *
 * @since 7.0
 */
function memberlite_custom_menus() {
	$menus = wp_get_nav_menus();
	$locations = get_registered_nav_menus();
	$menu_locations = get_nav_menu_locations();

	// Build a map of menu ID to assigned locations.
	$menu_to_locations = array();
	foreach ( $menu_locations as $location => $menu_id ) {
		if ( $menu_id && isset( $locations[ $location ] ) ) {
			if ( ! isset( $menu_to_locations[ $menu_id ] ) ) {
				$menu_to_locations[ $menu_id ] = array();
			}
			$menu_to_locations[ $menu_id ][] = $locations[ $location ];
		}
	}

	// Load the Memberlite dashboard-area header.
	require_once __DIR__ . '/admin_header.php';
	?>

	<hr class="wp-header-end">

	<?php
	// Handle GET-based messages.
	$message = '';
	$class = 'notice-error';

	if ( isset( $_GET['created'] ) ) {
		$created_menu_id = intval( $_GET['created'] );
		$created_menu = wp_get_nav_menu_object( $created_menu_id );
		if ( $created_menu ) {
			$edit_url = admin_url( 'nav-menus.php?action=edit&menu=' . $created_menu_id );
			$message = sprintf(
				/* translators: %1$s: opening link tag, %2$s: menu name, %3$s: closing link tag */
				__( 'Menu created successfully. %1$sEdit "%2$s" menu%3$s', 'memberlite' ),
				'<a href="' . esc_url( $edit_url ) . '">',
				esc_html( $created_menu->name ),
				'</a>'
			);
			$class = 'notice-success';
		}
	} elseif ( isset( $_GET['duplicated'] ) ) {
		$duplicated_menu_id = intval( $_GET['duplicated'] );
		$duplicated_menu = wp_get_nav_menu_object( $duplicated_menu_id );
		if ( $duplicated_menu ) {
			$edit_url = admin_url( 'nav-menus.php?action=edit&menu=' . $duplicated_menu_id );
			$message = sprintf(
				/* translators: %1$s: opening link tag, %2$s: menu name, %3$s: closing link tag */
				__( 'Menu duplicated successfully. %1$sEdit "%2$s" menu%3$s', 'memberlite' ),
				'<a href="' . esc_url( $edit_url ) . '">',
				esc_html( $duplicated_menu->name ),
				'</a>'
			);
			$class = 'notice-success';
		}
	} elseif ( isset( $_GET['deleted'] ) ) {
		$message = __( 'Menu deleted successfully.', 'memberlite' );
		$class = 'notice-success';
	} elseif ( isset( $_GET['error'] ) ) {
		$error = sanitize_key( wp_unslash( $_GET['error'] ) );
		switch ( $error ) {
			case 'duplicate':
				$message = __( 'There was an error duplicating the menu.', 'memberlite' );
				break;
			case 'delete':
				$message = __( 'There was an error deleting the menu.', 'memberlite' );
				break;
			case 'empty_name':
				$message = __( 'Please enter a valid menu name.', 'memberlite' );
				break;
			case 'name_exists':
				$message = __( 'A menu with that name already exists. Please choose another name.', 'memberlite' );
				break;
			case 'create':
				$message = __( 'There was an error creating the menu.', 'memberlite' );
				break;
		}
	}

	// Output notice if needed.
	if ( $message ) {
		printf(
			'<div class="notice %1$s is-dismissible"><p>%2$s</p></div>',
			esc_attr( $class ),
			wp_kses( $message, array( 'a' => array( 'href' => array() ) ) )
		);
	}
	?>

	<h1><?php esc_html_e( 'Memberlite Custom Menus', 'memberlite' ); ?></h1>
	<p>
		<?php esc_html_e( 'Create and manage navigation menus for your Memberlite theme. You can create a new menu from scratch or duplicate items from an existing menu.', 'memberlite' ); ?>
		<?php
			echo '<a href="https://www.paidmembershipspro.com/documentation/memberlite/menus/?utm_source=plugin&utm_medium=memberlite-admin-menus-page&utm_campaign=documentation" target="_blank" rel="noopener noreferrer">' . esc_html__( 'Learn more about menus in Memberlite', 'memberlite' ) . '</a>';
		?>
	</p>

	<div id="memberlite_menus_add_new" class="memberlite_section" data-visibility="shown" data-activated="true">
		<div class="memberlite_section_toggle">
			<button class="memberlite_section-toggle-button" type="button" aria-expanded="true">
				<span class="dashicons dashicons-arrow-up-alt2"></span>
				<?php esc_html_e( 'Add New Menu', 'memberlite' ); ?>
			</button>
		</div>
		<div class="memberlite_section_inside">
			<form id="memberlite_add_menu_form" method="post" action="<?php echo esc_url( add_query_arg( array( 'page' => 'memberlite-custom-menus' ), admin_url( 'admin.php' ) ) ); ?>">
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row">
								<label for="memberlite_new_menu_name"><?php esc_html_e( 'Menu Name', 'memberlite' ); ?></label>
							</th>
							<td>
								<input type="text" name="memberlite_new_menu_name" id="memberlite_new_menu_name" value="" size="30" />
								<p class="description"><?php esc_html_e( 'Enter a name for your new menu.', 'memberlite' ); ?></p>
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="memberlite_source_menu"><?php esc_html_e( 'Duplicate Items From', 'memberlite' ); ?></label>
							</th>
							<td>
								<select name="memberlite_source_menu" id="memberlite_source_menu">
									<option value="0"><?php esc_html_e( '— None (Start Empty) —', 'memberlite' ); ?></option>
									<?php foreach ( $menus as $menu ) : ?>
										<option value="<?php echo esc_attr( $menu->term_id ); ?>"><?php echo esc_html( $menu->name ); ?></option>
									<?php endforeach; ?>
								</select>
								<p class="description"><?php esc_html_e( 'Optionally select an existing menu to copy its items into your new menu.', 'memberlite' ); ?></p>
							</td>
						</tr>
					</tbody>
				</table>
				<p class="submit">
					<?php wp_nonce_field( 'memberlite_add_menu' ); ?>
					<?php submit_button( esc_html__( 'Add Menu', 'memberlite' ), 'primary', 'memberlite_add_menu_submit', false ); ?>
				</p>
			</form>
		</div><!-- end memberlite_section_inside -->
	</div><!-- end memberlite_menus_add_new -->

	<div id="memberlite_menus_existing" class="memberlite_section" data-visibility="shown" data-activated="true">
		<div class="memberlite_section_toggle">
			<button class="memberlite_section-toggle-button" type="button" aria-expanded="true">
				<span class="dashicons dashicons-arrow-up-alt2"></span>
				<?php esc_html_e( 'Existing Menus', 'memberlite' ); ?>
			</button>
		</div>
		<div class="memberlite_section_inside">
			<?php if ( empty( $menus ) ) : ?>
				<p><em><?php esc_html_e( 'No menus have been created yet.', 'memberlite' ); ?></em></p>
			<?php else : ?>
				<table class="widefat fixed striped" id="memberlite-custom-menus-table">
					<thead>
						<tr>
							<th scope="col" class="manage-column"><?php esc_html_e( 'Menu Name', 'memberlite' ); ?></th>
							<th scope="col" class="manage-column"><?php esc_html_e( 'Assigned Locations', 'memberlite' ); ?></th>
							<th scope="col" class="manage-column"><?php esc_html_e( 'Items', 'memberlite' ); ?></th>
							<th scope="col" class="manage-column"><?php esc_html_e( 'Actions', 'memberlite' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $menus as $menu ) :
							$item_count = wp_get_nav_menu_items( $menu->term_id );
							$item_count = $item_count ? count( $item_count ) : 0;
							$assigned = isset( $menu_to_locations[ $menu->term_id ] ) ? implode( ', ', $menu_to_locations[ $menu->term_id ] ) : '—';

							$edit_url = admin_url( 'nav-menus.php?action=edit&menu=' . $menu->term_id );
							$duplicate_url = wp_nonce_url(
								admin_url( 'admin.php?page=memberlite-custom-menus&action=duplicate&menu=' . $menu->term_id ),
								'memberlite_duplicate_menu_' . $menu->term_id
							);
							$delete_url = wp_nonce_url(
								admin_url( 'admin.php?page=memberlite-custom-menus&action=delete&menu=' . $menu->term_id ),
								'memberlite_delete_menu_' . $menu->term_id
							);

							$confirm_text = sprintf(
								/* translators: %s: menu name */
								esc_js( __( 'Are you sure you want to delete the "%s" menu? This cannot be undone.', 'memberlite' ) ),
								esc_js( $menu->name )
							);
						?>
							<tr>
								<td>
									<strong><a href="<?php echo esc_url( $edit_url ); ?>"><?php echo esc_html( $menu->name ); ?></a></strong>
								</td>
								<td><?php echo esc_html( $assigned ); ?></td>
								<td><?php echo esc_html( $item_count ); ?></td>
								<td>
									<a href="<?php echo esc_url( $edit_url ); ?>" class="button button-secondary" title="<?php echo esc_attr( sprintf( /* translators: %s: menu name */ __( 'Edit "%s" Menu', 'memberlite' ), $menu->name ) ); ?>">
										<?php esc_html_e( 'Edit', 'memberlite' ); ?>
									</a>
									<a href="<?php echo esc_url( $duplicate_url ); ?>" class="button button-secondary" title="<?php echo esc_attr( sprintf( /* translators: %s: menu name */ __( 'Duplicate "%s" Menu', 'memberlite' ), $menu->name ) ); ?>">
										<?php esc_html_e( 'Duplicate', 'memberlite' ); ?>
									</a>
									<a href="javascript:memberliteConfirmMenuDeletion('<?php echo $confirm_text; ?>', '<?php echo esc_url( $delete_url ); ?>');" class="button button-secondary memberlite-button-danger" title="<?php echo esc_attr( sprintf( /* translators: %s: menu name */ __( 'Delete "%s" Menu', 'memberlite' ), $menu->name ) ); ?>">
										<?php esc_html_e( 'Delete', 'memberlite' ); ?>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php endif; ?>
		</div><!-- end memberlite_section_inside -->
	</div><!-- end memberlite_menus_existing -->

	<script>
		function memberliteConfirmMenuDeletion( text, url ) {
			if ( window.confirm( text ) ) {
				window.location = url;
			}
		}
	</script>

	<?php
	// Load the Memberlite dashboard-area footer.
	require_once __DIR__ . '/admin_footer.php';
}

/**
 * Duplicate a navigation menu and all its items.
 *
 * @since 7.0
 *
 * @param int    $menu_id The ID of the menu to duplicate.
 * @param string $new_name The name for the duplicated menu.
 * @return int|false The new menu ID on success, false on failure.
 */
function memberlite_duplicate_menu( $menu_id, $new_name ) {
	if ( empty( $menu_id ) || empty( $new_name ) ) {
		return false;
	}

	$menu_id = intval( $menu_id );
	$new_name = sanitize_text_field( $new_name );

	$source_menu = wp_get_nav_menu_object( $menu_id );
	$source_items = wp_get_nav_menu_items( $menu_id );

	if ( ! $source_menu ) {
		return false;
	}

	// Check if a menu with this name already exists.
	$existing_menu = wp_get_nav_menu_object( $new_name );
	if ( $existing_menu ) {
		/* translators: %s: menu name */
		return memberlite_duplicate_menu( $menu_id, sprintf( __( '%s (Copy)', 'memberlite' ), $new_name ) );
	}

	// Create the new menu.
	$new_menu_id = wp_create_nav_menu( $new_name );

	if ( is_wp_error( $new_menu_id ) ) {
		return false;
	}

	// If no items, return the new empty menu.
	if ( empty( $source_items ) ) {
		return $new_menu_id;
	}

	// Map old menu item IDs to new ones for parent relationships.
	$id_map = array();

	foreach ( $source_items as $index => $menu_item ) {
		$args = array(
			'post_title'     => $menu_item->title,
			'post_content'   => $menu_item->description,
			'post_excerpt'   => $menu_item->attr_title,
			'post_status'    => $menu_item->post_status,
			'post_type'      => 'nav_menu_item',
			'menu_order'     => $index,
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'tax_input'      => array(
				'nav_menu' => array( $new_menu_id ),
			),
		);

		// Copy menu item meta.
		$meta_input = array();
		$meta_keys = get_post_meta( $menu_item->db_id );

		foreach ( $meta_keys as $meta_key => $meta_values ) {
			if ( $meta_key === '_menu_item_menu_item_parent' ) {
				continue; // Handle parent separately.
			}
			$meta_value = $meta_values[0];
			if ( is_serialized( $meta_value ) ) {
				$meta_value = maybe_unserialize( $meta_value );
			}
			$meta_input[ $meta_key ] = $meta_value;
		}

		$args['meta_input'] = $meta_input;

		// Insert the new menu item.
		$new_item_id = wp_insert_post( $args );

		// Skip this item if insertion failed.
		if ( is_wp_error( $new_item_id ) ) {
			continue;
		}

		// Store the ID mapping.
		$id_map[ $menu_item->db_id ] = $new_item_id;

		// Update parent relationship using the mapped ID.
		if ( ! empty( $menu_item->menu_item_parent ) && isset( $id_map[ $menu_item->menu_item_parent ] ) ) {
			update_post_meta( $new_item_id, '_menu_item_menu_item_parent', $id_map[ $menu_item->menu_item_parent ] );
		}
	}

	return $new_menu_id;
}
