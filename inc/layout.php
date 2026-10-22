<?php
/**
 * Layout: the page structure (sidebar and content width) for every context.
 *
 * Each context (Pages, Single Posts, Blog & Archives, and each CPT's single and archive
 * views) has a default layout in the Customizer. Pages, posts and CPT items on the default
 * template can override it in the block editor's Layout panel. The page set as the Posts
 * page overrides the blog index.
 *
 * memberlite_get_layout() resolves the layout for the current request in this order:
 * 1. An item with a page template (e.g. Landing Page, or a child theme's) gets that
 *    template's layout. Otherwise, the item's `_memberlite_layout` meta.
 * 2. The static front page falls back to Contained.
 * 3. The Customizer default for the context.
 *
 * @package Memberlite
 * @since TBD
 */

/**
 * Get all layouts, keyed by slug.
 *
 * @since TBD
 * @return array Layout labels keyed by slug.
 */
function memberlite_get_layouts(): array {
	return array(
		'sidebar-right' => __( 'Right Sidebar', 'memberlite' ),
		'sidebar-left'  => __( 'Left Sidebar', 'memberlite' ),
		'narrow'        => __( 'Narrow', 'memberlite' ),
		'contained'     => __( 'Contained', 'memberlite' ),
		'full-width'    => __( 'Full Width', 'memberlite' ),
	);
}

/**
 * Get the layouts offered for a context.
 *
 * Full Width runs content edge to edge with no container. Only pages have markup for it,
 * so it is offered for the page context only.
 *
 * @since TBD
 *
 * @param string $context Layout context, see memberlite_get_layout_contexts().
 * @return array Layout labels keyed by slug.
 */
function memberlite_get_layout_choices( string $context ): array {
	$layouts = memberlite_get_layouts();

	if ( 'page' !== $context ) {
		unset( $layouts['full-width'] );
	}

	/**
	 * Filters the layouts offered for a context in the Customizer and the block editor.
	 *
	 * Remove a slug to hide that layout. Only slugs from memberlite_get_layouts() are kept.
	 *
	 * @since TBD
	 *
	 * @param array  $layouts Layout labels keyed by slug.
	 * @param string $context Layout context: 'page', 'post', 'archive', 'search', 'cpt_{post_type}' or 'cpt_{post_type}_archive'.
	 */
	$layouts = apply_filters( 'memberlite_layout_choices', $layouts, $context );

	return array_intersect_key( (array) $layouts, memberlite_get_layouts() );
}

/**
 * Whether a layout shows the sidebar.
 *
 * @since TBD
 *
 * @param string $layout Layout slug.
 * @return bool
 */
function memberlite_layout_has_sidebar( string $layout ): bool {
	return in_array( $layout, array( 'sidebar-right', 'sidebar-left' ), true );
}

/**
 * Get the layout contexts with their Customizer setting IDs.
 *
 * CPT contexts exist for each CPT from memberlite_get_customizer_cpts(). A CPT that
 * inherits from Posts & Archives uses the 'post' and 'archive' contexts instead.
 *
 * @since TBD
 * @return array[] Keyed by context: 'setting' (layout theme_mod), 'columns_ratio' (theme_mod) and 'default' (layout slug).
 */
function memberlite_get_layout_contexts(): array {
	global $memberlite_defaults;

	$contexts = array(
		'page'    => array(
			'setting'       => 'layout_page',
			'columns_ratio' => 'columns_ratio',
			'default'       => $memberlite_defaults['layout_page'],
		),
		'post'    => array(
			'setting'       => 'layout_post',
			'columns_ratio' => 'columns_ratio_post',
			'default'       => $memberlite_defaults['layout_post'],
		),
		'archive' => array(
			'setting'       => 'layout_archive',
			'columns_ratio' => 'columns_ratio_blog',
			'default'       => $memberlite_defaults['layout_archive'],
		),
		'search'  => array(
			'setting'       => 'layout_search',
			'columns_ratio' => 'columns_ratio_search',
			'default'       => $memberlite_defaults['layout_search'],
		),
	);

	foreach ( memberlite_get_customizer_cpts() as $post_type ) {
		$contexts[ 'cpt_' . $post_type ] = array(
			'setting'       => 'layout_cpt_' . $post_type,
			'columns_ratio' => 'columns_ratio_' . $post_type,
			'default'       => $memberlite_defaults['layout_post'],
		);
		$contexts[ 'cpt_' . $post_type . '_archive' ] = array(
			'setting'       => 'layout_cpt_' . $post_type . '_archive',
			'columns_ratio' => 'columns_ratio_' . $post_type . '_archive',
			'default'       => $memberlite_defaults['layout_archive'],
		);
	}

	return $contexts;
}

