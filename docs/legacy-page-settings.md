# Legacy Page Settings

Memberlite 8.0 removed the **Memberlite Settings** meta box from the page editor, along with the **Landing Page** template. Memberlite no longer shows any of these settings:

* Banner description, banner right column and page bottom banner
* Extra banner padding
* Page icon and "Show Icon in Banner Title"
* Landing Page membership level, checkout button text and level upsell

The banner settings that are still supported (show or hide the banner, title and breadcrumbs, text alignment) are in the block editor's Page Settings panel.

## What happens to the saved values

`memberlite_migrate_legacy_page_fields()` (in `inc/page_banners.php`) runs on the 8.0 update. The meta box saved every field on every save, so most rows only hold "not set" values (`''`, `0`, `blank`). Those are deleted. Values that were set move to a custom field without the leading underscore, so they show in the block editor's Custom Fields panel (turn on Custom fields in the editor Preferences) and code can still read them:

| Old meta key | Custom field | Kept when |
| --- | --- | --- |
| `_memberlite_banner_desc` | `memberlite_banner_desc` | not empty |
| `_memberlite_banner_right` | `memberlite_banner_right` | not empty |
| `_memberlite_banner_bottom` | `memberlite_banner_bottom` | not empty |
| `_memberlite_banner_extra_padding` | `memberlite_banner_extra_padding` | `1` |
| `_memberlite_page_icon` | `memberlite_page_icon` | not empty or `blank` |
| `_memberlite_banner_icon` | `memberlite_banner_icon` | `1`, and the page has a page icon |
| `_pmproal_landing_page_level` | `memberlite_landing_page_level` | not empty or `0` |
| `_memberlite_landing_page_checkout_button` | `memberlite_landing_page_checkout_button` | not empty |
| `_memberlite_landing_page_upsell` | `memberlite_landing_page_upsell` | not empty or `0` |

If a post already has the custom field, its old field is deleted and the custom field keeps its value. The migration is safe to run again: **Memberlite > Alerts** offers it whenever posts with the old fields show up, e.g. after importing content from an older site. A second alert lists the posts that still have the custom fields, so site owners can decide whether to delete them or add a recipe below. See [Alerts](alerts.md).

Pages on the Landing Page template move to the default template with the Right Sidebar layout, which is what the template showed (`memberlite_migrate_legacy_layout_templates()`).

`_pmproal_landing_page_level` is also the key the Advanced Levels Page Shortcode Add On's `pmproal_getLevelLandingPage()` helper looks up. Nothing in that Add On calls the helper, but custom code that does will stop finding landing pages.

### Instead of the Landing Page template

Paid Memberships Pro's blocks cover what the template did. Put them in the page content:

* **Membership Checkout Button** for the checkout button
* **Single Membership Level**, with **Level Price** and **Level Description** inside it, for the level details
* The Advanced Levels Page Shortcode Add On's `[pmpro_advanced_levels]` shortcode for the upsell

## Code recipes

Each recipe below shows one setting again, from its custom field, on pages only (the meta box was only on pages). Add the ones you need to a child theme's `functions.php` or a code snippets plugin. Anyone who can edit a post can add custom fields to it, so the recipes run each value through `wp_kses_post()` before showing it. They use Memberlite's masthead hooks (`memberlite_after_masthead_inner`, `memberlite_after_content`, `memberlite_after_content_page`) and the `memberlite_get_page_title` filter.

### Banner description

Shows below the page title, as before.

```php
/**
 * Show the banner description below the page title.
 */
function my_memberlite_show_banner_description() {
	$post_id = memberlite_get_banner_post_id();
	if ( empty( $post_id ) || 'page' !== get_post_type( $post_id ) ) {
		return;
	}

	$description = get_post_meta( $post_id, 'memberlite_banner_desc', true );
	if ( '' === trim( (string) $description ) ) {
		return;
	}

	echo '<div class="masthead-description">' . wp_kses_post( wpautop( do_shortcode( $description ) ) ) . '</div>';
}
add_action( 'memberlite_after_masthead_inner', 'my_memberlite_show_banner_description' );
```

### Banner right column

Memberlite 7.2 already stopped showing this column. This shows it below the banner description instead of beside it.

```php
/**
 * Show the banner right column content below the banner description.
 */
function my_memberlite_show_banner_right() {
	$post_id = memberlite_get_banner_post_id();
	if ( empty( $post_id ) || 'page' !== get_post_type( $post_id ) ) {
		return;
	}

	$content = get_post_meta( $post_id, 'memberlite_banner_right', true );
	if ( '' === trim( (string) $content ) ) {
		return;
	}

	echo '<div class="masthead-right">' . wp_kses_post( wpautop( do_shortcode( $content ) ) ) . '</div>';
}
add_action( 'memberlite_after_masthead_inner', 'my_memberlite_show_banner_right', 15 );
```

### Page bottom banner

Shows above the footer, as before. Memberlite no longer has any `#banner_bottom` styles, so the recipe adds its own (also hidden when printing).

```php
/**
 * Show the page bottom banner above the footer.
 */
function my_memberlite_show_banner_bottom() {
	$post_id = memberlite_get_banner_post_id();
	if ( empty( $post_id ) || 'page' !== get_post_type( $post_id ) ) {
		return;
	}

	$content = get_post_meta( $post_id, 'memberlite_banner_bottom', true );
	if ( '' === trim( (string) $content ) ) {
		return;
	}
	?>
	<div id="banner_bottom">
		<div class="row"><div class="large-12 columns">
			<?php echo apply_filters( 'the_content', wp_kses_post( $content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div></div>
	</div>
	<?php
}
add_action( 'memberlite_after_content', 'my_memberlite_show_banner_bottom' );

function my_memberlite_banner_bottom_css() {
	wp_add_inline_style( 'memberlite_style', '
		#banner_bottom { background-color: var(--memberlite-color-secondary); color: var(--memberlite-color-white); padding: 4rem 0; }
		#banner_bottom p { font-size: var(--wp--preset--font-size--21); }
		#banner_bottom :is(h1, h2, h3, h4, h5) { color: var(--memberlite-color-white); margin: 0 0 1.6rem 0; }
		#banner_bottom :is(h1, h2, h3, h4, h5) a { color: var(--memberlite-color-white); text-decoration: none; border-bottom: 1px dotted var(--memberlite-color-white); }
		@media print { #banner_bottom { display: none; } }
	' );
}
add_action( 'wp_enqueue_scripts', 'my_memberlite_banner_bottom_css', 20 );
```

