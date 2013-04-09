<?php
/*
	Plugin Name: WooCommerce Nosto Tagging
	Plugin URI: http://wordpress.org/extend/plugins/woocommerce-nosto-tagging/
	Description: Implements the required tagging blocks for using Nosto marketing automation service.
	Author: Nosto Solutions Ltd
	Version: 1.0.0
	License: GPLv2
*/

/*	Copyright 2013 Nosto Solutions Ltd  (email : PLUGIN AUTHOR EMAIL)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * Main plugin class.
 *
 * @package WooCommerce Nosto Tagging
 * @since   1.0.0
 */
class WC_Nosto_Tagging
{
	/**
	 * Plugin version.
	 * Used for dependency checks.
	 *
	 * @since 1.0.0
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum WordPress version this plugin works with.
	 * Used for dependency checks.
	 *
	 * @since 1.0.0
	 */
	const MIN_WP_VERSION = '3.5';

	/**
	 * Minimum WooCommerce plugin version this plugin works with.
	 * Used for dependency checks.
	 *
	 * @since 1.0.0
	 */
	const MIN_WC_VERSION = '2.0.0';

	/**
	 * The working instance of the plugin.
	 *
	 * @since 1.0.0
	 * @var WC_Nosto_Tagging|null
	 */
	private static $instance = null;

	/**
	 * The plugin directory path.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	protected $plugin_dir = '';

	/**
	 * The URL to the plugin directory.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	protected $plugin_url = '';

	/**
	 * The plugin base name.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	protected $plugin_name = '';

	/**
	 * Gets the working instance of the plugin.
	 *
	 * @since 1.0.0
	 * @return WC_Nosto_Tagging|null
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new WC_Nosto_Tagging();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 *
	 * Plugin uses Singleton pattern, hence the constructor is private.
	 *
	 * @since 1.0.0
	 * @return WC_Nosto_Tagging
	 */
	private function __construct() {
		$this->plugin_dir  = plugin_dir_path( __FILE__ );
		$this->plugin_url  = plugin_dir_url( __FILE__ );
		$this->plugin_name = plugin_basename( __FILE__ );

		register_activation_hook( $this->plugin_name, array( $this, 'activate' ) );
		register_deactivation_hook( $this->plugin_name, array( $this, 'deactivate' ) );
		register_uninstall_hook( $this->plugin_name, array( $this, 'uninstall' ) );
	}

	/**
	 * Initializes the plugin.
	 *
	 * Register hooks outputting tagging blocks and Nosto elements in frontend.
	 * Handles the backend admin page integration.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		if ( is_admin() ) {
			$this->init_admin();
		}
	}

	/**
	 * Hook callback function for activating the plugin.
	 *
	 * Checks WP and WC dependencies for plugin compatibility.
	 * Creates the Top Sellers page or only publishes it if it already exists.
	 *
	 * @since 1.0.0
	 */
	public function activate() {
		if ( $this->check_dependencies() ) {

		}
	}

	/**
	 * Hook callback function for deactivating the plugin.
	 *
	 * Un-publishes the Top Sellers page.
	 *
	 * @since 1.0.0
	 */
	public function deactivate() {

	}

	/**
	 * Hook callback function for uninstalling the plugin.
	 *
	 * Deletes the Top Sellers page and plugin config values.
	 *
	 * @since 1.0.0
	 */
	public function uninstall() {

	}

	/**
	 * Getter for the plugin base name.
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Initializes the plugin admin part.
	 *
	 * Adds a new integration into the WooCommerce settings structure.
	 *
	 * @since 1.0.0
	 */
	protected function init_admin() {
		$this->load_class( 'WC_Integration_Nosto_Tagging' );
		add_filter( 'woocommerce_integrations', array( 'WC_Integration_Nosto_Tagging', 'add_integration' ) );
	}

	/**
	 * Load class file based on class name.
	 *
	 * The file are expected to be located in the plugin "classes" directory.
	 *
	 * @since 1.0.0
	 * @param string $class_name The name of the class to load
	 */
	protected function load_class( $class_name = '' ) {
		$file = 'class-' . strtolower( str_replace( '_', '-', $class_name ) ) . '.php';
		require_once( $this->plugin_dir . 'classes/' . $file );
	}

	/**
	 * Checks plugin dependencies.
	 *
	 * Mainly that the WordPress and WooCommerce versions are equal to or greater than
	 * the defined minimums.
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	protected function check_dependencies() {
		global $wp_version;

		$title = sprintf( __( 'WooCommerce Nosto Tagging %s not compatible.' ), self::VERSION );
		$error = '';
		$args  = array(
			'back_link' => true,
		);

		if ( version_compare( $wp_version, self::MIN_WP_VERSION, '<' ) ) {
			$error = sprintf(
				__( 'Looks like you\'re running an older version of WordPress, you need to be running at least
					WordPress %1$s to use WooCommerce Nosto Tagging %2$s.' ),
				self::MIN_WP_VERSION,
				self::VERSION
			);
		}

		if ( ! defined( 'WOOCOMMERCE_VERSION' ) ) {
			$error = sprintf(
				__( 'Looks like you\'re not running any version of WooCommerce, you need to be running at least
					WooCommerce %1$s to use WooCommerce Nosto Tagging %2$s.' ),
				self::MIN_WC_VERSION,
				self::VERSION
			);
		} else if ( version_compare( WOOCOMMERCE_VERSION, self::MIN_WC_VERSION, '<' ) ) {
			$error = sprintf(
				__( 'Looks like you\'re running an older version of WooCommerce, you need to be running at least
					WooCommerce %1$s to use WooCommerce Nosto Tagging %2$s.' ),
				self::MIN_WC_VERSION,
				self::VERSION
			);
		}

		if ( ! empty( $error ) ) {
			deactivate_plugins( $this->plugin_name );
			wp_die( $error, $title, $args );
			return false;
		}

		return true;
	}
}

add_action( 'plugins_loaded', array( WC_Nosto_Tagging::get_instance(), 'init' ) );
