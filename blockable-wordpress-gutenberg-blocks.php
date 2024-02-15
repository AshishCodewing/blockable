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

/**
 * Main plugin file.
 *
 * @since 1.0.0
 */
defined('BLOCKABLE_WP_PLUGIN_FILE__') || define('BLOCKABLE_WP_PLUGIN_FILE__', __FILE__);

/**
 * Plugin directory.
 *
 * @since 1.0.0
 */
defined('BLOCKABLE_WP_PLUGIN_DIR__') || define('BLOCKABLE_WP_PLUGIN_DIR__', plugin_dir_path(BLOCKABLE_WP_PLUGIN_FILE__));
defined('BLOCKABLE_WP_PLUGIN_URL__') || define('BLOCKABLE_WP_PLUGIN_URL__', plugin_dir_url(BLOCKABLE_WP_PLUGIN_FILE__));

blockable_wordpress_gutenberg_blocks();
