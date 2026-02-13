# Customizer Documentation

### TL;DR Version of the Overview

Memberlite 7.0 changed how we save colors to the database, introduced new color schemes, layout settings, theme-variations, and added functionality to ensure
backwards compatibility for users coming from previous versions.

## Overview

Memberlite is a hybrid theme that supports both the classic WordPress customizer and block-editing (Gutenberg).
In version 7.0, we implemented a system to manage color schemes that work seamlessly across both systems. We've also
introduced new layout settings mainly for the header, footer, and single posts. These new settings all work with
the theme variation setting we also introduced where users can preset multiple settings at once based on a variation. This
is meant to be a "quick start" for users who want to quickly change the look and feel of their site without having to
tweak every setting in the customizer.

**Customizer serves as the "source of truth" for colors and fonts** that are then converted to CSS variables in the `:root` of the
site in `inc/customizer.php` in the `header_output()` function. The color scheme with 7 colors also match what's defined
in the `theme.json` file. In the `header_output()` function, we use Memberlite CSS variables as aliases to the variables that WordPress
creates by default from the theme.json.

Within stylesheets, either CSS variable type can be referenced, but for consistency's sake, we recommend using the CSS variables prefixed
with `--memberlite-`.

You can adjust editor styles in the `css/editor.css` file.

## Customizer Settings & Controls

You can find most of the magic in `inc/customizer.php`, in the `register()` function.

## Color Schemes

### What's the difference between a color scheme and a variation?

Both are presets meant for customizer settings, but a color scheme exists within the variation as a whole.
Variations include other settings outside of colors such as typography, layout, and more.

### Color Scheme History

Prior to Memberlite 7.0, we were saving Memberlite color hex values with the hashed symbols. We also did not have any automatic
syncing between what was set in Customizer versus what was set in the `theme.json` file. We decided to make color schemes more 
consistent, adhere to how WordPress saves hex colors in the database, and introduce one source of truth for default colors.

This was also necessary so we can expand on what Memberlite offers in the block editor in future versions. 
We kept the existing `memberlite_color_schemes` filter hook, created new color schemes in `inc/colors.php`, and 
added legacy schemes to `inc/deprecated.php`.

We also added a migration script to convert legacy color schemes to the new format in `inc/upgrade.php`. We've also
added a migration script in Memberlite's "Import Theme Settings" tool to convert legacy color schemes to the new format.

For Memberlite versions 7.0 >, when a user either updates to Memberlite 7.0 or imports legacy color schemes, the new color scheme
will automatically be set to "custom."

### The current flow


### Helpful Files & Functions

In `functions.php`:


In `inc/defaults.php`:

In `inc/customizer.php`:

In `js/customizer.js`:

In `js/customizer-controls.js`:

### How to add a new color scheme preset (And variation)


### Known Issues

Each color picker setting comes with a "default" button that resets the color to the default value. However, due to the way the customizer works,
if you switch between color schemes and then hit the default button, it may not reset to the expected color for that scheme.
This is a known issue with the WordPress customizer and not specific to Memberlite.

As a workaround, users can manually reselect the desired color scheme after hitting the default button to ensure the correct colors are applied.

## How to add a new customizer setting

In `inc/customizer.php`, we have two helper functions. Each with their own sanitize functions.

- `add_memberlite_setting_control()` - For standard settings
- `add_memberlite_color_setting_control()` - For color picker settings
