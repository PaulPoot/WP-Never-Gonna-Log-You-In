<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://paulpoot.eu/
 * @since             1.0.0
 * @package           Never_Gonna_Log_You_In
 *
 * @wordpress-plugin
 * Plugin Name:       Never Gonna Log You In
 * Plugin URI:        https://github.com/paulpoot/wp-never-gonna-log-you-in
 * Description:       A special surprise for everyone who tries to log in with username 'admin'. 
 * Version:           1.0.0
 * Author:            Paul Poot
 * Author URI:        https://paulpoot.eu/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       never-gonna-log-you-in
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-never-gonna-log-you-in-activator.php
 */
function activate_never_gonna_log_you_in() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-never-gonna-log-you-in-activator.php';
	Never_Gonna_Log_You_In_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-never-gonna-log-you-in-deactivator.php
 */
function deactivate_never_gonna_log_you_in() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-never-gonna-log-you-in-deactivator.php';
	Never_Gonna_Log_You_In_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_never_gonna_log_you_in' );
register_deactivation_hook( __FILE__, 'deactivate_never_gonna_log_you_in' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-never-gonna-log-you-in.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_never_gonna_log_you_in() {

	$plugin = new Never_Gonna_Log_You_In();
	$plugin->run();

}
run_never_gonna_log_you_in();
