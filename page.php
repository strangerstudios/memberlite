<?php 
	global $wrapperclass, $fullwidth;
	get_header(); 
?>

	<div id="wrapper" class="<?php if($wrapperclass) { echo $wrapperclass; } else { ?>sc<?php } ?>">

		<?php getBreadcrumbs(); ?>
	
		<div id="content">			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="page" id="post-<?php the_ID(); ?>">
				<h1 class="ribbon"><span class="ribbon-inner">
					<?php
						$longtitle = get_post_meta($post->ID, "longtitle", true);
						if($longtitle)
							echo $longtitle;
						else
							the_title();
					?>
				</span></h1>
		
				<div class="pagetext">					
					
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="img-featured img-medium">
							<?php the_post_thumbnail( 'medium' ); ?>
						</div>
					<?php } ?>
	
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
					
					<?php if(function_exists("after_the_content")) after_the_content(); ?>										
		
					<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
					<div class="clear"></div>
					
				</div> <!-- end pagetext -->
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
			</div> <!-- end post -->
			<?php endwhile; endif; ?>  	
			<div class="clear"></div>
		</div> <!-- end content -->
	
		<?php 
			if(!$fullwidth)
				get_sidebar(); 
		?>
	
		<div class="clear"></div>
	
	</div> <!-- end wrapper -->
	
<?php get_footer(); ?>