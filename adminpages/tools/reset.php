<?php
/**
 * Reset Tool for Memberlite Theme
 *
 * @since 6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="memberlite_tools_reset" class="memberlite_section" data-visibility="shown" data-activated="true">
	<div class="memberlite_section_toggle">
		<button class="memberlite_section-toggle-button" type="button" aria-expanded="true">
			<span class="dashicons dashicons-arrow-up-alt2"></span>
			<?php esc_html_e( 'Reset Theme', 'memberlite' ); ?>
		</button>
	</div>
	<div class="memberlite_section_inside">
		<p><?php esc_html_e( 'Use this tool to reset Memberlite theme settings to their default values.', 'memberlite' ); ?> <strong><?php esc_html_e( 'This will overwrite your current Memberlite theme settings.', 'memberlite' ); ?></strong></p>
		<p><?php esc_html_e( 'The reset will clear Memberlite Customizer settings (including logo, colors, typography, and layouts), Memberlite sidebar settings, the site icon, and any Additional CSS for the current theme.', 'memberlite' ); ?> <strong><?php esc_html_e( 'It will not delete any posts, pages, or media.', 'memberlite' ); ?></strong></p>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" onsubmit="return memberliteConfirmThemeReset();">
			<p class="submit">
				<?php wp_nonce_field( 'memberlite_reset_theme_settings', 'memberlite_reset_theme_settings_nonce' ); ?>
				<input type="hidden" name="action" value="memberlite_reset_theme_settings" />
				<button type="submit" class="button memberlite-button-danger">
					<?php esc_html_e( 'Reset Memberlite Theme Settings', 'memberlite' ); ?>
				</button>
			</p>
		</form>
	</div>
</div>

<script>
	function memberliteConfirmThemeReset() {
		return window.confirm(
			'<?php echo esc_js( __( 'Are you sure you want to reset Memberlite theme settings to their default values? This cannot be undone.', 'memberlite' ) ); ?>'
		);
	}
</script>
