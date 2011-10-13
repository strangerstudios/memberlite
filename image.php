<?php get_header(); ?>

	<div id="wrapper">
	
		<div id="content" class="<?php if($sidebarfloat == 'left') { ?>right<?php } else { ?>left<?php } ?>">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			<?php 
				global $breadcrumbs;
				if($breadcrumbs && !is_front_page())
				{
				?>			
				<?php getBreadcrumbs(); ?>
				<?php
				}
			?>
		
				<div class="post single attachment" id="post-<?php the_ID(); ?>">
					
					<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="p-date"><?php the_time('F j, Y') ?> at <?php the_time() ?></div>
					
					<div class="posttext">
						<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?></a></p>
						
						<div class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></div>
	
						<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
						
					</div> <!-- end posttext -->
			
					<div class="postmetadata"><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment">&laquo; Return to <?php echo get_the_title($post->post_parent); ?></a></div>
				
				</div> <!-- end post -->
			
			<?php endwhile; endif; ?>
		
			<div class="clear"></div>
		</div> <!-- end content -->
	
		<?php get_sidebar(); ?>
	
		<div class="clear"></div>
		
	</div> <!-- end wrapper -->
	
<?php get_footer(); ?>
