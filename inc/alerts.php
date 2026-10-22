<?php
/**
 * Memberlite > Alerts: things a site admin should review, usually after an update.
 *
 * Each alert checks the site live and lists what needs attention, so it resolves itself
 * once the items are fixed. An alert can offer an action (e.g. rerun a migration) and
 * can be dismissed. A dismissed alert comes back if it finds more items than when it was
 * dismissed. The page is in adminpages/alerts.php.
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
	 *                          `label`, and optional `url` (e.g. an edit link) and `details`.
	 * - action      (array)    Optional fix the admin can run from the page: `label`,
	 *                          `callback` (called with no arguments) and `description`.
	 *                          It should be safe to run more than once.
	 * - docs_url    (string)   Optional link to documentation or a code recipe.
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
 * @since TBD
 *
 * @param array $alert Alert from memberlite_get_alerts().
 * @return array Items that need attention.
 */
function memberlite_get_alert_items( array $alert ): array {
	$items = call_user_func( $alert['check'] );

	return is_array( $items ) ? array_values( $items ) : array();
}

/**
 * Get the dismissed alerts.
 *
 * @since TBD
 * @return array Item count at dismissal, keyed by alert ID.
 */
function memberlite_get_dismissed_alerts(): array {
	$dismissed = get_option( 'memberlite_dismissed_alerts', array() );

	return is_array( $dismissed ) ? $dismissed : array();
}

/**
 * Check whether an alert is dismissed.
 *
 * @since TBD
 *
 * @param string $alert_id   Alert ID.
 * @param int    $item_count Number of items the alert reports now.
 * @return bool True if dismissed and no new items have shown up since.
 */
function memberlite_is_alert_dismissed( string $alert_id, int $item_count ): bool {
	$dismissed = memberlite_get_dismissed_alerts();

	return isset( $dismissed[ $alert_id ] ) && $item_count <= (int) $dismissed[ $alert_id ];
}

/**
 * Count the alerts that need attention: alerts with items that aren't dismissed.
 *
 * Cached for an hour, and cleared when an alert is run, dismissed or restored, or the
 * Alerts page is viewed.
 *
 * @since TBD
 * @return int
 */
function memberlite_get_alert_count(): int {
	$count = get_transient( 'memberlite_alert_count' );

	if ( false === $count ) {
		$count = 0;
		foreach ( memberlite_get_alerts() as $alert ) {
			$item_count = count( memberlite_get_alert_items( $alert ) );
			if ( $item_count && ! memberlite_is_alert_dismissed( $alert['id'], $item_count ) ) {
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
	global $menu, $submenu;

	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
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

			$before = count( memberlite_get_alert_items( $alert ) );
			call_user_func( $alert['action']['callback'] );
			$after  = count( memberlite_get_alert_items( $alert ) );

			$args['memberlite_alert_fixed']     = max( 0, $before - $after );
			$args['memberlite_alert_remaining'] = $after;
			break;

		case 'dismiss':
			$dismissed[ $alert_id ] = count( memberlite_get_alert_items( $alert ) );
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
