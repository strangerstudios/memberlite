<?php
/**
 * The template for the home page.
 *
 * @package Memberlite
 */

 add_filter( 'memberlite_get_sidebar', '__return_false' );

 get_template_part( 'page' );
