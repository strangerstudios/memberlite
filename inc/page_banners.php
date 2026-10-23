<?php
/**
 * Masthead banner helpers.
 *
 * Also moves the fields of the removed Memberlite Settings meta box to visible custom fields.
 *
 * @package Memberlite
 */

/**
 * Get the fields from the removed Memberlite Settings meta box.
 *
 * Memberlite no longer shows any of them. Values that were set move to a custom field
 * without the leading underscore, so they show in the editor's Custom Fields panel and
 * code can still read them. Values that mean "not set" (the meta box saved every field on
 * every save) are deleted.
 *
 * Ordered so the page icon moves before the banner icon setting that depends on it.
 *
 * @since TBD
 * @return array Keyed by old meta key: the new `key`, the `empty` values to delete, and
 *               optionally a custom field the post must have (`requires`).
 */
function memberlite_get_legacy_page_fields(): array {
	return array(
		'_memberlite_banner_desc'                  => array(
			'key'   => 'memberlite_banner_desc',
			'empty' => array( '' ),
		),
		'_memberlite_banner_right'                 => array(
			'key'   => 'memberlite_banner_right',
			'empty' => array( '' ),
		),
		'_memberlite_banner_bottom'                => array(
			'key'   => 'memberlite_banner_bottom',
			'empty' => array( '' ),
		),
		'_memberlite_banner_extra_padding'         => array(
			'key'   => 'memberlite_banner_extra_padding',
			'empty' => array( '', '0' ),
		),
		'_memberlite_page_icon'                    => array(
			'key'   => 'memberlite_page_icon',
			'empty' => array( '', 'blank' ),
		),
		'_memberlite_banner_icon'                  => array(
			'key'      => 'memberlite_banner_icon',
			'empty'    => array( '', '0' ),
			'requires' => 'memberlite_page_icon',
		),
		'_pmproal_landing_page_level'              => array(
			'key'   => 'memberlite_landing_page_level',
			'empty' => array( '', '0' ),
		),
		'_memberlite_landing_page_checkout_button' => array(
			'key'   => 'memberlite_landing_page_checkout_button',
			'empty' => array( '' ),
		),
		'_memberlite_landing_page_upsell'          => array(
			'key'   => 'memberlite_landing_page_upsell',
			'empty' => array( '', '0' ),
		),
	);
}

/**
 * Get the labels of the removed Memberlite Settings meta box fields.
 *
 * Separate from memberlite_get_legacy_page_fields(), since the migration runs before
 * translations load.
 *
 * @since TBD
 * @return array Labels keyed by the new custom field key.
 */
function memberlite_get_legacy_page_field_labels(): array {
	return array(
		'memberlite_banner_desc'                  => __( 'Banner Description', 'memberlite' ),
		'memberlite_banner_right'                 => __( 'Banner Right Column', 'memberlite' ),
		'memberlite_banner_bottom'                => __( 'Page Bottom Banner', 'memberlite' ),
		'memberlite_banner_extra_padding'         => __( 'Extra Banner Padding', 'memberlite' ),
		'memberlite_page_icon'                    => __( 'Page Icon', 'memberlite' ),
		'memberlite_banner_icon'                  => __( 'Show Icon in Banner Title', 'memberlite' ),
		'memberlite_landing_page_level'           => __( 'Landing Page Membership Level', 'memberlite' ),
		'memberlite_landing_page_checkout_button' => __( 'Landing Page Checkout Button Text', 'memberlite' ),
		'memberlite_landing_page_upsell'          => __( 'Landing Page Membership Level Upsell', 'memberlite' ),
	);
}

/**
 * Move the removed Memberlite Settings meta box fields to visible custom fields.
 *
 * Deletes the values that mean "not set" and renames the rest, see
 * memberlite_get_legacy_page_fields(). If a post already has the new custom field with a
 * value, its old field is deleted instead, so the custom field keeps its current value. Safe to run
 * again, e.g. after importing content from an older site.
 *
 * Runs from inc/updates/update_8_0.php and from Memberlite > Alerts.
 *
 * @since TBD
 * @return void
 */
