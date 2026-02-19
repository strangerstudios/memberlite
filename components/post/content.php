<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Memberlite
 */
global $memberlite_defaults;
$post_class = get_post_type() === 'post' ? 'entry-header-grid' : '';
//@todo: Do we need memberlite_before/after_content_single hooks?
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>

	<?php get_template_part( 'components/post/entry', 'header' ); ?>

	<div class="entry-content">
		<?php do_action( 'memberlite_before_content_post' );
		get_template_part( 'components/post/post', 'featured-image' );

		if ( is_archive() || ( is_home() && get_post_type() === 'post' ) ) {
			//If we're on an archive or the blog posts list that isn't an archive
			$content_archives = get_theme_mod( 'content_archives', $memberlite_defaults['content_archives'] );
			if ( $content_archives === 'excerpt' ) {
				memberlite_the_excerpt();
			} else {
				memberlite_more_content();
				get_template_part( 'components/post/post', 'author-block' );
			}
		} else {
			the_content();

			if ( is_single() ) {
				// Only show author blocks on single posts if enabled
				get_template_part( 'components/post/post', 'author-block' );
			}
		}

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
				'after'  => '</div>',
			)
		);

		do_action( 'memberlite_after_content_post' ); ?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'components/post/entry', 'footer' ); ?>
</article><!-- #post-## -->
