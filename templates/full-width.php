<?php
/**
 * Template Name: Full Width
 *
 * The template for displaying pages with the Full Width template.
 *
 * @package Memberlite
 */

add_filter( 'memberlite_get_sidebar', '__return_false' );

get_template_part( 'page' );
