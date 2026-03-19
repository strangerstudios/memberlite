<?php
/**
 * Title: Footer
 * Slug: memberlite/footer
 * Description: Insert the site footer content block.
 * Categories: memberlite-content
 * Keywords: footer, site footer
 * Block Types: memberlite/footer
 * Inserter: false
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */

$footer = memberlite_get_default_footer();
$footer_id = $footer ? $footer->ID : 0;
?>
<!-- wp:post-content {"postId":<?php echo (int) $footer_id; ?>,"postType":"memberlite_footer","layout":{"type":"constrained"}} /-->
