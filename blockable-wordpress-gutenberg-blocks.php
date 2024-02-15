<?php
/**
 * Plugin Name: Blockable Wordpress Gutenberg Blocks
 * Version: 1.0.0
 * Plugin URI: http://www.hughlashbrooke.com/
 * Description: This is your starter template for your next WordPress plugin.
 * Author: Blockable
 * Author URI: http://www.hughlashbrooke.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: blockable-wordpress-gutenberg-blocks
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Blockable
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load plugin class files.
require_once 'includes/class-blockable-wordpress-gutenberg-blocks.php';
require_once 'includes/class-blockable-wordpress-gutenberg-blocks-settings.php';

// Load plugin libraries.
require_once 'includes/lib/class-blockable-wordpress-gutenberg-blocks-admin-api.php';
require_once 'includes/lib/class-blockable-wordpress-gutenberg-blocks-post-type.php';
require_once 'includes/lib/class-blockable-wordpress-gutenberg-blocks-taxonomy.php';

/**
 * Returns the main instance of Blockable_Wordpress_Gutenberg_Blocks to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Blockable_Wordpress_Gutenberg_Blocks
 */
function blockable_wordpress_gutenberg_blocks() {
	$instance = Blockable_Wordpress_Gutenberg_Blocks::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = Blockable_Wordpress_Gutenberg_Blocks_Settings::instance( $instance );
	}

	return $instance;
}

blockable_wordpress_gutenberg_blocks();
