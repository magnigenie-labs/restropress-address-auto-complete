<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://magnigeeks.com
 * @since      1.0.0
 *
 * @package    Address_Auto_Complete
 * @subpackage Address_Auto_Complete/includes
 */
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Address_Auto_Complete
 * @subpackage Address_Auto_Complete/includes
 * @author     Mukesh Kumar sahoo <mukeshkumarsahoo15@gmail.com>
 */
class Address_Auto_Complete_i18n {
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'address-auto-complete',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}
