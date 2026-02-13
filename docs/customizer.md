# Customizer Documentation

## TL;DR Version of the Overview

Memberlite 7.0 changed how we save colors to the database, introduced new color schemes, layout settings, theme variations, and added functionality to ensure
backwards compatibility for users coming from previous versions. Colors and fonts from the customizer are synced to the `theme.json` file.

---

## Overview

Memberlite is a hybrid theme that supports both the classic WordPress customizer and block-editing (Gutenberg).
In version 7.0, we implemented a system to manage color schemes that work seamlessly across both systems. We've also
introduced new layout settings mainly for the header, footer, and single posts. These new settings all work with
the theme variation setting we also introduced where users can preset multiple settings at once. This
is meant to be a "quick start" for users who want to change the look and feel of their site without having to
tweak every setting in the customizer.

**Customizer serves as the "source of truth" for colors and fonts** that are then converted to CSS variables in the `:root` of the
site in `inc/customizer.php` in the `header_output()` function. Colors are synced to the `theme.json` via the `wp_theme_json_data_theme` filter hook.

For styling in stylesheets, we recommend using the CSS variables prefixed with `--memberlite-`.

---

## Customizer Settings & Controls

You can find most of the magic in `inc/customizer.php`, in the `register()` function.

---

## Color Schemes

### What's the difference between a color scheme and a variation?

Both are presets meant for customizer settings, but a color scheme exists within the variation as a whole.
Variations include other settings outside of colors such as typography, layout, and more.

### Color Scheme History

Prior to Memberlite 7.0, we were saving Memberlite color hex values with hashed symbols. We also did not have any automatic
syncing between what was set in customizer versus what was set in the `theme.json` file. We decided to make color schemes more 
consistent, adhere to how WordPress saves hex colors in the database, and introduce one source of truth for default colors.

This was also necessary so we can expand on what Memberlite offers in the block editor in future versions. 
We kept the existing `memberlite_color_schemes` filter hook, created new color schemes in `inc/colors.php`, and 
added legacy schemes to `inc/deprecated.php`.

We also added a migration script to convert legacy color schemes to the new format in `inc/upgrade.php`. We've also
added a migration script in Memberlite's "Import Theme Settings" tool to convert legacy color schemes to the new format.

For Memberlite versions 7.0 >, when a user either updates to Memberlite 7.0 or imports legacy color schemes, the new color scheme
will automatically be set to "custom."

---

## Related Functions

This is not a full exhaustive list of all customizer-related functions, so feel free to explore the codebase for more.

In `functions.php`:

- `memberlite_filter_theme_json()` - Syncs colors from the theme settings to the `theme.json` file
- `memberlite_dedupe_editor_color_palette()` - Removes duplicate colors from the editor color palette

In `inc/defaults.php`:

- `memberlite_get_defaults()` - Where Memberlite's default theme setting values are set

In `inc/colors.php`:

- `memberlite_get_color_preset_map()` - This is the single source of truth for how color setting keys (theme_mod keys) map to the editor, CSS variables, and customizer labeling
- `memberlite_get_default_colors()` - Where Memberlite's default colors are set. We also have similarly named functions for each color scheme.
- `memberlite_get_active_colors()` - Returns all 17 active colors saved in the theme_mods

In `inc/customizer.php`:

- `register()` - Registers all customizer settings and controls
- `header_output()` - Outputs CSS variables for colors in the `:root` of the site
- `customizer_controls_js()` - Enqueues scripts for the customizer controls
- `live_preview()` - Enqueues scripts for the customizer live preview

In `js/customizer.js`: Where we define CSS variables and apply inline CSS to show setting changes in the live preview.

In `js/customizer-controls.js`: This is where update all color pickers when a color scheme changes in real time. This is also
and where set the color scheme to "custom" if an individual color has been changed.

---

## How to add a new customizer setting

In `inc/customizer.php`, we have two helper functions. Each with their own sanitize functions.

- `add_memberlite_setting_control()` - For standard settings
- `add_memberlite_color_setting_control()` - For color picker settings
