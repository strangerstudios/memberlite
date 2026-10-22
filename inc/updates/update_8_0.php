<?php
/**
 * Memberlite 8.0 Update
 *
 * @package Memberlite
 * @since TBD
 */

// Updates run before functions.php loads inc/layout.php.
require_once get_template_directory() . '/inc/layout.php';

// Run updates for Memberlite 8.0
memberlite_migrate_legacy_layout_templates();