/**
 * Whether a CPT has archive views: its post type archive, or a taxonomy registered to it alone.
 *
 * Matches the archives memberlite_get_current_cpt_archive_type() resolves to the CPT.
 *
 * @since TBD
 *
 * @param string $post_type CPT slug.
 * @return bool
 */
function memberlite_cpt_has_archive_views( string $post_type ): bool {
	$post_type_obj = get_post_type_object( $post_type );
	if ( $post_type_obj && $post_type_obj->has_archive ) {
		return true;
	}

	foreach ( get_object_taxonomies( $post_type, 'objects' ) as $taxonomy ) {
		if ( $taxonomy->public && ! in_array( $taxonomy->name, array( 'category', 'post_tag' ), true ) && count( array_intersect( $taxonomy->object_type, memberlite_get_customizer_cpts() ) ) === 1 ) {
			return true;
		}
	}

	return false;
}

/**
 * Get the layout context for a single post, page or CPT item.
 *
 * The page set as the Posts page uses the 'archive' context because it controls the blog index.
 *
 * @since TBD
 *
 * @param WP_Post $post The post.
 * @return string Layout context.
 */
function memberlite_get_layout_context_for_post( WP_Post $post ): string {
	if ( 'page' === $post->post_type ) {
		return (int) get_option( 'page_for_posts' ) === $post->ID ? 'archive' : 'page';
	}

	if ( in_array( $post->post_type, memberlite_get_customizer_cpts(), true ) && ! memberlite_cpt_inherits_posts_archives( $post->post_type ) ) {
		return 'cpt_' . $post->post_type;
	}

	return 'post';
}

/**
 * Get the layout context for the current request.
 *
 * @since TBD
 * @return string Layout context: 'page', 'post', 'archive', 'search', 'cpt_{post_type}' or 'cpt_{post_type}_archive'.
 */
function memberlite_get_layout_context(): string {
	if ( is_404() ) {
		return 'page';
	}

	if ( is_search() ) {
		return 'search';
	}

	if ( is_singular() ) {
		$post = get_queried_object();
		return $post instanceof WP_Post ? memberlite_get_layout_context_for_post( $post ) : 'post';
	}

	$cpt_type = memberlite_get_current_cpt_archive_type();
	if ( $cpt_type && ! memberlite_cpt_inherits_posts_archives( $cpt_type ) ) {
		return 'cpt_' . $cpt_type . '_archive';
	}

	return 'archive';
}

/**
 * Get the Customizer default layout for a context.
 *
 * @since TBD
 *
 * @param string $context Layout context.
 * @return string Layout slug.
 */
function memberlite_get_default_layout( string $context ): string {
	$contexts = memberlite_get_layout_contexts();
	$choices  = memberlite_get_layout_choices( $context );

	if ( empty( $contexts[ $context ] ) ) {
		$context = 'page';
	}

	$default = $contexts[ $context ]['default'];
	$layout  = get_theme_mod( $contexts[ $context ]['setting'], $default );

	if ( isset( $choices[ $layout ] ) ) {
		return $layout;
	}

	return isset( $choices[ $default ] ) ? $default : (string) key( $choices );
}

/**
 * Get the columns ratio (e.g. '8-4') for a context.
 *
 * @since TBD
 *
 * @param string $context Layout context.
 * @return string
 */
function memberlite_get_layout_columns_ratio( string $context ): string {
	global $memberlite_defaults;

	$contexts = memberlite_get_layout_contexts();
	$setting  = isset( $contexts[ $context ] ) ? $contexts[ $context ]['columns_ratio'] : 'columns_ratio';
	$default  = isset( $memberlite_defaults[ $setting ] ) ? $memberlite_defaults[ $setting ] : '8-4';

	return (string) get_theme_mod( $setting, $default );
}

