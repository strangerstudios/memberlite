<?php
/**
 * Memberlite > Alerts: things a site admin should review, usually after an update.
 *
 * Each alert checks the site live and lists what needs attention, so it resolves itself
 * once the items are fixed. An alert can offer an action (e.g. rerun a migration) and
 * can be dismissed. A dismissed alert comes back if it finds an item it didn't list when
 * it was dismissed. The page is in adminpages/alerts.php.
 *
 * @package Memberlite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get the registered alerts.
 *
 * @since TBD
 * @return array Alerts keyed by ID, see the memberlite_alerts filter for the keys.
 */
function memberlite_get_alerts(): array {
	/**
	 * Filter the alerts shown on Memberlite > Alerts.
	 *
	 * Each alert is an array keyed by its ID:
	 *
	 * - title       (string)   Required. Short summary of the problem.
	 * - description (string)   What happened and what to do about it. HTML allowed.
	 * - since       (string)   Memberlite version that added the alert.
	 * - check       (callable) Required. Returns the items that need attention, or an empty
	 *                          array when there is nothing to do. Each item is an array with
	 *                          `label`, and optional `id` (e.g. a post ID), `url` (e.g. an
	 *                          edit link) and `details`. Dismissals remember items by `id`,
	 *                          or by `url` or `label` when there is no `id`.
	 * - action      (array)    Optional fix the admin can run from the page: `label`,
	 *                          `callback` (called with no arguments) and `description`.
	 *                          It should be safe to run more than once.
	 * - docs_url    (string)   Optional link to documentation or a code recipe.
	 *
	 * Internal for now: the item format and how dismissals are stored may still change.
	 *
	 * @since TBD
	 *
	 * @param array $alerts Alerts keyed by ID.
	 */
	$alerts = apply_filters( 'memberlite_alerts', array() );

	$defaults = array(
		'title'       => '',
		'description' => '',
		'since'       => '',
		'check'       => null,
		'action'      => array(),
		'docs_url'    => '',
	);

	$valid_alerts = array();

	foreach ( (array) $alerts as $id => $alert ) {
		$id    = sanitize_key( $id );
		$alert = wp_parse_args( $alert, $defaults );

		if ( '' === $id || '' === $alert['title'] || ! is_callable( $alert['check'] ) ) {
			continue;
		}

		if ( ! empty( $alert['action'] ) && ( empty( $alert['action']['label'] ) || empty( $alert['action']['callback'] ) || ! is_callable( $alert['action']['callback'] ) ) ) {
			$alert['action'] = array();
		}

		$alert['id']         = $id;
		$valid_alerts[ $id ] = $alert;
	}

	return $valid_alerts;
}

/**
 * Get the items an alert reports.
 *
 * Each alert is checked once per request unless `$refresh` is set.
 *
 * @since TBD
 *
 * @param array $alert   Alert from memberlite_get_alerts().
 * @param bool  $refresh Check again even if this request already did.
 * @return array Items that need attention.
 */
function memberlite_get_alert_items( array $alert, bool $refresh = false ): array {
	static $checked = array();

	if ( $refresh || ! isset( $checked[ $alert['id'] ] ) ) {
		$items                   = call_user_func( $alert['check'] );
		$checked[ $alert['id'] ] = is_array( $items ) ? array_values( $items ) : array();
	}

	return $checked[ $alert['id'] ];
}

/**
 * Get the keys a dismissal remembers an alert's items by.
 *
 * @since TBD
 *
 * @param array $items Items from memberlite_get_alert_items().
 * @return array Item keys.
 */
function memberlite_get_alert_item_keys( array $items ): array {
	$keys = array();

	foreach ( $items as $item ) {
		if ( isset( $item['id'] ) && '' !== (string) $item['id'] ) {
			$keys[] = 'id:' . $item['id'];
		} elseif ( ! empty( $item['url'] ) ) {
			$keys[] = 'url:' . md5( $item['url'] );
		} else {
			$keys[] = 'label:' . md5( isset( $item['label'] ) ? (string) $item['label'] : '' );
		}
	}

	return array_values( array_unique( $keys ) );
}

/**
 * Check whether a post should be listed in an alert.
 *
 * Trashed posts, auto-drafts and meta left behind by deleted posts are skipped, since
 * there is nothing to edit.
 *
 * @since TBD
 *
 * @param int $post_id Post ID.
 * @return bool
 */
function memberlite_is_alert_post( int $post_id ): bool {
	return ! in_array( get_post_status( $post_id ), array( false, 'trash', 'auto-draft' ), true );
}

/**
 * Get the dismissed alerts.
 *
 * @since TBD
 * @return array Keys of the items each alert listed when dismissed, keyed by alert ID.
 */
