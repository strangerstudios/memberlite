<?php
/**
 * Deprecated hooks, filters and functions
 *
 * @package Memberlite
 */

/**
 * Handle renamed hooks
 */
global $memberlite_map_deprecated_hooks;

$memberlite_map_deprecated_hooks = array(
	'memberlite_before_page'            => 'before_page',
	'memberlite_after_page'             => 'after_page',
	'memberlite_before_mobile_nav'      => 'before_mobile_nav',
	'memberlite_after_mobile_nav'       => 'after_mobile_nav',
	'memberlite_before_site_header'     => 'before_site_header',
	'memberlite_before_site_navigation' => 'before_site_navigation',
	'memberlite_before_masthead'        => 'before_masthead',
	'memberlite_after_masthead'         => 'after_masthead',
	'memberlite_before_masthead_inner'  => 'before_masthead_inner',
	'memberlite_after_masthead_inner'   => 'after_masthead_inner',
	'memberlite_before_content'         => 'before_content',
	'memberlite_after_content'          => 'after_content',
	'memberlite_before_main'            => 'before_main',
	'memberlite_after_main'             => 'after_main',
	'memberlite_before_loop'            => 'before_loop',
	'memberlite_after_loop'             => 'after_loop',
	'memberlite_before_content_page'    => 'before_content_page',
	'memberlite_after_content_page'     => 'after_content_page',
	'memberlite_before_content_single'  => 'before_content_single',
	'memberlite_after_content_single'   => 'after_content_single',
	'memberlite_before_sidebar'         => 'before_sidebar',
	'memberlite_after_sidebar'          => 'after_sidebar',
	'memberlite_before_sidebar_widgets' => 'before_sidebar_widgets',
	'memberlite_after_sidebar_widgets'  => 'after_sidebar_widgets',
	'memberlite_before_footer'          => 'before_footer',
	'memberlite_after_footer'           => 'after_footer',
	'memberlite_before_footer_widgets'  => 'before_footer_widgets',
	'memberlite_after_footer_widgets'   => 'after_footer_widgets',
	'memberlite_before_site_info'       => 'before_site_info',
	'memberlite_after_site_info'        => 'after_site_info',
);

// anonymous function used below is only supported in php 5.3+
foreach ( $memberlite_map_deprecated_hooks as $new => $old ) {
	// assumes hooks with no parameters
	if ( version_compare( phpversion(), '5.3.0', '>=' ) ) {
		// Using anonmyous functions for PHP 5.3+
		$func = function() use ( $new, $old ) {
			memberlite_maybe_show_deprecated_hook_message( $new, $old );
		};
	} else {
		// Using create_function for PHP 5.2
		$func = create_function( '', "memberlite_maybe_show_deprecated_hook_message( '$new', '$old' );" );
	}
	add_action( $new, $func );
}

function memberlite_maybe_show_deprecated_hook_message( $new, $old ) {
	if ( has_filter( $old ) ) {
		/* translators: 1: the old hook name, 2: the new or replacement hook name */
		trigger_error( sprintf( esc_html__( 'The %1$s hook has been deprecated since version 3.1 of Memberlite. Please use the %2$s hook instead.', 'memberlite' ), esc_html( $old ), esc_html( $new ) ) );
		do_action( $old );
	}
}

/**
 * Deprecate the memberlite_signup shortcode.
 */
function memberlite_signup_shortcode($atts, $content=null, $code="") {
	_doing_it_wrong( __FUNCTION__, esc_html__( 'The [memberlite_signup] shortcode is now deprecated. Please use the Signup Shortcode Add On for Paid Memberships Pro instead.', 'memberlite' ), 'TBD' );

	// Show a message to admins that the shortcode is deprecated.
	if ( current_user_can ( 'manage_options' ) ) {
		return '<div class="pmpro_message pmpro_error">' . esc_html__( 'Admin only message: The Memberlite Signup shortcode is deprecated. Please update your content.', 'memberlite' ) . '</div>';
	}
}
add_shortcode( 'memberlite_signup', 'memberlite_signup_shortcode' );

