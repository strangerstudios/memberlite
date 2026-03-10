# Memberlite Block Patterns

This document explains how block patterns are set up in the Memberlite theme and provides guidelines for contributors who want to add new patterns or fix existing ones.

## Table of Contents

1. [Overview](#overview)
2. [Directory Structure](#directory-structure)
3. [How Patterns Work](#how-patterns-work)
4. [Adding a New Pattern](#adding-a-new-pattern)
5. [Fixing Existing Patterns](#fixing-existing-patterns)
6. [Image Guidelines](#image-guidelines)
7. [Pattern Categories](#pattern-categories)

---

## Overview

Memberlite uses WordPress's native block pattern registration system. Patterns are pre-designed block layouts that users can insert into their pages/posts via the block inserter in the WordPress editor.

**Key Features:**
- **Auto-registration**: Patterns are automatically registered by WordPress when placed in the `patterns/` folder
- **Custom categories**: 8 Memberlite-specific categories organize patterns by use case
- **Reusable images**: Dedicated image library specifically for pattern placeholder content

---

## Directory Structure

```
wp-content/themes/memberlite/
├── patterns/                          # Pattern PHP files (auto-registered by WordPress)
│   ├── about-the-founder.php
│   ├── board-of-directors.php
│   ├── [29 other pattern files]
│   └── images/                        # Pattern-specific images
│       ├── experts/                   # Instructor photos, podcast hosts, expert headshots
│       │   ├── cathryn-lavery-fMD_Cru6OTk-unsplash-md.jpg
│       │   └── [25 other images]
│       ├── landscapes/                # Background images, scenery, hero images
│       │   ├── joshua-earle-9idqIGrLuTE-unsplash-md.jpg
│       │   └── [19 other images]
│       └── people/                    # Team members, testimonials, general people photos
│           ├── alex-starnes-WYE2UhXsU1Y-unsplash-sm.jpg
│           └── [25 other images]
│
├── inc/
│   └── patterns.php                   # Registers custom pattern categories
│
└── assets/images/                     # Theme-wide images (NOT for patterns)
    └── [theme assets]
```

---

## How Patterns Work

### Automatic Registration

WordPress automatically registers any PHP file in the `patterns/` directory as a block pattern. No manual registration code is needed.

### Pattern File Format

Each pattern file must follow this structure:

```php
<?php
/**
 * Title: Pattern Name
 * Slug: memberlite/pattern-slug
 * Description: Brief description of what this pattern does
 * Categories: category-slug, another-category
 * Keywords: keyword1, keyword2, keyword3
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- Block markup starts here -->
<!-- wp:group {...} -->
<div class="wp-block-group">
    <!-- Pattern content -->
</div>
<!-- /wp:group -->
```

**Metadata Fields:**
- **Title**: Human-readable name shown in block inserter (plain text, no translation functions)
- **Slug**: Unique identifier in format `memberlite/pattern-name`
- **Description**: Short explanation of the pattern's purpose
- **Categories**: Comma-separated list of category slugs (see [Pattern Categories](#pattern-categories))
- **Keywords**: Search terms to help users find the pattern

### Category Registration

Custom categories are registered in `inc/patterns.php`:

```php
function memberlite_register_pattern_categories() {
    $categories = array(
        'memberlite-about'        => __( 'Memberlite - About', 'memberlite' ),
        'memberlite-community'    => __( 'Memberlite - Community', 'memberlite' ),
        // ... more categories
    );

    foreach ( $categories as $category_id => $category_name ) {
        register_block_pattern_category(
            $category_id,
            array( 'label' => $category_name )
        );
    }
}
add_action( 'init', 'memberlite_register_pattern_categories' );
```

---

## Adding a New Pattern

### Method 1: Create Pattern in Block Editor (Recommended)

1. **Build your pattern** in the WordPress block editor on a test page
2. **Copy the block markup**:
   - Select all blocks in your pattern
   - Click the three dots menu → Copy
   - This copies the HTML comment markup
3. **Create a new PHP file** in `patterns/` directory (e.g., `my-new-pattern.php`)
4. **Add the pattern structure**:

```php
<?php
/**
 * Title: My New Pattern
 * Slug: memberlite/my-new-pattern
 * Description: A brief description of what this pattern does
 * Categories: memberlite-cta
 * Keywords: marketing, call to action
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- Paste your copied block markup here -->
```

5. **Fix image paths** (if your pattern includes images):
   - Replace any image URLs with the proper PHP format (see [Image Path Rules](#image-path-rules))
6. **Test the pattern**:
   - Refresh the block editor
   - Search for your pattern by name or keyword
   - Insert it and verify it displays correctly

### Method 2: Duplicate and Modify Existing Pattern

1. **Find a similar pattern** in the `patterns/` directory
2. **Copy the file** and rename it (e.g., `cp testimonials-grid-of-two.php testimonials-grid-of-three.php`)
3. **Update the metadata** at the top of the file
4. **Modify the block markup** as needed
5. **Update image paths** if necessary
6. **Test the pattern**

---

## Fixing Existing Patterns

### Common Issues and Fixes

#### 1. Broken Image URLs

**Problem**: Images not loading in pattern.

**Cause**: Incorrect image path format.

**Fix**: Ensure all image URLs use this exact format:

```html
<!-- CORRECT -->
<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/filename.jpg" alt="Description">

<!-- WRONG - Missing PHP code -->
<img src="/patterns/images/people/filename.jpg" alt="Description">

<!-- WRONG - Old string concatenation syntax -->
<img src="' . esc_url( get_template_directory_uri() ) . '/patterns/images/people/filename.jpg" alt="Description">
```

#### 2. Unclosed Quotation Marks

**Problem**: Pattern breaks or displays oddly.

**Cause**: Missing closing quotes on `src` or `alt` attributes.

**Fix**: Check all `<img>` tags have properly closed attributes:

```html
<!-- CORRECT -->
<img src="path/to/image.jpg" alt="Description" />

<!-- WRONG - Missing closing quote after .jpg -->
<img src="path/to/image.jpg alt="Description" />

<!-- WRONG - Missing opening quote for alt -->
<img src="path/to/image.jpg" alt=Description" />
```

#### 3. Pattern Not Appearing in Block Inserter

**Possible causes:**
- Missing or incorrect metadata in DocBlock comment
- Invalid category slug in `Categories:` field
- PHP syntax error in the file
- File not saved with `.php` extension

**Fix**: Verify the pattern file structure matches the format shown in [Pattern File Format](#pattern-file-format).

---

## Image Guidelines

### Image Path Rules

All images used in patterns **must** be stored in the `patterns/images/` directory structure and referenced using this format:

```php
<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/SUBDIRECTORY/filename.jpg
```

**Subdirectory Guidelines:**

| Subdirectory | Use For | Examples |
|--------------|---------|----------|
| `experts/` | Instructor photos, podcast hosts, expert headshots, individual professional portraits | about-the-founder, instructor-profile, video-feature-section |
| `people/` | Team members, board members, testimonials, directory photos, general people | meet-the-team, board-of-directors, testimonials-grid |
| `landscapes/` | Background images, scenery, hero images, abstract backgrounds | call-to-action-with-image, hero sections |

**Image Size Conventions:**
- `-sm.jpg` = Small (typically under 400px wide)
- `-md.jpg` = Medium (typically 400-1200px wide)
- Use `-sm` for thumbnails, avatars, small decorative images
- Use `-md` for hero images, featured images, large displays

### Why patterns/images/ Instead of assets/images/?

**Reason 1: Portability**
Patterns are designed to be copy-paste reusable. When patterns reference images in their own directory, the images travel with the patterns if they're ever extracted, shared, or moved to another theme.

**Reason 2: Organization**
Pattern placeholder images serve a different purpose than theme assets:
- **Pattern images** = Placeholder/demo content meant to be replaced by users
- **Theme assets** = Structural images (logos, icons, backgrounds) that are part of the theme's design

**Reason 3: Licensing Clarity**
Keeping pattern images separate makes it clear which images are:
- Demo content (can be replaced without affecting theme functionality)
- Core theme assets (required for theme to function properly)

### Image Sources and Copyright

**Current Source**: [Unsplash](https://unsplash.com/)

**License Requirements**:
Only use images that meet ONE of these criteria:
- ✅ **Public domain** (CC0, no attribution required)
- ✅ **Open source license** without attribution requirements
- ✅ **Unsplash License** (free to use, no attribution required but appreciated)

**Do NOT use images that:**
- ❌ Require attribution (unless you add proper attribution in the pattern)
- ❌ Are copyrighted without permission
- ❌ Have restrictive commercial use clauses
- ❌ Require link-backs or credit

**Best Practice**: When downloading from Unsplash:
1. Copy the photo credit from Unsplash
2. Include photographer name in the image filename (we already do this: `photographer-name-photoId-unsplash-sm.jpg`)
3. Add detailed `alt` text describing the image
4. Consider adding a credit comment in the pattern file:

```php
<!-- Image credit: Photo by [Photographer Name] on Unsplash -->
<img src="..." alt="..." />
```

### Adding New Images

1. **Download image** from Unsplash (or other approved source)
2. **Rename following convention**: `photographer-name-photoId-unsplash-size.jpg`
   - Example: `alex-starnes-WYE2UhXsU1Y-unsplash-sm.jpg`
3. **Save to appropriate subdirectory**:
   - `patterns/images/experts/` for individual professional portraits
   - `patterns/images/people/` for team/group photos
   - `patterns/images/landscapes/` for backgrounds/scenery
4. **Optimize image** before committing:
   - Compress to reasonable file size (use tools like ImageOptim, TinyPNG)
   - Aim for under 200KB for `-sm`, under 500KB for `-md`
5. **Use in pattern** with proper path format

---

## Pattern Categories

### Available Categories

| Category Slug | Label | Use For |
|---------------|-------|---------|
| `memberlite-about` | Memberlite - About | About pages, founder bios, organization info |
| `memberlite-community` | Memberlite - Community | Member spotlights, community features, directory sections |
| `memberlite-content` | Memberlite - Content | Content upgrades, post grids, newsletter sections |
| `memberlite-courses` | Memberlite - Courses | Course layouts, curriculum, instructor profiles |
| `memberlite-cta` | Memberlite - Call to Action | Marketing, promotions, membership CTAs |
| `memberlite-media` | Memberlite - Media | Video, podcast, media features |
| `memberlite-team` | Memberlite - Team | Team grids, staff listings, board members |
| `memberlite-testimonials` | Memberlite - Testimonials | Reviews, social proof, user feedback |

### Using Multiple Categories

Patterns can belong to multiple categories. Separate them with commas:

```php
/**
 * Categories: memberlite-about, memberlite-team
 */
```

### Adding a New Category

If you need to add a new pattern category:

1. **Edit** `inc/patterns.php`
2. **Add to the `$categories` array**:

```php
$categories = array(
    // ... existing categories ...
    'memberlite-yourcategory' => __( 'Memberlite - Your Category', 'memberlite' ),
);
```

3. **Use the new category** in pattern files:

```php
/**
 * Categories: memberlite-yourcategory
 */
```

---

## Testing Patterns

### Manual Testing Checklist

- [ ] Pattern appears in block inserter
- [ ] Pattern is in correct category
- [ ] All images load correctly
- [ ] Pattern is responsive (test mobile, tablet, desktop)
- [ ] Pattern respects theme colors/fonts
- [ ] No PHP errors in debug.log
- [ ] No JavaScript console errors
- [ ] Pattern works with different color schemes (if applicable)

### Quick Test in Browser

1. Go to **Pages → Add New** in WordPress admin
2. Click the **Pattern icon** (grid) in the block inserter
3. Search for your pattern by name or browse categories
4. Insert the pattern and verify it looks correct
5. Test editing the pattern content (change text, swap images)

---

## Troubleshooting

### Pattern Not Showing Up

1. **Check file location**: Must be in `patterns/` directory
2. **Check file extension**: Must be `.php`
3. **Check metadata format**: DocBlock must be formatted correctly
4. **Check for PHP errors**: Look in `wp-content/debug.log`
5. **Clear cache**: If using caching plugins, clear cache

### Images Not Loading

1. **Verify image exists** at the specified path
2. **Check path format**: Must use `<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/...`
3. **Check file permissions**: Images must be readable by web server
4. **Check subdirectory**: Make sure image is in correct folder (experts/people/landscapes)

### Pattern Breaks Layout

1. **Validate HTML**: Check for unclosed tags, mismatched quotes
2. **Check for missing closing quotes** on attributes
3. **Test in isolation**: Try pattern on a blank page to isolate issues
4. **Compare with working pattern**: Look at similar patterns that work correctly

---

## Additional Resources

- [WordPress Block Pattern Documentation](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/)
- [Unsplash License](https://unsplash.com/license)
- [WordPress Block Markup Reference](https://developer.wordpress.org/block-editor/reference-guides/)

---

**Last Updated**: 2026-03-10
