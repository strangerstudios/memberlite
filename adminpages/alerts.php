<?php
/**
 * Alerts Page for Memberlite Theme
 *
 * @package Memberlite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Settings page for Memberlite > Alerts
 *
 * @since 8.0
 */
function memberlite_alerts_page() {
	/**
	 * Load the Memberlite dashboard-area header
	 */
	require_once __DIR__ . '/admin_header.php';

	$alerts    = memberlite_get_alerts();
	$active    = array();
	$dismissed = array();
	$resolved  = array();

	foreach ( $alerts as $alert ) {
		$status         = memberlite_get_alert_status( $alert );
		$alert['items'] = $status['items'];
		memberlite_sync_alert_dismissal( $alert['id'], $status['items'] );

		if ( 'resolved' === $status['status'] ) {
			$resolved[] = $alert;
		} elseif ( 'dismissed' === $status['status'] ) {
			$dismissed[] = $alert;
		} else {
			$active[] = $alert;
		}
	}
	?>

	<hr class="wp-header-end">

	<h1><?php esc_html_e( 'Memberlite Alerts', 'memberlite' ); ?></h1>
	<p><?php esc_html_e( 'Memberlite checks your site for things to review, such as content an update changed or settings that are no longer used. Each alert updates as you fix what it lists.', 'memberlite' ); ?></p>

	<?php
	$notice_alert = isset( $_GET['memberlite_alert'] ) ? sanitize_key( wp_unslash( $_GET['memberlite_alert'] ) ) : '';
	$notice_code  = isset( $_GET['memberlite_alert_notice'] ) ? sanitize_key( wp_unslash( $_GET['memberlite_alert_notice'] ) ) : '';

	if ( $notice_code && ! empty( $alerts[ $notice_alert ] ) ) {
		$title   = $alerts[ $notice_alert ]['title'];
		$message = '';

		switch ( $notice_code ) {
			case 'run':
				$fixed     = isset( $_GET['memberlite_alert_fixed'] ) ? absint( $_GET['memberlite_alert_fixed'] ) : 0;
				$remaining = isset( $_GET['memberlite_alert_remaining'] ) ? absint( $_GET['memberlite_alert_remaining'] ) : 0;
				/* translators: 1: Alert title, 2: Number of items fixed, 3: Number of items still listed. */
				$message = sprintf( __( 'Ran the fix for "%1$s". Fixed: %2$s. Still listed: %3$s.', 'memberlite' ), $title, number_format_i18n( $fixed ), number_format_i18n( $remaining ) );
				break;
			case 'dismiss':
				/* translators: %s: Alert title. */
				$message = sprintf( __( 'Dismissed "%s". It will come back if Memberlite finds something it didn\'t list.', 'memberlite' ), $title );
				break;
			case 'restore':
				/* translators: %s: Alert title. */
				$message = sprintf( __( 'Restored "%s".', 'memberlite' ), $title );
				break;
		}

		if ( $message ) {
			printf( '<div class="notice notice-success is-dismissible"><p>%s</p></div>', esc_html( $message ) );
		}
	}

	if ( empty( $alerts ) ) {
		?>
		<div class="memberlite_section">
			<div class="memberlite_section_inside">
				<p><?php esc_html_e( 'There are no alerts for this site.', 'memberlite' ); ?></p>
			</div>
		</div>
		<?php
	}

	foreach ( $active as $alert ) {
		memberlite_alerts_page_section( $alert, 'active' );
	}

	foreach ( $dismissed as $alert ) {
		memberlite_alerts_page_section( $alert, 'dismissed' );
	}

	foreach ( $resolved as $alert ) {
		memberlite_alerts_page_section( $alert, 'resolved' );
	}

	/**
	 * Load the Memberlite dashboard-area footer
	 */
	require_once __DIR__ . '/admin_footer.php';
}

/**
 * Show one alert on Memberlite > Alerts.
 *
 * Active alerts start open. Dismissed and resolved alerts start collapsed.
 *
 * @since 8.0
 *
 * @param array  $alert  Alert from memberlite_get_alerts(), with its `items`.
 * @param string $status 'active', 'dismissed' or 'resolved'.
 * @return void
 */
