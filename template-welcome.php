<?php
/*
Template Name: Page - Welcome
*/	
	get_header(); 
?>

	<div id="wrapper" class="fw home">

		<div id="content">			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="page" id="post-<?php the_ID(); ?>">
				<div class="introtext">
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
					<?php edit_post_link('Edit this entry.', '<p><small>', '</small></p>'); ?>
					<div class="clear"></div>
				</div>				
			</div> <!-- end page -->
			<?php endwhile; endif; ?>  	
			
			<div class="wrapper-mid">
				<?php
					$args = array(
						'post_type'		=>	'page',
						'showposts'		=>	-1,
						'post_parent'	=>	$post->ID,
						'orderby'		=>	'menu_order',
						'order'			=>	'ASC'
					);
					
					// The Query
					query_posts( $args );
					
					$count = 0;
					// The Loop
					if ( have_posts() ) : while ( have_posts() ) : the_post();
						if($count == 2)
							$count = 0;
						$count++;
						?>
						<div id="hcol-<?=$post->ID?>" class="hcol hcol<?=$count?>">							
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="feat-thumb">                            						
									<?php the_post_thumbnail( 'thumbnail' ); ?>
	                            </div>
							<?php } ?>
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
							<?php edit_post_link('EDIT', '<small>', '</small>'); ?>
							<div class="clear"></div>							
						</div>
						<?php
							if($count == 2)
								echo "<div class='clear'></div>";
					endwhile; endif;
									
					// Reset Query
					wp_reset_query();					
				?>				
				<div class="clear"></div>
			</div> <!-- end wrapper-mid -->
						
			<div class="clear"></div>
		</div> <!-- end content -->			
	
		<div class="clear"></div>
	
	</div> <!-- end wrapper -->
	
<?php get_footer(); ?>