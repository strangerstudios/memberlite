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
 * @since TBD
 */
function memberlite_dashboard() {
	$memberlite_theme       = wp_get_theme();

	/**
	 * Load the Memberlite dashboard-area header
	 */
	require_once __DIR__ . '/admin_header.php';
	?>

	<hr class="wp-header-end">

	<div class="memberlite_two_col memberlite_two_col-right">

		<div class="memberlite_main">

			<?php memberlite_dashboard_welcome_callback(); ?>

		</div>

		<div class="memberlite_sidebar">

			<?php memberlite_dashboard_child_theme_callback(); ?>

		</div>

	</div>

	<?php memberlite_dashboard_recommended_plugins_callback(); ?>

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
			<p><?php esc_html_e( "Memberlite is the ideal theme for your membership site - packed with integration for top membership site plugins including Paid Memberships Pro. It's fully customizable with your logo, colors, fonts, custom sidebars and more global layout settings.", 'memberlite' ); ?></p>

			<div class="memberlite-feature-section">
				<div class="memberlite_box memberlite_box-has-icon">
					<div class="memberlite_box-title memberlite_box-title-has-icon">
						<span class="dashicons dashicons-format-image"></span>
						<?php esc_html_e( 'Adding Your Logo', 'memberlite' ); ?>
					</div>
					<div class="memberlite_box-description">
						<p><?php esc_html_e( 'Use the Customize > Site Identity screen to add a custom logo and update or toggle the display of your Site Title and Tagline.', 'memberlite' ); ?></p>
						<p><a href="<?php echo esc_url( wp_customize_url() ); ?>"><?php esc_html_e( 'Add Your Logo', 'memberlite' ); ?></a></p>
						<p><a href="https://www.paidmembershipspro.com/documentation/memberlite/site-branding/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Docs: Site Branding in Memberlite', 'memberlite' ); ?></a></p>
					</div>
				</div>
				<div class="memberlite_box memberlite_box-has-icon">
					<div class="memberlite_box-title memberlite_box-title-has-icon">
						<span class="dashicons dashicons-admin-customizer"></span>
						<?php esc_html_e( 'Customize the Theme', 'memberlite' ); ?>
					</div>
					<div class="memberlite_box-description">
						<p><?php esc_html_e( 'Use the Customize > Memberlite Options screen to modify theme layout, logo, fonts, colors, copyright message and more.', 'memberlite' ); ?></p>
						<p><a href="<?php echo esc_url( wp_customize_url() ); ?>"><?php esc_html_e( 'Customize Your Theme', 'memberlite' ); ?></a></p>
						<p><a href="https://www.paidmembershipspro.com/documentation/memberlite/customize/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Docs: Customizing Memberlite', 'memberlite' ); ?></a></p>
					</div>
				</div>
				<div class="memberlite_box memberlite_box-has-icon">
					<div class="memberlite_box-title memberlite_box-title-has-icon">
						<span class="dashicons dashicons-lightbulb"></span>
						<?php esc_html_e( 'Theme Demo, Docs and Support', 'memberlite' ); ?>
					</div>
					<div class="memberlite_box-description">
						<p><?php esc_html_e( 'Register for a free account to browse documentation and get additional help with your Memberlite-powered WordPress site.', 'memberlite' ); ?></p>
						<p><a href="https://try.pmproplugin.com" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'View Theme Demo', 'memberlite' ); ?></a></p>
						<p><a href="https://www.paidmembershipspro.com/documentation/memberlite/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'View All Docs', 'memberlite' ); ?></a></p>
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
	<div id="memberlite_dashboard_child_theme" class="memberlite_section" data-visibility="shown" data-activated="true">
		<div class="memberlite_section_toggle">
			<button class="memberlite_section-toggle-button" type="button" aria-expanded="true">
				<span class="dashicons dashicons-arrow-up-alt2"></span>
				<?php esc_html_e( 'Using Child Themes', 'memberlite' ); ?>
			</button>
		</div>
		<div class="memberlite_section_inside">
			<?php if ( has_action( 'memberlite_guide_additional' ) ) { ?>
				<?php do_action( 'memberlite_guide_additional' ); ?>
			<?php } else { ?>
				<p>
					<?php esc_html_e( 'If you need to customize the theme beyond the settings in Appearance > Customize, use a child theme. Child themes allow you to change the appearance of your site, while preseving the ability to update the primary "parent" theme.', 'memberlite' ); ?>
				</p>
				<p><a href="https://developer.wordpress.org/themes/advanced-topics/child-themes/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Learn more about child themes in the WordPress Theme Handbook', 'memberlite' ); ?></a></p>
				<p><a class="button button-primary" href="https://www.paidmembershipspro.com/documentation/download/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Download a Blank Child Theme', 'memberlite' ); ?></a></p>
			<?php } ?>
		</div> <!-- end memberlite_section_inside -->
	</div> <!-- end memberlite_dashboard_child_theme -->
	<?php
}

