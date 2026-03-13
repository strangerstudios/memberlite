<?php
/**
 * Custom Sidebars Page for Memberlite Theme
 *
 * @package Memberlite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Settings page for Memberlite > Custom Sidebars
 *
 * @since 6.1
 */
function memberlite_custom_sidebars() {
	/**
	 * Load the Memberlite dashboard-area header
	 */
	require_once __DIR__ . '/admin_header.php'; ?>

	<hr class="wp-header-end">

	<?php
	// Get options.
	$memberlite_custom_sidebars = get_option( 'memberlite_custom_sidebars', array() );
	$memberlite_cpt_sidebars    = get_option( 'memberlite_cpt_sidebars', array() );

	// Get post types (public non-core CPTs).
	$memberlite_post_types = get_post_types(
		array(
			'public'   => true,
			'_builtin' => false,
		),
		'objects'
	);

	// Set up message variables.
	$message = '';
	$class   = 'notice-error';

	// Handle "Add New Sidebar" form (POST).
	if ( ! empty( $_POST['memberlite_custom_sidebar_name'] ) ) {

		check_admin_referer( 'memberlite_add_custom_sidebar' );

		$new_sidebar = sanitize_text_field( wp_unslash( $_POST['memberlite_custom_sidebar_name'] ) );

		if ( '' === $new_sidebar ) {
			$message = __( 'Please enter a valid sidebar name.', 'memberlite' );
			$class   = 'notice-error';
		} elseif ( memberlite_sidebar_exists( $new_sidebar ) ) {
			$message = __( 'Sidebar ID or name already used. Try another name.', 'memberlite' );
			$class   = 'notice-error';
		} else {
			// Add new sidebar.
			$memberlite_custom_sidebars[] = $new_sidebar;

			// Register it for this request.
			memberlite_registerCustomSidebar( $new_sidebar );

			// Remove any blanks and re-index.
			$memberlite_custom_sidebars = array_values( array_filter( $memberlite_custom_sidebars ) );

			// Save option.
			update_option( 'memberlite_custom_sidebars', $memberlite_custom_sidebars, 'no' );

			$message = __( 'Sidebar added.', 'memberlite' );
			$class   = 'notice-success';
		}

	// Handle delete action (GET).
	} elseif ( ! empty( $_GET['delete'] ) ) {

		if ( ! empty( $_GET['_wpnonce'] ) && check_admin_referer( 'memberlite_delete_custom_sidebar' ) ) {

			$delete_name = sanitize_text_field( wp_unslash( $_GET['delete'] ) );

			// Look for sidebar to delete.
			$key = array_search( $delete_name, $memberlite_custom_sidebars, true );

			if ( false !== $key ) {
				// Remove from list.
				unset( $memberlite_custom_sidebars[ $key ] );

				// Unregister sidebar.
				unregister_sidebar( memberlite_generateSlug( $delete_name, 45 ) );

				// Clean up blanks and re-index.
				$memberlite_custom_sidebars = array_values( array_filter( $memberlite_custom_sidebars ) );

				// Save option.
				update_option( 'memberlite_custom_sidebars', $memberlite_custom_sidebars, 'no' );

				$message = __( 'Custom sidebar deleted.', 'memberlite' );
				$class   = 'notice-success';
			} else {
				$message = __( 'Could not find custom sidebar. Maybe it was already deleted.', 'memberlite' );
				$class   = 'notice-error';
			}
		}

	// Handle CPT sidebar mapping (POST).
	} elseif ( ! empty( $_POST['memberlite_cpt_sidebar'] ) ) {

		if ( ! empty( $_POST['_wpnonce'] ) && check_admin_referer( 'memberlite_cpt_sidebar' ) ) {

			$memberlite_cpt_sidebars = array();

			$sidebar_ids = isset( $_POST['memberlite_sidebar_cpt_sidebar_ids'] )
				? (array) $_POST['memberlite_sidebar_cpt_sidebar_ids']
				: array();

			$sidebar_names = isset( $_POST['memberlite_sidebar_cpt_names'] )
				? (array) $_POST['memberlite_sidebar_cpt_names']
				: array();

			$sidebar_ids   = array_map( 'sanitize_text_field', wp_unslash( $sidebar_ids ) );
			$sidebar_names = array_map( 'sanitize_text_field', wp_unslash( $sidebar_names ) );

			// Build mapping array.
			$count = min( count( $sidebar_ids ), count( $sidebar_names ) );

			for ( $i = 0; $i < $count; $i++ ) {
				if ( '' === $sidebar_names[ $i ] ) {
					continue;
				}
				$memberlite_cpt_sidebars[ $sidebar_names[ $i ] ] = $sidebar_ids[ $i ];
			}

			// Update option.
			update_option( 'memberlite_cpt_sidebars', $memberlite_cpt_sidebars, 'no' );

			$message = __( 'Custom sidebar settings updated.', 'memberlite' );
			$class   = 'notice-success';
		}
	}

	// Output notice if needed.
	if ( $message ) {
		printf(
			'<div class="notice %1$s is-dismissible"><p>%2$s</p></div>',
			esc_attr( $class ),
			esc_html( $message )
		);
	}
	?>

	<h1><?php esc_html_e( 'Memberlite Custom Sidebars', 'memberlite' ); ?></h1>
	<p>
		<?php esc_html_e( 'Create and manage custom sidebars for your Memberlite theme. You can also assign these sidebars to custom post types.', 'memberlite' ); ?>
		<?php
			echo '<a href="https://www.paidmembershipspro.com/documentation/memberlite/sidebars-and-widgets/?utm_source=plugin&utm_medium=memberlite-admin-sidebar-page&utm_campaign=documentation" target="_blank" rel="noopener noreferrer">' . esc_html__( 'Learn more about custom sidebars in Memberlite', 'memberlite' ) . '</a>';
		?>
	</p>
	<div id="memberlite_sidebars_add_new" class="memberlite_section" data-visibility="shown" data-activated="true">
		<div class="memberlite_section_toggle">
			<button class="memberlite_section-toggle-button" type="button" aria-expanded="true">
				<span class="dashicons dashicons-arrow-up-alt2"></span>
				<?php esc_html_e( 'Add New Sidebar', 'memberlite' ); ?>
			</button>
		</div>
		<div class="memberlite_section_inside">
			<form id="memberlite_add_sidebar_form" method="post" action="<?php echo esc_url( add_query_arg( array( 'page' => 'memberlite-custom-sidebars' ), admin_url( 'admin.php' ) ) ); ?>">
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row">
								<label for="memberlite_custom_sidebar_name"><?php esc_html_e( 'Sidebar Name', 'memberlite' ); ?></label>
							</th>
							<td>
								<input type="text" name="memberlite_custom_sidebar_name" id="memberlite_custom_sidebar_name" value="" size="30" />
								<p class="description"><?php esc_html_e( 'Enter a name for your new custom sidebar.', 'memberlite' ); ?></p>
							</td>
						</tr>
					</tbody>
				</table>
				<p class="submit">
					<?php wp_nonce_field( 'memberlite_add_custom_sidebar' ); ?>
					<?php submit_button( esc_html__( 'Add Sidebar', 'memberlite' ), 'primary', 'memberlite_add_sidebar_submit', false ); ?>
				</p>
			</form>
		</div><!-- end memberlite_section_inside -->
	</div><!-- end memberlite_sidebars_add_new -->

	<div id="memberlite_sidebars_existing" class="memberlite_section" data-visibility="shown" data-activated="true">
		<div class="memberlite_section_toggle">
			<button class="memberlite_section-toggle-button" type="button" aria-expanded="true">
				<span class="dashicons dashicons-arrow-up-alt2"></span>
				<?php esc_html_e( 'Existing Sidebars', 'memberlite' ); ?>
			</button>
		</div>
		<div class="memberlite_section_inside">
			<table class="widefat striped" id="memberlite-custom-sidebars-table">
				<thead>
					<tr>
						<th scope="col" class="manage-column column-sidebar-id"><?php esc_html_e( 'ID', 'memberlite' ); ?></th>
						<th scope="col" class="manage-column column-sidebar-name"><?php esc_html_e( 'Name', 'memberlite' ); ?></th>
						<th scope="col" class="manage-column column-sidebar-actions"><?php esc_html_e( 'Actions', 'memberlite' ); ?></th>
					</tr>
				</thead>
				<tbody class="memberlite-custom-sidebars">
				<?php
					global $wp_registered_sidebars;
					ksort( $wp_registered_sidebars );

					foreach ( $wp_registered_sidebars as $wp_registered_sidebar ) {
						?>
						<tr class="memberlite-custom-sidebars-row">
							<td class="custom-sidebar-id"><?php echo esc_html( $wp_registered_sidebar['id'] ); ?></td>
							<td class="custom-sidebar-name"><?php echo esc_html( $wp_registered_sidebar['name'] ); ?></td>
							<td class="custom-sidebar-actions">
								<?php
								if ( in_array( $wp_registered_sidebar['name'], $memberlite_custom_sidebars, true ) ) {
									$confirm_text = sprintf(
										/* translators: %s: sidebar name */
										esc_js( __( 'Are you sure that you want to delete the %s sidebar?', 'memberlite' ) ),
										$wp_registered_sidebar['name']
									);
									$delete_url   = wp_nonce_url(
										add_query_arg(
											array(
												'page'   => 'memberlite-custom-sidebars',
												'delete' => rawurlencode( $wp_registered_sidebar['name'] ),
											),
											admin_url( 'admin.php' )
										),
										'memberlite_delete_custom_sidebar'
									);
									?>
									<a href="javascript:confirmCustomSidebarDeletion('<?php echo $confirm_text; ?>', '<?php echo esc_url( $delete_url ); ?>');" class="button button-secondary memberlite-button-danger" title="<?php echo esc_attr( sprintf( /* translators: %s: sidebar name */ __( 'Delete "%s" Sidebar', 'memberlite' ), $wp_registered_sidebar['name'] ) ); ?>">
										<?php esc_html_e( 'Delete', 'memberlite' ); ?>
									</a>
									<?php
								} else {
									?>
									<em><?php esc_html_e( 'Not a custom sidebar.', 'memberlite' ); ?></em>
									<?php
								}
								?>
							</td>
						</tr>
						<?php
					}
				?>
				</tbody>
			</table>
		</div><!-- end memberlite_section_inside -->
	</div><!-- end memberlite-sidebars-existing-->

	<div id="memberlite_sidebars_assigned" class="memberlite_section" data-visibility="shown" data-activated="true">
		<div class="memberlite_section_toggle">
			<button class="memberlite_section-toggle-button" type="button" aria-expanded="true">
				<span class="dashicons dashicons-arrow-up-alt2"></span>
				<?php esc_html_e( 'Assign Sidebars to Custom Post Types', 'memberlite' ); ?>
			</button>
		</div>
		<div class="memberlite_section_inside">
			<p><?php esc_html_e( 'For each detected custom post type below, select the sidebar you would like to display.', 'memberlite' ); ?></p>
			<?php
			if ( ! empty( $memberlite_post_types ) ) {
				?>
				<form id="memberlite_cpt_sidebar_form" method="post" action="<?php echo esc_url( add_query_arg( array( 'page' => 'memberlite-custom-sidebars' ), admin_url( 'admin.php' ) ) ); ?>">
					<table class="widefat striped" id="memberlite-cpt-sidebars-table">
						<thead>
							<tr>
								<th scope="col" class="manage-column column-cpt-name"><?php esc_html_e( 'Custom Post Type', 'memberlite' ); ?></th>
								<th scope="col" class="manage-column column-cpt-actions"><?php esc_html_e( 'Select Sidebar', 'memberlite' ); ?></th>
							</tr>
						</thead>
						<tbody class="memberlite-cpt-sidebars">
						<?php
						foreach ( $memberlite_post_types as $post_type ) {
							if ( in_array( $post_type->name, array( 'reply' ), true ) ) {
								continue;
							}

							$selected_sidebar = ! empty( $memberlite_cpt_sidebars[ $post_type->name ] )
								? $memberlite_cpt_sidebars[ $post_type->name ]
								: '';
							?>
							<tr class="memberlite-cpt-sidebars-row">
								<td class="cpt-name"><?php echo esc_html( $post_type->labels->name ); ?></td>
								<td class="cpt-actions">
									<?php
									echo '<select id="memberlite_sidebar_cpt_sidebar_ids" name="memberlite_sidebar_cpt_sidebar_ids[]">';
									echo '<option value="memberlite_sidebar_default"' . selected( $selected_sidebar, 'memberlite_sidebar_default', false ) . '>- ' . esc_html__( 'Default Sidebar', 'memberlite' ) . ' -</option>';

									foreach ( $wp_registered_sidebars as $wp_registered_sidebar ) {
										echo '<option value="' . esc_attr( $wp_registered_sidebar['id'] ) . '"' . selected( $selected_sidebar, $wp_registered_sidebar['id'], false ) . '>' . esc_html( $wp_registered_sidebar['name'] ) . '</option>';
									}

									echo '<option value="memberlite_sidebar_blank"' . selected( $selected_sidebar, 'memberlite_sidebar_blank', false ) . '>- ' . esc_html__( 'Hide Sidebar', 'memberlite' ) . ' -</option>';
									echo '</select>';
									?>
									<input type="hidden" name="memberlite_sidebar_cpt_names[]" id="memberlite_sidebar_cpt_names" value="<?php echo esc_attr( $post_type->name ); ?>" />
								</td>
							</tr>
							<?php
						}
						?>
						</tbody>
					</table>
					<?php wp_nonce_field( 'memberlite_cpt_sidebar' ); ?>
					<input type="hidden" name="memberlite_cpt_sidebar" value="1" />
					<p class="submit">
						<?php submit_button( esc_html__( 'Save CPT Sidebar Selections', 'memberlite' ), 'primary', 'memberlite_cpt_sidebar_submit', false ); ?>
					</p>
				</form>
				<?php
			} else {
				echo '<p><em>' . esc_html__( 'No custom post types found.', 'memberlite' ) . '</em></p>';
			}
			?>
		</div><!-- end memberlite_section_inside -->
	</div><!-- end memberlite-sidebars-assigned -->

	<script>
		function confirmCustomSidebarDeletion(text, url) {
			if ( window.confirm(text) ) {
				window.location = url;
			}
		}
	</script>

	<?php
	/**
	 * Load the Memberlite dashboard-area footer
	 */
	require_once __DIR__ . '/admin_footer.php';
}
