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
	<div id="primary" class="medium-8 columns content-area">
		<?php do_action('before_main'); ?>
		<main id="main" class="site-main" role="main">
		<?php do_action('before_loop'); ?>
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
			<?php do_action('after_loop'); ?>
		</main><!-- #main -->
		<?php do_action('after_main'); ?>
	</div><!-- #primary -->
	<?php do_action('before_sidebar'); ?>
	<div id="secondary" class="medium-4 columns widget-area" role="complementary">
		<?php do_action('before_sidebar_widgets'); ?>
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
	<?php do_action('after_sidebar_widgets'); ?>
	</div><!-- #secondary -->
	<?php do_action('after_sidebar'); ?>
<?php get_footer(); ?>