/**
 * Map the removed layout page templates to layouts.
 *
 * memberlite_migrate_legacy_layout_templates() moves pages off these templates. A child
 * theme that still has its own copy of one keeps the template and its layout.
 *
 * @since TBD
 * @return array Layout slugs keyed by template file.
 */
function memberlite_get_legacy_template_layouts(): array {
	return array(
		'templates/content-sidebar.php' => 'sidebar-right',
		'templates/sidebar-content.php' => 'sidebar-left',
		'templates/narrow-width.php'    => 'narrow',
		'templates/full-width.php'      => 'contained',
		'templates/fluid-width.php'     => 'full-width',
	);
}

/**
 * Check whether a page template controls the layout.
 *
 * Only templates the active theme registers, and the removed layout templates on pages,
 * count. A template nothing registers (e.g. one left behind by an old theme or plugin)
 * renders as the default template.
 *
 * @since TBD
 *
 * @param string $template  Template file, or '' for the default template.
 * @param string $post_type Post type the template is on.
 * @return bool
 */
function memberlite_is_layout_template( string $template, string $post_type = 'page' ): bool {
	if ( '' === $template || 'default' === $template ) {
		return false;
	}

	if ( 'page' === $post_type && isset( memberlite_get_legacy_template_layouts()[ $template ] ) ) {
		return true;
	}

	return isset( wp_get_theme()->get_page_templates( null, $post_type )[ $template ] );
}

/**
 * Get the layout saved on an item, from its page template or its meta.
 *
 * A page template controls the layout, so `_memberlite_layout` only applies on the default
 * template. The Posts page ignores its template because WordPress never used it for the
 * blog index.
 *
 * @since TBD
 *
 * @param int $post_id Post ID.
 * @return string Layout slug, or '' to use the default.
 */
function memberlite_get_item_layout( int $post_id ): string {
	$template  = (string) get_page_template_slug( $post_id );
	$post_type = (string) get_post_type( $post_id );

	if ( ! memberlite_is_layout_template( $template, $post_type ) || (int) get_option( 'page_for_posts' ) === $post_id ) {
		return (string) get_post_meta( $post_id, '_memberlite_layout', true );
	}

	return memberlite_get_template_layout( $template, $post_type );
}

/**
 * Get the layout a page template sets.
 *
 * A child theme's copy of a removed layout template keeps that template's layout. Other
 * page templates (e.g. Landing Page) have always shown the sidebar, so they get Right
 * Sidebar. Templates on posts and CPTs use the context default.
 *
 * @since TBD
 *
 * @param string $template  Template file, or '' for the default template.
 * @param string $post_type Post type the template is on.
 * @return string Layout slug, or '' to use the default.
 */
function memberlite_get_template_layout( string $template, string $post_type = 'page' ): string {
	if ( '' === $template || 'default' === $template || 'page' !== $post_type ) {
		return '';
	}

	$templates = memberlite_get_legacy_template_layouts();

	return isset( $templates[ $template ] ) ? $templates[ $template ] : 'sidebar-right';
}

/**
 * Get the layout for the current request.
 *
 * @since TBD
 * @return string Layout slug, see memberlite_get_layouts().
 */
function memberlite_get_layout(): string {
	$context = memberlite_get_layout_context();
	$choices = memberlite_get_layout_choices( $context );
	$layout  = '';

	if ( is_404() ) {
		// 404.php has no sidebar and spans the full row.
		$layout = 'contained';
	} elseif ( is_singular( memberlite_get_layout_post_types() ) ) {
		$layout = memberlite_get_item_layout( get_queried_object_id() );
	} elseif ( is_singular() ) {
		// Other post types (attachments, products, forums) have always shown the sidebar.
		$layout = 'sidebar-right';
	} elseif ( is_home() && ! is_front_page() && get_option( 'page_for_posts' ) ) {
		$layout = memberlite_get_item_layout( (int) get_option( 'page_for_posts' ) );
	}

	if ( '' === $layout && is_front_page() && is_page() ) {
		$layout = 'contained';
	}

	if ( ! isset( $choices[ $layout ] ) ) {
		$layout = memberlite_get_default_layout( $context );
	}

	/**
	 * Filters the layout for the current request.
	 *
	 * @since TBD
	 *
	 * @param string $layout  Layout slug, see memberlite_get_layouts().
	 * @param string $context Layout context.
	 */
	return (string) apply_filters( 'memberlite_layout', $layout, $context );
}

