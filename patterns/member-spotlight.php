<?php
/**
 * Title: Member Spotlight
 * Slug: memberlite/member-spotlight
 * Description: A featured member profile card with photo, bio, and membership details for directories and community pages.
 * Categories: memberlite-community
 * Keywords: member, spotlight, profile, directory, featured, community
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"},"border":{"width":"1px","radius":"8px"}},"borderColor":"borders","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|10"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"30%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%"><!-- wp:image {"width":"200px","aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
<figure class="wp-block-image is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/samuel-raita-RiDxDgHg7pw-unsplash-sm.jpg" alt="Photo of a man with glasses and blonde hair." style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:200px;height:auto"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"70%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"fontSize":"30"} -->
<h3 class="wp-block-heading has-30-font-size">Member Spotlight: David Lindy</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"color-action","fontSize":"16"} -->
<p class="has-color-action-color has-text-color has-16-font-size"><strong>Premium Member Since 2021</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>David is a longtime community contributor who has helped onboard dozens of new members. His expertise in project management has made him an invaluable resource in our forums and mentorship program.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"className":"is-style-double"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-double"/>
<!-- /wp:separator -->

<!-- wp:quote {"textAlign":"center","className":"is-style-plain"} -->
<blockquote class="wp-block-quote has-text-align-center is-style-plain"><!-- wp:paragraph -->
<p><em>"Being part of this community has completely changed how I approach my work. The connections I've made here are priceless."</em></p>
<!-- /wp:paragraph --></blockquote>
<!-- /wp:quote --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"color-primary"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#">Browse the Member Directory</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
