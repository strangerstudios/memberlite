<?php
/**
 * Register custom blocks for Memberlite.
 *
 * @package Memberlite
 * @since 7.1
 */

/**
 * Register custom Memberlite blocks.
 *
 * @since 7.1
 * @return void
 */
function memberlite_register_blocks(): void {
	$memberlite_blocks = array(
		'nav-menu',
		'member-info',
	);

	foreach ( $memberlite_blocks as $memberlite_block ) {
		register_block_type( get_template_directory() . '/build/blocks/' . $memberlite_block );
	}
}
add_action( 'init', 'memberlite_register_blocks' );

/**
 * Localize editor-only data for the Nav Menu block.
 *
 * Runs on enqueue_block_editor_assets so the data is only attached in the block editor,
 * not on every front-end request.
 *
 * @since 7.1
 * @return void
 */
function memberlite_enqueue_nav_menu_block_data(): void {
	wp_localize_script(
		'memberlite-nav-menu-editor-script',
		'memberliteBlockData',
		array(
			'navMenuPluginActive' => function_exists( 'pmpro_is_plugin_active' ) && pmpro_is_plugin_active( 'pmpro-nav-menus/pmpro-nav-menus.php' ),
		)
	);
}
add_action( 'enqueue_block_editor_assets', 'memberlite_enqueue_nav_menu_block_data' );

/**
 * Enqueue editor JS that hides Memberlite-scoped blocks from the inserter
 * on post types other than memberlite_header and memberlite_footer.
 *
 * @since 7.1.1
 * @return void
 */
function memberlite_enqueue_scope_blocks_script(): void {
	$asset_path = get_template_directory() . '/build/editor/scope-memberlite-blocks.asset.php';

	if ( ! file_exists( $asset_path ) ) {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			error_log( 'Memberlite: Missing asset file at ' . $asset_path );
		}
		return;
	}

	$asset_file = include $asset_path;

	wp_enqueue_script(
		'memberlite-scope-blocks',
		get_template_directory_uri() . '/build/editor/scope-memberlite-blocks.js',
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'memberlite_enqueue_scope_blocks_script' );

/**
 * Enqueue JS for custom block inserter icon for our Memberlite block category.
 *
 * @since 7.1
 * @return void
 */
function memberlite_enqueue_block_inserter_icon(): void {
	$asset_path = get_template_directory() . '/build/editor/block-inserter.asset.php';

	if ( ! file_exists( $asset_path ) ) {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			// Log in debug mode. See docs/build-process.md for more info on the build process.
			error_log( 'Memberlite: Missing asset file at ' . $asset_path );
		}

		return;
	}

	$asset_file = include $asset_path;

	wp_enqueue_script(
		'memberlite-block-inserter-icons',
		get_template_directory_uri() . '/build/editor/block-inserter.js',
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'memberlite_enqueue_block_inserter_icon' );
