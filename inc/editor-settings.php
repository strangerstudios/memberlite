<?php
/**
 * Memberlite functionality for handling editor settings and deprecation
 *
 * @package Memberlite
 *
 * @since 7.0
 */

/**
 * Register custom document settings post meta
 *
 * @since 7.0
 * @return void
 */
function memberlite_register_editor_settings_post_meta(): void {
	register_post_meta( 'page', '_memberlite_hide_header', array(
		'show_in_rest' => true,
		'type'         => 'boolean',
		'single'       => true,
		'default'      => false,
		'label'        => __( 'Hide Header', 'memberlite' ),
		'auth_callback' => 'memberlite_auth_edit_post_meta'
	) );

	register_post_meta( 'page', '_memberlite_header_override', array(
		'show_in_rest'      => true,
		'type'              => 'string',
		'single'            => true,
		'default'           => '',
		'label'             => __( 'Select Header', 'memberlite' ),
		'sanitize_callback' => 'sanitize_key',
		'auth_callback' => 'memberlite_auth_edit_post_meta'
	) );

	register_post_meta( 'page', '_memberlite_hide_footer', array(
		'show_in_rest' => true,
		'type'         => 'boolean',
		'single'       => true,
		'default'      => false,
		'label'        => __( 'Hide Footer', 'memberlite' ),
		'auth_callback' => 'memberlite_auth_edit_post_meta'
	) );

	register_post_meta( 'page', '_memberlite_footer_override', array(
		'show_in_rest'      => true,
		'type'              => 'string',
		'single'            => true,
		'default'           => '',
		'label'             => __( 'Select Footer', 'memberlite' ),
		'sanitize_callback' => 'sanitize_key',
		'auth_callback' => 'memberlite_auth_edit_post_meta'
	) );

	register_post_meta( 'page', '_memberlite_hide_page_nav', array(
		'show_in_rest' => true,
		'single'       => true,
		'type'         => 'boolean',
		'default'      => false,
		'auth_callback' => 'memberlite_auth_edit_post_meta'
	) );

	register_post_meta( 'memberlite_header', '_memberlite_header_sticky', array(
		'show_in_rest'  => true,
		'single'        => true,
		'type'          => 'boolean',
		'default'       => false,
		'auth_callback' => 'memberlite_auth_edit_post_meta'
	) );

	register_post_meta( 'page', '_memberlite_banner_show', array(
		'show_in_rest' => true,
		'type'         => 'boolean',
		'single'       => true,
		'default'      => true,
		'label'        => __( 'Show Page Banner', 'memberlite' ),
		'auth_callback' => 'memberlite_auth_edit_post_meta'
	) );

	register_post_meta( 'page', '_memberlite_banner_hide_title', array(
		'show_in_rest' => true,
		'type'         => 'boolean',
		'single'       => true,
		'default'      => false,
		'label'        => __( 'Hide Page Title', 'memberlite' ),
		'auth_callback' => 'memberlite_auth_edit_post_meta'
	) );

	register_post_meta( 'page', '_memberlite_banner_hide_breadcrumbs', array(
		'show_in_rest' => true,
		'type'         => 'boolean',
		'single'       => true,
		'default'      => false,
		'label'        => __( 'Hide Page Breadcrumbs', 'memberlite' ),
		'auth_callback' => 'memberlite_auth_edit_post_meta'
	) );

	register_post_meta( 'page', '_memberlite_banner_text_alignment', array(
		'show_in_rest' => true,
		'type'         => 'string',
		'single'       => true,
		'default'      => 'default',
		'label'        => __( 'Masthead Text Alignment', 'memberlite' ),
		'auth_callback' => 'memberlite_auth_edit_post_meta'
	) );
}
add_action( 'init', 'memberlite_register_editor_settings_post_meta' );

/**
 * Check that the current user can edit the post a meta value belongs to.
 *
 * Used as the `auth_callback` for Memberlite's registered post meta.
 *
 * @since 8.0
 *
 * @param bool   $allowed   Whether the user can add the meta. Default false.
 * @param string $meta_key  Meta key.
 * @param int    $object_id Post ID.
 * @return bool
 */
