<?php
/**
 * Template Name: Narrow Width
 *
 * The template for displaying pages with the Narrow Width template.
 *
 * @package Memberlite
 */

add_filter( 'memberlite_get_sidebar', '__return_false' );

get_template_part( 'page' );
