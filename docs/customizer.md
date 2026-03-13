# Customizer Documentation

## TL;DR

Memberlite 7.0 changed how we save colors. We added new color schemes, layout settings, and theme variations. We also built tools to support users upgrading from older versions.

The Customizer is the single source of truth for colors and fonts. We sync those values to `theme.json`.

---

## Overview

Memberlite is a hybrid theme. It supports both the Classic Customizer and the block editor.

In 7.0, we built a new system to manage color schemes. This system works across both the Customizer and the block editor.

We also added new layout settings for:
- Header
- Footer
- Single posts

We introduced theme variations. A variation applies multiple settings at once. This gives users a quick way to change the look of their site.

The Customizer is the source of truth for colors and fonts.

The `header_output()` function in `inc/customizer.php` converts those values into CSS variables in `:root`.

We sync colors to `theme.json` using the `wp_theme_json_data_theme` filter.

---

## Customizer Settings & Controls

Most Customizer logic lives in:

`inc/customizer.php`

Start with the `register()` function.

---

## Color Schemes

### Color Scheme vs. Variation

Both are presets.

A color scheme controls colors only.

A variation controls colors, layout, typography, and other settings.

A variation can include a color scheme.

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

- `customizer_controls_js()` - Loads JS for customizer controls. 
  - This is where we update color pickers based on the selected color scheme.

- `live_preview()` - Loads JS for live preview. 
  - This is where we define CSS variables and apply inline CSS for previewing setting changes.

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

---

**Last Updated**: 2026-03-11
