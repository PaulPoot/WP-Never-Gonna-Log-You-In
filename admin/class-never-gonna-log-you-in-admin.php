<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://paulpoot.eu/
 * @since      1.0.0
 *
 * @package    Never_Gonna_Log_You_In
 * @subpackage Never_Gonna_Log_You_In/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Never_Gonna_Log_You_In
 * @subpackage Never_Gonna_Log_You_In/admin
 * @author     Paul Poot <development@paulpoot.eu>
 */
class Never_Gonna_Log_You_In_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

}
