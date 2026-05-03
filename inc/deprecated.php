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
	'memberlite_editor_color_palette'	=> null,
);

foreach ( $memberlite_map_deprecated_hooks as $new => $old ) {
	// assumes hooks with no parameters
	add_action( $new, function() use ( $new, $old ) {
		memberlite_maybe_show_deprecated_hook_message( $new, $old );
	} );
}

function memberlite_maybe_show_deprecated_hook_message( $new, $old ) {
	if ( null === $old || ! has_filter( $old ) ) {
		return;
	}
	/* translators: 1: the old hook name, 2: the new or replacement hook name */
	trigger_error( sprintf( esc_html__( 'The %1$s hook has been deprecated since version 3.1 of Memberlite. Please use the %2$s hook instead.', 'memberlite' ), esc_html( $old ), esc_html( $new ) ) );
	do_action( $old );
}

/**
 * Deprecate the memberlite_signup shortcode.
 *
 * @since 6.0
 */
function memberlite_signup_shortcode($atts, $content=null, $code="") {
	_doing_it_wrong( __FUNCTION__, esc_html__( 'The [memberlite_signup] shortcode is now deprecated. Please use the Signup Shortcode Add On for Paid Memberships Pro instead.', 'memberlite' ), '6.0' );

	// Show a message to admins that the shortcode is deprecated.
	if ( current_user_can ( 'manage_options' ) ) {
		return '<div class="pmpro_message pmpro_error">' . esc_html__( 'Admin only message: The Memberlite Signup shortcode is deprecated. Please update your content.', 'memberlite' ) . '</div>';
	}
}
add_shortcode( 'memberlite_signup', 'memberlite_signup_shortcode' );

/**
 * Get a list of deprecated or no longer needed plugins.
 *
 * @since 6.0
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
 * @since 6.0
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
 * @since 6.0
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

/**
 * The breadcrumbs function was renamed from `memberlite_getBreadcrumbs` to `memberlite_get_breadcrumbs`.
 *
 * @since 7.0
 * @return string The breadcrumbs HTML.
 *
 */
function memberlite_getBreadcrumbs() {
    _deprecated_function( __FUNCTION__, '7.0', 'memberlite_get_breadcrumbs' );
    return memberlite_get_breadcrumbs();
}

/**
 * The page title function was split into memberlite_get_page_title() and memberlite_get_page_description().
 *
 * @since 7.0
 *
 * @param bool $echo Whether to echo the output.
 * @return string The page title and description HTML.
 */
function memberlite_page_title( $echo = true ) {
	_deprecated_function( __FUNCTION__, '7.0', 'memberlite_get_page_title() and memberlite_get_page_description()' );

	$page_title_html = memberlite_get_page_title() . memberlite_get_page_description();

	$page_title_html = apply_filters( 'memberlite_page_title', $page_title_html );

	if ( $echo ) {
		echo wp_kses_post( $page_title_html );
	}

	return $page_title_html;
}

/**
 * Get legacy color scheme definitions in 17-color associative format.
 * Used by upgrade script to migrate legacy schemes to individual theme_mods.
 *
 * @since 7.0
 * @return array Legacy color schemes with 17-color associative arrays.
 */
