# Project Structure

This document describes the **top-level structure** of the Memberlite theme repository and explains the responsibility of each directory. It is intended to help developers quickly understand where code lives and where changes should be made.

## General Guidelines

* **Business back-end logic → `/inc`**
* **Reusable markup → `/components`**
* **Static assets → `/assets`**
* **Front-end CSS source → `/src/scss`** (compiled to `/build/css/main.css`)
* **CSS for the editor, admin, print, plugin integrations, etc. → `/css`** (manually maintained, not part of the build)
* **JS for the front or back-end (including customizer) → `/js`**

When adding new functionality, prefer extending existing directories rather than creating new top-level folders unless there is a clear architectural need.

---

## Top-Level Directories

### `/assets`

Static front-end assets for the theme.

Typically contains:

* Fonts used to customize Memberlite via the Customizer settings or the Block Editor options
* Images (mostly icons)

---

### `/bbpress`

bbPress specific template override for single user content.

---

### `/build`

Compiled output from the build process. **Do not edit files here directly.**

Contains:

* `css/main.css` — compiled from `src/scss/main.scss`
* `css/main.rtl.css` — auto-generated RTL version of `main.css`
* Block and editor assets (future — built from `src/blocks/` and `src/editor/`)

See [Build Process](build-process.md) for details.

---

### `/components`

Reusable theme components and partials for the header, footer, page and post templates.

---

### `/css`

Vanilla CSS files that are **not** part of the Sass build process. These are committed and edited directly.

Typically contains:

* Integration stylesheets for third-party plugins (`bbpress.css`, `lifterlms.css`, `woocommerce.css`)
* Utility stylesheets (`admin.css`, `editor.css`, `print.css`, `customizer.css`)

See [CSS Guidelines](css-guidelines.md) for guidance on when styles belong here vs. in `/src/scss`.

---

### `/docs`

Where Memberlite's documentation files live. Ideally they are written and pushed with related code in PRs to ensure the docs are always up to date.

---

### `/font-awesome`

Icon fonts for the Memberlite theme.

---

### `/inc`

Theme PHP logic and internal APIs.

Typically contains:

* Theme setup and configuration
* Customizer logic
* Hooks, filters, and helper functions
* Integration logic with WordPress core and plugins

**Notes:**

* This is the primary "back-end" directory for the theme.
* Most extension points (filters/actions) live here.

---

### `/js`

JavaScript for the front end and back end, including the Customizer preview. Files are authored and committed directly — no build step.

---

### `/languages`

Translation files for internationalization.

Typically contains:

* `.pot`, `.po`, and `.mo` files

**Notes:**

* Used for theme localization.
* Strings throughout the theme should be wrapped in translation functions.

---

### `/shortcodes`

Where the theme's custom shortcodes are defined. This was previously part of Memberlite's Shortcode/Elements Add Ons.

---

### `/src`

Source files that require a build step before use.

Contains:

* `scss/` — Sass source files, compiled to `build/css/main.css`. See [CSS Guidelines](css-guidelines.md) for directory structure and conventions.
* `blocks/` — Custom Gutenberg block source (future use). Built with `@wordpress/scripts` to `build/`.
* `editor/` — Block editor settings and customizations (future use).

See [Build Process](build-process.md) for details.

---

### `/templates`

Top-level page templates.

Typically contains:

* Custom page templates registered with WordPress
* Specialized templates that don't fit cleanly into the default hierarchy

---

## Root-Level PHP Files

In addition to the folders above, the theme root contains key PHP files such as:

* `functions.php` – Bootstraps the theme and loads files from `/inc`
* Template hierarchy files (`index.php`, `single.php`, `page.php`, etc.)
* `style.css` – Theme metadata header and a small base stylesheet. The primary front-end stylesheet is `build/css/main.css`.
* `theme.json` – Block editor configuration. Memberlite is a hybrid WordPress theme, so the theme.json is minimal and syncs colors and fonts with the Customizer settings.

---

**Last Updated**: 2026-03-12
