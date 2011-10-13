<?php
/*
Template Name: Homepage
*/
?>
<?php 
	get_header(); 
?>

	<div id="wrapper" class="page-introblock home">
	
		<div id="content">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post page" id="post-<?php the_ID(); ?>">
            				
				<div class="introtext">
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
                    
					<?php
						$count = 0; 
						query_posts('orderby=menu_order&order=asc&post_parent=' . $post->ID . '&post_type=page&post_status=publish&showposts=-1');
						if ( have_posts() ) : while ( have_posts() ) : the_post();	
						global $more;
						$more = 0;
						$count++;
						?>					
						<div class="ss_pg-excerpt">
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<div class="feat-thumb">                            						
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>

                            </div>

                            <?php the_content('<small>Continue reading about <strong>' . get_the_title() . '</strong> &raquo;</small>'); ?>
							<div class="clear"></div>
						</div> <!-- end ss_pg-excerpt -->
                        
                         <?php
							  if($count % 2 == 0)
							  {
						  ?>
							  <div class="clear"></div>
						  <?php
							  }
						  ?>
                        
                        
						<?php 
						endwhile; endif;
	
						//Reset Query
						wp_reset_query();
					?>                    			
					<div class="clear"></div>
					<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
                    <div class="clear"></div>
				</div> <!-- end pagetext -->                
               
			</div> <!-- end post -->
	
		<?php endwhile; endif; ?>  
	
			<div class="clear"></div>
		</div> <!-- end content -->
	
		<div class="clear"></div>
		
	</div> <!-- end wrapper -->
	
<?php get_footer(); ?>