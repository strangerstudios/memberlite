<?php
/**
 * Title: Community CTA With Photo Gallery
 * Slug: memberlite/community-cta-with-gallery
 * Description: Full-width banner with a heading, join button, and photo gallery grid. Uses the page masthead background/text pair rather than Primary/Secondary, since only the masthead colors are guaranteed to stay readable together across every color scheme. Content is static and should be customized per site.
 * Categories: memberlite-community
 * Keywords: community, cta, gallery, photos, join
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|50"}}},"backgroundColor":"page-masthead-background","textColor":"page-masthead","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-page-masthead-color has-page-masthead-background-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:columns {"verticalAlignment":"bottom","align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-bottom" style="margin-bottom:var(--wp--preset--spacing--30)"><!-- wp:column {"verticalAlignment":"bottom","width":"66.66%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:66.66%"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}}} -->
<p style="text-transform:uppercase"><strong>Community</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}},"typography":{"lineHeight":"1.2"}},"fontSize":"54"} -->
<h2 class="wp-block-heading has-54-font-size" style="margin-top:var(--wp--preset--spacing--10);line-height:1.2">Find your people. Join the conversation.</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"33.33%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:33.33%"><!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"width":100,"className":"is-style-outline","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"fontSize":"21"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline"><a class="wp-block-button__link has-21-font-size has-custom-font-size wp-element-button" style="letter-spacing:1px;text-transform:uppercase">Join us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:gallery {"linkTo":"none","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"},"margin":{"bottom":"0"}}}} -->
<figure class="wp-block-gallery alignwide has-nested-images columns-default is-cropped" style="margin-bottom:0"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/constantin-panagopoulos-9lf_erPHYG0-unsplash-sm.jpg" alt="Person smiling while talking with a group."/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/christina-wocintechchat-com-3sY92eKV6-Y-unsplash-md.jpg" alt="Person working on a laptop at a desk."/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/austin-distel-PkS3hCZmYts-unsplash-sm.jpg" alt="Two people reviewing notes together at a table."/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/christina-wocintechchat-com-3sY92eKV6-Y-unsplash-sm.jpg" alt="Person working on a laptop at a desk."/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/dylan-ferreira-HJmxky8Fvmo-unsplash-md.jpg" alt="Person smiling in a casual indoor setting."/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/emmanuel-ikwuegbu-Gy_G8PMkPSc-unsplash-sm.jpg" alt="Person smiling outdoors."/></figure>
<!-- /wp:image --></figure>
<!-- /wp:gallery --></div>
<!-- /wp:group -->
