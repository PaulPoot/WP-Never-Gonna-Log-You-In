<?php

/**
 * Fired during plugin activation
 *
 * @link       https://paulpoot.eu/
 * @since      1.0.0
 *
 * @package    Never_Gonna_Log_You_In
 * @subpackage Never_Gonna_Log_You_In/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Never_Gonna_Log_You_In
 * @subpackage Never_Gonna_Log_You_In/includes
 * @author     Paul Poot <development@paulpoot.eu>
 */
class Never_Gonna_Log_You_In_Activator {

	/**
	 * Checks if plugin can be activated.
	 *
	 * This function checks if a user with the username 
	 * that will be redirected already exists, 
	 * and if it does, display an error message 
	 * instead of activating.
	 * 
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		$plugin = new Never_Gonna_Log_You_In();
		$username = $plugin->get_redirected_username();

		$message = sprintf( __( 'Please make sure there is no user with the username <strong>%s</strong> before you activate this plugin.', $plugin->get_plugin_name() ), $username );

		if ( username_exists( $username ) ) {
			wp_die( $message );
		}

	}

}
