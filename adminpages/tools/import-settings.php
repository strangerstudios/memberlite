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
?>
<div id="memberlite_tools_import_settings" class="memberlite_section" data-visibility="shown" data-activated="true">
	<div class="memberlite_section_toggle">
		<button class="memberlite_section-toggle-button" type="button" aria-expanded="true">
			<span class="dashicons dashicons-arrow-up-alt2"></span>
			<?php esc_html_e( 'Import Theme Settings', 'memberlite' ); ?>
		</button>
	</div>
	<div class="memberlite_section_inside">
		<p><?php esc_html_e( 'Use the tool below to import Memberlite theme settings. These settings include Customizer settings (logo, colors, typography, backgrounds, etc.) and Additional CSS.', 'memberlite' ); ?></p>
		<p><span class="dashicons dashicons-warning" aria-hidden="true"></span><strong><?php esc_html_e( 'Importing settings will replace your current theme settings.', 'memberlite' ); ?></strong></p>

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
									<?php esc_html_e( 'Import from file.', 'memberlite' ); ?>
								</label>
								<p class="description">
									<?php esc_html_e( 'Imports Customizer settings, theme-specific options (site icon, custom sidebars), and menus (if included).', 'memberlite' ); ?>
								</p>
								<br />
								<label>
									<input type="radio" name="memberlite_import_source" value="clone" />
									<?php esc_html_e( 'Import settings from Memberlite parent theme.', 'memberlite' ); ?>
								</label>
								<p class="description">
									<?php esc_html_e( 'Copies settings from the active parent theme. Existing menus and theme-specific options are preserved.', 'memberlite' ); ?>
								</p>
							</fieldset>
						</td>
					</tr>
					<?php } ?>
					<tr id="memberlite-import-file-row">
						<th scope="row">
							<label for="memberlite-import-file"><?php esc_html_e( 'Import File', 'memberlite' ); ?></label>
						</th>
						<td>
							<input type="file" name="memberlite_import_file" id="memberlite-import-file" accept=".json" />
							<p class="description">
								<?php esc_html_e( 'Select a Memberlite theme settings file (.json) to import.', 'memberlite' ); ?>
							</p>
							<?php if (! $memberlite_is_child) { ?>
								<p class="description">
									<?php esc_html_e( 'Imports Customizer settings, theme-specific options (site icon, custom sidebars), and menus (if included).', 'memberlite' ); ?>
								</p>
							<?php } ?>
						</td>
					</tr>
					<tr id="memberlite-import-menus-row">
						<th scope="row"><?php esc_html_e( 'Menu Import Options', 'memberlite' ); ?></th>
						<td>
							<fieldset>
								<label>
									<input type="checkbox" name="memberlite_replace_existing_menus" value="1" />
									<?php esc_html_e( 'Replace menus with imported menus', 'memberlite' ); ?>
								</label>
								<p class="description">
									<?php esc_html_e( 'If unchecked, imported menus will be added as new menus instead of replacing existing ones.', 'memberlite' ); ?>
								</p>
							</fieldset>
						</td>
					</tr>
				</tbody>
			</table>
			<p class="submit">
				<?php wp_nonce_field( 'memberlite_import_theme_settings', 'memberlite_import_theme_settings_nonce' ); ?>
				<input type="hidden" name="action" id="memberlite-import-action" value="memberlite_import_theme_settings" />
				<button type="submit" class="button button-primary"><?php esc_html_e( 'Import Theme Settings', 'memberlite' ); ?></button>
			</p>
		</form>
		<hr />
		<p><?php printf(
				/* translators: %s: link to the WordPress Tools > Import admin page */
				esc_html__( 'To import WordPress content such as posts, pages, headers, footers, and media, use the built-in WordPress %s page.', 'memberlite' ),
				'<a href="' . esc_url( admin_url( 'import.php' ) ) . '">' . esc_html__( 'Tools &gt; Import', 'memberlite' ) . '</a>'
			); ?></p>
	</div>
</div>
