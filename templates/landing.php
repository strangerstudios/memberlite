<?php
/**
Template Name: Landing Page
**/
$pmproal_landing_page_level = get_post_meta($post->ID,'_pmproal_landing_page_level',true);
$memberlite_banner_desc = get_post_meta($post->ID, '_memberlite_banner_desc', true);
$memberlite_landing_page_checkout_button = get_post_meta($post->ID,'_memberlite_landing_page_checkout_button',true);
$memberlite_landing_page_upsell = get_post_meta($post->ID,'_memberlite_landing_page_upsell',true);
if(empty($memberlite_landing_page_checkout_button))
	$memberlite_landing_page_checkout_button = 'Select';	
get_header(); ?>
	<div id="primary" class="medium-8 columns content-area">
		<?php do_action('before_main'); ?>
		<main id="main" class="site-main" role="main">
		<?php do_action('before_loop'); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content-landing', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
			<?php if(!empty($memberlite_landing_page_upsell) && ($memberlite_landing_page_upsell != 'blank') ) { ?>
				<hr />				
				<?php 
					if(is_numeric($memberlite_landing_page_upsell))
						echo do_shortcode('[memberlite_levels levels="' . intval($memberlite_landing_page_upsell) . '"]');
				?>
			<?php } ?>
			<?php do_action('after_loop'); ?>
		</main><!-- #main -->
		<?php do_action('after_main'); ?>
	</div><!-- #primary -->
	<?php
		if(defined('PMPRO_VERSION'))
		{
			$level = pmpro_getLevel($pmproal_landing_page_level);
			if(!empty($level))
			{
				do_action('before_sidebar'); ?>
				<div id="secondary" class="medium-4 columns widget-area" role="complementary">
					<?php do_action('before_sidebar_widgets'); ?>
					<?php 
						$memberlite_custom_sidebar = get_post_meta($post->ID, '_memberlite_custom_sidebar', true);
						$memberlite_default_sidebar = get_post_meta($post->ID, '_memberlite_default_sidebar', true);
						if(empty($memberlite_default_sidebar) || $memberlite_default_sidebar == 'default_sidebar_above')
						{
							echo do_shortcode('[memberlite_signup level="' . $pmproal_landing_page_level . '" short="true" title="Sign Up Now"]'); 
						}		
						if(!empty($memberlite_custom_sidebar))
						{
							//Custom sidebar
							dynamic_sidebar($memberlite_custom_sidebar);
						}
						if(!empty($memberlite_default_sidebar) && $memberlite_default_sidebar == 'default_sidebar_below')
						{
							echo do_shortcode('[memberlite_signup level="' . $pmproal_landing_page_level . '" short="true" title="Sign Up Now"]'); 
						}
					?>
				<?php do_action('after_sidebar_widgets'); ?>
				</div><!-- #secondary -->
				<?php do_action('after_sidebar'); ?>
				<?php
			}
		else
			get_sidebar();
		}
	?>
<?php get_footer(); ?>