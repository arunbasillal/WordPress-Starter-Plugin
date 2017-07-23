<?php
/*
Plugin Name: Starter Plugin
Plugin URI: http://millionclues.com
Description: Edit me.
Author: Arun Basil Lal
Author URI: http://millionclues.com
Version: 1.0
Text Domain: abl_prefix_td
Domain Path: /languages
License: GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/



/*------------------------------------------*/
/*			Plugin Setup Functions			*/
/*------------------------------------------*/

// Exit If Accessed Directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Add Admin Menu Pages
// Refer: https://developer.wordpress.org/plugins/administration-menus/
function prefix_add_menu_links() {
	add_theme_page ( __('Starter Plugin','abl_prefix_td'), __('Starter Plugin','abl_prefix_td'), 'update_core', 'starter-plugin','prefix_admin_interface_render'  );
}
add_action( 'admin_menu', 'prefix_add_menu_links' );


// Print Direct Link To Plugin Settings In Plugins List In Admin
function prefix_settings_link( $links ) {
	return array_merge(
		array(
			'settings' => '<a href="' . admin_url( 'themes.php?page=starter-plugin' ) . '">' . __( 'Settings', 'abl_prefix_td' ) . '</a>'
		),
		$links
	);
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'prefix_settings_link' );


// Add Donate Link to Plugins list
function prefix_plugin_row_meta( $links, $file ) {
	if ( strpos( $file, 'prefix_starter-plugin.php' ) !== false ) {
		$new_links = array(
				'donate' => '<a href="http://millionclues.com/donate/" target="_blank">Donate</a>',
				'kuttappi' => '<a href="http://kuttappi.com/" target="_blank">My Travelogue</a>',
				);
		$links = array_merge( $links, $new_links );
	}
	return $links;
}
add_filter( 'plugin_row_meta', 'prefix_plugin_row_meta', 10, 2 );


// Load Text Domain
function prefix_load_plugin_textdomain() {
    load_plugin_textdomain( 'abl_prefix_td', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'prefix_load_plugin_textdomain' );


// Do Stuff On Plugin Activation
function prefix_activate_plugin() {
	// This run on every activation of the plugin.
}
register_activation_hook( __FILE__, 'prefix_activate_plugin' );


// Register Settings
function prefix_register_settings() {
	register_setting( 'prefix_starter_plugin_settings_group', 'prefix_starter_plugin_settings', 'prefix_validater_and_sanitizer' );
}
add_action( 'admin_init', 'prefix_register_settings' );


// Validate And Sanitize User Input Before Its Saved To Database
function prefix_validater_and_sanitizer ( $input ) {
	// $input['prefix_setting_one'] = valdate_it_somehow ( $input['prefix_setting_one'] );
	return $input;
}


// Do Stuff On Plugin Uninstall
function prefix_uninstall_plugin() {
	delete_option( 'prefix_starter_plugin_settings' );
}
register_uninstall_hook(__FILE__, 'prefix_uninstall_plugin' );



/*--------------------------------------*/
/*			Admin Options Page			*/
/*--------------------------------------*/

// Admin Interface Renderer
function prefix_admin_interface_render () {

	$prefix_starter_plugin_settings_option = get_option( 'prefix_starter_plugin_settings' );
	
	$prefix_setting_one_content = isset( $prefix_starter_plugin_settings_option['prefix_setting_one'] ) && ! empty( $prefix_starter_plugin_settings_option['prefix_setting_one'] ) ? $prefix_starter_plugin_settings_option['prefix_setting_one'] : __( 'Default Value', 'abl_prefix_td' );

?>
	<div class="wrap">
		<h1><?php _e('Starter Plugin','abl_prefix_td') ?></h1>
		<p><?php _e('Description.','abl_prefix_td') ?></p>
		
		<form method="post" action="options.php" enctype="multipart/form-data">
		
			<?php settings_fields( 'prefix_starter_plugin_settings_group' ); ?>
			
			<h2 class="title"><?php _e('Setting','abl_prefix_td') ?></h2>
			
			<p><label for="prefix_setting_one"><?php _e('Enter your setting below.','abl_prefix_td') ?></label></p>
			<textarea rows="10" class="large-text code" id="prefix_starter_plugin_settings[prefix_setting_one]" name="prefix_starter_plugin_settings[prefix_setting_one]"><?php echo esc_textarea( $prefix_setting_one_content ); ?></textarea>
			
			<?php submit_button( __( 'Save', 'abl_prefix_td' ), 'primary', 'submit', true ); ?>
		</form>
		
	</div><?php
}



/*--------------------------------------*/
/*			Plugin Operations			*/
/*--------------------------------------*/

?>