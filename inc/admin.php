<?php
/**
 * Custom admin theme pages and scripts
 *
 * @package Memberlite
 */

/*
	Adds Theme Support submenu page to "Appearance" menu.
*/
function memberlite_theme_menu() {
	add_theme_page( esc_html__( 'Memberlite Documentation and Support', 'memberlite' ), esc_html__( 'Memberlite Guide', 'memberlite' ), 'edit_theme_options', 'memberlite-support', 'memberlite_support' );
}
add_action( 'admin_menu', 'memberlite_theme_menu' );

/*
	Render the welcome/support page
*/
function memberlite_support() {
	// Get the current WP_Theme object.
	$memberlite_theme = wp_get_theme();
	?>
	<div id="wpbody-content" aria-label="<?php esc_attr_e( 'Main content', 'memberlite' ); ?>" tabindex="0">
		<style>
			.wrap hr {margin: 40px 0;}
			.wrap .about-wrap {max-width: 100%;}
			.wrap .about-wrap .memberlite-badge {background-image: url(<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/Memberlite_icon.png'; ?>); background-color: #FFF; color: #2C3E50;}
			.wrap .about-wrap .dashicons {font-size: 20px; height: 30px; width: 30px;}
			.wrap .about-wrap .memberlite-feature-section {display: grid; grid-template-columns: 1fr 1fr 1fr; grid-gap: 2.9rem;}
			.wrap .about-wrap .memberlite-feature-section h3 {line-height: 1; text-align: left;}
			.wrap .welcome-panel {padding-bottom: 23px;}
			.wrap .welcome-panel p {font-size: 16px; line-height: 1.5;}
			@media screen and (max-width: 782px) {
				.about-wrap h1, .about-wrap .about-text {margin-right: 0;}
				.wrap .about-wrap .memberlite-badge {display: none;}
				.wrap .about-wrap .memberlite-feature-section {display: block;}
			}
			.child-theme-panel {position: relative;overflow: auto;margin: 16px 0;padding: 23px 10px;border: 1px solid #c3c4c7;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.04);background: #fff;font-size: 13px;line-height: 1.7;}
			.child-theme-panel-content {margin-left: 13px;max-width: 1500px;}
		</style>
		<div class="wrap full-width-layout">
			<div class="about-wrap">
				<h1><?php esc_html_e( 'Welcome to the Memberlite Theme', 'memberlite' ); ?></h1>
				<div class="about-text"><?php esc_html_e( "Memberlite is the ideal theme for your membership site - packed with integration for top membership site plugins including Paid Memberships Pro. It's fully customizable with your logo, colors, fonts, custom sidebars and more global layout settings.", 'memberlite' ); ?></div>
				<div class="wp-badge memberlite-badge">
					<?php
						/* translators: Memberlite version number */
						echo esc_html( sprintf( __( 'Version %s', 'memberlite' ), MEMBERLITE_VERSION ) );
					?>
				</div>
				<div class="memberlite-feature-section">
					<div class="col">
						<h3><span class="dashicons dashicons-format-image"></span> <?php esc_html_e( 'Adding Your Logo', 'memberlite' ); ?></h3>
						<p><?php esc_html_e( 'Use the Customize > Site Identity screen to add a custom logo and update or toggle the display of your Site Title and Tagline.', 'memberlite' ); ?></p>
						<p>
							<a href="<?php echo esc_url( wp_customize_url() ); ?>"><?php esc_html_e( 'Add Your Logo', 'memberlite' ); ?></a><br />
							<a href="https://www.paidmembershipspro.com/documentation/memberlite/site-branding/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Docs: Site Branding in Memberlite', 'memberlite' ); ?></a>
						</p>
					</div>
					<div class="col">
						<h3><span class="dashicons dashicons-admin-customizer"></span> <?php esc_html_e( 'Customize the Theme', 'memberlite' ); ?></h3>
						<p><?php esc_html_e( 'Use the Customize > Memberlite Options screen to modify theme layout, logo, fonts, colors, copyright message and more.', 'memberlite' ); ?></p>
						<p>
							<a href="<?php echo esc_url( wp_customize_url() ); ?>"><?php esc_html_e( 'Customize Your Theme', 'memberlite' ); ?></a><br />
							<a href="https://www.paidmembershipspro.com/documentation/memberlite/customize/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Docs: Customizing Memberlite', 'memberlite' ); ?></a>
						</p>
					</div>
					<div class="col">
						<h3><span class="dashicons dashicons-lightbulb"></span> <?php esc_html_e( 'Theme Demo, Docs and Support', 'memberlite' ); ?></h3>
						<p><?php esc_html_e( 'Register for a free account to browse documentation and get additional help with your Memberlite-powered WordPress site.', 'memberlite' ); ?></p>
						<p>
							<a href="https://try.pmproplugin.com" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'View Theme Demo', 'memberlite' ); ?></a><br />
							<a href="https://www.paidmembershipspro.com/documentation/memberlite/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'View All Docs', 'memberlite' ); ?></a>
						</p>
					</div>
				</div> <!-- end memberlite-feature-section -->

				<br class="clear" />
			</div> <!-- end about-wrap -->

			<div class="child-theme-panel">
				<div class="child-theme-panel-content">
					<?php if ( has_action( 'memberlite_guide_additional' ) ) { ?>
						<?php do_action( 'memberlite_guide_additional' ); ?>
					<?php } else { ?>
						<h1><?php esc_html_e( 'Using Child Themes', 'memberlite' ); ?></h1>
						<p><?php esc_html_e( 'If you need to customize the theme beyond the settings in Appearance > Customize, use a child theme. Child themes allow you to change the appearance of your site, while preseving the ability to update the primary "parent" theme.', 'memberlite' ); ?> <a href="https://developer.wordpress.org/themes/advanced-topics/child-themes/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Learn more about child themes in the WordPress Theme Handbook', 'memberlite' ); ?></a></p>
						<a class="button button-hero button-primary" href="https://www.paidmembershipspro.com/documentation/download/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Download a Blank Child Theme', 'memberlite' ); ?></a>
					<?php } ?>
				</div>
			</div>

			<?php
				$memberlite_plugin_action_button_allowed_html = array(
					'a' => array(
						'class' => array(),
						'href' => array(),
						'target' => array()
					),
				);
				$memberlite_plugins_recommended = apply_filters( 'memberlite_plugins_recommended', array( 'paid-memberships-pro', 'sitewide-sales' ) );
				if ( ! empty( $memberlite_plugins_recommended ) ) { ?>
					<hr />
					<h2>
						<?php
							/* translators: Active theme name */
							echo esc_html( sprintf( __( 'We highly recommend using these plugins for every site running %s:', 'memberlite' ), $memberlite_theme ) );
						?>
					</h2>
					<div class="wp-list-table widefat plugin-install">
						<h2 class="screen-reader-text"><?php esc_html_e( 'Plugins list', 'memberlite' );?></h2>
						<div id="the-list">
							<?php if ( in_array( 'paid-memberships-pro', $memberlite_plugins_recommended ) ) { ?>
							<div class="plugin-card plugin-card-paid-memberships-pro">
								<div class="plugin-card-top">
									<div class="name column-name">
										<h3><a href="https://www.paidmembershipspro.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Paid Memberships Pro', 'memberlite' ); ?></a></h3>
										<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/paid-memberships-pro-icon-256x256.png" class="plugin-icon" alt="<?php echo esc_attr( 'Paid Memberships Pro', 'memberlite' ); ?>">
									</div>
									<div class="action-links">
										<ul class="plugin-action-buttons">
											<li>
												<?php
													echo wp_kses( memberlite_plugin_action_button( 'paid-memberships-pro', 'paid-memberships-pro/paid-memberships-pro.php', 'https://www.paidmembershipspro.com/documentation/download/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage' ), $memberlite_plugin_action_button_allowed_html );
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

							<?php if ( in_array( 'sitewide-sales', $memberlite_plugins_recommended ) ) { ?>
							<div class="plugin-card plugin-card-sitewide-sales">
								<div class="plugin-card-top">
									<div class="name column-name">
										<h3><a href="https://sitewidesales.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Sitewide Sales', 'memberlite' ); ?></a></h3>
										<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/sitewide-sales-icon-256x256.png" class="plugin-icon" alt="<?php echo esc_attr( 'Sitewide Sales', 'memberlite' ); ?>">
									</div>
									<div class="action-links">
										<ul class="plugin-action-buttons">
											<li>
												<?php
													echo wp_kses( memberlite_plugin_action_button( 'sitewide-sales', 'sitewide-sales/sitewide-sales.php', 'https://sitewidesales.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage' ), $memberlite_plugin_action_button_allowed_html );
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
			<br class="clear" />
			<?php
				$memberlite_plugins_integrated = apply_filters( 'memberlite_plugins_integrated', array( 'bbpress', 'events-manager', 'lifterlms', 'paid-memberships-pro' ) );
				if ( ! empty( $memberlite_plugins_integrated ) ) { ?>
				<hr />
				<h2>
					<?php
						/* translators: Active theme name */
						echo esc_html( sprintf( __( '%s offers integration for these plugins:', 'memberlite' ), $memberlite_theme ) );
					?>
				</h2>
				<div class="wp-list-table widefat plugin-install">
					<h2 class="screen-reader-text">Plugins list</h2>
					<div id="the-list">
						<?php if ( in_array( 'bbpress', $memberlite_plugins_integrated ) ) { ?>
						<div class="plugin-card plugin-card-bbpress">
							<div class="plugin-card-top">
								<div class="name column-name">
									<h3><a href="https://wordpress.org/plugins/bbpress/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'bbPress', 'memberlite' ); ?></a></h3>
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/bbpress-icon.svg" class="plugin-icon" alt="<?php echo esc_attr( 'bbPress', 'memberlite' ); ?>" />
								</div>
								<div class="action-links">
									<ul class="plugin-action-buttons">
										<li>
											<?php
												echo wp_kses( memberlite_plugin_action_button( 'bbpress', 'bbpress/bbpress.php' ), $memberlite_plugin_action_button_allowed_html );
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

						<?php if ( in_array( 'events-manager', $memberlite_plugins_integrated ) ) { ?>
						<div class="plugin-card plugin-card-events-manager">
							<div class="plugin-card-top">
								<div class="name column-name">
									<h3><a href="https://wordpress.org/plugins/events-manager/" target="_blank"><?php esc_html_e( 'Events Manager', 'memberlite' ); ?></a></h3>
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/events-manager-icon-256x256.png" class="plugin-icon" alt="<?php echo esc_attr( 'Events Manager', 'memberlite' ); ?>" />
								</div>
								<div class="action-links">
									<ul class="plugin-action-buttons">
										<li>
											<?php
												echo wp_kses( memberlite_plugin_action_button( 'events-manager', 'events-manager/events-manager.php' ), $memberlite_plugin_action_button_allowed_html );
											?>
										</li>
										<li><a href="https://wordpress.org/plugins/events-manager/" target="_blank"><?php esc_html_e( 'More Details', 'memberlite' ); ?></a></li>
									</ul>
								</div>
								<div class="desc column-description">
									<p><?php esc_html_e( 'Fully featured event registration management including recurring events, locations management, calendar, Google map integration, booking management', 'memberlite' ); ?></p>
									<p class="authors"><cite><?php esc_html_e( 'By', 'memberlite' ); ?> <a href="http://wp-events-plugin.com" target="_blank"><?php esc_html_e( 'Pixelite', 'memberlite' ); ?></a></cite></p>
								</div>
							</div>
						</div> <!-- end plugin-card-events-manager -->
						<?php } ?>

						<?php if ( in_array( 'lifterlms', $memberlite_plugins_integrated ) ) { ?>
							<div class="plugin-card plugin-card-lifterlms">
								<div class="plugin-card-top">
									<div class="name column-name">
										<h3><a href="https://wordpress.org/plugins/lifterlms/" target="_blank"><?php esc_html_e( 'LifterLMS', 'memberlite' ); ?></a></h3>
										<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/lifterlms-icon-256x256.png" class="plugin-icon" alt="<?php echo esc_attr( 'LifterLMS', 'memberlite' ); ?>">
									</div>
									<div class="action-links">
										<ul class="plugin-action-buttons">
											<li>
												<?php
													echo wp_kses( memberlite_plugin_action_button( 'lifterlms/', 'lifterlms/lifterlms.php' ), $memberlite_plugin_action_button_allowed_html );
												?>
											</li>
											<li><a href="https://wordpress.org/plugins/lifterlms/" target="_blank"><?php esc_html_e( 'More Details', 'memberlite' ); ?></a></li>
										</ul>
									</div>
									<div class="desc column-description">
										<p><?php esc_html_e( 'LifterLMS is a secure easy-to-use WordPress LMS plugin packed with features to easily create & sell courses online.', 'memberlite' ); ?></p>
										<p class="authors"><cite><?php esc_html_e( 'By', 'memberlite' ); ?> <a href="https://lifterlms.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'LifterLMS', 'memberlite' ); ?></a></cite></p>
									</div>
								</div>
							</div> <!-- end plugin-card-lifterlms -->
						<?php } ?>

						<?php if ( in_array( 'paid-memberships-pro', $memberlite_plugins_integrated ) ) { ?>
						<div class="plugin-card plugin-card-paid-memberships-pro">
							<div class="plugin-card-top">
								<div class="name column-name">
									<h3><a href="https://www.paidmembershipspro.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank"><?php esc_html_e( 'Paid Memberships Pro', 'memberlite' ); ?></a></h3>
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/paid-memberships-pro-icon-256x256.png" class="plugin-icon" alt="<?php echo esc_attr( 'Paid Memberships Pro', 'memberlite' ); ?>" />
								</div>
								<div class="action-links">
									<ul class="plugin-action-buttons">
										<li>
											<?php
												echo wp_kses( memberlite_plugin_action_button( 'paid-memberships-pro', 'paid-memberships-pro/paid-memberships-pro.php', 'https://www.paidmembershipspro.com/documentation/download/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage' ), $memberlite_plugin_action_button_allowed_html );
											?>
										</li>
										<li><a href="https://www.paidmembershipspro.com/?utm_source=memberlite-theme&utm_medium=memberlite-guide&utm_campaign=homepage" target="_blank"><?php esc_html_e( 'More Details', 'memberlite' ); ?></a></li>
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
			<?php } ?>
		</div> <!-- end about-wrap -->
	</div> <!-- end wpbody-content -->
	<?php
}

/**
 * Show an action button for the specified plugin
 * @param string $slug The plugin slug
 * @param string $plugin_file The plugin file (includes slug/plugin.php)
 * @param string $download_link Get the download link for the plugin. If 'org' is set assume it's on WordPress.org and search in the WP dashboard for the plugin.
 */
function memberlite_plugin_action_button( $slug, $plugin_file, $download_link = 'org' ) {
	$plugin_file_abs = ABSPATH . 'wp-content/plugins/' . $plugin_file;
	if ( is_plugin_active( $plugin_file ) ) {
		$status = 'active';
	} elseif ( file_exists( $plugin_file_abs ) ) {
		$status = 'inactive';
	} else {
		$status = 'uninstalled';
	}

	if ( $status === 'active' ) {
		$r = '<a class="button button-disabled">' . __( 'Active', 'memberlite' ) . '</a>';
	} elseif ( $status === 'inactive' ) {
		$r = '<a class="install-now button" href="' . esc_url( add_query_arg( array( 's' => $slug ), admin_url( 'plugins.php' ) ) ) . '">' . __( 'Activate', 'memberlite' ) . '</a>';
	} else {
		// Adjust the download link based on the download_link that is passed in.
		if ( $download_link === 'org' ) {
			$plugin_url = is_multisite() ? add_query_arg( array( 's' => $slug, 'tab' => 'search' ), network_admin_url( 'plugin-install.php' ) ) : add_query_arg( array( 's' => $slug, 'tab' => 'search' ), admin_url( 'plugin-install.php' ) );
			$target = '';
		} else {
			$plugin_url = $download_link;
			$target = ' target=_blank'; // esc_attr is wrapping the values in between quotes when outputting so we can ommit them here.
		}

		$r = '<a href="' . esc_url( $plugin_url ) . '" class="install-now button" aria-label="' . esc_attr__( 'Install', 'memberlite' ) . '"' . esc_attr( $target ) . '>' . __( 'Install', 'memberlite' ) . '</a>';
		
	}
	return $r;
}

/*
	Load any notifications.

	1. Show link to the welcome page the first time the theme is activated
*/
// check for notifications
function memberlite_admin_init_notifications() {
	global $wpdb;

	// Avoid notices on some screens.
	$script_name = isset( $_SERVER['SCRIPT_NAME'] ) ? sanitize_text_field( wp_unslash( $_SERVER['SCRIPT_NAME'] ) ) : '';
	$script = esc_html( wp_basename( $script_name ) );
	$maybe_installing = in_array( $script, array( 'update.php', 'plugins.php' ), true );

	// 1. Show link to the welcome page the first time the theme is activated
	$welcome_link_dismissed = get_option( 'memberlite_notice_welcome_link_dismissed', false );
	if ( ! $welcome_link_dismissed && ! $maybe_installing ) {
		wp_enqueue_script( 'memberlite-admin-dismiss-notice', get_template_directory_uri() . '/js/admin-dismiss-notice.js', array( 'jquery' ), MEMBERLITE_VERSION, true );
		add_action( 'admin_notices', 'memberlite_admin_notice_welcome_link' );
	}
}
add_action( 'admin_init', 'memberlite_admin_init_notifications' );

// AJAX to handle notice dismissal
function memberlite_wp_ajax_dismiss_notice() {
	// whitelist of notices
	$notices = array( 'welcome_link' );

	// Get and validate the notice.
	$notice = sanitize_key( wp_unslash( $_REQUEST['notice'] ?? '' ) );
	if ( ! in_array( $notice, $notices, true ) ) {
		wp_die( esc_html__( 'Invalid notice.', 'text-domain' ) );
	}

	// update option and leave
	update_option( 'memberlite_notice_' . $notice . '_dismissed', 1, 'no' );

	exit;
}
add_action( 'wp_ajax_nopriv_memberlite_dismiss_notice', 'memberlite_wp_ajax_dismiss_notice' );
add_action( 'wp_ajax_memberlite_dismiss_notice', 'memberlite_wp_ajax_dismiss_notice' );

// Welcome Link Notice
function memberlite_admin_notice_welcome_link() {
	// notice HTML
	?>
	<div id="memberlite-admin-notice-welcome_link" class="notice notice-info is-dismissible memberlite-notice">
		<p><strong><?php esc_html_e( 'Memberlite', 'memberlite' ); ?>:</strong>
		<?php
			echo esc_html__( 'We have documentation and recommended plugins to help you get started with Memberlite Theme.', 'memberlite' );
			$click_link = add_query_arg( 'page', 'memberlite-support', admin_url( 'themes.php' ) );
			$click_text = __( 'Click here to view the Memberlite welcome page.', 'memberlite' );
			echo ' <a href="' . esc_url( $click_link ) . '">' . esc_html( $click_text ) . '</a>';
		?>
		</p>
	</div>
	<?php
}
