<?php
/**
 * Plugin Name: Starter Plugin
 * Plugin URI: http://millionclues.com
 * Description: Edit me.
 * Author: Arun Basil Lal
 * Author URI: http://millionclues.com
 * Version: 1.0
 * Text Domain: abl_prefix_td
 * Domain Path: /languages
 * License: GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * This plugin was developed using the WordPress starter plugin template by Arun Basil Lal <arunbasillal@gmail.com>
 * Please leave this credit and the directory structure intact for future developers who might read the code. 
 * @Github		https://github.com/arunbasillal/WordPress-Starter-Plugin
 */
 
/**
 * ~ Directory Structure ~
 *
 * /admin/ 						- Plugin backend stuff.
 * /includes/					- External third party classes and libraries.
 * /languages/					- Translation files go here. 
 * /public/						- Front end files go here.
 * index.php					- Dummy file.
 * license.txt					- GPL v2
 * prefix_starter-plugin.php	- File containing plugin name and other version info for WordPress.
 * readme.txt					- Readme for WordPress plugin repository. https://wordpress.org/plugins/files/2017/03/readme.txt
 * uninstall.php				- Fired when the plugin is uninstalled. 
 */
 
/**
 * ~ TODO ~
 *
 * - Note: (S&R) = Search and Replace by matching case.
 *
 * - Plugin name: Starter Plugin (S&R)
 * - Plugin folder slug: starter-plugin (S&R)
 * - Decide on a prefix for the plugin (S&R)
 * - Plugin description
 * - Text domain. (S&R)
 * - Update prefix_settings_link() 		in \admin\prefix_starter-plugin-basic-setup.php
 * - Update prefix_footer_text()		in \admin\prefix_starter-plugin-basic-setup.php
 * - Update prefix_add_menu_links() 	in \admin\prefix_starter-plugin-admin-setup.php
 * - Update prefix_register_settings() 	in \admin\prefix_starter-plugin-admin-setup.php
 * - Update UI format and settings		in \admin\prefix_starter-plugin-admin-ui-render.php
 * - Update uninstall.php
 * - Update readme.txt
 * - Update PREFIX_VERSION_NUM 			in prefix_starter-plugin.php (keep this line for future updates)
 */

// Exit if accessed directly
if ( ! defined('ABSPATH') ) exit;

/**
 * Define constants
 *
 * @since 		1.0
 */
// The name of the plugin folder
// 'starter-plugin'
if (!defined('PREFIX_STARTER_PLUGIN'))
    define('PREFIX_STARTER_PLUGIN', trim(dirname(plugin_basename(__FILE__)), '/'));

// The absolute path to the plugin directory without the trailing slash. Useful for using with includes
// eg - C:\xampp\htdocs\
if (!defined('PREFIX_STARTER_PLUGIN_DIR'))
    define('PREFIX_STARTER_PLUGIN_DIR', plugin_dir_path( __FILE__ ));

// The url to the plugin folder. Useful for referencing src
// eg - http://localhost/wp/wp-content/plugins/starter-plugin/
if (!defined('PREFIX_STARTER_PLUGIN_URL'))
    define('PREFIX_STARTER_PLUGIN_URL', plugin_dir_url( __FILE__ ));

// Plugin version constant
if ( ! defined('PREFIX_VERSION_NUM') )
    define('PREFIX_VERSION_NUM', '1.0');

/**
 * Add plugin version to database
 *
 * @since 		1.0
 * @refer		https://codex.wordpress.org/Creating_Tables_with_Plugins#Adding_an_Upgrade_Function
 */
update_option('abl_prefix_version', PREFIX_VERSION_NUM);	// Change this to add_option if a release needs to check installed version.

// Load everything
require_once( PREFIX_STARTER_PLUGIN_DIR . '/admin/prefix_starter-plugin-loader.php');

// Register activation hook (this has to be in the main plugin file.)
register_activation_hook( __FILE__, 'prefix_activate_plugin' );