# Customizer Documentation

## Overview

Memberlite is a hybrid theme that supports both the classic WordPress customizer and block-editing (Gutenberg).
In version 6.6.2, we have implemented a system to manage color schemes and variations that work seamlessly across both systems. Customizer
serves as the "source of truth" for colors and fonts that are then converted to CSS variables in the `:root` of the
site in `inc/customizer.php` in the `header_output()` function. The color scheme with 7 colors also match what's defined
in the `theme.json` file. In the `header_output()` function, we use Memberlite CSS variables as aliases to the variables that WordPress
creates by default from the theme.json.

Within stylesheets, either CSS variable type can be referenced, but for consistency's sake, we recommend using the CSS variables prefixed
with `--memberlite-`.

You can adjust editor styles in the `css/editor.css` file.

## Customizer Presets (defaults)

You can find most of the magic in `inc/customizer.php`, in the `register()` function.

### What's the difference between a color scheme and a variation?

Both are presets meant for customizer settings but a color scheme exists within the variation as a whole.
Variations include other settings outside of colors such as typography, layout, and more.

### Color Scheme History

Memberlite version 6.6.1 and earlier included a color scheme of 16 colors including two "defaults" where one was legacy, and another for version 4.6.
In version 6.6.2, we decided to refactor to make color schemes more manageable and introduce one source of truth in the theme
for default colors. This was also a necessary step to prepare for full site editing compatibility in future versions. As a result,
to support backwards compatibility, we kept the existing `memberlite_color_schemes` filter hook and presets as "legacy".
We then introduced a new color scheme setting that would pull the smaller color scheme with new keys for Memberlite versions 6.6.2 and onward.
The new color scheme would also sync with the theme.json file to ensure consistency across the board.

In `functions.php`:

- `memberlite_sync_legacy_to_variation_scheme()` - Syncs legacy color scheme selection to the new variation scheme setting on theme update. This is so users don't lose their legacy color scheme when updating to Memberlite 6.6.2+.
- `memberlite_filter_theme_json()` - Filters theme.json to set the color palette based on customizer selection.

In `inc/defaults.php`:

- `memberlite_get_colors()` - Returns 7 color values for default scheme. There are other functions for other color schemes named similarly.
- `memberlite_map_colors_to_settings()` - Maps color values to customizer settings
- `memberlite_map_legacy_colors_to_settings()` - Maps legacy color values to customizer settings (pre V6.6.2)
- `memberlite_get_defaults()` - Returns default customizer settings for default scheme.
- `memberlite_get_defaults_legacy()` - Returns default customizer settings for legacy scheme
- `memberlite_get_color_schemes()` - Returns new color scheme presets
- `memberlite_format_scheme_colors()` - Helper to format color scheme data for theme.json
- `memberlite_get_legacy_color_schemes()` - Returns legacy color scheme presets (Pre V6.6.2)
- `memberlite_get_active_colors()` - Returns active color values based on current scheme selection. This is where the `theme.json` pulls colors from.

In `inc/customizer.php`:

- `get_color_schemes()` - Returns full scheme data from globals (for JS)
- `get_legacy_color_schemes()` - Returns full scheme data from globals (for JS)
- `get_color_scheme_choices()` - Extracts just the labels for dropdown (new schemes)

In `js/customizer.js`:

This is where we handle the live preview in customizer.

In `js/customizer-controls.js`:

This is where we handle loading color schemes into their respective customizer settings.

### How to add a new color scheme preset (And variation)

You can add a new color scheme and a new variation presets with in `inc/defaults.php`. For the sake
of example, let's pretend we're calling our new color scheme/variation "hamburger".

Here are the steps to add your new presets for "hamburger":

- Add a new `memberlite_get_colors()` function for the new variation. The function name should keep the `memberlite_get_` prefix and end with `_colors()` due to the `memberlite_get_active_colors` relying on that naming convention.
- If you're presetting customizer settings other than colors, add a new `memberlite_get_defaults_hamburger()` function. This function is responsible for setting the default values for several customizer settings, even the non-color related ones.
  - Make sure the `apply_filters( 'memberlite_defaults_hamburger', $defaults )` is unique so others can customize the defaults with this hook if they want.

### Known Issues

Each color picker setting comes with a "default" button that resets the color to the default value. However, due to the way the customizer works,
if you switch between color schemes and then hit the default button, it may not reset to the expected color for that scheme.
This is a known issue with the WordPress customizer and not specific to Memberlite.

As a workaround, users can manually reselect the desired color scheme after hitting the default button to ensure the correct colors are applied.

## How to add a new customizer setting

In `inc/customizer.php`, we have two helper functions. Each with their own sanitize functions.

- `add_memberlite_setting_control()` - For standard settings
- `add_memberlite_color_setting_control()` - For color picker settings

You do not need to include the translate functions in the label or description as they are handled within the helper functions.


