<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Memberlite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'components/post/entry', 'header' ); ?>
	<div class="entry-content">
		<?php do_action( 'memberlite_before_content_single' ); ?>

		<?php get_template_part( 'components/post/post', 'featured-image' );

		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
				'after'  => '</div>',
			)
		);

		get_template_part( 'components/post/post', 'author-block' );

		do_action( 'memberlite_after_content_single' ); ?>
	</div><!-- .entry-content -->
	<?php get_template_part( 'components/post/entry', 'footer' ); ?>
</article><!-- #post-## -->
