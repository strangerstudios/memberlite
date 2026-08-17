# AI Review Conventions for Memberlite

This doc is read by AI reviewers (Flint's PR review council, GitHub Copilot) before reviewing
pull requests in this repo. It documents team conventions so reviews stop flagging intentional
process as defects. **Team members: edit this doc whenever you find yourself explaining the
same convention in a PR thread twice.**

## Build & generated files — committed at release, not per PR

`src/scss/` compiles to `build/css/main.css` and `build/css/main.rtl.css`; block/editor assets
compile to `build/` via wp-scripts (see `docs/build-process.md`). Compiled assets are committed
**during the pre-release process on the release branch** — or mid-PR only when a branch needs
QA by someone without a build environment (e.g. support).

- A feature PR that changes `src/scss/` without regenerating `build/css/*` is normal and
  correct. Do not flag missing build output as an issue, at any severity.
- When build files are included in a PR, they may contain unrelated compiled changes picked up
  from other merged branches — expected; verify source/build consistency only for what the PR
  claims to change.
- Legacy vanilla CSS in `css/` (e.g. `editor.css`) and JS in `js/` are edited directly and do
  ship from the diff — those are fair game for review.

## Version placeholders: `@since TBD` is intentional

Docblocks, `_deprecated_function()` / `_doing_it_wrong()` version args, and changelog headers
use the literal placeholder `TBD` during development. All TBDs are swapped for the real version
number en masse during pre-release. Never flag a `TBD` placeholder, and never ask which version
it will be.

## Release pipeline & branches

Feature PRs target `dev` or a long-running feature branch (e.g. `starter-sites`). The
pre-release pass on `dev` handles version numbers, changelog, translations, and build files;
then `dev` merges to `master` and is tagged. A feature PR — especially one targeting a feature
branch — is not a release candidate; don't hold it to release-readiness checks or frame
missing release steps as "this won't reach production."

## Back-compat and "existing sites"

Before claiming existing sites will be impacted by a change (migration concerns, silent
behavior changes), check whether the code being modified exists in the latest release tag.
Code that has only ever lived on `dev` or feature branches has no installed base — there are
no existing sites to protect.

## Color system (design-owned)

Scheme colors in `inc/colors.php` are chosen and contrast-validated by the theme's design
owner:

- `color_primary` and `color_action` are designed for contrast against the site background
  and/or site text color. They are never used as a foreground/background pair — don't flag
  their contrast against each other.
- A scheme's `color_primary` may intentionally equal its `color_button`. There is no rule that
  they differ.
- Design and contrast concerns that don't break function or accessibility of shipped defaults
  should be raised as questions to the design owner, not as severity-tagged issues.

## Code style

- WordPress coding standards, tabs for indentation. Yoda conditions are **not** enforced in
  this repo.
- New components use hyphenated class names (post-7.0 standard); older underscore classes
  (`.bg_primary`, etc.) remain for backwards compatibility. The coexistence is intentional.
- `!important` is used only to override WordPress core styles that specificity can't reach, or
  to hold a visual that editor settings could otherwise break. Flag new uses only with
  evidence a cleaner override exists.

## Deprecation policy

- `inc/deprecated.php` stubs are added only for functions a child theme could plausibly call
  directly. Internal-only functions (hooked but never called by name) may be removed outright
  with a changelog mention.
- Deprecated hooks get `_deprecated_hook()` notices.
- Classic-editor metabox settings are being progressively migrated to the block-editor
  Template Settings sidebar. A metabox losing controls is an accepted direction, not a
  regression.
