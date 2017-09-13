<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.mellowwebdesign.be
 * @since             1.0.0
 * @package           B2bwebshop
 *
 * @wordpress-plugin
 * Plugin Name:       b2b webshop
 * Plugin URI:        www.mellowwebdesign.be
 * Description:       the B2B webshop is a plugin that creates a business to business webshop which doesn't require direct payment but instead it creates an invoice for your customers
 * Version:           1.0.0
 * Author:            Mellow Webdesign
 * Author URI:        www.mellowwebdesign.be
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       b2bwebshop
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( PLUGIN_VERSION, '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-b2bwebshop-activator.php
 */
function activate_b2bwebshop() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-b2bwebshop-activator.php';
	B2bwebshop_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-b2bwebshop-deactivator.php
 */
function deactivate_b2bwebshop() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-b2bwebshop-deactivator.php';
	B2bwebshop_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_b2bwebshop' );
register_deactivation_hook( __FILE__, 'deactivate_b2bwebshop' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-b2bwebshop.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_b2bwebshop() {

	$plugin = new B2bwebshop();
	$plugin->run();

}
run_b2bwebshop();
