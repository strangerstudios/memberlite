<?php
/**
 * Title: Meet the Team 2
 * Slug: memberlite/meet-the-team-2
 * Description: Showcase the team with a compelling message and headshots.
 * Categories: memberlite-team
 * Keywords: about, bio, instructor, coach, teacher, expert, team, people
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"align":"wide","className":"is-style-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-card alignwide" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Meet the Team', 'memberlite' ); ?></h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php esc_html_e( 'The people behind the scenes who are here to support your membership journey.', 'memberlite' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image aligncenter has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/christina-wocintechchat-com-lFntEHwQvi4-unsplash-sm.jpg" alt="<?php esc_attr_e( 'Photo of a smiling woman with long braided hair and arms crossed in front of her.', 'memberlite' ); ?>" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Emily Thompson</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image aligncenter has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/dylan-ferreira-jIM8kVsFKlM-unsplash-sm.jpg" alt="<?php esc_attr_e( 'Close up photo of a smiling man with dark hair on a blue.', 'memberlite' ); ?>" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Damien Delong</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image aligncenter has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/edward-cisneros-_H6wpor9mjs-unsplash-sm.jpg" alt="<?php esc_attr_e( 'Photo of a blond woman with glowing sunlight behind her head wearing a black v-neck top.', 'memberlite' ); ?>" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Cathryn Michaels</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image aligncenter has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/foto-sushi-ExVlW9b648Q-unsplash-sm.jpg" alt="<?php esc_attr_e( 'Photo of a smiling man with arms crossed in front of him wearing a red top in front of a blank grey backdrop.', 'memberlite' ); ?>" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Edwin Johnny</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image aligncenter has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/samuel-raita-RiDxDgHg7pw-unsplash-sm.jpg" alt="<?php esc_attr_e( 'Photo of a man with thick black glasses and blond hair smiling and looking to the right.', 'memberlite' ); ?>" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Richard Anders</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image aligncenter has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/alex-starnes-WYE2UhXsU1Y-unsplash-sm.jpg" alt="<?php esc_attr_e( 'Photo of a smiling woman with short black curly hair and a white peasant style top standing in a clothing store.', 'memberlite' ); ?>" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Aria DeVaugn</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
