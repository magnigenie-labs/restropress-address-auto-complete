<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://magnigeeks.com
 * @since             1.0.0
 * @package           Address_Auto_Complete
 *
 * @wordpress-plugin
 * Plugin Name:       RestroPress - Address Auto Complete
 * Description:       This plugin use for RestroPress to autocomplete the address at the product checkout page.
 * Version:           1.0.0
 * Author:            magnigenie
 * Author URI:        https://magnigeeks.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rp-address-auto-complete
 * Domain Path:       /languages
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}
if ( ! defined( 'RP_ADDRESS_AUTO_PLUGIN_FILE' ) ) {
	define( 'RP_ADDRESS_AUTO_PLUGIN_FILE', __FILE__ );  
  }
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ADDRESS_AUTO_COMPLETE_VERSION', '1.0.0' );
function rp_address_auto_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-address-auto-complete-activator.php';
	Address_Auto_Complete_Activator::activate();
}
function  rp_address_auto_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-address-auto-complete-deactivator.php';
	Address_Auto_Complete_Deactivator::deactivate();
}
register_activation_hook( __FILE__, 'rp_address_auto_activate' );
register_deactivation_hook( __FILE__, ' rp_address_auto_deactivate' );
require plugin_dir_path( __FILE__ ) . 'includes/class-address-auto-complete.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function rp_address_auto_run() {
	$plugin = new Address_Auto_Complete();
	$plugin->run();
}
rp_address_auto_run();
