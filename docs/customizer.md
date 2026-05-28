# Customizer Documentation

## TL;DR

Memberlite 7.0 changed how we save colors. We added new color schemes and layout settings. We also built tools to support users upgrading from older versions.

The Customizer is the single source of truth for colors and fonts. We sync those values to `theme.json`.

In Memberlite 7.1, we introduced [header and footer variations](variations.md).

In Memberlite TBD, we added per-type layout settings for custom post types. See [Other Post Types (CPT Layout Settings)](#other-post-types-cpt-layout-settings) below.

---

## Overview

Memberlite is a hybrid theme. It supports both the Classic Customizer and the block editor.

In 7.0, we built a new system to manage color schemes. This system works across both the Customizer and the block editor.

We also added new layout settings for:
- Header
- Footer
- Single posts
- Custom post types (CPT layout settings, added in TBD)

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

Added in Memberlite TBD.

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

The filter receives an indexed array of CPT slugs and must return the same.

**Guard behavior:** After the filter runs, Memberlite silently removes any slugs that are:
- Registered by the Memberlite parent theme itself (e.g. `memberlite_header`, `memberlite_footer`)
- Not currently registered as a post type

This means passing an unregistered or internal slug through the filter is safe — it will be dropped without an error.

> **Note:** Not all third-party CPTs will behave correctly even when added via the filter. CPTs that use custom query logic, non-standard archive templates, or override the main loop may not respect Memberlite's sidebar and layout classes. Test after adding any CPT.

### Settings per CPT

| Setting | Applies to | Shown when |
|---|---|---|
| Archive Layout | Archive pages only | CPT has `has_archive` |
| Sidebar Location | Archive pages + single post views | Always |
| Columns Ratio | Archive pages + single post views | Sidebar is not "No Sidebar" |

Section labels are derived from the CPT's registered plural name (e.g. a CPT registered as "Courses" produces a "Courses Layout" section).

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

- `memberlite_dedupe_editor_color_palette()` - Removes duplicate colors from the editor palette

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
  - Also handles show/hide of the Columns Ratio control for both blog and CPT sections based on the Sidebar Location value.

- `live_preview()` - Loads JS for live preview. 
  - This is where we define CSS variables and apply inline CSS for previewing setting changes.

---

### `inc/extras.php`

- `memberlite_get_customizer_cpts()` - Returns the indexed array of CPT slugs that receive per-type layout settings. Auto-detects known PMPro CPTs, applies the `memberlite_customizer_cpts` filter, then strips internal Memberlite CPTs and any unregistered slugs. Result is statically cached.

- `memberlite_get_current_cpt_type()` - Returns the current CPT slug when on a CPT archive or single post that has Customizer settings, otherwise `null`. Used to resolve sidebar and columns ratio settings for both archive and single views.

- `memberlite_get_current_cpt_archive_type()` - Returns the current CPT slug when on a CPT archive only, otherwise `null`. Used by `memberlite_get_content_archives_theme_mod()` since the Archive Layout setting only applies to archives.

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

**Last Updated**: TBD
