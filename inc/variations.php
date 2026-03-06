<?php
/**
 * Helper functions for variations.
 *
 * @package Memberlite
 * @package Memberlite
 *
 * @since 7.0
 */

/**
 * Get the current variation for a given slug.
 *
 * @since 7.0
 *
 * @param string $slug The slug for the variation type (e.g., 'footer').
 * @return string The current variation slug, or 'default' if not set.
 */
function memberlite_get_variation( $slug ) {
    $variation = get_theme_mod( "memberlite_{$slug}_variation", 'default' );
    return ( empty( $variation ) ) ? 'default' : $variation;
}