function memberlite_auth_edit_post_meta( $allowed, $meta_key, $object_id ): bool {
	return current_user_can( 'edit_post', $object_id );
}

/**
 * Register the Layout panel post meta: the layout and the sidebar widget area settings.
 *
 * Runs on wp_loaded so every CPT is registered before memberlite_get_customizer_cpts() caches its list. CPTs without `custom-fields` support get it,
 * since the block editor only saves registered meta for post types that support it. Their Custom Fields meta box
 * is removed so the classic editor looks the same as before.
 *
 * @since 8.0
 * @return void
 */
function memberlite_register_layout_post_meta(): void {
	$auth_callback = 'memberlite_auth_edit_post_meta';

	foreach ( memberlite_get_layout_post_types() as $post_type ) {
		if ( ! post_type_supports( $post_type, 'custom-fields' ) ) {
			add_post_type_support( $post_type, 'custom-fields' );
			add_action( 'add_meta_boxes_' . $post_type, 'memberlite_remove_custom_fields_meta_box' );
		}

		register_post_meta( $post_type, '_memberlite_layout', array(
			'show_in_rest'      => true,
			'type'              => 'string',
			'single'            => true,
			'default'           => '',
			'label'             => __( 'Layout', 'memberlite' ),
			'sanitize_callback' => 'memberlite_sanitize_layout_meta',
			'auth_callback'     => $auth_callback,
		) );

		register_post_meta( $post_type, '_memberlite_custom_sidebar', array(
			'show_in_rest'      => true,
			'type'              => 'string',
			'single'            => true,
			'default'           => '',
			'label'             => __( 'Custom Sidebar', 'memberlite' ),
			'sanitize_callback' => 'memberlite_sanitize_custom_sidebar_meta',
			'auth_callback'     => $auth_callback,
		) );

		register_post_meta( $post_type, '_memberlite_default_sidebar', array(
			'show_in_rest'      => true,
			'type'              => 'string',
			'single'            => true,
			'default'           => '',
			'label'             => __( 'Default Sidebar Behavior', 'memberlite' ),
			'sanitize_callback' => 'sanitize_key',
			'auth_callback'     => $auth_callback,
		) );
	}

	register_post_meta( 'page', '_memberlite_hide_children', array(
		'show_in_rest'  => true,
		'type'          => 'boolean',
		'single'        => true,
		'default'       => false,
		'label'         => __( 'Hide Page Children Menu in Sidebar', 'memberlite' ),
		'auth_callback' => $auth_callback,
	) );
}
add_action( 'wp_loaded', 'memberlite_register_layout_post_meta' );

/**
 * Register the Banner Image post meta so the block editor can read and save it.
 *
 * Uses the meta key MemberliteMultiPostThumbnails already stores, so existing banner images carry over.
 * Post types that aren't in the REST API can't use the block editor and keep the classic meta box only.
 *
 * @since 8.0
 * @return void
 */
function memberlite_register_banner_image_post_meta(): void {
	foreach ( memberlite_get_banner_image_post_types() as $post_type ) {
		$post_type_object = get_post_type_object( $post_type );
		if ( 'attachment' === $post_type || empty( $post_type_object->show_in_rest ) ) {
			continue;
		}

		if ( ! post_type_supports( $post_type, 'custom-fields' ) ) {
			add_post_type_support( $post_type, 'custom-fields' );
			add_action( 'add_meta_boxes_' . $post_type, 'memberlite_remove_custom_fields_meta_box' );
		}

		register_post_meta( $post_type, memberlite_get_banner_image_meta_key( $post_type ), array(
			'show_in_rest'      => true,
			'type'              => 'integer',
			'single'            => true,
			'default'           => 0,
			'label'             => __( 'Banner Image', 'memberlite' ),
			'sanitize_callback' => 'absint',
			'auth_callback'     => 'memberlite_auth_edit_post_meta',
		) );
	}
}
add_action( 'wp_loaded', 'memberlite_register_banner_image_post_meta' );