function memberlite_get_dismissed_alerts(): array {
	$dismissed = get_option( 'memberlite_dismissed_alerts', array() );

	return is_array( $dismissed ) ? array_filter( $dismissed, 'is_array' ) : array();
}

/**
 * Check an alert and get its status.
 *
 * An alert is dismissed while every item it lists was listed when it was dismissed.
 *
 * @since TBD
 *
 * @param array $alert   Alert from memberlite_get_alerts().
 * @param bool  $refresh Check again even if this request already did.
 * @return array The alert's `items`, and its `status`: 'active', 'dismissed' or 'resolved'.
 */
function memberlite_get_alert_status( array $alert, bool $refresh = false ): array {
	$items     = memberlite_get_alert_items( $alert, $refresh );
	$dismissed = memberlite_get_dismissed_alerts();

	if ( empty( $items ) ) {
		$status = 'resolved';
	} elseif ( isset( $dismissed[ $alert['id'] ] ) && ! array_diff( memberlite_get_alert_item_keys( $items ), $dismissed[ $alert['id'] ] ) ) {
		$status = 'dismissed';
	} else {
		$status = 'active';
	}

	return array(
		'items'  => $items,
		'status' => $status,
	);
}

/**
 * Forget dismissed items an alert no longer lists.
 *
 * Fixed items drop out of the dismissal, so they show again if they come back. Once an
 * alert resolves, its dismissal is cleared. Writes the memberlite_dismissed_alerts option
 * when something changed.
 *
 * @since TBD
 *
 * @param string $alert_id Alert ID.
 * @param array  $items    The alert's current items, from memberlite_get_alert_items().
 * @return void
 */
function memberlite_sync_alert_dismissal( string $alert_id, array $items ): void {
	$dismissed = memberlite_get_dismissed_alerts();

	if ( ! isset( $dismissed[ $alert_id ] ) ) {
		return;
	}

	$kept = array_values( array_intersect( $dismissed[ $alert_id ], memberlite_get_alert_item_keys( $items ) ) );

	if ( $kept === $dismissed[ $alert_id ] ) {
		return;
	}

	if ( empty( $kept ) ) {
		unset( $dismissed[ $alert_id ] );
	} else {
		$dismissed[ $alert_id ] = $kept;
	}

	update_option( 'memberlite_dismissed_alerts', $dismissed, false );
}

/**
 * Count the alerts that need attention: alerts with items that aren't dismissed.
 *
 * Cached for an hour. The cache is cleared when an alert is run, dismissed or restored,
 * when the Alerts page loads, when a post is saved or deleted, when meta an alert reports
 * on changes (see the memberlite_alert_meta_keys filter), after a Memberlite update and on
 * theme switch. Rebuilding it also syncs dismissals, see memberlite_sync_alert_dismissal().
 *
 * @since TBD
 * @return int
 */
function memberlite_get_alert_count(): int {
	$count = get_transient( 'memberlite_alert_count' );

	if ( false === $count ) {
		$count = 0;
		foreach ( memberlite_get_alerts() as $alert ) {
			$status = memberlite_get_alert_status( $alert );
			memberlite_sync_alert_dismissal( $alert['id'], $status['items'] );
			if ( 'active' === $status['status'] ) {
				$count++;
			}
		}
		set_transient( 'memberlite_alert_count', $count, HOUR_IN_SECONDS );
	}

	return (int) $count;
}

/**
 * Clear the cached alert count.
 *
 * @since TBD
 * @return void
 */
function memberlite_clear_alert_count(): void {
	delete_transient( 'memberlite_alert_count' );
}
add_action( 'after_switch_theme', 'memberlite_clear_alert_count' );
add_action( 'save_post', 'memberlite_clear_alert_count' );
add_action( 'deleted_post', 'memberlite_clear_alert_count' );

/**
 * Clear the cached alert count when post meta an alert reports on changes.
 *
 * Covers meta written directly, e.g. by WP-CLI or a plugin, without saving the post.
 *
 * @since TBD
 *
 * @param int|array $meta_ids  Meta ID or IDs.
 * @param int       $object_id Post ID.
 * @param string    $meta_key  Meta key.
 * @return void
 */
function memberlite_maybe_clear_alert_count_for_meta( $meta_ids, $object_id, $meta_key ) {
	/**
	 * Filter the post meta keys that alerts report on.
	 *
	 * Changing one of these clears the cached alert count. Kept separate from
	 * memberlite_alerts so meta writes don't build every alert.
	 *
	 * @since TBD
	 *
	 * @param array $meta_keys Meta keys.
	 */
	$meta_keys = apply_filters( 'memberlite_alert_meta_keys', array() );

	if ( in_array( $meta_key, (array) $meta_keys, true ) ) {
		memberlite_clear_alert_count();
	}
}
add_action( 'added_post_meta', 'memberlite_maybe_clear_alert_count_for_meta', 10, 3 );
add_action( 'updated_post_meta', 'memberlite_maybe_clear_alert_count_for_meta', 10, 3 );
add_action( 'deleted_post_meta', 'memberlite_maybe_clear_alert_count_for_meta', 10, 3 );

