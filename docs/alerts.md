# Alerts

**Memberlite > Alerts** lists things a site admin should review, usually after an update: content an update moved, settings that no longer do anything, pages that need a migration rerun after an import.

Code: `inc/alerts.php` (registry, count, actions; loaded on every request so the count clears on theme switch) and `adminpages/alerts.php` (the page).

## How an alert works

* **Checked live.** Each alert has a `check` callback that queries the site and returns the items that need attention. Nothing is stored, so an alert resolves itself once its items are fixed, and comes back if an import or restore brings the problem back.
* **Optional action.** An alert can offer one fix the admin runs from the page, e.g. rerunning a migration. The action must be safe to run more than once. After it runs, the page reports how many items it fixed and how many are still listed.
* **Dismissible.** Dismissing stores the item count at that moment in the `memberlite_dismissed_alerts` option (site-wide). The stored count drops as items are fixed, and the dismissal is cleared once the alert resolves, so the alert returns whenever it finds more items than the lowest count since it was dismissed. Dismissed and resolved alerts stay on the page, collapsed.
* **Menu count.** Alerts with items that aren't dismissed are counted in a bubble on the Memberlite menu, its Alerts item and the Alerts tab. The count is cached in the `memberlite_alert_count` transient for an hour and cleared when an alert is run, dismissed or restored, when the Alerts page loads, and on theme switch. Checks only run when that cache is empty or on the Alerts page.
* **Skipped posts.** Use `memberlite_is_alert_post()` to leave trashed posts, auto-drafts and meta of deleted posts out of an alert's items.

Actions, dismissals and restores post to `admin-post.php` (`action=memberlite_alert`) and need `edit_theme_options` and a per-alert nonce.

## Adding an alert

Add it with the `memberlite_alerts` filter, next to the code it reports on. For example, the removed layout templates alert lives in `inc/layout.php` beside `memberlite_migrate_legacy_layout_templates()`, which the update and the alert's action share.

```php
function my_add_alert( array $alerts ): array {
	$alerts['my_alert'] = array(
		'title'       => __( 'Short summary of the problem', 'memberlite' ),
		'description' => __( 'What happened and what to do about it.', 'memberlite' ),
		'since'       => '8.0',
		'check'       => 'my_alert_check', // Returns items, or an empty array when resolved.
		'action'      => array(            // Optional.
			'label'       => __( 'Fix it', 'memberlite' ),
			'callback'    => 'my_alert_fix', // Called with no arguments.
			'description' => __( 'What the fix does.', 'memberlite' ),
		),
		'docs_url'    => '',               // Optional "Learn more" link.
	);

	return $alerts;
}
add_filter( 'memberlite_alerts', 'my_add_alert' );

function my_alert_check(): array {
	$items = array();
	foreach ( get_posts( array( 'post_type' => 'page', 'meta_key' => 'my_old_key', 'post_status' => 'any', 'numberposts' => -1 ) ) as $post ) { // 'any' already skips trash and auto-drafts.
		$items[] = array(
			'label'   => get_the_title( $post ),
			'url'     => get_edit_post_link( $post, 'raw' ), // Optional.
			'details' => __( 'Uses my_old_key', 'memberlite' ), // Optional.
		);
	}
	return $items;
}
```

Keep checks to a query or two: they run on the Alerts page and whenever the menu count cache is rebuilt. The page lists the first 50 items of an alert and counts the rest.

## Current alerts

| ID | Added in | Reports | Action |
| --- | --- | --- | --- |
| `legacy_layout_templates` | 8.0 | Pages still on a removed layout page template (Content/Sidebar, Sidebar/Content, Narrow Width, Full Width, Fluid Width) that the active theme doesn't register | Reruns `memberlite_migrate_legacy_layout_templates()` |
