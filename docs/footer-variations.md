# Footer Variations

This document covers the footer variations system introduced in Memberlite 7.1. It replaces the legacy widget-area footer with a CPT-based system that lets site owners design and assign distinct footers per location using the block editor and Customizer.

## Table of Contents

1. [Overview](#overview)
2. [Architecture](#architecture)
3. [Resolver Priority Chain](#resolver-priority-chain)
4. [Customizer Controls](#customizer-controls)
5. [The Global Sentinel Value](#the-global-sentinel-value)
6. [Per-Page Override (Pages Only)](#per-page-override-pages-only)
7. [Footer Patterns](#footer-patterns)
8. [Transient Cache](#transient-cache)
9. [Default Footer Fallback](#default-footer-fallback)
10. [Admin List Table](#admin-list-table)
11. [Key Files](#key-files)

---

## Overview

Footer variations are powered by the `memberlite_footer` custom post type. Each post is a fully block-editable footer layout. Site owners create footer designs in the WordPress editor, then assign them globally or per-location via Appearance > Customize.

**Key properties:**
- Footers are stored as CPT posts, not PHP templates or widget areas
- Content is rendered via `do_blocks()` + `do_shortcode()`
- Settings store the footer's `post_name` (slug), not its ID, so they are portable across environments (dev → staging → production)
- The default widget-area footer remains available as a fallback (value `'0'`)

---

## Architecture

```
memberlite_footer CPT (source of truth)
        ↓
memberlite_get_current_footer_post_name() — resolves which footer to show
        ↓
memberlite_render_footer_variation() — renders the resolved post's block content
        ↓
footer.php — calls the above; falls back to the default footer template if post_name is '0'
             (or if the footer post cannot be rendered)
```

`footer.php` wraps the footer in `<footer id="colophon">` with two possible classes:
- `site-footer site-footer-{post_name}` — when a CPT footer is active
- `site-footer site-footer-default` — when the default (widget-area) footer is active

The default footer is rendered via `get_template_part( 'components/footer/variation', 'default' )`, which loads `components/footer/variation-default.php` (widget areas, navigation, site info).

The footer can be hidden entirely on individual pages via the `_memberlite_hide_footer` post meta, checked by `memberlite_hide_page_footer()` (registered in `inc/editor-settings.php`).

### CPT Registration

Registered in `inc/custom-post-types.php`. The CPT is not public-facing — it has no archive, no frontend URL, and is only accessible in the admin. `show_in_rest` is enabled for block editor support. All capabilities are mapped to `edit_theme_options` so only admins can manage footers.

---

## Resolver Priority Chain

`memberlite_get_current_footer_post_name()` in `inc/variations.php` resolves the footer for each request using this priority order (highest to lowest):

1. **Per-page post meta** (`_memberlite_footer_override`) — set per **page** in the block editor's document settings panel. Only applies on `is_singular('page')`; has no effect on single posts, archives, or other contexts.
2. **Location-specific theme mod** — one of `memberlite_post_footer_slug`, `memberlite_page_footer_slug`, or `memberlite_archives_footer_slug`, depending on the current context.
3. **Global theme mod** (`memberlite_global_footer_slug`) — the site-wide default, used when the location mod is set to inherit.
4. **Default footer** — rendered when the resolved value is `'0'`.

If the resolved post_name no longer exists (e.g., the footer post was deleted), the resolver falls back to `'0'` rather than rendering nothing.

---

## Customizer Controls

All controls live in the **Footer** panel under Appearance > Customize.

| Setting key | Label | Options |
|---|---|---|
| `memberlite_global_footer_slug` | Global Footer | "— Default —" + all published footer posts |
| `memberlite_archives_footer_slug` | Blog & Archives Footer | "— Use Global Footer —" + all published footer posts |
| `memberlite_post_footer_slug` | Single Post Footer | "— Use Global Footer —" + all published footer posts |
| `memberlite_page_footer_slug` | Pages Footer | "— Use Global Footer —" + all published footer posts |

**Important distinction**: The "— Default —" option (`'0'`) is only available on the **global** control. Location-specific controls can defer to the global setting (which may itself be `'0'`) but cannot independently select the default footer. This encourages use of the block-based footer system.

A **"Manage Footers"** link in the panel navigates directly to the `memberlite_footer` post list screen.

### How choices are built

`memberlite_get_footer_variations()` returns only published CPT footer posts as a `slug => title` array, alphabetical by title. It never includes sentinels — each consumer adds its own:

- **Customizer global control** — always prepends `'0' => '— Default —'` alongside any CPT footers.
- **Customizer location controls** — prepend `'memberlite-global-footer' => '— Use Global Footer —'`.
- **Editor sidebar** — prepends `'' => '— Use Global Footer —'`.

---

## The Global Sentinel Value

Location-specific controls use the string `'memberlite-global-footer'` as a sentinel meaning "inherit from the global setting." This is distinct from `'0'` (default) and from any real footer post_name.

- **`'memberlite-global-footer'`** → read `memberlite_global_footer_slug` and use that value
- **`'0'`** → use the default widget-area footer (only reachable via the global control)
- **any other string** → a footer post_name; look up and render that post

The sentinel is namespaced to avoid accidental collision with a user-created footer slug. The auto-title function generates slugs like `footer-{post_id}`, so natural collisions are not possible.

---

## Per-Page Override (Pages Only)

Individual **pages** can override the Customizer footer selection via the `_memberlite_footer_override` post meta key. This is exposed as a select control in the block editor's document settings panel.

- The meta key is registered for the `'page'` post type only (in `inc/editor-settings.php`).
- The resolver checks this override only on `is_singular('page')` — it has no effect on single posts, archives, or other templates.
- Only valid footer post_names are honoured; an invalid or stale value (e.g., a deleted footer) is silently ignored and the resolver falls through to the Customizer settings.
- An empty string means "use site default" (no override).

---

## Footer Patterns

Eight starter footer designs are registered as block patterns scoped to the `memberlite_footer` CPT. They appear in the block inserter when editing a footer post and as layout choices when creating a new footer post.

These patterns differ from general Memberlite patterns in one key way: they carry `Post Types: memberlite_footer` in their metadata, which scopes them exclusively to the footer CPT editor. They do not appear in the general page/post inserter.

Pattern files live in `patterns/` alongside all other Memberlite patterns and follow the same file format. See [patterns.md](patterns.md) for general pattern authoring guidelines.

---

## Transient Cache

`memberlite_get_footer_variations()` caches its result in the `memberlite_footer_variations` transient for **12 hours** to avoid repeated `get_posts()` queries on every page load (including every Customizer preview request).

The cache is busted automatically whenever:

- A `memberlite_footer` post is **saved, updated, published, trashed, or untrashed** — via `save_post_memberlite_footer`
- A `memberlite_footer` post is **permanently deleted** — via `deleted_post` (with a post type check, since that hook is not post-type-specific)

Both hooks call `memberlite_flush_footer_variations_cache()`, which simply calls `delete_transient( 'memberlite_footer_variations' )`.

---

## Default Footer Fallback

The default footer (widget areas, navigation, site info) continues to render whenever `memberlite_get_current_footer_post_name()` returns `'0'`. This happens when:

- No `memberlite_footer` posts exist at all
- The global footer setting is explicitly set to "— Default —"
- The resolved post_name is invalid (post was deleted after being assigned)

The Customizer's "Default Footer Settings" heading and the copyright text control both use `memberlite_is_global_footer_default()` as their `active_callback`. This function returns `true` when `memberlite_global_footer_slug` equals `'0'`. When the global is set to any CPT footer, these legacy controls are hidden.

```php
function memberlite_is_global_footer_default(): bool {
    return get_theme_mod( 'memberlite_global_footer_slug', '0' ) === '0';
}
```

---

## Admin List Table

The `memberlite_footer` list table (Memberlite > Footers) includes a **"Used By"** column showing where each footer is currently assigned.

### What is shown

`memberlite_get_footer_assignments( $post_name )` in `inc/admin.php` checks:

1. **The four theme mod controls** — `memberlite_global_footer_slug`, `memberlite_archives_footer_slug`, `memberlite_post_footer_slug`, `memberlite_page_footer_slug`. Each match produces a linked label (e.g., "Global Footer", "Single Posts") that deep-links into the Customizer at the matching control.
2. **Per-page post meta** — a direct database query for all posts with `_memberlite_footer_override` set to this footer's slug. Displays "1 page override" (linked to that page's edit screen) or "N page overrides" (unlinked) as appropriate.

If a footer has no assignments, the column shows `—`.

### Admin navigation

The CPT is surfaced under **Memberlite > Footers** in the admin menu. Two filters (`parent_file`, `submenu_file`) keep the Memberlite menu and Footers submenu item highlighted when viewing the list table or editing a single footer post.

---

## Key Files

| File | Purpose |
|---|---|
| `inc/variations.php` | Resolver, renderer, edit link, `memberlite_get_footer_variations()`, transient cache |
| `inc/custom-post-types.php` | CPT registration, auto-title hook |
| `inc/customizer.php` | Customizer panel/controls (`set_customizer_footer_settings()`), `memberlite_is_global_footer_default()` |
| `inc/admin.php` | Admin menu registration, menu highlight filters, "Used By" column, `memberlite_get_footer_assignments()` |
| `inc/editor-settings.php` | Post meta registration (`_memberlite_footer_override`, `_memberlite_hide_footer`), editor JS enqueue |
| `inc/updates.php` | `memberlite_checkForUpdates()` — version migration runner |
| `footer.php` | Calls resolver and renderer; falls back to default footer; outputs edit link |
| `components/footer/variation-default.php` | Default footer template (widget areas, navigation, site info) |
| `patterns/footer-*.php` | Eight starter footer patterns scoped to the CPT |
