<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.mellowwebdesign.be
 * @since      1.0.0
 *
 * @package    B2bwebshop
 * @subpackage B2bwebshop/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    B2bwebshop
 * @subpackage B2bwebshop/includes
 * @author     Mellow Webdesign <contact@mellowwebdesign.be>
 */
class B2bwebshop_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'b2bwebshop',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
