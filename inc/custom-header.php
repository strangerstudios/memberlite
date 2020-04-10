<?php
/**
 * Implement Custom Header functionality for Memberlite
 *
 * @package Memberlite
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses memberlite_header_style()
 * @uses memberlite_admin_header_style()
 * @uses memberlite_admin_header_image()
 */
function memberlite_custom_header_setup() {
    $custom_header = apply_filters(
        'memberlite_custom_header_args',
        array(
            'default-text-color' => '2c3e50',
            'height'             => 110,
            'width'              => 1440,
            'flex-height'        => true,
            'flex-height'        => true,
            'wp-head-callback'   => 'memberlite_header_style',
        )
    );
    add_theme_support( 'custom-header', $custom_header );
}
add_action('after_setup_theme', 'memberlite_custom_header_setup');

if ( ! function_exists( 'memberlite_header_style' ) ) :
    /**
     * Styles the header image and text displayed on the blog
     *
     * @see memberlite_custom_header_setup().
     */
    function memberlite_header_style() {
        $header_image = get_header_image();

        // If no custom options for text are set, let's bail.
        if ( empty( $header_image ) && display_header_text() ) {
            return;
        }

        // If we get this far, we have custom styles. Let's do this.
        ?>
        <style type="text/css">
        <?php
            // Has a Custom Header been added?
            if ( ! empty( $header_image ) ) { ?>
            .site-header {
                background-image: url(<?php header_image(); ?>);
                background-repeat: repeat;
                background-position: center center;
            }
        <?php }
            // Has the text been hidden?
            if ( ! display_header_text() ) { ?>
                .site-title,
                .site-description {
                clip: rect(1px, 1px, 1px, 1px);
                position: absolute;
            }
        <?php } ?>
        </style>
<?php }
endif; // memberlite_header_style
