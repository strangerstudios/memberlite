<?php
/**
 * Deprecated. The Landing Page template was removed; its pages use components/page/content-page.php.
 *
 * Kept so a child theme's copy of templates/landing.php still shows the page content.
 *
 * @package Memberlite
 * @deprecated 8.0
 */

_deprecated_file( basename( __FILE__ ), '8.0', 'components/page/content-page.php' );

get_template_part( 'components/page/content', 'page' );