function memberlite_migrate_legacy_page_fields(): void {
	global $wpdb;

	$fields       = memberlite_get_legacy_page_fields();
	$placeholders = implode( ', ', array_fill( 0, count( $fields ), '%s' ) );
	$post_ids     = $wpdb->get_col(
		$wpdb->prepare(
			"SELECT DISTINCT post_id FROM {$wpdb->postmeta} WHERE meta_key IN ( $placeholders )",
			array_keys( $fields )
		)
	);

	if ( empty( $post_ids ) ) {
		return;
	}

	foreach ( $fields as $old_key => $field ) {
		$empty_placeholders = implode( ', ', array_fill( 0, count( $field['empty'] ), '%s' ) );

		$wpdb->query(
			$wpdb->prepare(
				"DELETE FROM {$wpdb->postmeta} WHERE meta_key = %s AND ( meta_value IS NULL OR meta_value REGEXP '^[[:space:]]*$' OR TRIM( meta_value ) IN ( $empty_placeholders ) )",
				array_merge( array( $old_key ), $field['empty'] )
			)
		);

		if ( ! empty( $field['requires'] ) ) {
			$wpdb->query(
				$wpdb->prepare(
					"DELETE pm_old FROM {$wpdb->postmeta} pm_old
					LEFT JOIN {$wpdb->postmeta} pm_required ON pm_required.post_id = pm_old.post_id AND pm_required.meta_key = %s
					WHERE pm_old.meta_key = %s AND pm_required.meta_id IS NULL",
					$field['requires'],
					$old_key
				)
			);
		}

		// An empty custom field shouldn't win over a value that was set.
		$wpdb->query(
			$wpdb->prepare(
				"DELETE pm_new FROM {$wpdb->postmeta} pm_new
				INNER JOIN {$wpdb->postmeta} pm_old ON pm_old.post_id = pm_new.post_id AND pm_old.meta_key = %s
				WHERE pm_new.meta_key = %s AND ( pm_new.meta_value IS NULL OR pm_new.meta_value REGEXP '^[[:space:]]*$' )",
				$old_key,
				$field['key']
			)
		);

		$wpdb->query(
			$wpdb->prepare(
				"DELETE pm_old FROM {$wpdb->postmeta} pm_old
				INNER JOIN {$wpdb->postmeta} pm_new ON pm_new.post_id = pm_old.post_id AND pm_new.meta_key = %s
				WHERE pm_old.meta_key = %s",
				$field['key'],
				$old_key
			)
		);

		$wpdb->query(
			$wpdb->prepare(
				"UPDATE {$wpdb->postmeta} SET meta_key = %s WHERE meta_key = %s",
				$field['key'],
				$old_key
			)
		);
	}

	foreach ( $post_ids as $post_id ) {
		wp_cache_delete( (int) $post_id, 'post_meta' );
	}
	wp_cache_set_posts_last_changed();
}

/**
 * Get the posts that have any of the given meta keys, for an alert.
 *
 * @since TBD
 *
 * @param array $labels Field labels keyed by meta key.
 * @return array Alert items, one per post, listing the fields it has.
 */
function memberlite_get_page_field_alert_items( array $labels ): array {
	global $wpdb;

	$placeholders = implode( ', ', array_fill( 0, count( $labels ), '%s' ) );
	$rows         = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT post_id, meta_key FROM {$wpdb->postmeta} WHERE meta_key IN ( $placeholders ) ORDER BY post_id",
			array_keys( $labels )
		)
	);

	$fields_by_post = array();
	foreach ( $rows as $row ) {
		$fields_by_post[ (int) $row->post_id ][ $labels[ $row->meta_key ] ] = true;
	}

	_prime_post_caches( array_keys( $fields_by_post ), false, false );

	$items = array();
	foreach ( $fields_by_post as $post_id => $fields ) {
		if ( ! memberlite_is_alert_post( $post_id ) ) {
			continue;
		}

		$title   = get_the_title( $post_id );
		$items[] = array(
			'id'      => $post_id,
			'label'   => '' !== $title ? $title : sprintf( '#%d', $post_id ),
			'url'     => get_edit_post_link( $post_id, 'raw' ),
			'details' => implode( ', ', array_keys( $fields ) ),
		);
	}

	return $items;
}

/**
 * List posts that still have fields from the removed Memberlite Settings meta box.
 *
 * The 8.0 update moves them, but importing or restoring older content can bring them back.
 *
 * @since TBD
 * @return array Alert items.
 */
function memberlite_alert_check_legacy_page_fields(): array {
	$field_labels = memberlite_get_legacy_page_field_labels();
	$labels       = array();
	foreach ( memberlite_get_legacy_page_fields() as $old_key => $field ) {
		$labels[ $old_key ] = $field_labels[ $field['key'] ];
	}

	return memberlite_get_page_field_alert_items( $labels );
}

/**
 * List posts with custom fields moved from the removed Memberlite Settings meta box.
 *
 * @since TBD
 * @return array Alert items.
 */