/**
 * Get the post types with the block editor Layout panel.
 *
 * @since TBD
 * @return string[] Posts, pages and the CPTs from memberlite_get_customizer_cpts().
 */
function memberlite_get_layout_post_types(): array {
	return array_merge( array( 'post', 'page' ), memberlite_get_customizer_cpts() );
}

/**
 * Sanitize the `_memberlite_layout` meta value.
 *
 * @since TBD
 *
 * @param mixed $value Layout slug, or '' for the default.
 * @return string
 */
function memberlite_sanitize_layout_meta( $value ): string {
	$value = sanitize_key( (string) $value );

	return isset( memberlite_get_layouts()[ $value ] ) ? $value : '';
}

/**
 * Hide the sidebar when the layout has none.
 *
 * @since TBD
 *
 * @param string|null|false $name Sidebar name passed to get_sidebar(), or false to hide it.
 * @return string|null|false
 */
function memberlite_layout_get_sidebar( $name ) {
	if ( ! memberlite_layout_has_sidebar( memberlite_get_layout() ) ) {
		return false;
	}

	return $name;
}
add_filter( 'memberlite_get_sidebar', 'memberlite_layout_get_sidebar' );

/**
 * Get the removed layout templates that pages should move off.
 *
 * Templates the active theme still registers (a child theme's copy) are left out.
 *
 * @since TBD
 * @return array Layout slugs keyed by template file.
 */
function memberlite_get_legacy_layout_templates_to_migrate(): array {
	return array_diff_key( memberlite_get_legacy_template_layouts(), wp_get_theme()->get_page_templates( null, 'page' ) );
}

/**
 * Get the pages still on a removed layout template.
 *
 * @since TBD
 * @return array Rows with the page `ID` and its `template`.
 */
function memberlite_get_legacy_layout_template_pages(): array {
	global $wpdb;

	$templates = memberlite_get_legacy_layout_templates_to_migrate();

	if ( empty( $templates ) ) {
		return array();
	}

	$placeholders = implode( ', ', array_fill( 0, count( $templates ), '%s' ) );

	return $wpdb->get_results(
		$wpdb->prepare(
			"SELECT p.ID, pm.meta_value AS template
			FROM {$wpdb->posts} p
			INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
			WHERE p.post_type = 'page'
			AND pm.meta_key = '_wp_page_template'
			AND pm.meta_value IN ( $placeholders )",
			array_keys( $templates )
		)
	);
}

/**
 * Move pages off the removed layout page templates.
 *
 * Each page gets its template's layout as `_memberlite_layout`, unless it already has one,
 * and goes back to the default template. The Posts page only loses the template, since
 * WordPress never used it for the blog index. Pages on a template the active theme still
 * registers (a child theme's copy) keep it.
 *
 * Runs from inc/updates/update_8_0.php and when switching between Memberlite and its child
 * themes.
 *
 * @since TBD
 *
 * @param string         $old_name  Unused. Name of the previous theme, from after_switch_theme.
 * @param WP_Theme|false $old_theme The previous theme, from after_switch_theme. Omit to always run.
 * @return void
 */
function memberlite_migrate_legacy_layout_templates( $old_name = '', $old_theme = null ): void {
	// Another theme's pages may use the same template paths.
	if ( null !== $old_theme && ( ! $old_theme instanceof WP_Theme || get_template() !== $old_theme->get_template() ) ) {
		return;
	}

	$templates  = memberlite_get_legacy_layout_templates_to_migrate();
	$posts_page = (int) get_option( 'page_for_posts' );

	foreach ( memberlite_get_legacy_layout_template_pages() as $page ) {
		$page_id = (int) $page->ID;

		if ( $posts_page !== $page_id && '' === (string) get_post_meta( $page_id, '_memberlite_layout', true ) ) {
			// Keep the template if the layout couldn't be saved, so the page doesn't lose it.
			if ( ! update_post_meta( $page_id, '_memberlite_layout', $templates[ $page->template ] ) ) {
				continue;
			}
		}

		update_post_meta( $page_id, '_wp_page_template', 'default' );
	}
}
add_action( 'after_switch_theme', 'memberlite_migrate_legacy_layout_templates', 10, 2 );

