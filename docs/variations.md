# Header & Footer Variations

This document covers the variations system introduced in Memberlite 7.1. Both headers and footers use the same CPT-based approach: site owners design layouts in the block editor and assign them via the Customizer.

## Table of Contents

1. [Overview](#overview)
2. [Shared Architecture](#shared-architecture)
3. [Header Variations](#header-variations)
   - [Resolver](#resolver)
   - [Customizer Controls](#customizer-controls)
   - [Per-Page Override (Pages Only)](#per-page-override-pages-only)
   - [Sticky Option](#sticky-option)
   - [Header Patterns](#header-patterns)
4. [Footer Variations](#footer-variations)
   - [Resolver Priority Chain](#resolver-priority-chain)
   - [Customizer Controls](#customizer-controls-1)
   - [The Global Sentinel Value](#the-global-sentinel-value)
   - [Per-Page Override (Pages Only)](#per-page-override-pages-only)
   - [Footer Patterns](#footer-patterns)
   - [Transient Cache](#transient-cache)
   - [Default Footer Fallback](#default-footer-fallback)
   - [Admin List Table](#admin-list-table)
5. [Key Differences at a Glance](#key-differences-at-a-glance)
6. [Key Files](#key-files)

---

## Overview

Header and footer variations are powered by custom post types (`memberlite_header` and `memberlite_footer`). Each post is a fully block-editable layout. Site owners create designs in the WordPress editor, then assign them via Appearance > Customize.

**Shared properties:**
- Variations are stored as CPT posts, not PHP templates or widget areas
- Content is rendered via `do_blocks()` + `do_shortcode()`
- Settings store the variation's `post_name` (slug), not its ID — portable across environments (dev → staging → production)
- Both CPTs are not public-facing (no archive, no frontend URL)
- The default PHP-based header/footer remains available as a fallback (value `'0'`)

---

## Shared Architecture

```
memberlite_header / memberlite_footer CPT (source of truth)
        ↓
memberlite_get_current_{header|footer}_post_name() — resolves which variation to show
        ↓
memberlite_render_{header|footer}_variation() — renders the resolved post's block content
        ↓
header.php / footer.php — calls the above; falls back to the default template if post_name is '0'
```

Both CPTs are registered in `inc/custom-post-types.php`:
- `show_in_rest` is enabled for block editor support
- All capabilities are mapped to `edit_theme_options` (admins only)
- Auto-title functions generate slugs like `header-{post_id}` and `footer-{post_id}`

Both resolvers and renderers live in `inc/variations.php`.

---

## Header Variations

### Resolver

`memberlite_get_current_header_post_name()` in `inc/variations.php` resolves the header for each request using this priority order (highest to lowest):

1. **Per-page post meta** (`_memberlite_header_override`) — set per **page** in the block editor's document settings panel. Only applies on `is_singular('page')`.
2. **Global theme mod** (`memberlite_default_header_slug`) — the site-wide default.
3. **Default header** — rendered when the resolved value is `'0'`.

If a per-page override is set but the post no longer exists (e.g., the header post was deleted), the resolver silently ignores it and falls through to the global setting.

`header.php` wraps the header in `<header id="masthead">` with two possible class sets:
- `is-header-variation site-header-{post_name}` — when a CPT header is active
- `site-header-default` — when the default header is active

### Customizer Controls

All controls live in the **Header** section under Appearance > Customize.

| Setting key | Label | Options |
|---|---|---|
| `memberlite_default_header_slug` | Header | "— Default —" + all published header posts |

The **"— Default —"** option (`'0'`) renders the classic PHP header. When any CPT header is selected, the "Default Header Settings" group (columns ratio, login info, search, sticky nav) is hidden via `memberlite_is_default_header_active()` as its `active_callback`.

An **"Edit Header Variations"** link in the section navigates directly to the `memberlite_header` post list screen.

### Per-Page Override (Pages Only)

Individual **pages** can override the global header selection via the `_memberlite_header_override` post meta key. This is exposed as a select control in the block editor's document settings panel, alongside the existing footer override.

- The meta key is registered for the `'page'` post type only (in `inc/editor-settings.php`).
- The resolver checks this override only on `is_singular('page')`.
- Only valid header post_names are honoured; an invalid or stale value is silently ignored and the resolver falls through to the global theme mod.
- An empty string means "use site default" (no override).
- The control is hidden when "Hide Header" is enabled for the page.

### Sticky Option

How sticky behavior works depends on which header is active:

- **Default header** — controlled by the `sticky_nav` theme_mod (a checkbox in the Default Header Settings group in the Customizer).
- **CPT header variations** — each variation has its own sticky toggle stored as `_memberlite_header_sticky` post meta (a boolean, set in the block editor's document settings panel).

When a CPT header is sticky, `header.php` wraps the rendered content in:

```html
<div class="site-header-variation-sticky-wrapper">
    <!-- rendered header variation content -->
</div>
```

`memberlite_is_header_variation_sticky( $post_name )` in `inc/variations.php` checks this meta.

### Header Patterns

Starter header designs are registered as block patterns scoped to the `memberlite_header` CPT. Pattern files live in `patterns/header-01.php` through `patterns/header-06.php`. They carry `Post Types: memberlite_header` in their metadata, which scopes them to the header CPT editor and prevents them from appearing in the general page/post inserter.

See [patterns.md](patterns.md) for general pattern authoring guidelines.

---

## Footer Variations

### Resolver Priority Chain

`memberlite_get_current_footer_post_name()` in `inc/variations.php` resolves the footer for each request using this priority order (highest to lowest):

1. **Per-page post meta** (`_memberlite_footer_override`) — set per **page** in the block editor's document settings panel. Only applies on `is_singular('page')`; has no effect on single posts, archives, or other contexts.
2. **Location-specific theme mod** — one of `memberlite_post_footer_slug`, `memberlite_page_footer_slug`, or `memberlite_archives_footer_slug`, depending on the current context.
3. **Global theme mod** (`memberlite_global_footer_slug`) — the site-wide default, used when the location mod is set to inherit.
4. **Default footer** — rendered when the resolved value is `'0'`.

If the resolved post_name no longer exists (e.g., the footer post was deleted), the resolver falls back to `'0'` rather than rendering nothing.

`footer.php` wraps the footer in `<footer id="colophon">` with two possible classes:
- `site-footer site-footer-{post_name}` — when a CPT footer is active
- `site-footer site-footer-default` — when the default (widget-area) footer is active

The default footer is rendered via `get_template_part( 'components/footer/variation', 'default' )`, which loads `components/footer/variation-default.php` (widget areas, navigation, site info).

The footer can be hidden entirely on individual pages via the `_memberlite_hide_footer` post meta, checked by `memberlite_hide_page_footer()` (registered in `inc/editor-settings.php`).

### Customizer Controls

All controls live in the **Footer** panel under Appearance > Customize.

| Setting key | Label | Options |
|---|---|---|
| `memberlite_global_footer_slug` | Global Footer | "— Default —" + all published footer posts |
| `memberlite_archives_footer_slug` | Blog & Archives Footer | "— Use Global Footer —" + all published footer posts |
| `memberlite_post_footer_slug` | Single Post Footer | "— Use Global Footer —" + all published footer posts |
| `memberlite_page_footer_slug` | Pages Footer | "— Use Global Footer —" + all published footer posts |

**Important distinction**: The "— Default —" option (`'0'`) is only available on the **global** control. Location-specific controls can defer to the global setting (which may itself be `'0'`) but cannot independently select the default footer. This encourages use of the block-based footer system.

A **"Manage Footers"** link in the panel navigates directly to the `memberlite_footer` post list screen.

#### How choices are built

`memberlite_get_footer_variations()` returns only published CPT footer posts as a `slug => title` array, alphabetical by title. It never includes sentinels — each consumer adds its own:

- **Customizer global control** — always prepends `'0' => '— Default —'` alongside any CPT footers.
- **Customizer location controls** — prepend `'memberlite-global-footer' => '— Use Global Footer —'`.
- **Editor sidebar** — prepends `'' => '— Use Global Footer —'`.

### The Global Sentinel Value

Location-specific footer controls use the string `'memberlite-global-footer'` as a sentinel meaning "inherit from the global setting." This is distinct from `'0'` (default) and from any real footer post_name.

- **`'memberlite-global-footer'`** → read `memberlite_global_footer_slug` and use that value
- **`'0'`** → use the default widget-area footer (only reachable via the global control)
- **any other string** → a footer post_name; look up and render that post

The sentinel is namespaced to avoid accidental collision with a user-created footer slug. The auto-title function generates slugs like `footer-{post_id}`, so natural collisions are not possible.

### Per-Page Override (Pages Only)

Individual **pages** can override the Customizer footer selection via the `_memberlite_footer_override` post meta key. This is exposed as a select control in the block editor's document settings panel.

- The meta key is registered for the `'page'` post type only (in `inc/editor-settings.php`).
- The resolver checks this override only on `is_singular('page')` — it has no effect on single posts, archives, or other templates.
- Only valid footer post_names are honoured; an invalid or stale value (e.g., a deleted footer) is silently ignored and the resolver falls through to the Customizer settings.
- An empty string means "use site default" (no override).

### Footer Patterns

Starter footer designs are registered as block patterns scoped to the `memberlite_footer` CPT. Pattern files live in `patterns/footer-*.php` and carry `Post Types: memberlite_footer` in their metadata, scoping them to the footer CPT editor only.

See [patterns.md](patterns.md) for general pattern authoring guidelines.

### Transient Cache

`memberlite_get_footer_variations()` caches its result in the `memberlite_footer_variations` transient for **12 hours** to avoid repeated `get_posts()` queries on every page load (including every Customizer preview request).

The cache is busted automatically whenever:

- A `memberlite_footer` post is **saved, updated, published, trashed, or untrashed** — via `save_post_memberlite_footer`
- A `memberlite_footer` post is **permanently deleted** — via `deleted_post` (with a post type check, since that hook is not post-type-specific)

Both hooks call `memberlite_flush_footer_variations_cache()`, which calls `delete_transient( 'memberlite_footer_variations' )`.

### Default Footer Fallback

The default footer (widget areas, navigation, site info) renders whenever `memberlite_get_current_footer_post_name()` returns `'0'`. This happens when:

- No `memberlite_footer` posts exist at all
- The global footer setting is explicitly set to "— Default —"
- The resolved post_name is invalid (post was deleted after being assigned)

The Customizer's "Default Footer Settings" heading and the copyright text control both use `memberlite_is_default_footer_active()` as their `active_callback`:

```php
function memberlite_is_default_footer_active(): bool {
    return get_theme_mod( 'memberlite_global_footer_slug', '0' ) === '0';
}
```

### Admin List Table

The `memberlite_footer` list table (Memberlite > Footers) includes a **"Used By"** column showing where each footer is currently assigned.

`memberlite_get_footer_assignments( $post_name )` in `inc/admin.php` checks:

1. **The four theme mod controls** — `memberlite_global_footer_slug`, `memberlite_archives_footer_slug`, `memberlite_post_footer_slug`, `memberlite_page_footer_slug`. Each match produces a linked label (e.g., "Global Footer", "Single Posts") that deep-links into the Customizer at the matching control.
2. **Per-page post meta** — a direct database query for all pages with `_memberlite_footer_override` set to this footer's slug. Displays "1 page override" (linked to that page's edit screen) or "N page overrides" (unlinked) as appropriate.

If a footer has no assignments, the column shows `—`.

The header list table does not have an equivalent "Used By" column, since headers have only one global setting.

#### Admin navigation

The footer CPT is surfaced under **Memberlite > Footers** and the header CPT under **Memberlite > Headers** in the admin menu. Filters on `parent_file` and `submenu_file` keep the correct menu items highlighted when viewing the list table or editing a single variation post.

---

## Key Differences at a Glance

| Feature | Header | Footer |
|---|---|---|
| CPT slug | `memberlite_header` | `memberlite_footer` |
| Global setting | `memberlite_default_header_slug` | `memberlite_global_footer_slug` |
| Location-specific settings | None | 3 (posts, pages, archives) |
| Location sentinel value | N/A | `'memberlite-global-footer'` |
| Per-page override | Yes (`_memberlite_header_override`, pages only) | Yes (`_memberlite_footer_override`, pages only) |
| Sticky option | Yes (`_memberlite_header_sticky` post meta per variation) | No |
| Default sticky | `sticky_nav` theme_mod (default header only) | N/A |
| Starter patterns | 6 (`header-01` – `header-06`) | 8 (`footer-*.php`) |
| Transient cache | Yes (`memberlite_header_variations`, 12 h) | Yes (`memberlite_footer_variations`, 12 h) |
| "Used By" admin column | No | Yes |
| Admin menu item | Memberlite > Headers | Memberlite > Footers |

---

## Key Files

| File | Purpose |
|---|---|
| `inc/variations.php` | Resolver, renderer, get-variations, cache, and active_callback functions for both systems |
| `inc/custom-post-types.php` | CPT registration and auto-title hooks for both CPTs |
| `inc/customizer.php` | Customizer controls for both header and footer variation settings |
| `inc/admin.php` | Admin menu registration, menu highlight filters, footer "Used By" column |
| `inc/editor-settings.php` | Post meta registration (`_memberlite_header_sticky`, `_memberlite_header_override`, `_memberlite_footer_override`, `_memberlite_hide_footer`), editor JS enqueue |
| `inc/updates.php` | `memberlite_checkForUpdates()` — version migration runner |
| `header.php` | Calls header resolver and renderer; handles sticky wrapper; falls back to default |
| `footer.php` | Calls footer resolver and renderer; falls back to default footer |
| `components/footer/variation-default.php` | Default footer template (widget areas, navigation, site info) |
| `patterns/header-01.php` – `header-06.php` | Six starter header patterns scoped to the CPT |
| `patterns/footer-*.php` | Eight starter footer patterns scoped to the CPT |

---

**Last Updated**: 2026-05-01
