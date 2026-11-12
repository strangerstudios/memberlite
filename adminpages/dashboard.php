<?php
/**
 * Dashboard Page for Memberlite Theme
 *
 * @package Memberlite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Informational page for Memberlite > Dashboard
 *
 * @since 6.1
 */
function memberlite_dashboard() {
	$memberlite_theme       = wp_get_theme();

	/**
	 * Load the Memberlite dashboard-area header
	 */
	require_once __DIR__ . '/admin_header.php';
	?>

	<hr class="wp-header-end">

	<?php memberlite_dashboard_welcome_callback(); ?>

	<div class="memberlite_columns">

		<?php memberlite_dashboard_child_theme_callback(); ?>

		<?php memberlite_dashboard_ai_agents_callback(); ?>

		<?php memberlite_dashboard_design_help_callback(); ?>

	</div>

	<?php
	/**
	 * Load the Memberlite dashboard-area footer
	 */
	require_once __DIR__ . '/admin_footer.php';
}

/**
 * Callback: Welcome + feature columns.
 */
function memberlite_dashboard_welcome_callback() {
	?>
	<div id="memberlite_dashboard_welcome" class="memberlite_section" data-visibility="shown" data-activated="true">
		<div class="memberlite_section_toggle">
			<button class="memberlite_section-toggle-button" type="button" aria-expanded="true">
				<span class="dashicons dashicons-arrow-up-alt2"></span>
				<?php esc_html_e( 'Welcome to the Memberlite Theme', 'memberlite' ); ?>
			</button>
		</div>
		<div class="memberlite_section_inside">
			<p><?php esc_html_e( "Start here to set up your site's look: add your logo and choose colors and layouts in the Customizer, design your header and footer, then build pages from Memberlite's block patterns.", 'memberlite' ); ?></p>

			<div class="memberlite-feature-section">
				<div class="memberlite_box memberlite_box-has-icon">
					<div class="memberlite_box-title memberlite_box-title-has-icon">
						<span class="dashicons dashicons-format-image"></span>
						<?php esc_html_e( 'Adding Your Logo', 'memberlite' ); ?>
					</div>
					<div class="memberlite_box-description">
						<p><?php esc_html_e( 'Use the Customize > Site Identity screen to add a custom logo and update or toggle the display of your Site Title and Tagline.', 'memberlite' ); ?></p>
						<p><a href="<?php echo esc_url( wp_customize_url() ); ?>"><?php esc_html_e( 'Add Your Logo', 'memberlite' ); ?></a></p>
						<p><a href="https://www.paidmembershipspro.com/documentation/memberlite/site-branding/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=site-logo" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Docs: Site Branding in Memberlite', 'memberlite' ); ?></a></p>
					</div>
				</div>
				<div class="memberlite_box memberlite_box-has-icon">
					<div class="memberlite_box-title memberlite_box-title-has-icon">
						<span class="dashicons dashicons-admin-customizer"></span>
						<?php esc_html_e( 'Customize the Theme', 'memberlite' ); ?>
					</div>
					<div class="memberlite_box-description">
						<p><?php esc_html_e( 'Use Appearance > Customize to change layouts, fonts, colors, the copyright message and more.', 'memberlite' ); ?></p>
						<p><a href="<?php echo esc_url( wp_customize_url() ); ?>"><?php esc_html_e( 'Customize Your Theme', 'memberlite' ); ?></a></p>
						<p><a href="https://www.paidmembershipspro.com/documentation/memberlite/memberlite-theme-customization/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=theme-customization" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Docs: Customizing Memberlite', 'memberlite' ); ?></a></p>
					</div>
				</div>
				<div class="memberlite_box memberlite_box-has-icon">
					<div class="memberlite_box-title memberlite_box-title-has-icon">
						<span class="dashicons dashicons-align-wide"></span>
						<?php esc_html_e( 'Header and Footer Variations', 'memberlite' ); ?>
					</div>
					<div class="memberlite_box-description">
						<p><?php esc_html_e( 'Design your header and footer in the block editor. Start from a Header or Footer Variations pattern, then choose it in Appearance > Customize > Header or Footer.', 'memberlite' ); ?></p>
						<p><a href="<?php echo esc_url( admin_url( 'edit.php?post_type=memberlite_header' ) ); ?>"><?php esc_html_e( 'Manage Headers', 'memberlite' ); ?></a> | <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=memberlite_footer' ) ); ?>"><?php esc_html_e( 'Manage Footers', 'memberlite' ); ?></a></p>
						<p><a href="https://www.paidmembershipspro.com/documentation/memberlite/header-footer-variations/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=header-footer-variations" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Docs: Header and Footer Variations', 'memberlite' ); ?></a></p>
					</div>
				</div>
				<div class="memberlite_box memberlite_box-has-icon">
					<div class="memberlite_box-title memberlite_box-title-has-icon">
						<span class="dashicons dashicons-layout"></span>
						<?php esc_html_e( 'Block Patterns', 'memberlite' ); ?>
					</div>
					<div class="memberlite_box-description">
						<p><?php esc_html_e( 'Build pages from more than 40 block patterns for membership sites: heroes, pricing tables, testimonials, calls to action and more. Find them in the block inserter under the Memberlite categories.', 'memberlite' ); ?></p>
						<p><a href="https://www.paidmembershipspro.com/documentation/memberlite/block-patterns/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=block-patterns" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Docs: Block Patterns', 'memberlite' ); ?></a></p>
					</div>
				</div>
				<div class="memberlite_box memberlite_box-has-icon">
					<div class="memberlite_box-title memberlite_box-title-has-icon">
						<span class="dashicons dashicons-admin-tools"></span>
						<?php esc_html_e( 'Import, Export and Reset', 'memberlite' ); ?>
					</div>
					<div class="memberlite_box-description">
						<p><?php esc_html_e( 'Back up your Memberlite settings, copy your design to another site, or reset the theme to its defaults from Memberlite > Tools.', 'memberlite' ); ?></p>
						<p><a href="<?php echo esc_url( admin_url( 'admin.php?page=memberlite-tools' ) ); ?>"><?php esc_html_e( 'Go to Tools', 'memberlite' ); ?></a></p>
						<p><a href="https://www.paidmembershipspro.com/documentation/memberlite/tools/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=tools" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Docs: Memberlite Tools', 'memberlite' ); ?></a></p>
					</div>
				</div>
				<div class="memberlite_box memberlite_box-has-icon">
					<div class="memberlite_box-title memberlite_box-title-has-icon">
						<span class="dashicons dashicons-lightbulb"></span>
						<?php esc_html_e( 'Theme Demo, Docs and Support', 'memberlite' ); ?>
					</div>
					<div class="memberlite_box-description">
						<p><?php esc_html_e( 'Register for a free account to browse documentation and get additional help with your membership site.', 'memberlite' ); ?></p>
						<p><a href="https://try.pmproplugin.com" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'View Theme Demo', 'memberlite' ); ?></a></p>
						<p><a href="https://www.paidmembershipspro.com/documentation/memberlite/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=all-docs" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'View All Docs', 'memberlite' ); ?></a></p>
					</div>
				</div>
			</div> <!-- end memberlite-feature-section -->
		</div> <!-- end memberlite_section_inside -->
	</div> <!-- end memberlite_dashboard_welcome -->
	<?php
}