/**
 * Remove the Custom Fields meta box from post types that only support custom fields for the Layout or Banner Image panel.
 *
 * @since 8.0
 *
 * @param WP_Post $post The post being edited.
 * @return void
 */
function memberlite_remove_custom_fields_meta_box( $post ): void {
	remove_meta_box( 'postcustom', $post->post_type, 'normal' );
}

/**
 * Sanitize the `_memberlite_custom_sidebar` meta value.
 *
 * @since 8.0
 *
 * @param mixed $value Registered sidebar ID, 'memberlite_sidebar_blank' for none, or '' for unset.
 * @return string
 */
function memberlite_sanitize_custom_sidebar_meta( $value ): string {
	global $wp_registered_sidebars;

	$value = (string) $value;

	if ( '' === $value || 'memberlite_sidebar_blank' === $value || isset( $wp_registered_sidebars[ $value ] ) ) {
		return $value;
	}

	return '';
}

/**
 * Get the data the block editor Layout panel needs for a post.
 *
 * @since 8.0
 *
 * @param WP_Post $post The post being edited.
 * @return array
 */
function memberlite_get_editor_layout_data( WP_Post $post ): array {
	global $wp_registered_sidebars;

	$context  = memberlite_get_layout_context_for_post( $post );
	$layouts  = memberlite_get_layouts();
	$choices  = memberlite_get_layout_choices( $context );
	$is_front = 'page' === get_option( 'show_on_front' ) && (int) get_option( 'page_on_front' ) === $post->ID;
	$default  = $is_front && isset( $choices['contained'] ) ? 'contained' : memberlite_get_default_layout( $context );

	if ( 'page' === $context ) {
		$context_label = __( 'Pages', 'memberlite' );
		$section       = 'memberlite_page_options';
	} elseif ( 'archive' === $context ) {
		$context_label = __( 'Blog & Archives', 'memberlite' );
		$section       = 'memberlite_post_archive_options';
	} elseif ( 'post' === $context ) {
		$context_label = __( 'Single Posts', 'memberlite' );
		$section       = 'memberlite_post_archive_options';
	} else {
		/* translators: %s: plural label for the post type, e.g. "Courses" */
		$context_label = sprintf( __( 'Single %s', 'memberlite' ), get_post_type_object( $post->post_type )->label );
		$section       = 'memberlite_' . $post->post_type . '_archive_options';
	}

	$choice_options = array();
	foreach ( $choices as $value => $label ) {
		$choice_options[] = array(
			'value' => $value,
			'label' => $label,
		);
	}

	// Sidebars a post can add, leaving out the header, footer and mobile menu widget areas.
	$sidebar_options = array(
		array(
			'value' => 'memberlite_sidebar_blank',
			'label' => __( '— None —', 'memberlite' ),
		),
	);
	foreach ( (array) $wp_registered_sidebars as $sidebar ) {
		if ( in_array( $sidebar['id'], array( 'sidebar-3', 'sidebar-4', 'sidebar-5' ), true ) ) {
			continue;
		}
		$sidebar_options[] = array(
			'value' => $sidebar['id'],
			'label' => $sidebar['name'],
		);
	}

	$default_sidebar_id = memberlite_get_default_sidebar_id_for_post_type( $post->post_type );

	return array(
		'contextLabel'       => $context_label,
		'customizerUrl'      => add_query_arg( 'autofocus[section]', $section, admin_url( 'customize.php' ) ),
		'choices'            => $choice_options,
		'layoutLabels'       => $layouts,
		'default'            => $default,
		'isFrontPage'        => $is_front,
		'legacyTemplates'    => memberlite_get_legacy_template_layouts(),
		'isPostsPage'        => (int) get_option( 'page_for_posts' ) === $post->ID,
		'templateNames'      => wp_get_theme()->get_page_templates( null, $post->post_type ),
		'sidebars'           => $sidebar_options,
		'defaultSidebarName' => isset( $wp_registered_sidebars[ $default_sidebar_id ] ) ? $wp_registered_sidebars[ $default_sidebar_id ]['name'] : '',
		'manageSidebarsUrl'  => add_query_arg( array( 'page' => 'memberlite-custom-sidebars' ), admin_url( 'admin.php' ) ),
		'hideChildrenLocked' => memberlite_is_pmpro_account_page_tree( $post ),
	);
}

