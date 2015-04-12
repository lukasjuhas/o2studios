<?php
/*
Plugin Name: o2studios
Plugin URI: http://www.o2studios.com
Description: site special functionality plugin
Version: 1.0
Revision Date: 2015-04-12
Requires at least: WP 4.1
Tested up to: WP 4.1.1
License: This plugin has been written by lukas juhas, re-use is not permitted.
Author: Lukas Juhas
Author URI: http://lukasjuhas.com
*/

define( 'O2S_VERSION', '1.0' );
define( 'O2S_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'O2S_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'O2S_DOMAIN', 'O2S' );

/**
 * AusPost
 * @author  Lukas Juhas
 * @version 1.0
 * @package o2studios
 */
class o2studios {
	function __construct() {
		add_action( 'init', array( $this, 'inc' ) );
		add_action( 'admin_menu', array( $this, 'ui' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );

        add_action( 'admin_menu', 'o2s_remove_menus' );
        add_action( 'init', 'o2s_register_post_types' );
	}

	/**
	 * include plugin files
	 * @author Lukas Juhas
	 * @version 1.0
	 * @package o2studios
	 * @since   2015-04-12
	 * @return  [type]     [description]
	 */
	function inc() {
		require 'inc/functions.php';
		require 'admin/posttypes.php';
        require 'admin/metaboxes.php';
	}

	/**
	 * ui admin_menu stuff
	 * @author Lukas Juhas
	 * @version 1.0
	 * @package o2studios
	 * @since   2015-04-12
	 * @return  [type]     [description]
	 */
	function ui() {
		// add_menu_page( 'Delivery Settings', 'Delivery Settings', 'manage_options', 'delivery-settings', array($this, 'settings'), '', 85 );
	}

	/**
	 * admin_enqueue_scripts stuff
	 * @author Lukas Juhas
	 * @version 1.0
	 * @package o2studios
	 * @since   2015-04-12
	 * @return  [type]     [description]
	 */
	function scripts() {
		// wp_enqueue_style( 'auspost', O2S_PLUGIN_URL . 'admin/style/auspost.css', array(), O2S_VERSION );
	}

	/**
	 * settings page
	 * @author Lukas Juhas
	 * @version 1.0
	 * @package o2studios
	 * @since   2015-04-12
	 * @return  [type]     [description]
	 */
	function settings() {
		// ob_start();
		// include O2S_PLUGIN_DIR . 'admin/pages/settings.php';
		// $settings = ob_get_contents();
		// ob_end_clean();
		// echo $settings;
	}

}

# init
$o2studios = new o2studios();