function memberlite_alert_check_page_custom_fields(): array {
	return memberlite_get_page_field_alert_items( memberlite_get_legacy_page_field_labels() );
}

/**
 * Add the removed Memberlite Settings meta box alerts to Memberlite > Alerts.
 *
 * @since TBD
 *
 * @param array $alerts Alerts keyed by ID.
 * @return array
 */
function memberlite_add_page_field_alerts( $alerts ) {
	$alerts = (array) $alerts;

	$alerts['legacy_page_fields'] = array(
		'title'       => __( 'Old page settings to move', 'memberlite' ),
		'description' => __( 'These pages have fields from the Memberlite Settings box that Memberlite 8.0 removed, which usually means they were imported or restored from an older site. Memberlite no longer shows these fields, and you can\'t see or edit them while they are hidden.', 'memberlite' ),
		'since'       => '8.0',
		'check'       => 'memberlite_alert_check_legacy_page_fields',
		'action'      => array(
			'label'       => __( 'Move to custom fields', 'memberlite' ),
			'callback'    => 'memberlite_migrate_legacy_page_fields',
			'description' => __( 'Fields that were set become custom fields you can see and edit. Empty fields are deleted.', 'memberlite' ),
		),
	);

	$alerts['page_custom_fields'] = array(
		'title'       => __( 'Page settings Memberlite no longer shows', 'memberlite' ),
		'description' => __( 'Memberlite 8.0 removed the Memberlite Settings box from the page editor, along with the Landing Page template, the banner description, right column, bottom banner, extra padding and page icon settings. Memberlite no longer shows them on your site. Anything these pages had set was kept as a custom field (memberlite_banner_desc, memberlite_banner_bottom, memberlite_landing_page_level and so on). To see or edit them, turn on Custom fields in the block editor\'s Preferences. To show them on your site again, use a code recipe. Delete the custom fields to clear this alert, or dismiss it.', 'memberlite' ),
		'since'       => '8.0',
		'check'       => 'memberlite_alert_check_page_custom_fields',
	);

	return $alerts;
}
add_filter( 'memberlite_alerts', 'memberlite_add_page_field_alerts' );

/**
 * Clear the alert count when an old or moved page field changes, see memberlite_maybe_clear_alert_count_for_meta().
 *
 * @since TBD
 *
 * @param array $meta_keys Meta keys alerts report on.
 * @return array
 */
function memberlite_add_page_field_alert_meta_keys( $meta_keys ) {
	$meta_keys = (array) $meta_keys;
	foreach ( memberlite_get_legacy_page_fields() as $old_key => $field ) {
		$meta_keys[] = $old_key;
		$meta_keys[] = $field['key'];
	}

	return $meta_keys;
}
add_filter( 'memberlite_alert_meta_keys', 'memberlite_add_page_field_alert_meta_keys' );

/**
 * Get the banner image HTML for a post.
 *
 * Returns the dedicated banner image from MemberliteMultiPostThumbnails
 * if available, or an empty string if no dedicated banner image is set.
 * The result passes through the memberlite_get_banner_image filter.
 *
 * @param int          $post_id The post ID.
 * @param string       $size    The image size. Default 'banner'.
 * @param bool         $icon    Whether to use an icon. Default false.
 * @param array|string $attr    Image attributes. Default empty array.
 * @return string The image HTML, or empty string.
 */
function memberlite_get_banner_image( $post_id = 0, $size = 'banner', $icon = false, $attr = array() ) {
	if ( empty( $post_id ) ) {
		global $post;
		$post_id = ! empty( $post->ID ) ? $post->ID : 0;
	}

	$banner_image    = '';
	$banner_image_id = 0;
	$post_type       = ! empty( $post_id ) ? get_post_type( $post_id ) : false;

	if ( ! empty( $post_type ) && class_exists( 'MemberliteMultiPostThumbnails' ) ) {
		$banner_image_id = (int) MemberliteMultiPostThumbnails::get_post_thumbnail_id(
			$post_type,
			'memberlite_banner_image' . $post_type,
			$post_id
		);

		if ( ! empty( $banner_image_id ) ) {
			$banner_image = wp_get_attachment_image( $banner_image_id, $size, $icon, $attr );
		}
	}

	/**
	 * Filter the banner image HTML for a post.
	 *
	 * Receives only the dedicated banner image, not the featured image as in
	 * Memberlite 6.x, and runs even when no banner image is set. Grid views fall
	 * back to the featured image only when this returns empty, so a non-empty
	 * value returned here replaces the featured image there.
	 *
	 * @param string       $banner_image    The image HTML, or empty string.
	 * @param int          $banner_image_id The banner image attachment ID, or 0.
	 * @param string       $size            The image size.
	 * @param bool         $icon            Whether to use an icon.
	 * @param array|string $attr            Image attributes.
	 * @param int          $post_id         The post ID.
	 */
	return apply_filters( 'memberlite_get_banner_image', $banner_image, $banner_image_id, $size, $icon, $attr, $post_id );
}

