<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Memberlite
 */

get_header(); ?>

<div id="primary" class="large-12 columns content-area">
	<?php do_action( 'memberlite_before_main' ); ?>
	<main id="main" class="site-main" role="main">
		<section class="error-404">	
			<div class="entry-content">
				<div class="row">
					<div class="medium-8 medium-offset-2 columns">
						<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'memberlite' ); ?></h1>
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'memberlite' ); ?></p>
						<?php get_search_form(); ?>						
					</div>
				</div>
			</div>
		</section>
	</main><!-- #main -->
	<?php do_action( 'memberlite_after_main' ); ?>
</div><!-- #primary -->

<?php get_footer(); ?>
