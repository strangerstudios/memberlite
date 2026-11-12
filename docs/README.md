# Welcome to Memberlite's Docs!

## What is this?

The `docs` folder contains developer-focused documentation for Memberlite, including architecture, historical context, build process, hooks, and so on.
Whenever possible, we try to keep this documentation up-to-date with the latest version of Memberlite.

## Table of Contents

1. [Build Process](build-process.md)
2. [CSS Guidelines](css-guidelines.md)
3. [Customizer](customizer.md)
4. [Variations](variations.md)
5. [Patterns](patterns.md)
6. [Project Structure](project-structure.md)
7. [Alerts](alerts.md)
8. [Legacy Page Settings](legacy-page-settings.md)

## For AI agents working on this repo

`AGENTS.md` and `CLAUDE.md` at the theme root ship with the theme and are written for agents customizing a site that uses Memberlite. When you're working on Memberlite itself:

- **Reviewing a PR?** Read [ai-review.md](ai-review.md) first. It documents team conventions (build/generated files, `@since TBD` placeholders, release pipeline, design ownership), so intentional process doesn't get flagged as defects.
- **Adding design presets, block styles, hooks, or settings?** Update `DESIGN.md` in the same PR. It ships with the theme, and site builders' agents rely on it.
- Build layout and commands: [build-process.md](build-process.md), [project-structure.md](project-structure.md).
- Coding standards: WordPress coding standards, tabs. See `.github/CONTRIBUTING.md`.
