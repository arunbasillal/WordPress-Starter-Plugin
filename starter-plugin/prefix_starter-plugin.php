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
 * - Note: (S&R) = Search and Replace.
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
if ( !defined('ABSPATH') ) exit;


/**
 * Plugin name and directory constants
 *
 * @since 		1.0
 * @constant 	PREFIX_STARTER_PLUGIN		The name of the plugin - 'starter-plugin'
 * @constant	PREFIX_STARTER_PLUGIN_DIR	The absolute path to the plugin directory without the trailing slash - C:\xampp\htdocs\wp/wp-content/plugins/starter-plugin
 */
if (!defined('PREFIX_STARTER_PLUGIN'))
    define('PREFIX_STARTER_PLUGIN', trim(dirname(plugin_basename(__FILE__)), '/'));

if (!defined('PREFIX_STARTER_PLUGIN_DIR'))
    define('PREFIX_STARTER_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . PREFIX_STARTER_PLUGIN);


/**
 * Add plugin version to database
 *
 * @since 		1.0
 * @constant 	PREFIX_VERSION_NUM		the version number of the current version
 * @refer		https://www.smashingmagazine.com/2011/03/ten-things-every-wordpress-plugin-developer-should-know/
 */
if (!defined('PREFIX_VERSION_NUM'))
    define('PREFIX_VERSION_NUM', '1.0');
add_option('abl_prefix_version', PREFIX_VERSION_NUM);


// Load everything
require_once( PREFIX_STARTER_PLUGIN_DIR . '/admin/prefix_starter-plugin-loader.php');

?>