<?php get_header(); ?>

<div id="wrapper" class="css">
	<div id="content">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php getBreadcrumbs(); ?>
		
		<aricle class="post single" id="post-<?php the_ID(); ?>">
			<header class="entry-header">
				<h1 class="entry-title"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
			</header>
				
			<div class="entry-content">
				<div class="entry-attachment">
					<div class="attachment">
						<?php
							echo wp_get_attachment_image( $post->ID, 'large');
						?>

						<?php if ( ! empty( $post->post_excerpt ) ) : ?>
						<div class="entry-caption">
							<?php the_excerpt(); ?>
						</div>
						<?php endif; ?>
					</div><!-- end attachment -->
				</div><!-- end entry-attachment -->

				<div class="entry-description">
					<?php the_content(); ?>
				</div><!-- end entry-description -->

			</div><!-- end entry-content -->
			
			<a class="btn btn-primary" href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment">&laquo; Return to <?php echo get_the_title($post->post_parent); ?></a>


		</article><!-- end #post-<?php the_ID(); ?> -->

		<?php endwhile; endif; ?>
		
			<div class="clear"></div>
		</div> <!-- end content -->
	
		<?php get_sidebar(); ?>
	
		<div class="clear"></div>
		
	</div> <!-- end wrapper -->
	
<?php get_footer(); ?>
