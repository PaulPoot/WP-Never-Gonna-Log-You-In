<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://paulpoot.eu/
 * @since      1.0.0
 *
 * @package    Never_Gonna_Log_You_In
 * @subpackage Never_Gonna_Log_You_In/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Never_Gonna_Log_You_In
 * @subpackage Never_Gonna_Log_You_In/includes
 * @author     Paul Poot <development@paulpoot.eu>
 */
class Never_Gonna_Log_You_In_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'never-gonna-log-you-in',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