/**
 * Callback: Child theme info.
 */
function memberlite_dashboard_child_theme_callback() {
	?>
	<div id="memberlite_dashboard_child_theme" class="memberlite_section memberlite_section-static">
		<div class="memberlite_section_header">
			<h2><?php esc_html_e( 'Using Child Themes', 'memberlite' ); ?></h2>
		</div>
		<div class="memberlite_section_inside">
			<?php if ( has_action( 'memberlite_guide_additional' ) ) { ?>
				<?php do_action( 'memberlite_guide_additional' ); ?>
			<?php } else { ?>
				<p>
					<?php esc_html_e( 'If you need to customize the theme beyond the settings in Appearance > Customize, use a child theme. Child themes allow you to change the appearance of your site, while preserving the ability to update the primary "parent" theme.', 'memberlite' ); ?>
				</p>
				<p><a href="https://www.paidmembershipspro.com/documentation/download/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=child-theme" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Download a Blank Child Theme', 'memberlite' ); ?></a></p>
			<?php } ?>
		</div> <!-- end memberlite_section_inside -->
	</div> <!-- end memberlite_dashboard_child_theme -->
	<?php
}

/**
 * Callback: Using an AI agent.
 *
 * @since 8.0.1
 */
function memberlite_dashboard_ai_agents_callback() {
	$agents_file = get_template_directory() . '/AGENTS.md';
	$agents_path = 0 === strpos( $agents_file, ABSPATH ) ? substr( $agents_file, strlen( ABSPATH ) ) : $agents_file;
	?>
	<div id="memberlite_dashboard_ai_agents" class="memberlite_section memberlite_section-static">
		<div class="memberlite_section_header">
			<h2><?php esc_html_e( 'Using an AI Agent', 'memberlite' ); ?></h2>
		</div>
		<div class="memberlite_section_inside">
			<p><?php esc_html_e( 'If you manage your site with an AI coding agent, point it to the notes that ship with Memberlite. They explain how to customize the theme safely and link to DESIGN.md, the design and customization reference.', 'memberlite' ); ?></p>
			<p><code><?php echo esc_html( $agents_path ); ?></code></p>
			<p><?php esc_html_e( 'An agent that starts in your site\'s root folder may not find them on its own. Add this line to the instructions file there (AGENTS.md or CLAUDE.md):', 'memberlite' ); ?></p>
			<p><code><?php
				/* translators: %s: path to the theme's AGENTS.md file. */
				echo esc_html( sprintf( __( 'Before changing the Memberlite theme or its settings, read %s.', 'memberlite' ), $agents_path ) );
			?></code></p>
		</div> <!-- end memberlite_section_inside -->
	</div> <!-- end memberlite_dashboard_ai_agents -->
	<?php
}

/**
 * Callback: Design and development help from PMPro Max.
 *
 * @since 8.0.1
 */
function memberlite_dashboard_design_help_callback() {
	?>
	<div id="memberlite_dashboard_design_help" class="memberlite_section memberlite_section-static">
		<div class="memberlite_section_header">
			<h2><?php esc_html_e( 'Need Help With Your Site?', 'memberlite' ); ?></h2>
		</div>
		<div class="memberlite_section_inside">
			<p><?php esc_html_e( 'With PMPro Max, the team that builds Memberlite and Paid Memberships Pro hosts your site and helps customize it. Max includes monthly Max Credits for Do It For Me requests, like design changes, setup, and custom code.', 'memberlite' ); ?></p>
			<p><a href="https://www.paidmembershipspro.com/pricing/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=pmpro-max" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Learn About PMPro Max', 'memberlite' ); ?></a></p>
		</div> <!-- end memberlite_section_inside -->
	</div> <!-- end memberlite_dashboard_design_help -->
	<?php
}
