# Customizer Documentation

## Overview

## Customizer Presets (defaults)

### First, what's the difference between a color scheme and a variation?

Both are presets meant for customizer settings but a color scheme exists within the variation as a whole.
Variations include other settings outside of colors such as typography, layout, and more.

### Color Scheme History

Memberlite version 6.6.1 and earlier included a color scheme of 16 colors including two "defaults" where one was legacy, and another for version 4.6.
In version 6.6.2, we decided to refactor to make color schemes more manageable and introduce one source of truth in the theme
for default colors. This was also a necessary step to prepare for full site editing compatibility in future versions. As a result,
to support backwards compatibility, we kept the existing `memberlite_color_schemes` filter hook and presets as "legacy".
We then introduced a new color scheme setting that would pull the smaller color scheme with new keys for Memberlite versions 6.6.2 and onward.
The new color scheme would also sync with the theme.json file to ensure consistency across the board.

In `inc/defaults.php`:

- `memberlite_get_colors()` - Returns 7 color values for default scheme
- `memberlite_get_news_colors()` - Returns 7 color values for news scheme
- `memberlite_get_wptavern_colors()` - Returns 7 color values for WP Tavern scheme
- `memberlite_map_colors_to_settings()` - Maps color values to customizer settings
- `memberlite_map_legacy_colors_to_settings()` - Maps legacy color values to customizer settings (pre V6.6.2)
- `memberlite_get_defaults()` - Returns default customizer settings for default scheme
- `memberlite_get_defaults_news()` - Returns default customizer settings for news scheme
- `memberlite_get_defaults_wptavern()` - Returns default customizer settings for WP Tavern scheme
- `memberlite_get_defaults_legacy()` - Returns default customizer settings for legacy scheme
- `memberlite_get_color_schemes()` - Returns new color scheme presets
- `memberlite_format_scheme_colors()` - Helper to format color scheme data for theme.json
- `memberlite_get_legacy_color_schemes()` - Returns legacy color scheme presets (Pre V6.6.2)
- `memberlite_get_active_colors()` - Returns active color values based on current scheme selection

In `inc/customizer.php`:

- `get_color_schemes()` - Returns full scheme data from globals (for JS)
- `get_legacy_color_schemes()` - Returns full scheme data from globals (for JS)
- `get_color_scheme_choices()` - Extracts just the labels for dropdown (new schemes)
- `get_legacy_color_scheme_choices()` - Extracts just the labels for dropdown (legacy schemes)

### How to add a new color scheme preset (And variation)

You can add a new color scheme and a new variation presets with in `inc/defaults.php`. For the sake
of example, let's pretend we're calling our new color scheme/variation "hamburger".

Here are the steps to add your new presets for "hamburger":

- Add a new `memberlite_get_colors()` function for the new variation. The function name should keep the `memberlite_get_` prefix and end with `_colors()` due to the `memberlite_get_active_colors` relying on that naming convention.
- Add a new `memberlite_get_defaults_hamburger()` function. This function is responsible for setting the default values for several customizer settings, even the non-color related ones.
  - Make sure the `apply_filters( 'memberlite_defaults_hamburger', $defaults )` is unique so others can customize the defaults with this hook if they want.
- At the bottom of the file, define a new global for your new variation's defaults. You do not need to define a new global for the colors because it's taken care of with the `memberlite_get_color_schemes()` function.

```aiignore
// Globals
global $memberlite_defaults, $memberlite_color_schemes, $memberlite_legacy_color_schemes, $memberlite_defaults_news, $memberlite_defaults_wptavern;

$memberlite_defaults                    = memberlite_get_defaults();
$memberlite_defaults_news               = memberlite_get_defaults_news();
$memberlite_defaults_wptavern           = memberlite_get_defaults_wptavern();
$memberlite_defaults_hamburger          = memberlite_get_defaults_hamburger();
$memberlite_defaults_legacy             = memberlite_get_defaults_legacy();
$memberlite_color_schemes               = memberlite_get_color_schemes();
$memberlite_legacy_color_schemes        = memberlite_get_legacy_color_schemes();
```

### Other Presets

## Sync with Theme.json
