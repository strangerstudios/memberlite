<?php
/**
 * Title: Newsletter Archive Preview
 * Slug: memberlite/newsletter-archive-preview
 * Description: Display recent newsletter issues using a query loop with a list layout, lock icon, and subscribe CTA.
 * Categories: memberlite-content
 * Keywords: newsletter, archive, issues, paid newsletter, query loop
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Recent Issues', 'memberlite' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"color-action"} -->
<p class="has-color-action-color has-text-color">[fa icon="lock"] <?php esc_html_e( 'Members-only content', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":2,"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false,"excludeCurrent":null}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"0"}}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"bottom":{"color":"var:preset|color|borders","width":"1px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--borders);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:post-title {"level":3,"isLink":true,"fontSize":"18"} /-->

<!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"textColor":"meta-link","fontSize":"14"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"color-primary"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#"><?php esc_html_e( 'Subscribe to Unlock All Issues', 'memberlite' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