/**
 * Get the count bubble shown next to a menu label.
 *
 * @since TBD
 *
 * @param int $count Number of alerts that need attention.
 * @return string Bubble HTML, or '' when the count is 0.
 */
function memberlite_get_alert_count_bubble( int $count ): string {
	if ( ! $count ) {
		return '';
	}

	return sprintf(
		' <span class="awaiting-mod count-%1$d"><span aria-hidden="true">%2$s</span><span class="screen-reader-text">%3$s</span></span>',
		$count,
		esc_html( number_format_i18n( $count ) ),
		/* translators: %s: Number of alerts. */
		esc_html( sprintf( _n( '%s alert', '%s alerts', $count, 'memberlite' ), number_format_i18n( $count ) ) )
	);
}

/**
 * Add the alert count bubble to the Memberlite menu and its Alerts item.
 *
 * Added after the pages are registered, since WordPress builds the admin page hook names
 * from the top-level menu title.
 *
 * @since TBD
 * @return void
 */
function memberlite_add_alert_count_to_menu() {
	global $menu, $submenu, $plugin_page;

	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	// The Alerts page checks every alert anyway, so its bubbles should match what it shows.
	if ( 'memberlite-alerts' === $plugin_page ) {
		memberlite_clear_alert_count();
	}

	$bubble = memberlite_get_alert_count_bubble( memberlite_get_alert_count() );
	if ( '' === $bubble ) {
		return;
	}

	foreach ( (array) $menu as $key => $item ) {
		if ( isset( $item[2] ) && 'memberlite-dashboard' === $item[2] ) {
			$menu[ $key ][0] .= $bubble; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		}
	}

	foreach ( (array) ( $submenu['memberlite-dashboard'] ?? array() ) as $key => $item ) {
		if ( isset( $item[2] ) && 'memberlite-alerts' === $item[2] ) {
			$submenu['memberlite-dashboard'][ $key ][0] .= $bubble; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		}
	}
}
add_action( 'admin_menu', 'memberlite_add_alert_count_to_menu', 999 );

/**
 * Run, dismiss or restore an alert from Memberlite > Alerts.
 *
 * @since TBD
 * @return void
 */
function memberlite_handle_alert_action() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to manage Memberlite alerts.', 'memberlite' ) );
	}

	$alert_id     = isset( $_POST['memberlite_alert'] ) ? sanitize_key( wp_unslash( $_POST['memberlite_alert'] ) ) : '';
	$alert_action = isset( $_POST['memberlite_alert_action'] ) ? sanitize_key( wp_unslash( $_POST['memberlite_alert_action'] ) ) : '';

	check_admin_referer( 'memberlite_alert_' . $alert_action . '_' . $alert_id, 'memberlite_alert_nonce' );

	$alerts = memberlite_get_alerts();
	if ( empty( $alerts[ $alert_id ] ) || ! in_array( $alert_action, array( 'run', 'dismiss', 'restore' ), true ) ) {
		wp_die( esc_html__( 'Invalid alert request.', 'memberlite' ) );
	}

	$alert     = $alerts[ $alert_id ];
	$dismissed = memberlite_get_dismissed_alerts();
	$args      = array(
		'page'                    => 'memberlite-alerts',
		'memberlite_alert'        => $alert_id,
		'memberlite_alert_notice' => $alert_action,
	);

	switch ( $alert_action ) {
		case 'run':
			if ( empty( $alert['action'] ) ) {
				wp_die( esc_html__( 'Invalid alert request.', 'memberlite' ) );
			}

			$before = count( memberlite_get_alert_items( $alert, true ) );
			call_user_func( $alert['action']['callback'] );
			$after  = count( memberlite_get_alert_items( $alert, true ) );

			$args['memberlite_alert_fixed']     = max( 0, $before - $after );
			$args['memberlite_alert_remaining'] = $after;
			break;

		case 'dismiss':
			$dismissed[ $alert_id ] = memberlite_get_alert_item_keys( memberlite_get_alert_items( $alert ) );
			update_option( 'memberlite_dismissed_alerts', $dismissed, false );
			break;

		case 'restore':
			unset( $dismissed[ $alert_id ] );
			update_option( 'memberlite_dismissed_alerts', $dismissed, false );
			break;
	}

	memberlite_clear_alert_count();

	wp_safe_redirect( add_query_arg( $args, admin_url( 'admin.php' ) ) );
	exit;
}
add_action( 'admin_post_memberlite_alert', 'memberlite_handle_alert_action' );
