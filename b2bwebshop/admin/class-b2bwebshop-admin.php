<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.mellowwebdesign.be
 * @since      1.0.0
 *
 * @package    B2bwebshop
 * @subpackage B2bwebshop/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    B2bwebshop
 * @subpackage B2bwebshop/admin
 * @author     Mellow Webdesign <contact@mellowwebdesign.be>
 */
class B2bwebshop_Admin {

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

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in B2bwebshop_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The B2bwebshop_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/b2bwebshop-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in B2bwebshop_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The B2bwebshop_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/b2bwebshop-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
     *
     * admin/class-wp-cbf-admin.php - Don't add this
     *
     **/

    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */

    public function add_plugin_admin_menu() {

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         */
//        add_options_page( 'WP Cleanup and Base Options Functions Setup', 'WP Cleanup', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
//
//        );
        add_menu_page( 'B2B webshop', 'B2B webshop', 'manage_options','main_menu',array($this, 'display_plugin_setup_page'), 'dashicons-products', 90 );
        add_submenu_page( 'main_menu', 'nieuwe zone', 'nieuwe zone','manage_options', 'my_pirazzo_zones', array($this, 'display_plugin_new_zone_page') );
        add_submenu_page( null, 'nieuwe leveradressen', 'nieuwe leveradressen','manage_options', 'my_pirazzo_locations', array($this, 'display_plugin_new_location_page') );
        add_submenu_page( 'null', 'nieuwe producten', 'nieuwe producten','manage_options', 'my_pirazzo_items', array($this, 'display_plugin_new_item_page') );
        add_submenu_page( 'null', 'edit zone', 'edit zone','manage_options', 'my_pirazzo_edit', array($this, 'display_plugin_edit_zone') );
    }

    /**
     * Add settings action link to the plugins page.
     *
     * @since    1.0.0
     */

    public function add_action_links( $links ) {
        /*
        *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
        */
        $settings_link = array(
            '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
        );
        return array_merge(  $settings_link, $links );

    }

    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */

    public function display_plugin_setup_page() {
        include_once( 'partials/b2bwebshop-admin-display.php' );
    }
    public function display_plugin_new_zone_page() {
        include_once( 'partials/b2bwebshop-admin-display-new-zone.php' );
    }
    public function display_plugin_new_location_page() {
        include_once( 'partials/b2bwebshop-admin-display-new-location.php' );
    }
    public function display_plugin_new_item_page() {
        include_once( 'partials/b2bwebshop-admin-display-new-item.php' );
    }
    public function display_plugin_edit_zone() {
        include_once( 'partials/b2bwebshop-admin-display-edit-zone.php' );
    }
}
