<?php
/**
 * The template for the home page.
 *
 * @package Memberlite
 */

get_header(); ?>

<?php 
	if ( 'posts' == get_option( 'show_on_front' ) ) {
		get_template_part( 'index' );
	} else {
		/*
			If a page template is specified, use that
		*/
		$template = get_page_template();
		if( basename( $template ) != 'page.php' ) {
			//use the template they specified; using get_template_part here would complicate the code
			include( get_page_template() );
		} else {
			while ( have_posts() ) : the_post(); ?>
			<div class="row">
				<div id="primary" class="large-12 columns content-area">
					<main id="main" class="site-main" role="main">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
							<div class="home-content">
								<?php
									//if the masthead was overwritten, we need to show the excerpt
									$memberlite_masthead_content = apply_filters( 'memberlite_masthead_content', '' );
									if( $memberlite_masthead_content !== '' ) {
										the_content();
									} else {
										//we've already shown the excerpt in the masthead
										echo memberlite_get_the_content_after_more();
									}
								?>
								<?php
									wp_link_pages( array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
										'after'  => '</div>',
									) );
								?>
							</div><!-- .entry-content -->
							<footer class="entry-footer">
								<?php edit_post_link( __( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
							</footer><!-- .entry-footer -->
						</article><!-- #post-## -->
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .row -->
			<?php endwhile; // end of the loop. ?>
			<?php
		}
		?>
		<?php get_footer(); ?>
		<?php
	}
?>