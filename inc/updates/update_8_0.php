<?php
/**
 * Memberlite 8.0 Update
 *
 * @package Memberlite
 * @since TBD
 */

// Updates run before functions.php loads inc/layout.php and inc/page_banners.php.
require_once get_template_directory() . '/inc/layout.php';
require_once get_template_directory() . '/inc/page_banners.php';

// Run updates for Memberlite 8.0
memberlite_migrate_legacy_layout_templates();
memberlite_migrate_legacy_page_fields();