/**
 * Enqueue JS for custom document settings in the editor
 *
 * @since 7.0
 * @return void
 */
function memberlite_enqueue_custom_editor_assets(): void {
	// The document settings panel only exists in the post editor, not the widgets or Customizer block editors.
	$screen = get_current_screen();
	if ( empty( $screen ) || 'post' !== $screen->base ) {
		return;
	}

	$asset_path = get_template_directory() . '/build/editor/custom-settings.asset.php';

	if ( ! file_exists( $asset_path ) ) {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			// Log in debug mode. See docs/build-process.md for more info on the build process.
			error_log( 'Memberlite: Missing asset file at ' . $asset_path );
		}

		return;
	}

	$asset_file      = include $asset_path;
	$post            = get_post();
	$banner_meta_key = $post ? memberlite_get_banner_image_meta_key( $post->post_type ) : '';

	wp_enqueue_script(
		'memberlite-custom-settings',
		get_template_directory_uri() . '/build/editor/custom-settings.js',
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);

	// Build editor footer choices as an ordered array of {value, label} objects.
	$header_variations_editor = memberlite_build_editor_override_choices( memberlite_get_header_variations() );
	$footer_variations_editor = memberlite_build_editor_override_choices( memberlite_get_footer_variations() );

	// Get existing theme mods, and get footer variations to populate the footer override setting
	wp_localize_script(
		'memberlite-custom-settings',
		'memberliteEditorData',
		array(
			'showPrevNextSinglePages' => get_theme_mod( 'memberlite_page_nav', true ), // Global customizer setting
			'headerVariations'        => $header_variations_editor,
			'footerVariations'        => $footer_variations_editor,
			'manageHeadersUrl'        => admin_url( 'edit.php?post_type=memberlite_header' ),
			'manageFootersUrl'        => admin_url( 'edit.php?post_type=memberlite_footer' ),
			'showPageBreadcrumbs'     => get_theme_mod( 'page_breadcrumbs', false ), // Global customizer setting
			'layout'                  => $post && in_array( $post->post_type, memberlite_get_layout_post_types(), true ) ? memberlite_get_editor_layout_data( $post ) : null,
			'bannerImageMetaKey'      => $banner_meta_key && registered_meta_key_exists( 'post', $banner_meta_key, $post->post_type ) ? $banner_meta_key : null,
		)
	);
}
add_action( 'enqueue_block_editor_assets', 'memberlite_enqueue_custom_editor_assets' );

/**
 * Build options to populate override dropdowns in document settings
 *
 * @param array $variations
 *
 * @since 7.1
 * @return array[]
 */
function memberlite_build_editor_override_choices( array $variations ) {
	$variations_editor = array(
		array(
			'value' => '',
			'label' => __( '— No Override —', 'memberlite' ),
		),
	);

	foreach ( $variations as $slug => $title ) {
		$variations_editor[] = array(
			'value' => (string) $slug,
			'label' => $title,
		);
	}

	return $variations_editor;
}

/**
 * Hide header on pages
 *
 * @since 7.0
 * @return bool
 */
function memberlite_hide_page_header() {
	if ( get_post_type() !== 'page' ) {
		return false;
	}

	return (bool) get_post_meta( get_the_ID(), '_memberlite_hide_header', true );
}

/**
 * Hide footer on pages
 *
 * @since 7.0
 * @return bool
 */
function memberlite_hide_page_footer() {
	if ( get_post_type() !== 'page' ) {
		return false;
	}

	return (bool) get_post_meta( get_the_ID(), '_memberlite_hide_footer', true );
}
