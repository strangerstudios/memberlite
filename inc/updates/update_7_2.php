<?php
/**
 * Memberlite 7.2 Update
 *
 * @package Memberlite
 * @since TBD
 */

// Updates run before functions.php loads inc/layout.php.
require_once get_template_directory() . '/inc/layout.php';

// Run updates for Memberlite 7.2
memberlite_migrate_legacy_layout_templates();
