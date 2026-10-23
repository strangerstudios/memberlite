# Alerts

**Memberlite > Alerts** lists things a site admin should review, usually after an update: content an update moved, settings that no longer do anything, pages that need a migration rerun after an import.

Code: `inc/alerts.php` (registry, count, actions; loaded on every request so the count clears on theme switch) and `adminpages/alerts.php` (the page).

## How an alert works

* **Checked live.** Each alert has a `check` callback that queries the site and returns the items that need attention. Nothing is stored, so an alert resolves itself once its items are fixed, and comes back if an import or restore brings the problem back.
* **Optional action.** An alert can offer one fix the admin runs from the page, e.g. rerunning a migration. The action must be safe to run more than once. After it runs, the page reports how many items it fixed and how many are still listed.
* **Dismissible.** Dismissing stores which items the alert listed (by item `id`, else `url`, else `label`) in the `memberlite_dismissed_alerts` option (site-wide). Give items an `id`: it's the stable key. A `url` key includes the site domain, so dismissals keyed by `url` come back if the site moves. The alert returns as soon as it lists an item that wasn't in that set. Fixed items drop out of the set (`memberlite_sync_alert_dismissal()`), so they show again if they come back, and the dismissal is cleared once the alert resolves. Dismissed and resolved alerts stay on the page, collapsed.
* **Menu count.** Alerts with items that aren't dismissed are counted in a bubble on the Memberlite menu, its Alerts item and the Alerts tab. The count is cached in the `memberlite_alert_count` transient for an hour. It's cleared when an alert is run, dismissed or restored, when the Alerts page loads, when any post is saved or deleted, when post meta listed by the `memberlite_alert_meta_keys` filter changes, after a Memberlite update, and on theme switch. Checks only run when that cache is empty or on the Alerts page, and each alert is checked once per request.
* **Skipped posts.** Use `memberlite_is_alert_post()` to leave trashed posts, auto-drafts and meta of deleted posts out of an alert's items.

Actions, dismissals and restores post to `admin-post.php` (`action=memberlite_alert`) and need `edit_theme_options` and a per-alert nonce.

## Adding an alert

`memberlite_alerts` is internal for now: the item format and how dismissals are stored may still change. Add each alert with it from Memberlite's own code, next to the code the alert reports on. For example, the removed layout templates alert lives in `inc/layout.php` beside `memberlite_migrate_legacy_layout_templates()`, which the update and the alert's action share.

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
			'id'      => $post->ID,                          // Optional, but recommended. Dismissals remember items by it.
			'label'   => get_the_title( $post ),
			'url'     => get_edit_post_link( $post, 'raw' ), // Optional.
			'details' => __( 'Uses my_old_key', 'memberlite' ), // Optional.
		);
	}
	return $items;
}
```

If the alert reports on post meta, add its keys with the `memberlite_alert_meta_keys` filter so the menu count refreshes when they change:

```php
function my_alert_meta_keys( $meta_keys ) {
	$meta_keys[] = 'my_old_key';
	return $meta_keys;
}
add_filter( 'memberlite_alert_meta_keys', 'my_alert_meta_keys' );
```

Keep checks to a query or two, and prime the post caches (`_prime_post_caches()`) before looping over many posts: checks run on the Alerts page and whenever the menu count cache is rebuilt. The page lists the first 50 items of an alert and counts the rest.

## Current alerts

| ID | Added in | Reports | Action |
| --- | --- | --- | --- |
| `legacy_layout_templates` | 8.0 | Pages still on a removed layout page template (Content/Sidebar, Sidebar/Content, Narrow Width, Full Width, Fluid Width) that the active theme doesn't register | Reruns `memberlite_migrate_legacy_layout_templates()` |
