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
	<header>
		<div class="entry-meta">
			<?php
			the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );

			echo Memberlite_Customize::sanitize_text_with_links( memberlite_get_entry_meta( $post, 'before' ) );  // WPCS: xss ok.
			?>
		</div><!-- .entry-meta -->
	</header>
	<div class="entry-content">
		<?php do_action( 'memberlite_before_content_single' );

		if ( get_post_format() == 'image' ) {
			the_post_thumbnail(
				'memberlite-fullwidth',
				array(
					'class' => 'aligncenter',
				)
			);
		}

		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
				'after'  => '</div>',
			)
		);

		get_template_part( 'components/post/entry', 'author-block' );

		do_action( 'memberlite_after_content_single' ); ?>
	</div><!-- .entry-content -->
	<?php get_template_part( 'components/post/entry', 'footer' ); ?>
</article><!-- #post-## -->
