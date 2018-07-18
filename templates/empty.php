<?php
/**
 * Template Name: Empty
 */

get_header( 'empty' );

while ( have_posts() ) : the_post();
	the_content();
endwhile;

get_footer( 'empty' );