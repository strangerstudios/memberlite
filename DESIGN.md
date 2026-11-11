# Designing with Memberlite

A reference for designers and AI agents building pages, patterns, and layouts with the Memberlite theme in the WordPress block editor. Use the presets and classes listed here instead of hard-coded values. Then every design follows the site's color scheme, fonts, and spacing when they change in the Customizer.

This file ships with the theme. Developer docs (build process, architecture) live in the theme's GitHub repository.

## Rules

1. **Use presets, not raw values.** Colors, gradients, font sizes, and spacing all have presets. A hex color or a pixel value in block markup will not follow a color scheme change.
2. **Start from a pattern.** Memberlite ships patterns for heroes, CTAs, pricing, features, testimonials, teams, and more (see [Patterns](#patterns)). Adapt one before building from scratch.
3. **Pair background and text colors.** When you set a background, set the matching text color from the same pair (see [Colors](#colors)).
4. **Layer, don't stack effects.** A section can have one background (color, image, or gradient), one gradient over an image, and one texture. Don't add more.
5. **Keep text readable.** Text over a photo needs an overlay or a scrim gradient. Check contrast in both light and dark color schemes.

## Colors

Colors come from the active color scheme, set in Appearance > Customize > Colors. Reference them by slug: `"backgroundColor":"base"` in block attributes, or `var(--wp--preset--color--base)` in CSS.

| Slug | Role | Pairs with |
| --- | --- | --- |
| `base` | Site background | `body-text` |
| `body-text` | Body text | `base` |
| `color-primary` | Brand color: headings, accents, bold sections | `white` or `base` (check contrast) |
| `color-secondary` | Supporting accent | `white` or `base` (check contrast) |
| `color-action` | Calls to action, highlights | `base` or `body-text` |
| `buttons` / `buttons-hover` | Button fill and hover | Theme button styles handle text |
| `borders` | Rules, dividers, card borders | — |
| `site-navigation-background` | Navigation bar background | `site-navigation-link` |
| `page-masthead-background` | Page title banner background | `page-masthead` |
| `footer-widgets-background` | Footer widget area background | `footer-widgets` |
| `white` | Static white | Dark backgrounds |

Color schemes can be light or dark. Never assume `base` is white.

## Gradients

Gradient presets are built from the scheme colors, so they change with the color scheme. Set them from a block's Background or Color panel.

| Slug | Use it for |
| --- | --- |
| `primary-to-secondary` | Bold brand sections and CTA bands. Pair with `white` text. |
| `primary-to-action` | High-energy CTAs and promo banners. Pair with `white` text. |
| `primary-glow` | A soft brand glow at the top of a section. Layer it over a `base` background color. |
| `mesh` | Soft multi-color hero and feature backgrounds. Opaque; pair with `body-text`. |
| `soft-wash` | A subtle tint that sets a section apart from the page. |
| `fade-to-background` | Over a background image, blends the bottom of a section into the page. |
| `bottom-scrim` | Over a photo, darkens the bottom so light text stays readable. |

### Group with a background image and a gradient

A Group can layer a gradient over its background image. Both live in `style.background` in the block comment. WordPress adds them to the HTML when the page renders, so the saved `<div>` has no background styles or classes.

```html
<!-- wp:group {"style":{"background":{"gradient":"var:preset|gradient|bottom-scrim","backgroundImage":{"url":"https://example.com/photo.jpg","source":"file"},"backgroundSize":"cover"}},"textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-color has-text-color">
	<!-- inner blocks -->
</div>
<!-- /wp:group -->
```

### Cover with a gradient overlay

On a Cover block, the gradient is the overlay. Use `dimRatio` 100 so the gradient shows at full strength. Scrims and fades are already partly transparent.

```html
<!-- wp:cover {"url":"https://example.com/photo.jpg","dimRatio":100,"gradient":"bottom-scrim","layout":{"type":"constrained"}} -->
<div class="wp-block-cover"><img class="wp-block-cover__image-background" alt="" src="https://example.com/photo.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-bottom-scrim-gradient-background"></span><div class="wp-block-cover__inner-container">
	<!-- inner blocks -->
</div></div>
<!-- /wp:cover -->
```

If you're unsure of a block's saved markup, build the block in the editor and copy it from the Code Editor view.

## Textures

Textures are subtle patterns drawn over a block's background. Add one class to a **Group, Columns, Column, or Cover** block. In the editor, use Advanced > Additional CSS class(es). In markup, use the `className` attribute.

| Class | Look |
| --- | --- |
| `has-texture-dots` | Dot grid |
| `has-texture-grid` | Fine square grid |
| `has-texture-lines` | Diagonal lines |
| `has-texture-waves` | Rows of soft waves |
| `has-texture-grain` | Paper or film grain |

- Textures are drawn in the block's text color at low opacity, so they work on light and dark backgrounds. Set the text color, and the texture follows.
- Textures combine with block styles (Card, slanted Covers), background colors, gradients, and background images.
- On a Cover, the texture sits above the image and overlay and below the content.
- Use one texture per block, and texture only a few sections on a page.
- To change the strength, set the `--memberlite-texture-opacity` custom property in a child theme or custom CSS (for example, `0.3`).

```html
<!-- wp:group {"className":"has-texture-dots","style":{"background":{"gradient":"var:preset|gradient|primary-glow"}},"backgroundColor":"base","textColor":"body-text","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-texture-dots has-body-text-color has-base-background-color has-text-color has-background">
	<!-- inner blocks -->
</div>
<!-- /wp:group -->
```

## Block styles

Choose these in the block's Styles panel. In markup, the style is the class `is-style-{name}`. A block can have only one block style.

| Block | Styles |
| --- | --- |
| Group, Columns, Column, Query Loop post template, PMPro Single Level | `card` |
| Cover | `scroll-indicator`, `slant-bottom-right`, `slant-bottom-left` |
| Button | `arrow-fill`, `arrow-plain` |
| Heading | `heading-rule` |
| List | `plain`, `horizontal-left`, `horizontal-center` |
| Separator | `faded-edges`, `double`, `flourish-diamond` |
| Search | `filled-pill`, `filled-sharp`, `icon-round`, `icon-square` |
| Accordion | `accrdn-caret` |
| Login/out | `loginout-button` |
| Post Title | `title-podcast`, `title-video` |

## Typography

- **Font families:** use `heading` and `body`. They follow the fonts chosen in the Customizer. Other bundled families are available, but only pick one on purpose for display text.
- **Font sizes** (slugs, fluid on small screens): `14`, `16`, `18`, `21`, `24`, `30`, `32`, `36`, `42`, `54`. Body text is `18`. For hero headings, use `42` or `54`.

## Spacing and layout

- **Spacing presets** (fluid): `10`, `20`, `30`, `40`, `50`, `60`, `70`. In markup, use `var:preset|spacing|50`. Section padding is usually `50` to `70`; gaps inside a section are `10` to `30`.
- **Widths:** content is 805px and wide is 1230px. Use `alignwide` and `alignfull` for wider sections.
- **Radius:** match the theme by using the card style or `var(--wp--custom--border--radius)`.

## Patterns

Pattern slugs start with `memberlite/`. Find them in the inserter under these categories: About, Accordion, Call to Action, Community, Content, Courses, Features, Footer Variations, Header Variations, Hero, Media, Pricing, Query Loops, Team, and Testimonials. Each category label starts with "Memberlite -".
