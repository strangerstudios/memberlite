# Project Structure

This document describes the **top-level structure** of the Memberlite theme repository and explains the responsibility of each directory. It is intended to help developers quickly understand where code lives and where changes should be made.

## General Guidelines

* **Business back-end logic → `/inc`**
* **Reusable markup → `/components`**
* **Static assets → `/assets`**
* **Front-end CSS → `stylesheet.css` in root**
* **CSS for the editor, admin, print, utilities, etc. → `/css`**
* **JS for the front or back-end (including customizer) → `/js`**

When adding new functionality, prefer extending existing directories rather than creating new top-level folders unless there is a clear architectural need.

---

## Top-Level Directories

### `/assets`

Front-end assets for the theme.

Typically contains:

* CSS (Not compiled, we do not have a build process.)
* JavaScript used on the front end
* Images (mostly icons atm)
* Fonts that are used to customize Memberlite via the customizer settings or the block editor options

---

### `/bbpress`

bbPress specific template override for single user content.

---

### `/components`

Reusable theme components and partials for the header, footer, page and post templates.

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

* This is the primary “back-end” directory for the theme.
* Most extension points (filters/actions) live here.

---

### `/languages`

Translation files for internationalization.

Typically contains:

* `.pot`, `.po`, and `.mo` files

**Notes:**

* Used for theme localization.
* Strings throughout the theme should be wrapped in translation functions.

---

### `/shortodes`

Where the theme's custom shortcodes are defined. This was previously part of Memberlite's Shortcode/Elements Add Ons.

---

### `/templates`

Top-level page templates.

Typically contains:

* Custom page templates registered with WordPress
* Specialized templates that don’t fit cleanly into the default hierarchy

---

## Root-Level PHP Files

In addition to the folders above, the theme root contains key PHP files such as:

* `functions.php` – Bootstraps the theme and loads files from `/inc`
* Template hierarchy files (`index.php`, `single.php`, `page.php`, etc.)
* `style.css` – Theme metadata and base styles
* `theme.json` – Block editor configuration. Memberlite is a hybrid WordPress theme, so the theme.json is minimal and syncs colors and fonts with the customizer settings.

---

**Last Updated**: 2026-02-04
