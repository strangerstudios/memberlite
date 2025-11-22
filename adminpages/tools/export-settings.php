<?php
/**
 * Export Tool for Memberlite Theme
 *
 * @since TBD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
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
		<p class="submit">
			<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=memberlite_export_theme_settings' ), 'memberlite_export_theme_settings' ) ); ?>" class="button button-primary">
				<?php esc_html_e( 'Download Theme Settings', 'memberlite' ); ?>
			</a>
		</p>
		<hr />
		<p><?php esc_html_e( 'To export WordPress content such as posts, pages, and media, use the built-in WordPress tools located at Tools > Export in the WordPress admin.', 'memberlite' ); ?></p>
	</div>
</div>
