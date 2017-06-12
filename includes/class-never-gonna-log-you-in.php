<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://paulpoot.eu/
 * @since      1.0.0
 *
 * @package    Never_Gonna_Log_You_In
 * @subpackage Never_Gonna_Log_You_In/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Never_Gonna_Log_You_In
 * @subpackage Never_Gonna_Log_You_In/includes
 * @author     Paul Poot <development@paulpoot.eu>
 */
class Never_Gonna_Log_You_In {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Never_Gonna_Log_You_In_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * The username to redirect
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $redirected_username    The username to redirect.
	 */
	protected $redirected_username;

	/**
	 * The URL to redirect to
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $redirect_url    The URL to redirect to.
	 */
	protected $redirect_url;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'never-gonna-log-you-in';
		$this->version = '1.0.0';
		$this->redirected_username = 'admin';
		$this->redirect_url = 'https://www.youtube.com/watch?v=dQw4w9WgXcQ';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Never_Gonna_Log_You_In_Loader. Orchestrates the hooks of the plugin.
	 * - Never_Gonna_Log_You_In_i18n. Defines internationalization functionality.
	 * - Never_Gonna_Log_You_In_Admin. Defines all hooks for the admin area.
	 * - Never_Gonna_Log_You_In_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-never-gonna-log-you-in-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-never-gonna-log-you-in-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-never-gonna-log-you-in-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-never-gonna-log-you-in-public.php';

		$this->loader = new Never_Gonna_Log_You_In_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Never_Gonna_Log_You_In_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Never_Gonna_Log_You_In_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Never_Gonna_Log_You_In_Admin( $this->get_plugin_name(), $this->get_version() );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Never_Gonna_Log_You_In_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_authenticate', $plugin_public, 'redirect_admin' );
		
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Never_Gonna_Log_You_In_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Retrieve the username that should be redirected.
	 *
	 * @since     1.0.0
	 * @return    string    The username that should be redirected.
	 */
	public function get_redirected_username() {
		return $this->redirected_username;
	}


	/**
	 * Retrieve the URL that should be redirected to.
	 *
	 * @since     1.0.0
	 * @return    string    The URL that should be redirected to.
	 */
	public function get_redirect_url() {
		return $this->redirect_url;
	}


}