/**
 * Callback: Recommended plugins.
 */
function memberlite_dashboard_recommended_plugins_callback() {
	$memberlite_theme = wp_get_theme();

	$memberlite_plugin_action_button_allowed_html = array(
		'a' => array(
			'class'  => array(),
			'href'   => array(),
			'target' => array(),
		),
	);

	$memberlite_plugins_recommended = apply_filters( 'memberlite_plugins_recommended', array( 'paid-memberships-pro', 'sitewide-sales' ) );

	?>
	<div id="memberlite_dashboard_recommended_plugins" class="memberlite_section" data-visibility="shown" data-activated="true">
		<div class="memberlite_section_toggle">
			<button class="memberlite_section-toggle-button" type="button" aria-expanded="true">
				<span class="dashicons dashicons-arrow-up-alt2"></span>
				<?php esc_html_e( 'Recommended Plugins', 'memberlite' ); ?>
			</button>
		</div>
		<div class="memberlite_section_inside">
			<?php
				if ( empty( $memberlite_plugins_recommended ) ) {
					echo '<p>' . esc_html__( 'No recommended plugins found.', 'memberlite' ) . '</p>';
				} else { ?>
					<p>
						<?php
							/* translators: Active theme name */
							echo esc_html( sprintf( __( 'We highly recommend using these plugins for every site running %s:', 'memberlite' ), $memberlite_theme ) );
						?>
					</p>
					<div class="wp-list-table widefat plugin-install">
						<h2 class="screen-reader-text"><?php esc_html_e( 'Plugins list', 'memberlite' );?></h2>
						<div id="the-list">
							<?php if ( in_array( 'paid-memberships-pro', $memberlite_plugins_recommended, true ) ) { ?>
								<div class="plugin-card plugin-card-paid-memberships-pro">
									<div class="plugin-card-top">
										<div class="name column-name">
											<h3><a href="https://www.paidmembershipspro.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Paid Memberships Pro', 'memberlite' ); ?></a></h3>
											<img src="<?php echo esc_url( MEMBERLITE_URL ); ?>/assets/images/paid-memberships-pro-icon-256x256.png" class="plugin-icon" alt="<?php echo esc_attr( 'Paid Memberships Pro', 'memberlite' ); ?>">
										</div>
										<div class="action-links">
											<ul class="plugin-action-buttons">
												<li>
													<?php
													echo wp_kses(
														memberlite_plugin_action_button(
															'paid-memberships-pro',
															'paid-memberships-pro/paid-memberships-pro.php',
															'https://www.paidmembershipspro.com/documentation/download/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage'
														),
														$memberlite_plugin_action_button_allowed_html
													);
													?>
												</li>
												<li><a href="https://www.paidmembershipspro.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'More Details', 'memberlite' ); ?></a></li>
											</ul>
										</div>
										<div class="desc column-description">
											<p><?php esc_html_e( 'Paid Memberships Pro allows anyone to build a membership site—for free. Restrict content, accept payment, & manage subscriptions right from your WordPress admin.', 'memberlite' ); ?></p>
											<p class="authors"><cite><?php esc_html_e( 'By', 'memberlite' ); ?> <a href="https://www.paidmembershipspro.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Paid Memberships Pro', 'memberlite' ); ?></a></cite></p>
										</div>
									</div>
								</div> <!-- end plugin-card-paid-memberships-pro -->
							<?php } ?>

							<?php if ( in_array( 'sitewide-sales', $memberlite_plugins_recommended, true ) ) { ?>
								<div class="plugin-card plugin-card-sitewide-sales">
									<div class="plugin-card-top">
										<div class="name column-name">
											<h3><a href="https://sitewidesales.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Sitewide Sales', 'memberlite' ); ?></a></h3>
											<img src="<?php echo esc_url( MEMBERLITE_URL ); ?>/assets/images/sitewide-sales-icon-256x256.png" class="plugin-icon" alt="<?php echo esc_attr( 'Sitewide Sales', 'memberlite' ); ?>">
										</div>
										<div class="action-links">
											<ul class="plugin-action-buttons">
												<li>
													<?php
													echo wp_kses(
														memberlite_plugin_action_button(
															'sitewide-sales',
															'sitewide-sales/sitewide-sales.php',
															'https://sitewidesales.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage'
														),
														$memberlite_plugin_action_button_allowed_html
													);
													?>
												</li>
												<li><a href="https://sitewidesales.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'More Details', 'memberlite' ); ?></a></li>
											</ul>
										</div>
										<div class="desc column-description">
											<p><?php esc_html_e( 'All-in-one flash sales plugin for WordPress. Set up a sale from a single settings page: select the start and end date, choose a template, pick your banner, and assign the discount.', 'memberlite' ); ?></p>
											<p class="authors"><cite><?php esc_html_e( 'By', 'memberlite' ); ?> <a href="https://www.strangerstudios.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Stranger Studios', 'memberlite' ); ?></a></cite></p>
										</div>
									</div>
								</div> <!-- end plugin-card-sitewide-sales -->
							<?php } ?>

							<?php do_action( 'memberlite_plugins_recommended_additional' ); ?>
						</div> <!-- end the-list -->
					</div> <!-- end plugin-install -->
				<?php }
			?>

			<?php
				$memberlite_plugins_integrated = apply_filters( 'memberlite_plugins_integrated', array( 'bbpress', 'events-manager', 'lifterlms', 'paid-memberships-pro' ) );

				if ( ! empty( $memberlite_plugins_integrated ) ) { ?>
					<p>
						<?php
						/* translators: Active theme name */
						echo esc_html( sprintf( __( '%s offers integration for these plugins:', 'memberlite' ), $memberlite_theme ) );
						?>
					</p>
					<div class="wp-list-table widefat plugin-install">
						<h2 class="screen-reader-text"><?php esc_html_e( 'Plugins list', 'memberlite' );?></h2>
						<div id="the-list">
							<?php if ( in_array( 'bbpress', $memberlite_plugins_integrated, true ) ) { ?>
								<div class="plugin-card plugin-card-bbpress">
									<div class="plugin-card-top">
										<div class="name column-name">
											<h3><a href="https://wordpress.org/plugins/bbpress/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'bbPress', 'memberlite' ); ?></a></h3>
											<img src="<?php echo esc_url( MEMBERLITE_URL ); ?>/assets/images/bbpress-icon.svg" class="plugin-icon" alt="<?php echo esc_attr( 'bbPress', 'memberlite' ); ?>" />
										</div>
										<div class="action-links">
											<ul class="plugin-action-buttons">
												<li>
													<?php
													echo wp_kses(
														memberlite_plugin_action_button( 'bbpress', 'bbpress/bbpress.php' ),
														$memberlite_plugin_action_button_allowed_html
													);
													?>
												</li>
												<li><a href="https://wordpress.org/plugins/bbpress/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'More Details', 'memberlite' ); ?></a></li>
											</ul>
										</div>
										<div class="desc column-description">
											<p><?php esc_html_e( 'bbPress is forum software, made the WordPress way.', 'memberlite' ); ?></p>
											<p><a href="<?php echo esc_url( admin_url( 'plugin-install.php?tab=search&type=term&s=Paid+Memberships+Pro+-+bbPress+Add+On' ) ); ?>"><?php esc_html_e( 'Install Paid Memberships Pro - bbPress Add On', 'memberlite' ); ?></a></p>
											<p class="authors"><cite><?php esc_html_e( 'By', 'memberlite' ); ?> <a href="https://www.bbpress.org" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'The bbPress Contributors', 'memberlite' ); ?></a></cite></p>
										</div>
									</div>
								</div> <!-- end plugin-card-bbpress -->
							<?php } ?>

							<?php if ( in_array( 'events-manager', $memberlite_plugins_integrated, true ) ) { ?>
								<div class="plugin-card plugin-card-events-manager">
									<div class="plugin-card-top">
										<div class="name column-name">
											<h3><a href="https://wordpress.org/plugins/events-manager/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Events Manager', 'memberlite' ); ?></a></h3>
											<img src="<?php echo esc_url( MEMBERLITE_URL ); ?>/assets/images/events-manager-icon-256x256.png" class="plugin-icon" alt="<?php echo esc_attr( 'Events Manager', 'memberlite' ); ?>" />
										</div>
										<div class="action-links">
											<ul class="plugin-action-buttons">
												<li>
													<?php
													echo wp_kses(
														memberlite_plugin_action_button( 'events-manager', 'events-manager/events-manager.php' ),
														$memberlite_plugin_action_button_allowed_html
													);
													?>
												</li>
												<li><a href="https://wordpress.org/plugins/events-manager/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'More Details', 'memberlite' ); ?></a></li>
											</ul>
										</div>
										<div class="desc column-description">
											<p><?php esc_html_e( 'Fully featured event registration management including recurring events, locations management, calendar, Google map integration, booking management', 'memberlite' ); ?></p>
											<p class="authors"><cite><?php esc_html_e( 'By', 'memberlite' ); ?> <a href="http://wp-events-plugin.com" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Pixelite', 'memberlite' ); ?></a></cite></p>
										</div>
									</div>
								</div> <!-- end plugin-card-events-manager -->
							<?php } ?>

							<?php if ( in_array( 'lifterlms', $memberlite_plugins_integrated, true ) ) { ?>
								<div class="plugin-card plugin-card-lifterlms">
									<div class="plugin-card-top">
										<div class="name column-name">
											<h3><a href="https://wordpress.org/plugins/lifterlms/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'LifterLMS', 'memberlite' ); ?></a></h3>
											<img src="<?php echo esc_url( MEMBERLITE_URL ); ?>/assets/images/lifterlms-icon-256x256.png" class="plugin-icon" alt="<?php echo esc_attr( 'LifterLMS', 'memberlite' ); ?>">
										</div>
										<div class="action-links">
											<ul class="plugin-action-buttons">
												<li>
													<?php
													echo wp_kses(
														memberlite_plugin_action_button( 'lifterlms/', 'lifterlms/lifterlms.php' ),
														$memberlite_plugin_action_button_allowed_html
													);
													?>
												</li>
												<li><a href="https://wordpress.org/plugins/lifterlms/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'More Details', 'memberlite' ); ?></a></li>
											</ul>
										</div>
										<div class="desc column-description">
											<p><?php esc_html_e( 'LifterLMS is a secure easy-to-use WordPress LMS plugin packed with features to easily create & sell courses online.', 'memberlite' ); ?></p>
											<p class="authors"><cite><?php esc_html_e( 'By', 'memberlite' ); ?> <a href="https://lifterlms.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'LifterLMS', 'memberlite' ); ?></a></cite></p>
										</div>
									</div>
								</div> <!-- end plugin-card-lifterlms -->
							<?php } ?>

							<?php if ( in_array( 'paid-memberships-pro', $memberlite_plugins_integrated, true ) ) { ?>
								<div class="plugin-card plugin-card-paid-memberships-pro">
									<div class="plugin-card-top">
										<div class="name column-name">
											<h3><a href="https://www.paidmembershipspro.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Paid Memberships Pro', 'memberlite' ); ?></a></h3>
											<img src="<?php echo esc_url( MEMBERLITE_URL ); ?>/assets/images/paid-memberships-pro-icon-256x256.png" class="plugin-icon" alt="<?php echo esc_attr( 'Paid Memberships Pro', 'memberlite' ); ?>" />
										</div>
										<div class="action-links">
											<ul class="plugin-action-buttons">
												<li>
													<?php
													echo wp_kses(
														memberlite_plugin_action_button(
															'paid-memberships-pro',
															'paid-memberships-pro/paid-memberships-pro.php',
															'https://www.paidmembershipspro.com/documentation/download/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage'
														),
														$memberlite_plugin_action_button_allowed_html
													);
													?>
												</li>
												<li><a href="https://www.paidmembershipspro.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'More Details', 'memberlite' ); ?></a></li>
											</ul>
										</div>
										<div class="desc column-description">
											<p><?php esc_html_e( 'Paid Memberships Pro allows anyone to build a membership site—for free. Restrict content, accept payment, & manage subscriptions right from your WordPress admin.', 'memberlite' ); ?></p>
											<p class="authors"><cite><?php esc_html_e( 'By', 'memberlite' ); ?> <a href="https://www.paidmembershipspro.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Paid Memberships Pro', 'memberlite' ); ?></a></cite></p>
										</div>
									</div>
								</div> <!-- end plugin-card-paid-memberships-pro -->
							<?php } ?>

							<?php do_action( 'memberlite_plugins_integrated_additional' ); ?>
						</div> <!-- end the-list -->
					</div> <!-- end plugin-install -->
				<?php }
			?>
		</div> <!-- end memberlite_section_inside -->
	</div> <!-- end memberlite_dashboard_recommended_plugins -->
	<?php
	/**
	 * Load the Memberlite dashboard-area footer
	 */
	require_once __DIR__ . '/admin_footer.php';
}