### Extra banner padding

```php
/**
 * Add extra masthead padding on pages with the memberlite_banner_extra_padding custom field.
 */
function my_memberlite_banner_extra_padding_class( $classes ) {
	$post_id = memberlite_get_banner_post_id();
	if ( ! empty( $post_id ) && 'page' === get_post_type( $post_id ) && get_post_meta( $post_id, 'memberlite_banner_extra_padding', true ) ) {
		$classes[] = 'memberlite-banner-extra-padding';
	}

	return $classes;
}
add_filter( 'body_class', 'my_memberlite_banner_extra_padding_class' );

function my_memberlite_banner_extra_padding_css() {
	wp_add_inline_style( 'memberlite_style', '.memberlite-banner-extra-padding .masthead .row > .columns { padding-top: var(--wp--preset--spacing--50); padding-bottom: var(--wp--preset--spacing--50); }' );
}
add_action( 'wp_enqueue_scripts', 'my_memberlite_banner_extra_padding_css', 20 );
```

### Page icon in the banner title

Shows the icon inside the page title. Needs both `memberlite_page_icon` and `memberlite_banner_icon`.

```php
/**
 * Show the page icon before the page title.
 */
function my_memberlite_show_page_icon( $title_html ) {
	$post_id = memberlite_get_banner_post_id();
	if ( empty( $post_id ) || 'page' !== get_post_type( $post_id ) || ! get_post_meta( $post_id, 'memberlite_banner_icon', true ) ) {
		return $title_html;
	}

	$icon = get_post_meta( $post_id, 'memberlite_page_icon', true );
	if ( empty( $icon ) ) {
		return $title_html;
	}

	$icon_html = do_shortcode( '[fa icon="' . esc_attr( $icon ) . '"]' );

	return preg_replace( '/(<h1[^>]*>)/', '$1' . $icon_html . ' ', $title_html, 1 );
}
add_filter( 'memberlite_get_page_title', 'my_memberlite_show_page_icon' );
```

### Landing page level, price and checkout button

Shows the level price and checkout button in the masthead (and the level description when the page has no banner description), and the checkout button and level upsell after the page content. The template also showed the featured image in the masthead; this recipe leaves that out.

```php
/**
 * Show a landing page's membership level price and checkout button in the masthead,
 * and the checkout button and level upsell after the page content.
 * Requires Paid Memberships Pro. The upsell requires the Advanced Levels Page Shortcode Add On.
 */
function my_memberlite_get_landing_page_level() {
	if ( ! is_page() || ! function_exists( 'pmpro_getLevel' ) ) {
		return false;
	}

	$level_id = (int) get_post_meta( get_queried_object_id(), 'memberlite_landing_page_level', true );

	return $level_id ? pmpro_getLevel( $level_id ) : false;
}

function my_memberlite_get_landing_page_button( $level ) {
	$text = get_post_meta( get_queried_object_id(), 'memberlite_landing_page_checkout_button', true );
	if ( empty( $text ) ) {
		$text = __( 'Select', 'memberlite' );
	}

	return '<p><a class="btn btn_action" href="' . esc_url( add_query_arg( 'level', $level->id, pmpro_url( 'checkout' ) ) ) . '">' . esc_html( $text ) . '</a></p>';
}

function my_memberlite_landing_page_masthead() {
	$level = my_memberlite_get_landing_page_level();
	if ( empty( $level ) ) {
		return;
	}

	// The level description showed when the page had no banner description.
	if ( '' === trim( (string) get_post_meta( get_queried_object_id(), 'memberlite_banner_desc', true ) ) ) {
		echo wp_kses_post( wpautop( do_shortcode( $level->description ) ) );
	}

	echo '<p class="pmpro_level-price">' . wp_kses_post( pmpro_getLevelCost( $level, true, true ) ) . '</p>';
	echo my_memberlite_get_landing_page_button( $level ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
add_action( 'memberlite_after_masthead_inner', 'my_memberlite_landing_page_masthead', 20 );

function my_memberlite_landing_page_css() {
	wp_add_inline_style( 'memberlite_style', '.masthead .pmpro_level-price { font-size: var(--wp--preset--font-size--36); } .masthead .pmpro_level-subprice { display: block; font-size: var(--wp--preset--font-size--18); }' );
}
add_action( 'wp_enqueue_scripts', 'my_memberlite_landing_page_css', 20 );

function my_memberlite_landing_page_after_content() {
	$level = my_memberlite_get_landing_page_level();
	if ( empty( $level ) ) {
		return;
	}

	echo my_memberlite_get_landing_page_button( $level ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$upsell = (int) get_post_meta( get_queried_object_id(), 'memberlite_landing_page_upsell', true );
	if ( $upsell && shortcode_exists( 'pmpro_advanced_levels' ) ) {
		echo '<hr />';
		echo do_shortcode( '[pmpro_advanced_levels levels="' . $upsell . '" back_link="false"]' );
	}
}
add_action( 'memberlite_after_content_page', 'my_memberlite_landing_page_after_content' );
```
