# Memberlite: Notes for AI Agents

Memberlite is a classic WordPress theme for membership sites, with block editor and `theme.json` support, from the makers of Paid Memberships Pro. These notes are for agents helping someone build or customize a site that uses it.

- **Read `DESIGN.md` before designing or customizing.** It covers colors, gradients, textures, block styles, typography, spacing, patterns, layouts, header and footer variations, hooks, and what changed in 8.0.
- **Don't edit files in this theme folder.** Theme updates replace it. Put PHP and CSS in a child theme or a plugin, and use block markup and Customizer settings for design. Never edit `build/`; it's compiled from source in the theme's GitHub repository.
- **Check the code here before relying on memory.** Memberlite 8.0 replaced page templates and the Memberlite Settings meta box, and older function names and hooks are deprecated. Search this folder to confirm a function, hook, or setting exists. The installed version is in `style.css`.

## Working on a live site

- **Ask the site owner before changing anything,** and say what you'll change. Back up the database before bulk changes, such as `wp search-replace` or editing many posts. Use a staging site when there is one.
- **Use WP-CLI when it's available.** Memberlite's Customizer settings are theme mods of the active theme: `wp theme mod list`, `wp theme mod get <name>`, and `wp theme mod set <name> <value>`. A child theme has its own theme mods, separate from the parent's. Color values are stored as hex without `#`.
- **Check Memberlite > Alerts** in the WordPress admin after updating Memberlite. It lists content and settings the update changed, with fixes.
- **Stay inside the theme's job.** Don't edit WordPress core, `wp-config.php`, or other plugins' files, and don't deactivate plugins unless the site owner asks.

Working on Memberlite itself? Contributor docs are in the `docs/` folder of https://github.com/strangerstudios/memberlite. They aren't included in the theme download.