function memberlite_get_legacy_color_scheme_definitions(): array {
	/**
	 * The order of colors matches the original indexed array order:
	 * 1. Header Text Color        -> header_textcolor
	 * 2. Background Color         -> background_color
	 * 3. Header Background Color  -> bgcolor_header
	 * 4. Primary Nav BG Color     -> bgcolor_site_navigation
	 * 5. Primary Nav Link Color   -> color_site_navigation
	 * 6. Text Color               -> color_text
	 * 7. Link Color               -> color_link
	 * 8. Meta Link Color          -> color_meta_link
	 * 9. Primary Color            -> color_primary
	 * 10. Secondary Color         -> color_secondary
	 * 11. Action Color            -> color_action
	 * 12. Default Button Color    -> color_button
	 * 13. Page Masthead BG        -> bgcolor_page_masthead
	 * 14. Page Masthead Text      -> color_page_masthead
	 * 15. Footer Widgets BG       -> bgcolor_footer_widgets
	 * 16. Footer Widgets Text     -> color_footer_widgets
	 * 17. Border Color            -> color_borders
	 */
	return array(
		'default_v4.6'   => array(
			'label'  => __( 'Default V4.6 (Legacy)', 'memberlite' ),
			'colors' => array(
				'header_textcolor'        => '011935',
				'background_color'        => 'FFFFFF',
				'bgcolor_header'          => 'FFFFFF',
				'bgcolor_site_navigation' => 'F9FAFB',
				'color_site_navigation'   => '444444',
				'color_text'              => '222222',
				'color_link'              => '011935',
				'color_meta_link'         => '011935',
				'color_primary'           => '011935',
				'color_secondary'         => '00A59D',
				'color_action'            => 'E87102',
				'color_button'            => '3C4B5A',
				'bgcolor_page_masthead'   => '011935',
				'color_page_masthead'     => 'FFFFFF',
				'bgcolor_footer_widgets'  => 'F9FAFB',
				'color_footer_widgets'    => '222222',
				'color_borders'           => 'E0E0E0',
			),
		),
		'default'        => array(
			'label'  => __( 'Default (Legacy)', 'memberlite' ),
			'colors' => array(
				'header_textcolor'        => '2C3E50',
				'background_color'        => 'FFFFFF',
				'bgcolor_header'          => 'FFFFFF',
				'bgcolor_site_navigation' => 'FAFAFA',
				'color_site_navigation'   => '777777',
				'color_text'              => '222222',
				'color_link'              => '2C3E50',
				'color_meta_link'         => '2C3E50',
				'color_primary'           => '2C3E50',
				'color_secondary'         => '18BC9C',
				'color_action'            => 'F39C12',
				'color_button'            => '798D8F',
				'bgcolor_page_masthead'   => '2C3E50',
				'color_page_masthead'     => 'FFFFFF',
				'bgcolor_footer_widgets'  => '2C3E50',
				'color_footer_widgets'    => 'FFFFFF',
				'color_borders'           => 'DBE6ED',
			),
		),
		'education'      => array(
			'label'  => __( 'Education (Legacy)', 'memberlite' ),
			'colors' => array(
				'header_textcolor'        => '3A9AD9',
				'background_color'        => 'F4EFEA',
				'bgcolor_header'          => 'F4EFEA',
				'bgcolor_site_navigation' => 'E2DED9',
				'color_site_navigation'   => '354458',
				'color_text'              => '222222',
				'color_link'              => '3A9AD9',
				'color_meta_link'         => '3A9AD9',
				'color_primary'           => '354458',
				'color_secondary'         => 'EB7260',
				'color_action'            => '29ABA4',
				'color_button'            => '798D8F',
				'bgcolor_page_masthead'   => '354458',
				'color_page_masthead'     => 'FFFFFF',
				'bgcolor_footer_widgets'  => '354458',
				'color_footer_widgets'    => 'FFFFFF',
				'color_borders'           => 'E0E0E0',
			),
		),
		'modern_teal'    => array(
			'label'  => __( 'Modern Teal (Legacy)', 'memberlite' ),
			'colors' => array(
				'header_textcolor'        => '424242',
				'background_color'        => 'EFEFEF',
				'bgcolor_header'          => 'EFEFEF',
				'bgcolor_site_navigation' => '424242',
				'color_site_navigation'   => 'EFEFEF',
				'color_text'              => '222222',
				'color_link'              => '00CCD6',
				'color_meta_link'         => '00CCD6',
				'color_primary'           => '00CCD6',
				'color_secondary'         => '424242',
				'color_action'            => 'FFD900',
				'color_button'            => '798D8F',
				'bgcolor_page_masthead'   => '00CCD6',
				'color_page_masthead'     => 'FFFFFF',
				'bgcolor_footer_widgets'  => '00CCD6',
				'color_footer_widgets'    => 'FFFFFF',
				'color_borders'           => 'E0E0E0',
			),
		),
		'mono_blue'      => array(
			'label'  => __( 'Mono Blue (Legacy)', 'memberlite' ),
			'colors' => array(
				'header_textcolor'        => '00AEEF',
				'background_color'        => 'FFFFFF',
				'bgcolor_header'          => 'FFFFFF',
				'bgcolor_site_navigation' => '00AEEF',
				'color_site_navigation'   => 'FFFFFF',
				'color_text'              => '222222',
				'color_link'              => '00AEEF',
				'color_meta_link'         => '00AEEF',
				'color_primary'           => '333333',
				'color_secondary'         => '555555',
				'color_action'            => '00AEEF',
				'color_button'            => '798D8F',
				'bgcolor_page_masthead'   => '333333',
				'color_page_masthead'     => 'FFFFFF',
				'bgcolor_footer_widgets'  => '333333',
				'color_footer_widgets'    => 'FFFFFF',
				'color_borders'           => 'E0E0E0',
			),
		),
		'mono_green'     => array(
			'label'  => __( 'Mono Green (Legacy)', 'memberlite' ),
			'colors' => array(
				'header_textcolor'        => '00A651',
				'background_color'        => 'FFFFFF',
				'bgcolor_header'          => 'FFFFFF',
				'bgcolor_site_navigation' => '00A651',
				'color_site_navigation'   => 'FFFFFF',
				'color_text'              => '222222',
				'color_link'              => '00A651',
				'color_meta_link'         => '00A651',
				'color_primary'           => '333333',
				'color_secondary'         => '555555',
				'color_action'            => '00A651',
				'color_button'            => '798D8F',
				'bgcolor_page_masthead'   => '333333',
				'color_page_masthead'     => 'FFFFFF',
				'bgcolor_footer_widgets'  => '333333',
				'color_footer_widgets'    => 'FFFFFF',
				'color_borders'           => 'E0E0E0',
			),
		),
		'mono_orange'    => array(
			'label'  => __( 'Mono Orange (Legacy)', 'memberlite' ),
			'colors' => array(
				'header_textcolor'        => 'F39C12',
				'background_color'        => 'FFFFFF',
				'bgcolor_header'          => 'FFFFFF',
				'bgcolor_site_navigation' => 'F39C12',
				'color_site_navigation'   => 'FFFFFF',
				'color_text'              => '222222',
				'color_link'              => 'F39C12',
				'color_meta_link'         => 'F39C12',
				'color_primary'           => '333333',
				'color_secondary'         => '555555',
				'color_action'            => 'F39C12',
				'color_button'            => '798D8F',
				'bgcolor_page_masthead'   => '333333',
				'color_page_masthead'     => 'FFFFFF',
				'bgcolor_footer_widgets'  => '333333',
				'color_footer_widgets'    => 'FFFFFF',
				'color_borders'           => 'E0E0E0',
			),
		),
		'mono_pink'      => array(
			'label'  => __( 'Mono Pink (Legacy)', 'memberlite' ),
			'colors' => array(
				'header_textcolor'        => 'ED0977',
				'background_color'        => 'FFFFFF',
				'bgcolor_header'          => 'FFFFFF',
				'bgcolor_site_navigation' => 'ED0977',
				'color_site_navigation'   => 'FFFFFF',
				'color_text'              => '222222',
				'color_link'              => 'ED0977',
				'color_meta_link'         => 'ED0977',
				'color_primary'           => '333333',
				'color_secondary'         => '555555',
				'color_action'            => 'ED0977',
				'color_button'            => '798D8F',
				'bgcolor_page_masthead'   => '333333',
				'color_page_masthead'     => 'FFFFFF',
				'bgcolor_footer_widgets'  => '333333',
				'color_footer_widgets'    => 'FFFFFF',
				'color_borders'           => 'E0E0E0',
			),
		),
		'pop'            => array(
			'label'  => __( 'Pop! (Legacy)', 'memberlite' ),
			'colors' => array(
				'header_textcolor'        => '53BBF4',
				'background_color'        => 'FFFFFF',
				'bgcolor_header'          => 'FFFFFF',
				'bgcolor_site_navigation' => 'B1EB00',
				'color_site_navigation'   => '666666',
				'color_text'              => '222222',
				'color_link'              => 'B1EB00',
				'color_meta_link'         => 'B1EB00',
				'color_primary'           => '53BBF4',
				'color_secondary'         => 'FFAC00',
				'color_action'            => 'FF85CB',
				'color_button'            => '798D8F',
				'bgcolor_page_masthead'   => '53BBF4',
				'color_page_masthead'     => 'FFFFFF',
				'bgcolor_footer_widgets'  => '53BBF4',
				'color_footer_widgets'    => 'FFFFFF',
				'color_borders'           => 'E0E0E0',
			),
		),
		'primary'        => array(
			'label'  => __( 'Not So Primary (Legacy)', 'memberlite' ),
			'colors' => array(
				'header_textcolor'        => '1352A2',
				'background_color'        => 'F0F1EE',
				'bgcolor_header'          => 'F0F1EE',
				'bgcolor_site_navigation' => 'FFFFFF',
				'color_site_navigation'   => '555555',
				'color_text'              => '222222',
				'color_link'              => 'FB6964',
				'color_meta_link'         => 'FB6964',
				'color_primary'           => '1352A2',
				'color_secondary'         => 'FB6964',
				'color_action'            => 'FFD464',
				'color_button'            => '798D8F',
				'bgcolor_page_masthead'   => '1352A2',
				'color_page_masthead'     => 'FFFFFF',
				'bgcolor_footer_widgets'  => '1352A2',
				'color_footer_widgets'    => 'FFFFFF',
				'color_borders'           => 'E0E0E0',
			),
		),
		'raspberry_lime' => array(
			'label'  => __( 'Raspberry Lime (Legacy)', 'memberlite' ),
			'colors' => array(
				'header_textcolor'        => 'AA2159',
				'background_color'        => 'FFFFFF',
				'bgcolor_header'          => 'FFFFFF',
				'bgcolor_site_navigation' => '700035',
				'color_site_navigation'   => 'EFEFEF',
				'color_text'              => '222222',
				'color_link'              => '009D97',
				'color_meta_link'         => 'AA2159',
				'color_primary'           => 'AA2159',
				'color_secondary'         => '009D97',
				'color_action'            => 'BCC747',
				'color_button'            => '798D8F',
				'bgcolor_page_masthead'   => 'AA2159',
				'color_page_masthead'     => 'FFFFFF',
				'bgcolor_footer_widgets'  => 'AA2159',
				'color_footer_widgets'    => 'FFFFFF',
				'color_borders'           => 'E0E0E0',
			),
		),
		'slate_blue'     => array(
			'label'  => __( 'Slate Blue (Legacy)', 'memberlite' ),
			'colors' => array(
				'header_textcolor'        => '6991AC',
				'background_color'        => 'F5F5F5',
				'bgcolor_header'          => 'F5F5F5',
				'bgcolor_site_navigation' => 'FFFFFF',
				'color_site_navigation'   => '67727A',
				'color_text'              => '222222',
				'color_link'              => '6991AC',
				'color_meta_link'         => '6991AC',
				'color_primary'           => '67727A',
				'color_secondary'         => '6991AC',
				'color_action'            => 'D75C37',
				'color_button'            => '798D8F',
				'bgcolor_page_masthead'   => '67727A',
				'color_page_masthead'     => 'FFFFFF',
				'bgcolor_footer_widgets'  => '67727A',
				'color_footer_widgets'    => 'FFFFFF',
				'color_borders'           => 'E0E0E0',
			),
		),
		'watermelon'     => array(
			'label'  => __( 'Watermelon Seed (Legacy)', 'memberlite' ),
			'colors' => array(
				'header_textcolor'        => '363635',
				'background_color'        => 'F9F9F7',
				'bgcolor_header'          => 'F9F9F7',
				'bgcolor_site_navigation' => '363635',
				'color_site_navigation'   => 'FFFFFF',
				'color_text'              => '222222',
				'color_link'              => '83BF17',
				'color_meta_link'         => '83BF17',
				'color_primary'           => '83BF17',
				'color_secondary'         => '363635',
				'color_action'            => 'F15D58',
				'color_button'            => '798D8F',
				'bgcolor_page_masthead'   => '83BF17',
				'color_page_masthead'     => 'FFFFFF',
				'bgcolor_footer_widgets'  => '83BF17',
				'color_footer_widgets'    => 'FFFFFF',
				'color_borders'           => 'E0E0E0',
			),
		),
	);
}

/**
 * Helper function meant to fetch template parts based on variation.
 * $slug kept for backwards compatibility.
 * Always returns 'default'.
 *
 * @since 7.0
 * @deprecated 7.1
 *
 * @param string $slug
 * @return string
 */
function memberlite_get_variation( $slug ) {
	_deprecated_function( __FUNCTION__, '7.1' );

	// No replacement for this function, returning 'default' will get the components/footer/variation-default.php template part
	return 'default';
}
