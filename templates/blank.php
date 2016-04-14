<?php
/**
Template Name: Landing Page
**/
$landing_page_level = get_post_meta($post->ID,'landing_page_level',true);
$landing_page_upsell = get_post_meta($post->ID,'landing_page_upsell',true);
$checkout_button = get_post_meta($post->ID,'landing_page_checkout_button',true);
$before_sidebar = get_post_meta($post->ID,'before_sidebar',true);

if(empty($checkout_button))
	$checkout_button = 'Select';	
get_header(); ?>

	<div id="primary" class="medium-<?php echo memberlite_getColumnsRatio(); ?> columns content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content-landing', 'page' ); ?>
			
			<?php endwhile; // end of the loop. ?>

			<?php if(!empty($landing_page_upsell)) { ?>
						
				<hr />
					
				<?php 
					if(is_numeric($landing_page_upsell))
						echo do_shortcode('[memberlite_levels levels="' . intval($landing_page_upsell) . '"]');
					else
						echo apply_filters('the_content', $landing_page_upsell);
				?>
			<?php } ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div id="secondary" class="medium-<?php echo memberlite_getColumnsRatio( 'sidebar' ); ?> columns widget-area" role="complementary">
		<?php
			if(!empty($before_sidebar)) 
			{ 
				echo apply_filters('the_content',$before_sidebar); 
			}
			else
			{
				echo do_shortcode('[memberlite_signup level="' . $landing_page_level . '" short="true" title="Sign Up Now"]'); 
			}
		?>
	</div>	
	
<?php get_footer(); ?>
