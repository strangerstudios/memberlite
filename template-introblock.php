<?php
/*
Template Name: Page - Intro Block
*/
?>
<?php 
	get_header(); 
?>

	<div id="wrapper" class="sc">
	
		<?php getBreadcrumbs(); ?>
	
		<div id="content">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post page" id="post-<?php the_ID(); ?>">
            								
				<div class="introtext">			
					<h1>
						<?php
							$longtitle = get_post_meta($post->ID, "longtitle", true);
							if($longtitle)
								echo $longtitle;
							else
								the_title();
						?>
					</h1>
					
					<?php if ( has_post_thumbnail() && !empty($pmprot_options['featured_images']) ) { ?>
						<div class="feat-medium">                            						
							<?php the_post_thumbnail( 'medium' ); ?>
						</div>
					<?php } ?>
					<?php 
						global $more;    // Declare global $more (before the loop).
						$more = 0;       // Set (inside the loop) to display content above the more tag.
						the_content('');
					?>
                    
					<div class="clear"></div>
				</div> <!-- end introtext -->
                
                
                <div class="pagetext">
                	<?php 
						global $more;    // Declare global $more (before the loop).
						$more = 1;       // Set (inside the loop) to display content above the more tag.				
						echo get_the_content_after_more();
					?>
                    <div class="clear"></div>
                    <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
                    <div class="clear"></div>
				</div> <!-- end pagetext -->                
               
			</div> <!-- end post -->
	
		<?php endwhile; endif; ?>  
	
			<div class="clear"></div>
		</div> <!-- end content -->
	
		<?php get_sidebar(); ?>
		
		<div class="clear"></div>
		
	</div> <!-- end wrapper -->
	
<?php get_footer(); ?>