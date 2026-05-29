<?php
/**
 * Import Settings Tool for Memberlite Theme
 *
 * @since 6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$memberlite_is_child      = is_child_theme();
$memberlite_parent_name   = $memberlite_is_child ? wp_get_theme( get_template() )->get( 'Name' ) : '';
?>
<div id="memberlite_tools_import_settings" class="memberlite_section" data-visibility="shown" data-activated="true">
	<div class="memberlite_section_toggle">
		<button class="memberlite_section-toggle-button" type="button" aria-expanded="true">
			<span class="dashicons dashicons-arrow-up-alt2"></span>
			<?php esc_html_e( 'Import Theme Settings', 'memberlite' ); ?>
		</button>
	</div>
	<div class="memberlite_section_inside">
		<p><?php esc_html_e( 'Use the tool below to import Memberlite theme settings.', 'memberlite' ); ?></p>
		<p><span class="dashicons dashicons-warning" aria-hidden="true"></span><strong><?php esc_html_e( 'This will overwrite your current theme settings.', 'memberlite' ); ?></strong></p>
		<form method="post" enctype="multipart/form-data" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<table class="form-table">
				<tbody>
					<?php if ( $memberlite_is_child ) { ?>
					<tr>
						<th scope="row"><?php esc_html_e( 'Import Source', 'memberlite' ); ?></th>
						<td>
							<fieldset>
								<label>
									<input type="radio" name="memberlite_import_source" value="file" checked />
									<?php esc_html_e( 'Import from file', 'memberlite' ); ?>
								</label>
								<p class="description"><?php esc_html_e( 'The import will include Customizer settings (logo, colors, typography, backgrounds, Additional CSS etc.), related Memberlite options (such as custom sidebars), and navigation menus if present in the file.', 'memberlite' ); ?></p>
								<br />
								<label>
									<input type="radio" name="memberlite_import_source" value="clone" />
									<?php
									printf(
										/* translators: %s: parent theme name */
										esc_html__( 'Clone settings from parent theme (%s)', 'memberlite' ),
										esc_html( $memberlite_parent_name )
									);
									?>
								</label>
							</fieldset>
						</td>
					</tr>
					<?php } ?>
					<tr id="memberlite_import_file_row">
						<th scope="row">
							<label for="memberlite_import_file"><?php esc_html_e( 'Import File', 'memberlite' ); ?></label>
						</th>
						<td>
							<input type="file" name="memberlite_import_file" id="memberlite_import_file" accept=".json" />
							<p class="description">
								<?php esc_html_e( 'Select a Memberlite theme settings file (.json) to import.', 'memberlite' ); ?>
							</p>
						</td>
					</tr>
					<tr id="memberlite_import_menus_row">
						<th scope="row"><?php esc_html_e( 'Menu Import Options', 'memberlite' ); ?></th>
						<td>
							<fieldset>
								<label>
									<input type="checkbox" name="memberlite_replace_existing_menus" value="1" />
									<?php esc_html_e( 'Replace existing menus with imported versions', 'memberlite' ); ?>
								</label>
								<p class="description">
									<?php esc_html_e( 'If checked, any existing menu with the same name will be replaced. If unchecked, a new duplicate menu will be created instead.', 'memberlite' ); ?>
								</p>
							</fieldset>
						</td>
					</tr>
					<?php if ( $memberlite_is_child ) { ?>
					<tr id="memberlite_clone_description_row" style="display:none;">
						<th scope="row"><?php esc_html_e( 'Clone Settings', 'memberlite' ); ?></th>
						<td>
							<p class="description">
								<span class="dashicons dashicons-warning" aria-hidden="true"></span>
								<strong>
								<?php
								printf(
									/* translators: %s: parent theme name */
									esc_html__( 'This will copy all Customizer settings from the %s parent theme to your child theme, overwriting any existing child theme settings.', 'memberlite' ),
									esc_html( $memberlite_parent_name )
								);
								?>
								</strong>
							</p>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<p class="submit">
				<?php wp_nonce_field( 'memberlite_import_theme_settings', 'memberlite_import_theme_settings_nonce' ); ?>
				<input type="hidden" name="action" id="memberlite_import_action" value="memberlite_import_theme_settings" />
				<button type="submit" id="memberlite_import_submit" class="button button-primary"><?php esc_html_e( 'Import Theme Settings', 'memberlite' ); ?></button>
			</p>
		</form>
		<?php if ( $memberlite_is_child ) { ?>
		<script>
		( function() {
			var radios      = document.querySelectorAll( 'input[name="memberlite_import_source"]' );
			var fileRow     = document.getElementById( 'memberlite_import_file_row' );
			var menusRow    = document.getElementById( 'memberlite_import_menus_row' );
			var cloneRow    = document.getElementById( 'memberlite_clone_description_row' );
			var actionField = document.getElementById( 'memberlite_import_action' );
			var submitBtn   = document.getElementById( 'memberlite_import_submit' );
			var fileInput   = document.getElementById( 'memberlite_import_file' );
			var labelImport = <?php echo wp_json_encode( __( 'Import Theme Settings', 'memberlite' ) ); ?>;
			var labelClone  = <?php echo wp_json_encode( __( 'Clone Settings from Parent Theme', 'memberlite' ) ); ?>;

			function updateMode( mode ) {
				var isClone = ( mode === 'clone' );
				fileRow.style.display     = isClone ? 'none' : '';
				menusRow.style.display    = isClone ? 'none' : '';
				cloneRow.style.display    = isClone ? '' : 'none';
				fileInput.disabled        = isClone;
				actionField.value         = isClone ? 'memberlite_clone_parent_theme_settings' : 'memberlite_import_theme_settings';
				submitBtn.textContent     = isClone ? labelClone : labelImport;
			}

			Array.prototype.forEach.call( radios, function( radio ) {
				radio.addEventListener( 'change', function() {
					updateMode( this.value );
				} );
			} );
		}() );
		</script>
		<?php } ?>
		<hr />
		<p><?php esc_html_e( 'To import WordPress content such as posts, pages, and media, use the built-in WordPress tools located at Tools > Import in the WordPress admin.', 'memberlite' ); ?></p>
	</div>
</div>