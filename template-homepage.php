<?php
/*
Template Name: Homepage
*/
	get_header(); 
?>

	<div id="wrapper" class="fw home">

		<div id="content">			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="page" id="post-<?php the_ID(); ?>">
				<div class="pagetext">										
					<blockquote>
						<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
					</blockquote>
					<div class="clear"></div>
				</div> <!-- end pagetext -->
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
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
						if($count == 3)
							$count = 0;
						$count++;
						?>
						<div id="hcol-<?=$post->ID?>" class="hcol hcol<?=$count?>">
							<h3><?php the_title(); ?></h3>
							<?php edit_post_link('EDIT', '<small>', '</small>'); ?>
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="feat-thumb">                            						
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
	                            </div>
							<?php } ?>
							<?php the_content(); ?>
							<div class="clear"></div>							
						</div>
						<?php
							if($count == 3)
								echo "<div class='clear'></div>";
					endwhile; endif;
									
					// Reset Query
					wp_reset_query();					
				?>				
				<div class="clear"></div>
			</div> <!-- end wrapper-mid -->
			
			<div class="wrapper-sub">
				<?php dynamic_sidebar('Home Widgets'); ?>			
				<div class="clear"></div>
			</div> <!-- end wrapper-sub -->
			<div class="clear"></div>
		</div> <!-- end content -->			
	
		<div class="clear"></div>
	
	</div> <!-- end wrapper -->
	
<?php get_footer(); ?>