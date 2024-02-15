<?php
/**
 * Settings class file.
 *
 * @package WordPress Plugin Template/Settings
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Settings class.
 */
class Blockable_Wordpress_Gutenberg_Blocks_Settings {

	/**
	 * The single instance of Blockable_Wordpress_Gutenberg_Blocks_Settings.
	 *
	 * @var     object
	 * @access  private
	 * @since   1.0.0
	 */
	private static $_instance = null; //phpcs:ignore

	/**
	 * The main plugin object.
	 *
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $parent = null;

	/**
	 * Prefix for Blockable.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $base = '';

	/**
	 * Available settings for plugin.
	 *
	 * @var     array
	 * @access  public
	 * @since   1.0.0
	 */
	public $settings = array();

	/**
	 * Constructor function.
	 *
	 * @param object $parent Parent object.
	 */
	public function __construct( $parent ) {
		$this->parent = $parent;

		$this->base = 'wpt_';

		// Add settings page to menu.
		add_action( 'admin_menu', array( $this, 'add_menu_item' ) );

	}


	/**
	 * Add settings page to admin menu
	 *
	 * @return void
	 */
	public function add_menu_item() {
		add_menu_page(
			__( 'Blockable Setting', 'blockable-wp' ),
			__( 'Blockable Setting', 'blockable-wp' ),
			'manage_options',
			'blockable-wp',
			array( $this, 'render_menu_page' ),
			'dashicons-image-filter',
			'2.2'
		);
		
	}

	/**
	 * Render menu page.
	 *
	 * @since 1.0.0
	 */
	public function render_menu_page() {

		$admin_dependencies = BLOCKABLE_WP_PLUGIN_DIR__ . 'build/admin.asset.php';

		if ( file_exists( $admin_dependencies ) ) {
			
			$admin_asset_file      = require $admin_dependencies;
			$admin_js_dependencies = ( ! empty( $admin_asset_file['dependencies'] ) ) ? $admin_asset_file['dependencies'] : [];
			$admin_version         = ( ! empty( $admin_asset_file['version'] ) ) ? $admin_asset_file['version'] : '1.0.0';
			// wp_enqueue_style( 
			// 	'blockable-wp-admin',
			// 	BLOCKABLE_WP_PLUGIN_URL__ . 'build/admin.css',
			// 	array(),
			// 	'1.0.0'
			// );
			// wp_enqueue_script( 
			// 	'blockable-wp-admin',
			// 	BLOCKABLE_WP_PLUGIN_URL__ . 'build/admin.js',
			// 	$admin_js_dependencies,
			// 	$admin_version ,
			// 	true
			// );
		}

		?>
		<div class="wrapper">
			<div id="blockable-wp" class="block-wrapper" style="margin-left: -20px; background-color: #f8fafc; min-height: 90dvh;"></div>
		</div>
		<?php
	}

	/**
	 * Main Blockable_Wordpress_Gutenberg_Blocks_Settings Instance
	 *
	 * Ensures only one instance of Blockable_Wordpress_Gutenberg_Blocks_Settings is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see Blockable_Wordpress_Gutenberg_Blocks()
	 * @param object $parent Object instance.
	 * @return object Blockable_Wordpress_Gutenberg_Blocks_Settings instance
	 */
	public static function instance( $parent ) {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $parent );
		}
		return self::$_instance;
	} // End instance()

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html( __( 'Cloning of Blockable_Wordpress_Gutenberg_Blocks_API is forbidden.' ) ), esc_attr( $this->parent->_version ) );
	} // End __clone()

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html( __( 'Unserializing instances of Blockable_Wordpress_Gutenberg_Blocks_API is forbidden.' ) ), esc_attr( $this->parent->_version ) );
	} // End __wakeup()

}