/**
 * Get the banner image src for a post.
 *
 * Returns the dedicated banner image from MemberliteMultiPostThumbnails
 * if available, or false if no dedicated banner image is set.
 * The result passes through the memberlite_banner_image_src filter.
 *
 * @param int|null $post_id The post ID. Defaults to the global post.
 * @param string   $size    The image size. Default 'banner'.
 * @return array|false The image src array from wp_get_attachment_image_src, or false.
 */
function memberlite_get_banner_image_src( $post_id = null, $size = 'banner' ) {
	if ( empty( $post_id ) ) {
		global $post;
		$post_id = ! empty( $post->ID ) ? $post->ID : 0;
	}

	$banner_image_src = false;
	$post_type        = ! empty( $post_id ) ? get_post_type( $post_id ) : false;

	if ( ! empty( $post_type ) && class_exists( 'MemberliteMultiPostThumbnails' ) ) {
		$banner_image_id = MemberliteMultiPostThumbnails::get_post_thumbnail_id(
			$post_type,
			'memberlite_banner_image' . $post_type,
			$post_id
		);

		if ( ! empty( $banner_image_id ) ) {
			$banner_image_src = wp_get_attachment_image_src( $banner_image_id, $size );
		}
	}

	/**
	 * Filter the banner image src for a post.
	 *
	 * Receives only the dedicated banner image, not the featured image as in
	 * Memberlite 6.x, and runs even when no banner image is set. A non-empty
	 * value returned here takes priority over any featured image fallback.
	 *
	 * @param array|false $banner_image_src The image src array from wp_get_attachment_image_src, or false.
	 * @param string      $size             The image size.
	 * @param int         $post_id          The post ID.
	 */
	return apply_filters( 'memberlite_banner_image_src', $banner_image_src, $size, $post_id );
}

/**
 * Get the banner image URL for the current page/post masthead.
 *
 * Checks for a dedicated banner image first, then falls back to the
 * featured image if the "Show as Banner Image" checkbox is checked.
 *
 * @return string|false The banner image URL, or false if no banner.
 */
function memberlite_get_masthead_banner_image_url() {
	if ( is_404() ) {
		return false;
	}

	$post_id = memberlite_get_banner_post_id();

	if ( empty( $post_id ) ) {
		return false;
	}

	// Check for a dedicated banner image.
	$banner_image_src = memberlite_get_banner_image_src( $post_id, 'memberlite-masthead' );
	if ( ! empty( $banner_image_src ) ) {
		return $banner_image_src[0];
	}

	return false;
}

/**
 * Get banner's post ID
 *
 * @since 7.1.2
 * @return int Post ID, or 0 if the current view has no post.
 */
function memberlite_get_banner_post_id() {
	// On term and author archives the queried object is a term or user, not a post.
	$queried_object            = get_queried_object();
	$memberlite_banner_post_id = $queried_object instanceof WP_Post ? $queried_object->ID : 0;

	if ( empty( $memberlite_banner_post_id ) && ( is_home() || is_post_type_archive( 'post' ) ) ) {
		$memberlite_banner_post_id = (int) get_option( 'page_for_posts' );
	}

	return $memberlite_banner_post_id;
}
/**
 * Determine if the masthead banner should be rendered
 *
 * @since 7.1.2
 * @return bool
 */
function memberlite_should_masthead_render(): bool {
	$memberlite_banner_show    = true;
	$memberlite_banner_post_id = memberlite_get_banner_post_id();

	// The "Show Page Banner" Template Settings only exists on pages
	if ( ! empty( $memberlite_banner_post_id ) && get_post_type( $memberlite_banner_post_id ) === 'page' ) {
		$show_banner_meta = get_post_meta( $memberlite_banner_post_id, '_memberlite_banner_show', true );

		// Falsy covers: '' (an explicit false toggle, stringified on save) and '0' (the legacy metabox radio's hidden value).
		// A never-touched page isn't falsy here — it resolves to the registered default of true.
		if ( ! $show_banner_meta ) {
			$memberlite_banner_show = false;
		}
	}

	return apply_filters( 'memberlite_banner_show', $memberlite_banner_show, $memberlite_banner_post_id );
}
