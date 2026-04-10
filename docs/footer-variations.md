# Footer Variations

This document covers the footer variations system introduced in Memberlite 7.1. It replaces the legacy widget-area footer with a CPT-based system that lets site owners design and assign distinct footers per location using the block editor and Customizer.

## Table of Contents

1. [Overview](#overview)
2. [Architecture](#architecture)
3. [Resolver Priority Chain](#resolver-priority-chain)
4. [Customizer Controls](#customizer-controls)
5. [The Global Sentinel Value](#the-global-sentinel-value)
6. [Per-Page Override](#per-page-override)
7. [Footer Patterns](#footer-patterns)
8. [Transient Cache](#transient-cache)
9. [Seeding Routine](#seeding-routine)
10. [Legacy Footer Fallback](#legacy-footer-fallback)
11. [Key Files](#key-files)

---

## Overview

Footer variations are powered by the `memberlite_footer` custom post type. Each post is a fully block-editable footer layout. Site owners create footer designs in the WordPress editor, then assign them globally or per-location via Appearance > Customize.

**Key properties:**
- Footers are stored as CPT posts, not PHP templates or widget areas
- Content is rendered via `do_blocks()` + `do_shortcode()`
- Settings store the footer's `post_name` (slug), not its ID, so they are portable across environments (dev → staging → production)
- The legacy widget-area footer remains available as a fallback

---

## Architecture

```
memberlite_footer CPT (source of truth)
        ↓
memberlite_get_current_footer_post_name() — resolves which footer to show
        ↓
memberlite_render_footer_variation() — renders the resolved post's block content
        ↓
footer.php — calls the above; falls back to legacy footer if post_name is '0'
```

### CPT Registration

Registered in `inc/custom-post-types.php`. The CPT is not public-facing — it has no archive, no frontend URL, and is only accessible in the admin. `show_in_rest` is enabled for block editor support. All capabilities are mapped to `edit_theme_options` so only admins can manage footers.

---

## Resolver Priority Chain

`memberlite_get_current_footer_post_name()` in `inc/variations.php` resolves the footer for each request using this priority order (highest to lowest):

1. **Per-page post meta** (`_memberlite_footer_override`) — set per post/page in the block editor's document settings panel. Takes priority over all Customizer settings.
2. **Location-specific theme mod** — one of `memberlite_post_footer_slug`, `memberlite_page_footer_slug`, or `memberlite_archives_footer_slug`, depending on the current context.
3. **Global theme mod** (`memberlite_global_footer_slug`) — the site-wide default, used when the location mod is set to inherit.
4. **Legacy footer** — rendered when the resolved value is `'0'`.

If the resolved post_name no longer exists (e.g., the footer post was deleted), the resolver falls back to `'0'` rather than rendering nothing.

---

## Customizer Controls

All controls live in the **Footer** panel under Appearance > Customize.

| Setting key | Label | Options |
|---|---|---|
| `memberlite_global_footer_slug` | Global Footer | All published footer posts + "— Use Legacy Footer —" |
| `memberlite_archives_footer_slug` | Blog & Archives Footer | "— Use Global Footer —" + all published footer posts |
| `memberlite_post_footer_slug` | Single Post Footer | "— Use Global Footer —" + all published footer posts |
| `memberlite_page_footer_slug` | Pages Footer | "— Use Global Footer —" + all published footer posts |

**Important distinction**: The "— Use Legacy Footer —" option (`'0'`) is only available on the **global** control. Location-specific controls intentionally omit it — they can defer to the global setting (which may itself be legacy) but cannot independently select the legacy footer. This encourages use of the block-based footer system.

A **"Manage Footers"** link in the panel navigates directly to the `memberlite_footer` post list screen.

### How choices are built

`memberlite_get_footer_variations()` returns the base choices array (legacy option + all published footer posts, alphabetical by title). The Customizer builds a separate `$footer_choices_context` array for location controls by prepending the "— Use Global Footer —" sentinel and removing the `'0'` entry.

---

## The Global Sentinel Value

Location-specific controls use the string `'memberlite-global-footer'` as a sentinel meaning "inherit from the global setting." This is distinct from `'0'` (legacy) and from any real footer post_name.

- **`'memberlite-global-footer'`** → read `memberlite_global_footer_slug` and use that value
- **`'0'`** → use the legacy widget-area footer (only reachable via the global control)
- **any other string** → a footer post_name; look up and render that post

The sentinel is namespaced to avoid accidental collision with a user-created footer slug. The auto-title function generates slugs like `memberlite-footer-01`, so natural collisions are not possible.

---

## Per-Page Override

Individual posts or pages can override the Customizer footer selection via the `_memberlite_footer_override` post meta key. This is exposed as a select control in the block editor's document settings panel.

- Only valid footer post_names are honoured; an invalid or stale value (e.g., a deleted footer) is silently ignored and the resolver falls through to the Customizer settings.
- An empty value means "use site default" (no override).

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

## Seeding Routine

The seeder runs as part of the Memberlite 7.1 update routine (`inc/updates/update_7_1.php`, triggered from `memberlite_checkForUpdates()`). It is hooked to `init` at priority 20 so the `memberlite_footer` CPT is registered (priority 10) before any post insertion is attempted.

### What it does

1. **Guard check** — queries for any existing published `memberlite_footer` post. If one exists, returns immediately. The seeder never re-runs once footer posts exist.
2. **Creates one footer post** — output-buffers `patterns/footer-01.php` to capture its block markup, then inserts a published `memberlite_footer` post. The actual post_name WordPress assigns is read back from the inserted post to handle any slug collisions (e.g., a trashed post with the same name causing WordPress to append a numeric suffix).
3. **New installs only** — checks for the `memberlite_fresh_activation` flag (set when `memberlite_db_version` has no prior value). If present, sets `memberlite_global_footer_slug` to the seeded post's actual slug so the block footer is active immediately. Then deletes the flag.

### Behaviour by user type

| User type | Result |
|---|---|
| Fresh install | One footer post created; global set to it; block footer active immediately |
| Existing user upgrading to 7.1 | One footer post created; global untouched; legacy footer continues rendering |
| Either, if footer posts already exist | Seeder skips entirely; nothing changes |

Location-specific mods (`memberlite_archives_footer_slug`, `memberlite_post_footer_slug`, `memberlite_page_footer_slug`) are never written by the seeder. Their registered default is `'memberlite-global-footer'`, so they inherit from the global setting until a user explicitly overrides them.

---

## Legacy Footer Fallback

The legacy footer (widget areas) continues to render whenever `memberlite_get_current_footer_post_name()` returns `'0'`. This happens when:

- No `memberlite_footer` posts exist at all
- The global footer setting is explicitly set to "— Use Legacy Footer —"
- The resolved post_name is invalid (post was deleted after being assigned)

The Customizer's Legacy Settings section (copyright text) uses `memberlite_is_legacy_footer_active()` as its `active_callback`, which checks whether `memberlite_global_footer_slug` is `'0'`. Those controls are hidden whenever a CPT footer is active globally.

---

## Key Files

| File | Purpose |
|---|---|
| `inc/variations.php` | Resolver, renderer, edit link, `memberlite_get_footer_variations()`, transient cache |
| `inc/custom-post-types.php` | CPT registration, auto-title hook |
| `inc/customizer.php` | Customizer panel/controls (`set_customizer_footer_settings()`) |
| `inc/updates.php` | `memberlite_checkForUpdates()` — triggers the 7.1 update |
| `inc/updates/update_7_1.php` | `memberlite_seed_default_footer()` — seeding routine |
| `footer.php` | Calls resolver and renderer; falls back to legacy footer |
| `patterns/footer-*.php` | Eight starter footer patterns scoped to the CPT |
