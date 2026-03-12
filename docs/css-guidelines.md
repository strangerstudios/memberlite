# CSS Guidelines

For an overview of how the theme is structured, see [Project Structure](project-structure.md).
For an overview of how to build the theme's Sass files, see [Build Process](build-process.md).

---

# General Guidelines

These are guidelines for styling the theme with CSS.

Before writing any styles, ask yourself whether they should apply globally or only to a specific page or component. If you're styling an element, also check whether there's a block that needs matching styles.

We write styles **mobile first** using a `breakpoint` mixin to handle responsiveness. Avoid hardcoded values — use either `--memberlite-` prefixed variables or `--wp--preset` prefixed variables instead. Avoid `!important` unless absolutely necessary, and keep Sass nesting no deeper than 3 levels.

Color schemes are set via the Customizer, which applies a `color-scheme` of `light` or `dark` to the `:root` element. Use the [`light-dark()` function](https://developer.mozilla.org/en-US/docs/Web/CSS/Reference/Values/color_value/light-dark) whenever a color needs to differ between schemes, and use [`color-mix()`](https://developer.mozilla.org/en-US/docs/Web/CSS/Reference/Values/color_value/color-mix) to create tints and shades at runtime rather than hardcoding separate hex values.

## Where Do I Put My Styles?

Stylesheets are organized into focused directories:

- **`abstracts/`** — Not compiled on their own. `_variables.scss` holds Sass variables (primarily for alert/status colors and button shadows). `_mixins.scss` holds reusable mixins. Both are imported with `@use` into every partial that needs them.
- **`base/`** — Global, element-level styles with no component context (resets, typography, buttons, forms, grid, utilities, alerts).
- **`blocks/`** — Styles targeting WordPress block classes (`.wp-block-*`).
- **`components/`** — Reusable UI patterns that appear in multiple contexts (breadcrumbs, comments, widgets, pagination, etc.).
- **`structure/`** — Major layout regions: header, masthead, footer, and content area.
- **`pages/`** — Styles scoped to specific page types or templates (blog archive, 404, page templates).
- **`plugins/`** — Third-party plugin integration styles, currently only PMPro (`_pmpro.scss`).

Create a new file when styles grow beyond roughly 50–100 lines, or when they don't logically fit an existing file. New files should be registered in `main.scss`.

---

# Deeper Overview

## The Breakpoint Mixin

The mixin supports four size tokens — `mobile`, `tablet`, `desktop`, and `wide`. `mobile` is the one exception to the mobile-first rule: it uses a `max-width` query for small-screen-only overrides. The remaining three use `min-width` queries following the standard mobile-first approach.

## Sass Variables vs. CSS Custom Properties

Sass variables (`$variable`) in `_variables.scss` are for values only needed at compile time — primarily alert/status color sets and button shadows — and typically wrap a CSS custom property with a fallback. CSS custom properties (`--memberlite-*` and `--wp--preset--*`) handle anything that needs to be themeable at runtime, including colors, fonts, spacing, and border radius. The `--memberlite-*` variables are set by the [Customizer](customizer.md); the `--wp--preset--*` variables come from `theme.json`. Hardcoded values should be avoided in favor of one of these two systems.

## Font Awesome Usage

Use the Sass variable `$font-family-awesome` from `_variables.scss` when rendering Font Awesome icons via `::before` or `::after`. The project uses Font Awesome Free 6.6.0 — refer to [Font Awesome's documentation](https://fontawesome.com/) for icon references.

## Specificity & Selector Guidelines

Prefer class selectors over element selectors for components. The project uses the `@use` module system rather than `@import`, so each partial imports only what it needs from `abstracts/`. Some selectors use `:is()` intentionally to group cross-component rules without duplication (see the note in `_shortcodes.scss`). Using an ID selector for specificity is acceptable when PMPro or another plugin requires it.

## RTL Support

The project includes `.rtlcssrc.json`, so styles are automatically mirrored for right-to-left languages via `rtlcss` during the build. No manual RTL overrides are needed in most cases.

## Child Theme Guidelines

Custom styles for a child theme belong in the child theme's `style.css`, not in the SCSS files compiled into `build/css/main.css` in the parent theme.

---

**Last Updated**: 2026-03-11
