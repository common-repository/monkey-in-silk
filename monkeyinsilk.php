<?php
/*
Plugin Name: Monkey in Silk
Description: Include project content from Monkey in Silk
Version: 1.0.0
Author: Monkey in Silk
Author URI: https://monkeyinsilk.se/
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: monkeyinsilk
Domain Path:  /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'MONKEYINSILK_BASENAME', plugin_basename( __FILE__ ) );
  
include( plugin_dir_path( __FILE__ ) . 'includes/monkeyinsilk-settings-fields.php');
  
include( plugin_dir_path( __FILE__ ) . 'includes/monkeyinsilk-menus.php');

include( plugin_dir_path( __FILE__ ) . 'includes/monkeyinsilk-shortcodes.php');

?>