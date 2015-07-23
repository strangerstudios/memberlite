<?php
/**
 * The template for the home page.
 *
 * @package Memberlite
 */

get_header(); ?>

<?php 
	if ( 'posts' == get_option( 'show_on_front' ) ) 
	{
		include( get_home_template() );
	} 
	else 
	{
		?>
		<?php while ( have_posts() ) : the_post(); ?>
		<header class="masthead">
			<div class="row">
				<div class="large-12 columns">
					<?php
						global $more;
						$more = 0;
						the_content('');
						//echo apply_filters('the_content',get_the_content());
					?>
				</div>
			</div><!-- .row -->
		</header><!-- .masthead -->
		<div class="row">
			<div id="primary" class="large-12 columns content-area">
				<main id="main" class="site-main" role="main">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
						<div class="home-content">
							<?php 
								global $more;    // Declare global $more (before the loop).
								$more = 1;       // Set (inside the loop) to display content above the more tag.				
								echo get_the_content_after_more();
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
		<?php get_footer(); ?>
		<?php
	}
?>