/**
 * Get a list of deprecated or no longer needed plugins.
 *
 * @since TBD
 *
 * @return array Plugins that are deprecated.
 */
function memberlite_get_deprecated_plugins() {
	global $wpdb;

	// Set the array of deprecated plugins.
	$deprecated = array(
		'memberlite-elements' => array(
			'file' => 'memberlite-elements.php',
			'label' => 'Memberlite Elements'
		),
		'memberlite-shortcodes' => array(
			'file' => 'memberlite-shortcodes.php',
			'label' => 'Memberlite Shortcodes'
		),
		'multiple-post-thumbnails' => array(
			'file' => 'multi-post-thumbnails.php',
			'label' => 'Multiple Post Thumbnails'
		),
	);

	$deprecated = apply_filters( 'pmpro_deprecated_add_ons_list', $deprecated );

	// If the list is empty or not an array, just bail.
	if ( empty( $deprecated ) || ! is_array( $deprecated ) ) {
		return array();
	}

	return $deprecated;
}

/**
 * Check for deprecated plugins and show a notice if they are active.
 *
 * @since TBD
 */
function memberlite_check_for_deprecated_plugins() {
	$deprecated = memberlite_get_deprecated_plugins();
	$deprecated_active = array();
	$has_messages = false;
	foreach( $deprecated as $key => $values ) {
		$path = '/' . $key . '/' . $values['file'];
		if ( file_exists( WP_PLUGIN_DIR . $path ) ) {
			$deprecated_active[] = $values;
			if ( ! empty( $values['message'] ) ) {
				$has_messages = true;
			}

			// Try to deactivate it if it's enabled.
			if ( is_plugin_active( plugin_basename( $path ) ) ) {
				deactivate_plugins( $path );
			}
		}
	}

	// If any deprecated add ons are active, show warning.
	if ( ! empty( $deprecated_active ) && is_array( $deprecated_active ) ) {
		// Only show on the Themes or Plugins pages.
		global $pagenow;
		if ( ! in_array( $pagenow, array( 'themes.php', 'plugins.php' ) ) ) {
			return;
		}
		?>
		<div class="notice notice-warning">
		<p>
			<?php
				// translators: %s: The list of deprecated plugins that are active.
				echo wp_kses(
					sprintf(
						__( 'Some plugins are now merged into the Memberlite theme. The features of the following plugins are now included by default. You should <strong>delete these unnecessary plugins</strong> from your site: <em><strong>%s</strong></em>.', 'memberlite' ),
						implode( ', ', wp_list_pluck( $deprecated_active, 'label' ) )
					),
					array(
						'strong' => array(),
						'em' => array(),
					)
				);
			?>
		</p>
		<?php
		// If there are any messages, show them.
		if ( $has_messages ) {
			?>
			<ul>
				<?php
				foreach( $deprecated_active as $deprecated ) {
					if ( empty( $deprecated['message'] ) ) {
						continue;
					}
					?>
					<li>
						<strong><?php echo esc_html( $deprecated['label'] ); ?></strong>:
						<?php
						echo wp_kses(
							$deprecated['message'],
							array(
								'a' => array(
								'href' => array(),
								'target' => array(),
							) )
						);
						?>
					</li>
					<?php
				}
				?>
			</ul>
			<?php
		}
		?>
		</div>
		<?php
	}
}
add_action( 'admin_notices', 'memberlite_check_for_deprecated_plugins' );

/**
 * Remove the "Activate" link on the plugins page for deprecated plugins.
 *
 * @since TBD
 *
 * @param array  $actions An array of plugin action links.
 * @param string $plugin_file Path to the plugin file relative to the plugins directory.
 * @return array $actions An array of plugin action links.
 */
 function memberlite_deprecated_plugins_action_links( $actions, $plugin_file ) {
	$deprecated = memberlite_get_deprecated_plugins();

	foreach( $deprecated as $key => $values ) {
		if ( $plugin_file == $key . '/' . $values['file'] ) {
			$actions['activate'] = esc_html__( 'Deprecated', 'memberlite' );
		}
	}

	return $actions;
}
add_filter( 'plugin_action_links', 'memberlite_deprecated_plugins_action_links', 10, 2 );