/**
 * List pages still on a removed layout template for Memberlite > Alerts.
 *
 * The 8.0 update moves them, but importing or restoring older content can bring them back.
 *
 * @since TBD
 * @return array Alert items.
 */
function memberlite_alert_check_legacy_layout_templates(): array {
	$templates  = memberlite_get_legacy_layout_templates_to_migrate();
	$layouts    = memberlite_get_layouts();
	$posts_page = (int) get_option( 'page_for_posts' );
	$pages      = memberlite_get_legacy_layout_template_pages();
	$items      = array();

	_prime_post_caches( array_map( 'intval', wp_list_pluck( $pages, 'ID' ) ), false, true );

	foreach ( $pages as $page ) {
		$page_id = (int) $page->ID;

		if ( ! memberlite_is_alert_post( $page_id ) ) {
			continue;
		}

		// Mirrors memberlite_migrate_legacy_layout_templates().
		$saved_layout = (string) get_post_meta( $page_id, '_memberlite_layout', true );
		if ( $posts_page === $page_id ) {
			/* translators: %s: Page template file. */
			$details = sprintf( __( '%s, will go back to the default template', 'memberlite' ), $page->template );
		} elseif ( '' !== $saved_layout && isset( $layouts[ $saved_layout ] ) ) {
			/* translators: 1: Page template file, 2: Layout name. */
			$details = sprintf( __( '%1$s, will keep its %2$s layout', 'memberlite' ), $page->template, $layouts[ $saved_layout ] );
		} else {
			/* translators: 1: Page template file, 2: Layout name. */
			$details = sprintf( __( '%1$s, will use the %2$s layout', 'memberlite' ), $page->template, $layouts[ $templates[ $page->template ] ] );
		}

		$title   = get_the_title( $page_id );
		$items[] = array(
			'id'      => $page_id,
			'label'   => '' !== $title ? $title : sprintf( '#%d', $page_id ),
			'url'     => get_edit_post_link( $page_id, 'raw' ),
			'details' => $details,
		);
	}

	return $items;
}

/**
 * Add the removed layout templates alert to Memberlite > Alerts.
 *
 * @since TBD
 *
 * @param array $alerts Alerts keyed by ID.
 * @return array
 */
function memberlite_add_legacy_layout_templates_alert( $alerts ) {
	$alerts = (array) $alerts;

	$alerts['legacy_layout_templates'] = array(
		'title'       => __( 'Pages using removed layout templates', 'memberlite' ),
		'description' => __( 'Memberlite 8.0 removed the Content/Sidebar, Sidebar/Content, Narrow Width, Full Width and Fluid Width page templates. Layout is now set in the block editor\'s Layout panel. These pages still use one of the removed templates, which usually means they were imported or restored from an older site. Until they move, saving one of them from the classic editor or Quick Edit resets it to the default template.', 'memberlite' ),
		'since'       => '8.0',
		'check'       => 'memberlite_alert_check_legacy_layout_templates',
		'action'      => array(
			'label'       => __( 'Move pages to the Layout panel', 'memberlite' ),
			'callback'    => 'memberlite_migrate_legacy_layout_templates',
			'description' => __( 'Each page gets its template\'s layout, unless it already has one, and goes back to the default template.', 'memberlite' ),
		),
	);

	return $alerts;
}
add_filter( 'memberlite_alerts', 'memberlite_add_legacy_layout_templates_alert' );

/**
 * Clear the alert count when a page template changes, see memberlite_maybe_clear_alert_count_for_meta().
 *
 * @since TBD
 *
 * @param array $meta_keys Meta keys alerts report on.
 * @return array
 */
function memberlite_add_legacy_layout_templates_alert_meta_keys( $meta_keys ) {
	$meta_keys   = (array) $meta_keys;
	$meta_keys[] = '_wp_page_template';

	return $meta_keys;
}
add_filter( 'memberlite_alert_meta_keys', 'memberlite_add_legacy_layout_templates_alert_meta_keys' );

/**
 * Copy the pre-TBD sidebar settings into the layout settings, once per theme.
 *
 * "No Sidebar" becomes Narrow (what it rendered) and a Grid archive becomes Contained
 * (Grid used to hide the sidebar). Search results follow the blog sidebar setting's
 * visibility but always showed the sidebar on the right, so they get Right Sidebar or
 * Narrow. Archive Display keeps its old Full Content default. Every context is saved explicitly so existing sites keep
 * their layout even though the defaults for new sites changed. The old `sidebar_location*`
 * settings are then removed. New sites and theme setting resets skip this.
 *
 * Runs after a child theme clones its parent's settings on activation (init, priority 99).
 *
 * @since TBD
 * @return void
 */
