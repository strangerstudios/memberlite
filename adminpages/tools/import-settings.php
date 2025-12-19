<?php
/**
 * Import Settings Tool for Memberlite Theme
 *
 * @since TBD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="memberlite_tools_import_settings" class="memberlite_section" data-visibility="shown" data-activated="true">
	<div class="memberlite_section_toggle">
		<button class="memberlite_section-toggle-button" type="button" aria-expanded="true">
			<span class="dashicons dashicons-arrow-up-alt2"></span>
			<?php esc_html_e( 'Import Theme Settings', 'memberlite' ); ?>
		</button>
	</div>
	<div class="memberlite_section_inside">
		<p><?php esc_html_e( 'Use the tool below to import Memberlite theme settings from a previously exported settings file.', 'memberlite' ); ?> <strong><?php esc_html_e( 'This will overwrite your current Memberlite theme settings.', 'memberlite' ); ?></strong></p>
		<p><?php esc_html_e( 'The import will apply Customizer settings (logo, colors, typography, backgrounds, etc.), related Memberlite options (such as custom sidebars), and Additional CSS if present in the file.', 'memberlite' ); ?></p>
		<form method="post" enctype="multipart/form-data" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<table class="form-table">
					<tbody>
						<tr>
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
					</tbody>
			</table>
			<p class="submit">
				<?php wp_nonce_field( 'memberlite_import_theme_settings', 'memberlite_import_theme_settings_nonce' ); ?>
				<input type="hidden" name="action" value="memberlite_import_theme_settings" />
				<button type="submit" class="button button-primary"><?php esc_html_e( 'Import Theme Settings', 'memberlite' ); ?></button>
			</p>
		</form>
		<hr />
		<p><?php esc_html_e( 'To import WordPress content such as posts, pages, and media, use the built-in WordPress tools located at Tools > Import in the WordPress admin.', 'memberlite' ); ?></p>
	</div>
</div>
