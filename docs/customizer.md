# Customizer Documentation

## TL;DR

Memberlite 7.0 changed how we save colors. We added new color schemes and layout settings. We also built tools to support users upgrading from older versions.

The Customizer is the single source of truth for colors and fonts. We sync those values to `theme.json`.

In Memberlite 7.1, we introduced [header and footer variations](variations.md).

In Memberlite 7.1.2, we added per-type layout settings for custom post types. See [Other Post Types (CPT Layout Settings)](#other-post-types-cpt-layout-settings) below.

---

## Overview

Memberlite is a hybrid theme. It supports both the Classic Customizer and the block editor.

In 7.0, we built a new system to manage color schemes. This system works across both the Customizer and the block editor.

We also added new layout settings for:
- Header
- Footer
- Single posts
- Custom post types (CPT layout settings, added in 7.1.2)

The Customizer is the source of truth for colors and fonts.

The `header_output()` function in `inc/customizer.php` converts those values into CSS variables in `:root`.

We sync colors to `theme.json` using the `wp_theme_json_data_theme` filter.

In 7.1, we added [header and footer variations](variations.md) settings to the Customizer. These settings assign header and footer variations to global and per-location slots.

---

## Customizer Settings & Controls

Most Customizer logic lives in:

`inc/customizer.php`

Start with the `register()` function.

---

## Other Post Types (CPT Layout Settings)

Added in Memberlite 7.1.2.

When compatible custom post types are detected, an **Other Post Types** panel appears in the Customizer. Each CPT gets its own section inside that panel with layout controls. The panel is hidden when no CPTs are present.

### Auto-detected CPTs

Memberlite automatically checks for these PMPro add-on CPTs at runtime and includes them if registered:

- `pmpro_course` (PMPro Courses)
- `pmpro_lesson` (PMPro Courses — Lessons)
- `pmpro_series` (PMPro Series)

### Adding CPTs via Filter

Third-party or child-theme CPTs can be added using the `memberlite_customizer_cpts` filter:

```php
add_filter( 'memberlite_customizer_cpts', function( array $cpts ): array {
    $cpts[] = 'my_cpt_slug';
    return $cpts;
} );
```

The filter receives an indexed array of CPT slugs. It can return an indexed array, or a comma-separated string of slugs.

**Guard behavior:** After the filter runs, Memberlite normalizes the return value and then silently removes any slugs that are:
- Registered by the Memberlite parent theme itself (e.g. `memberlite_header`, `memberlite_footer`)
- Not currently registered as a post type
- Backed by a CPT with `show_ui => false` (internal/programmatic post types)
- Not a non-empty string (e.g. empty strings, nested arrays, integers are stripped)

If the filter callback returns something other than an array or string (e.g. `null`, `false`, an integer), it is treated as an empty array.

This means passing an unregistered, internal, or malformed slug through the filter is safe — it will be dropped without an error.

> **Note:** Not all third-party CPTs will behave correctly even when added via the filter. CPTs that use custom query logic, non-standard archive templates, or override the main loop may not respect Memberlite's sidebar and layout classes. Test after adding any CPT.

### Disabling PMPro CPT Detection

To prevent Memberlite from adding PMPro CPTs, return an empty array or empty string from the `memberlite_customizer_cpts` filter. To replace them entirely with your own CPTs, return an array containing only those slugs.

```php
// Remove all PMPro CPTs.
add_filter( 'memberlite_customizer_cpts', '__return_empty_array' );

// Remove all PMPro CPTs and substitute your own.
add_filter( 'memberlite_customizer_cpts', function( $cpts ) {
    return array( 'my_cpt_slug' );
} );
```

### Settings per CPT

Each CPT section starts with an **Inherit from Posts & Archives** checkbox (on by default). When checked, the layout and Archive Display controls are hidden and the CPT uses whatever is set in Posts & Archives. Uncheck it to control the CPT independently.

The inherit state is stored as the `inherit_posts_archives_{cpt}` theme_mod (e.g. `inherit_posts_archives_pmpro_course`). It defaults to `true`. This means a CPT will always fall back to Posts & Archives unless a user has explicitly unchecked the box — even if that CPT's other theme_mods have been saved.

| Setting | theme_mod | Applies to | Shown when |
|---|---|---|---|
| Inherit from Posts & Archives | `inherit_posts_archives_{cpt}` | Archive pages + single views | Always |
| Default Single {Type} Layout | `layout_cpt_{cpt}` | Single views | Inherit is unchecked |
| Single {Type} Columns Ratio | `columns_ratio_{cpt}` | Single views | Inherit is unchecked, layout has a sidebar |
| Default {Type} Archive Layout | `layout_cpt_{cpt}_archive` | Archive pages | Inherit is unchecked, CPT has archive pages |
| {Type} Archive Columns Ratio | `columns_ratio_{cpt}_archive` | Archive pages | Inherit is unchecked, layout has a sidebar |
| Archive Display | `content_archives_{cpt}` | Archive pages | Inherit is unchecked, CPT has `has_archive` |

"Archive pages" includes the CPT's taxonomy archives (e.g. `/recipe-type/gel/` for a `recipe` CPT), as long as the taxonomy is registered to only that one CPT from the list above. Taxonomies shared by more than one of these CPTs keep the default archive layout. The built-in `category` and `post_tag` archives always use the Posts & Archives settings, even when a CPT registers them, because posts share those terms.

Section labels are derived from the CPT's registered plural name (e.g. a CPT registered as "Courses" produces a "Courses Layout" section).

---

## Layout

Added in Memberlite TBD. Code lives in `inc/layout.php`.

"Layout" is the page structure: where the sidebar goes and how wide the content is. How content is arranged inside that area (Archive Display, post meta, featured images) is a separate "Content" setting.

### Layouts

| Slug | Label | Renders |
|---|---|---|
| `sidebar-right` | Right Sidebar | Content + sidebar, using the context's Columns Ratio |
| `sidebar-left` | Left Sidebar | Same, sidebar first |
| `narrow` | Narrow | One centered column (`8 medium-offset-2`, ~805px) |
| `contained` | Contained | The full 12-column container |
| `full-width` | Full Width | Edge to edge, no `.row` (pages only) |

Wide and full blocks break out of the column on single pages and posts with any no-sidebar layout.

### Contexts and settings

Each context has a layout picker (thumbnail radio control, `Memberlite_Customize_Layout_Control`) and its own Columns Ratio, which only shows for sidebar layouts.

| Context | Customizer section | Layout theme_mod | Columns Ratio theme_mod | Default |
|---|---|---|---|---|
| `page` | Pages | `layout_page` | `columns_ratio` | Right Sidebar |
| `post` | Posts & Archives | `layout_post` | `columns_ratio_post` | Narrow |
| `archive` (blog, category, tag, date, author) | Posts & Archives | `layout_archive` | `columns_ratio_blog` | Contained |
| `search` | Posts & Archives | `layout_search` | `columns_ratio_search` | Right Sidebar |
| `cpt_{cpt}` / `cpt_{cpt}_archive` | Other Post Types › {Type} | see above | see above | Same as `post` / `archive` |

New sites also default Archive Display (`content_archives`) to Grid. The masthead always spans the container, whatever the layout.

Use the `memberlite_layout_choices` filter to change which layouts a context offers.

### Per-item override (block editor)

Posts, pages and the CPTs from `memberlite_customizer_cpts` get a **Layout** panel in the block editor. It saves `_memberlite_layout` post meta (`''` = Default). When the layout has a sidebar, the panel also has the custom sidebar settings (`_memberlite_custom_sidebar`, `_memberlite_default_sidebar`, `_memberlite_hide_children`) that used to live in the classic Custom Sidebar metabox. The metabox still shows in the classic editor.

The page set as the Posts page uses the `archive` context, and its Layout overrides the blog index.

### Resolution order

`memberlite_get_layout()` checks, in order:

1. The item's `_memberlite_layout` meta.
2. The page template: `content-sidebar.php` → Right Sidebar, `sidebar-content.php` → Left Sidebar, `narrow-width.php` → Narrow, `full-width.php` → Contained, `fluid-width.php` → Full Width. Any other template (e.g. Landing Page) → Right Sidebar. The Posts page ignores its template.
3. The static front page falls back to Contained.
4. The Customizer default for the context.

Single views of post types without the Layout panel (attachments, WooCommerce products, bbPress) always use Right Sidebar, as before.

Filter the result with `memberlite_layout`. `memberlite_getColumnsRatio()`, the `memberlite_get_sidebar` filter, `$content_width` and the body classes all read from it.

### Body classes

`memberlite-layout-{slug}` is added on every request. The older classes are still output for child themes and custom CSS: `sidebar-right`, `sidebar-left` or `sidebar-none` in the page context and `sidebar-blog-right`, `sidebar-blog-left` or `sidebar-blog-none` elsewhere (`*-none` for any layout without a sidebar).

### Legacy templates and migration

The layout-only page templates stay registered so existing pages keep their layout, and so the classic editor, Quick Edit and imports can still use them. They are hidden from the block editor's template list unless the page already uses one. Picking a layout in the Layout panel clears a legacy template.

`memberlite_maybe_migrate_layout_settings()` runs once per theme (flag: `layout_version` theme_mod) and copies the old `sidebar_location*` settings into the new ones. "No Sidebar" becomes Narrow, a Grid archive becomes Contained (Grid used to hide the sidebar; it no longer does), and search results keep the blog sidebar setting (Grid never affected them). Every context and Archive Display are saved explicitly, so existing sites keep their look. New sites (no `memberlite_db_version` yet) and Tools › Reset Theme Settings skip the copy and start on the new defaults.

---

## Color Scheme History

Before 7.0, we stored hex colors with a leading `#`.

We did not sync Customizer colors with `theme.json`.

In 7.0, we:

- Standardized how we store hex values
- Synced Customizer colors to `theme.json`
- Created one source of truth for default colors

We kept the existing `memberlite_color_schemes` filter.

We added:
- New schemes in `inc/colors.php`
- Legacy schemes in `inc/deprecated.php`

We added migration logic in: `inc/updates/update_7_0.php`

We also updated the Import Theme Settings tool to convert legacy schemes.

When a user upgrades to 7.0 (or imports old settings), we set the color scheme to: `custom`

---

## Related Functions

This is not a full list. Explore the codebase for more.

### `functions.php`

- `memberlite_filter_theme_json()` - Syncs customizer colors to `theme.json`

- `memberlite_clean_editor_color_palette()` - Limits the editor color palette to approved slugs

---

### `inc/defaults.php`

- `memberlite_get_defaults()` - Returns default theme settings

---

### `inc/colors.php`

- `memberlite_get_color_preset_map()` - Maps theme_mod keys to:
    - CSS variables
    - Editor colors
    - Customizer labels

- `memberlite_get_default_colors()` - Returns default colors

- `memberlite_get_active_colors()` - Returns all 17 saved color values

- `memberlite_is_dark_color()` - Returns true if a hex color is "dark" based on WCAG relative luminance
    - This is key in setting up hover colors for button and links styled like buttons across the site. 

---

### `inc/customizer.php`

- `register()` - Registers customizer settings and controls

- `header_output()` - Outputs CSS variables in `:root`

- `set_customizer_panels_sections()` - Registers all Customizer panels and sections, including the "Other Post Types" panel when CPTs are detected

- `set_customizer_header_settings()` - Registers all header Customizer controls, including the header variation select

- `set_customizer_footer_settings()` - Registers all footer Customizer controls, including the global and per-location variation selects

- `customizer_controls_js()` - Loads JS for customizer controls.
  - This is where we update color pickers based on the selected color scheme.
  - Also handles show/hide of each layout picker's Columns Ratio (sidebar layouts only) and of CPT controls while they inherit from Posts & Archives.

- `live_preview()` - Loads JS for live preview. 
  - This is where we define CSS variables and apply inline CSS for previewing setting changes.

---

### `inc/extras.php`

- `memberlite_get_customizer_cpts()` - Returns the indexed array of CPT slugs that receive per-type layout settings. PMPro CPTs are passed as defaults to the `memberlite_customizer_cpts` filter. After the filter, normalizes the return value (string → array, unexpected types → empty array), then strips internal Memberlite CPTs, unregistered slugs, CPTs with `show_ui => false`, and any non-string or empty elements. Result is statically cached.

- `memberlite_cpt_inherits_posts_archives( $cpt_type )` - Returns `true` if the given CPT should inherit layout settings from Posts & Archives. Reads the `inherit_posts_archives_{cpt}` theme_mod; defaults to `true` so CPTs inherit unless explicitly opted out.

- `memberlite_get_current_cpt_type()` - Returns the current CPT slug when on a CPT archive, one of its taxonomy archives, or a single post that has Customizer settings, otherwise `null`. Archive and taxonomy pages are resolved by `memberlite_get_current_cpt_archive_type()`. Used to resolve sidebar and columns ratio settings for both archive and single views.

- `memberlite_get_current_cpt_archive_type()` - Returns the current CPT slug when on a CPT archive or one of its taxonomy archives, otherwise `null`. A taxonomy archive resolves to a CPT only when the taxonomy is registered to exactly one CPT from `memberlite_get_customizer_cpts()`. Used by `memberlite_get_content_archives_theme_mod()` since the Archive Display setting only applies to archives.

- `memberlite_is_cpt_archive()` - Returns `true` on any post type archive, or on a taxonomy archive that resolves to a CPT via `memberlite_get_current_cpt_archive_type()`. Used in place of `is_post_type_archive()` by the body class, columns ratio, and sidebar layout checks.

- `memberlite_get_content_archives_theme_mod()` - Returns the resolved archive layout value (`content`, `excerpt`, or `grid`) for the current context. Returns the CPT-specific setting on CPT archives, otherwise falls back to the global `content_archives` setting.

---

### `inc/variations.php`

- `memberlite_is_default_header_active()` - Returns true when the header is set to the default; used as `active_callback` to show/hide the legacy default header controls in the Customizer

- `memberlite_is_default_footer_active()` - Returns true when the global footer is set to the default; used as `active_callback` to show/hide the legacy default footer controls in the Customizer

---

### `js/customizer.js`

Defines CSS variables and applies inline CSS during live preview.

---

### `js/customizer-controls.js`

Updates color pickers when a scheme changes.

If a user edits one color, this script sets the scheme to: `custom`

---

## Adding a New Customizer Setting

In `inc/customizer.php`, use one of these helpers:

- `add_memberlite_setting_control()`: Use for standard settings
- `add_memberlite_color_control()`: Use for color picker settings
- `add_memberlite_link_control()`: Use for links (We usually use them as shortcuts to point to other settings or admin pages)
- `add_memberlite_notice_control()`: Use for notices

---

**Last Updated**: 7.1.2