function memberlite_maybe_migrate_layout_settings(): void {
	if ( get_theme_mod( 'layout_version' ) ) {
		return;
	}

	// Memberlite has never run its admin update check, so this is a new site.
	if ( ! get_option( 'memberlite_db_version' ) ) {
		set_theme_mod( 'layout_version', 1 );
		return;
	}

	$map = array(
		'sidebar-right'      => 'sidebar-right',
		'sidebar-left'       => 'sidebar-left',
		'sidebar-none'       => 'narrow',
		'sidebar-blog-right' => 'sidebar-right',
		'sidebar-blog-left'  => 'sidebar-left',
		'sidebar-blog-none'  => 'narrow',
	);

	// Find CPTs with saved settings before anything is written, so concurrent runs agree.
	$cpt_types = array();
	foreach ( array_keys( (array) get_theme_mods() ) as $key ) {
		if ( is_string( $key ) && preg_match( '/^(?:sidebar_location|content_archives|inherit_posts_archives)_(.+)$/', $key, $matches ) && 'blog' !== $matches[1] ) {
			$cpt_types[ $matches[1] ] = true;
		}
	}

	$page_sidebar = get_theme_mod( 'sidebar_location', 'sidebar-right' );
	$blog_sidebar = get_theme_mod( 'sidebar_location_blog', 'sidebar-blog-right' );
	$page_ratio   = get_theme_mod( 'columns_ratio', '8-4' );
	$blog_ratio   = get_theme_mod( 'columns_ratio_blog', $page_ratio );
	$blog_layout  = isset( $map[ $blog_sidebar ] ) ? $map[ $blog_sidebar ] : 'sidebar-right';
	$archives     = get_theme_mod( 'content_archives', 'content' );

	set_theme_mod( 'layout_page', isset( $map[ $page_sidebar ] ) ? $map[ $page_sidebar ] : 'sidebar-right' );
	set_theme_mod( 'layout_post', $blog_layout );
	set_theme_mod( 'layout_archive', 'grid' === $archives ? 'contained' : $blog_layout );
	set_theme_mod( 'layout_search', 'narrow' === $blog_layout ? 'narrow' : 'sidebar-right' );
	set_theme_mod( 'content_archives', $archives );
	set_theme_mod( 'columns_ratio_blog', $blog_ratio );
	set_theme_mod( 'columns_ratio_post', $blog_ratio );
	set_theme_mod( 'columns_ratio_search', $blog_ratio );

	foreach ( array_keys( $cpt_types ) as $post_type ) {
		$cpt_sidebar  = get_theme_mod( 'sidebar_location_' . $post_type, 'sidebar-blog-right' );
		$cpt_layout   = isset( $map[ $cpt_sidebar ] ) ? $map[ $cpt_sidebar ] : 'sidebar-right';
		$cpt_ratio    = get_theme_mod( 'columns_ratio_' . $post_type, '8-4' );
		$cpt_archives = get_theme_mod( 'content_archives_' . $post_type, 'content' );

		set_theme_mod( 'layout_cpt_' . $post_type, $cpt_layout );
		set_theme_mod( 'layout_cpt_' . $post_type . '_archive', 'grid' === $cpt_archives ? 'contained' : $cpt_layout );
		set_theme_mod( 'content_archives_' . $post_type, $cpt_archives );
		set_theme_mod( 'columns_ratio_' . $post_type, $cpt_ratio );
		set_theme_mod( 'columns_ratio_' . $post_type . '_archive', $cpt_ratio );
	}

	set_theme_mod( 'layout_version', 1 );

	// Remove the old settings only after layout_version is set, so a concurrent run either skips or still reads them.
	remove_theme_mod( 'sidebar_location' );
	remove_theme_mod( 'sidebar_location_blog' );
	foreach ( array_keys( $cpt_types ) as $post_type ) {
		remove_theme_mod( 'sidebar_location_' . $post_type );
	}
}
add_action( 'init', 'memberlite_maybe_migrate_layout_settings', 100 );