function memberlite_alerts_page_section( array $alert, string $status ) {
	$is_open  = 'active' === $status;
	$statuses = array(
		'active'    => array( 'icon' => 'warning', 'label' => __( 'Needs attention', 'memberlite' ) ),
		'dismissed' => array( 'icon' => 'hidden', 'label' => __( 'Dismissed', 'memberlite' ) ),
		'resolved'  => array( 'icon' => 'yes-alt', 'label' => __( 'Resolved', 'memberlite' ) ),
	);

	// Long lists are cut short; the count still covers every item.
	$max_items   = 50;
	$item_count  = count( $alert['items'] );
	$shown_items = array_slice( $alert['items'], 0, $max_items );
	?>
	<div id="memberlite_alert_<?php echo esc_attr( $alert['id'] ); ?>" class="memberlite_section memberlite_alert memberlite_alert-<?php echo esc_attr( $status ); ?>" data-visibility="<?php echo $is_open ? 'shown' : 'hidden'; ?>" data-activated="true">
		<div class="memberlite_section_toggle">
			<button class="memberlite_section-toggle-button" type="button" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>">
				<span class="dashicons dashicons-arrow-<?php echo $is_open ? 'up' : 'down'; ?>-alt2"></span>
				<span class="memberlite_alert-status"><span class="dashicons dashicons-<?php echo esc_attr( $statuses[ $status ]['icon'] ); ?>" aria-hidden="true"></span><?php echo esc_html( $statuses[ $status ]['label'] ); ?></span>
				<?php echo esc_html( $alert['title'] ); ?>
				<?php if ( $item_count ) { ?>
					<span class="memberlite_alert-count">(<?php echo esc_html( number_format_i18n( $item_count ) ); ?>)</span>
				<?php } ?>
			</button>
		</div>
		<div class="memberlite_section_inside"<?php echo $is_open ? '' : ' style="display: none;"'; ?>>
			<?php if ( ! empty( $alert['since'] ) ) { ?>
				<p class="description">
					<?php
					/* translators: %s: Memberlite version. */
					echo esc_html( sprintf( __( 'Since Memberlite %s', 'memberlite' ), $alert['since'] ) );
					?>
				</p>
			<?php } ?>

			<?php if ( ! empty( $alert['description'] ) ) { ?>
				<?php echo wp_kses_post( wpautop( $alert['description'] ) ); ?>
			<?php } ?>

			<?php if ( $item_count ) { ?>
				<ul class="memberlite_alert-items">
					<?php foreach ( $shown_items as $item ) { ?>
						<li>
							<?php if ( ! empty( $item['url'] ) ) { ?>
								<a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
							<?php } else { ?>
								<?php echo esc_html( $item['label'] ); ?>
							<?php } ?>
							<?php if ( ! empty( $item['details'] ) ) { ?>
								<span class="memberlite_alert-item-details"><?php echo esc_html( $item['details'] ); ?></span>
							<?php } ?>
						</li>
					<?php } ?>
				</ul>
				<?php if ( $item_count > $max_items ) { ?>
					<p>
						<?php
						/* translators: %s: Number of items not listed. */
						echo esc_html( sprintf( _n( 'And %s more.', 'And %s more.', $item_count - $max_items, 'memberlite' ), number_format_i18n( $item_count - $max_items ) ) );
						?>
					</p>
				<?php } ?>
			<?php } else { ?>
				<p><?php esc_html_e( 'Nothing needs attention.', 'memberlite' ); ?></p>
			<?php } ?>

			<?php if ( ! empty( $alert['action']['description'] ) && $item_count ) { ?>
				<p><?php echo wp_kses_post( $alert['action']['description'] ); ?></p>
			<?php } ?>

			<?php if ( ! empty( $alert['docs_url'] ) || $item_count ) { ?>
				<div class="memberlite_section_actions">
					<?php if ( ! empty( $alert['action'] ) && $item_count ) { ?>
						<?php memberlite_alerts_page_button( $alert['id'], 'run', $alert['action']['label'], 'button button-primary' ); ?>
					<?php } ?>
					<?php if ( ! empty( $alert['docs_url'] ) ) { ?>
						<a class="button" href="<?php echo esc_url( $alert['docs_url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Learn more', 'memberlite' ); ?></a>
					<?php } ?>
					<?php if ( 'active' === $status ) { ?>
						<?php memberlite_alerts_page_button( $alert['id'], 'dismiss', __( 'Dismiss', 'memberlite' ), 'button-link' ); ?>
					<?php } elseif ( 'dismissed' === $status ) { ?>
						<?php memberlite_alerts_page_button( $alert['id'], 'restore', __( 'Show again', 'memberlite' ), 'button-link' ); ?>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php
}

/**
 * Show a form button that runs, dismisses or restores an alert.
 *
 * @since 8.0
 *
 * @param string $alert_id     Alert ID.
 * @param string $alert_action 'run', 'dismiss' or 'restore'.
 * @param string $label        Button text.
 * @param string $class        Button classes.
 * @return void
 */
function memberlite_alerts_page_button( string $alert_id, string $alert_action, string $label, string $class ) {
	?>
	<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
		<input type="hidden" name="memberlite_alert_nonce" value="<?php echo esc_attr( wp_create_nonce( 'memberlite_alert_' . $alert_action . '_' . $alert_id ) ); ?>" />
		<input type="hidden" name="action" value="memberlite_alert" />
		<input type="hidden" name="memberlite_alert" value="<?php echo esc_attr( $alert_id ); ?>" />
		<input type="hidden" name="memberlite_alert_action" value="<?php echo esc_attr( $alert_action ); ?>" />
		<button type="submit" class="<?php echo esc_attr( $class ); ?>"><?php echo esc_html( $label ); ?></button>
	</form>
	<?php
}
