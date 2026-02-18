<?php
/**
 * Featured image for posts, for use within the loop
 */

$args = get_post_format() === 'image' ? array(
	'class' => 'aligncenter',
) : array();

if ( is_archive() ) {
	$memberlite_loop_images = get_theme_mod( 'memberlite_loop_images', $memberlite_defaults['memberlite_loop_images'] );
	if ( $memberlite_loop_images === 'show_both' ) {
		the_post_thumbnail(
			'medium',
			array(
				'class' => 'alignright',
			)
		);
	}
} else {
	the_post_thumbnail( 'memberlite-fullwidth', $args );
}


