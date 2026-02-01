<?php
/**
 * Export Tool for Memberlite Theme
 *
 * @since 6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$menus = wp_get_nav_menus();
?>
<div id="memberlite_tools_export_settings" class="memberlite_section" data-visibility="shown" data-activated="true">
	<div class="memberlite_section_toggle">
		<button class="memberlite_section-toggle-button" type="button" aria-expanded="true">
			<span class="dashicons dashicons-arrow-up-alt2"></span>
			<?php esc_html_e( 'Export Theme Settings', 'memberlite' ); ?>
		</button>
	</div>
	<div class="memberlite_section_inside">
		<p><?php esc_html_e( 'Use the tool below to export Memberlite theme settings to a file. You can keep this as a backup or use it to apply the same settings to another Memberlite site.', 'memberlite' ); ?></p>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="memberlite_export_theme_settings" />
			<?php wp_nonce_field( 'memberlite_export_theme_settings', 'memberlite_export_theme_settings_nonce' ); ?>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><?php esc_html_e( 'Export Options', 'memberlite' ); ?></th>
						<td>
							<fieldset>
								<label>
									<input type="checkbox" name="memberlite_export_theme_mods" value="1" checked />
									<?php esc_html_e( 'Theme Settings', 'memberlite' ); ?>
								</label>
								<p class="description"><?php esc_html_e( 'Customizer settings, sidebars, and Additional CSS.', 'memberlite' ); ?></p>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Navigation Menus', 'memberlite' ); ?></th>
						<td>
							<?php if ( empty( $menus ) ) : ?>
								<p><em><?php esc_html_e( 'No menus have been created yet.', 'memberlite' ); ?></em></p>
							<?php else : ?>
								<fieldset>
									<label>
										<input type="checkbox" id="memberlite_export_menus_toggle" name="memberlite_export_menus" value="1" />
										<?php esc_html_e( 'Include Navigation Menus', 'memberlite' ); ?>
									</label>
									<p class="description"><?php esc_html_e( 'Menu items are exported as custom links with their labels and full URLs for portability.', 'memberlite' ); ?></p>
								</fieldset>
								<?php
									// Build the selectors for the checkbox list based on number of menus.
									$classes = array( 'memberlite_checkbox_box' );
									if ( count( $menus ) > 5 ) {
										$classes[] = 'memberlite_scrollable';
									}
									$class = implode( ' ', $classes );
								?>
								<div id="memberlite_export_menus_list" class="<?php echo esc_attr( $class ); ?>" style="margin-top: 10px; display: none;">
									<div class="memberlite_clickable memberlite_select_all">
										<input type="checkbox" id="memberlite_export_menus_select_all" checked />
										<label for="memberlite_export_menus_select_all"><strong><?php esc_html_e( 'Select All', 'memberlite' ); ?></strong></label>
									</div>
									<?php foreach ( $menus as $menu ) : ?>
										<div class="memberlite_clickable">
											<input type="checkbox" id="memberlite_export_menu_<?php echo esc_attr( $menu->term_id ); ?>" name="memberlite_export_menu_ids[]" value="<?php echo esc_attr( $menu->term_id ); ?>" class="memberlite-export-menu-checkbox" checked />
											<label for="memberlite_export_menu_<?php echo esc_attr( $menu->term_id ); ?>"><?php echo esc_html( $menu->name ); ?></label>
										</div>
									<?php endforeach; ?>
								</div>
								<script>
									(function() {
										var toggle = document.getElementById('memberlite_export_menus_toggle');
										var menuList = document.getElementById('memberlite_export_menus_list');
										var selectAll = document.getElementById('memberlite_export_menus_select_all');
										var menuCheckboxes = document.querySelectorAll('.memberlite-export-menu-checkbox');

										function updateVisibility() {
											menuList.style.display = toggle.checked ? 'block' : 'none';
										}

										function updateSelectAllState() {
											var allChecked = Array.from(menuCheckboxes).every(function(cb) { return cb.checked; });
											var someChecked = Array.from(menuCheckboxes).some(function(cb) { return cb.checked; });
											selectAll.checked = allChecked;
											selectAll.indeterminate = someChecked && !allChecked;
										}

										toggle.addEventListener('change', updateVisibility);
										updateVisibility();

										// Select all functionality.
										selectAll.addEventListener('change', function() {
											menuCheckboxes.forEach(function(cb) {
												cb.checked = selectAll.checked;
											});
										});

										// Update select all state when individual checkboxes change.
										menuCheckboxes.forEach(function(cb) {
											cb.addEventListener('change', updateSelectAllState);
										});

										// Make the entire row clickable.
										menuList.querySelectorAll('.memberlite_clickable').forEach(function(row) {
											row.addEventListener('click', function(e) {
												if (e.target.tagName !== 'INPUT') {
													var checkbox = row.querySelector('input[type="checkbox"]');
													checkbox.checked = !checkbox.checked;
													checkbox.dispatchEvent(new Event('change'));
												}
											});
										});
									})();
								</script>
							<?php endif; ?>
						</td>
					</tr>
				</tbody>
			</table>
			<p class="submit">
				<button type="submit" class="button button-primary"><?php esc_html_e( 'Download Export File', 'memberlite' ); ?></button>
			</p>
		</form>
		<hr />
		<p><?php esc_html_e( 'To export WordPress content such as posts, pages, and media, use the built-in WordPress tools located at Tools > Export in the WordPress admin.', 'memberlite' ); ?></p>
	</div>
</div>
