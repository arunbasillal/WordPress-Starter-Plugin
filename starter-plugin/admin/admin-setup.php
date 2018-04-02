<?php
/**
 * Admin setup for the plugin
 *
 * @since 1.0
 * @function	prefix_add_menu_links()		Add admin menu pages
 * @function	prefix_register_settings	Register Settings
 * @function	prefix_validater_and_sanitizer()	Validate And Sanitize User Input Before Its Saved To Database
 * @function	prefix_get_settings()		Get settings from database
 */

// Exit if accessed directly
if ( ! defined('ABSPATH') ) exit; 
 
/**
 * Add admin menu pages
 *
 * @since 1.0
 * @refer https://developer.wordpress.org/plugins/administration-menus/
 */
function prefix_add_menu_links() {
	add_options_page ( __('Starter Plugin','starter-plugin'), __('Starter Plugin','starter-plugin'), 'update_core', 'starter-plugin','prefix_admin_interface_render'  );
}
add_action( 'admin_menu', 'prefix_add_menu_links' );

/**
 * Register Settings
 *
 * @since 1.0
 */
function prefix_register_settings() {

	// Register Setting
	register_setting( 
		'prefix_settings_group', 			// Group name
		'prefix_settings', 					// Setting name = html form <input> name on settings form
		'prefix_validater_and_sanitizer'	// Input sanitizer
	);
	
	// Register A New Section
    add_settings_section(
        'prefix_general_settings_section',							// ID
        __('Starter Plugin General Settings', 'starter-plugin'),		// Title
        'prefix_general_settings_section_callback',					// Callback Function
        'starter-plugin'											// Page slug
    );
	
	// General Settings
    add_settings_field(
        'prefix_general_settings_field',							// ID
        __('General Settings', 'starter-plugin'),					// Title
        'prefix_general_settings_field_callback',					// Callback function
        'starter-plugin',											// Page slug
        'prefix_general_settings_section'							// Settings Section ID
    );
	
}
add_action( 'admin_init', 'prefix_register_settings' );

/**
 * Validate and sanitize user input before its saved to database
 *
 * @since 1.0
 */
function prefix_validater_and_sanitizer ( $settings ) {
	
	// Sanitize text field
	$settings['text_input'] = sanitize_text_field($settings['text_input']);
	
	return $settings;
}
			
/**
 * Get settings from database
 *
 * @return	Array	A merged array of default and settings saved in database. 
 *
 * @since 1.0
 */
function prefix_get_settings() {

	$defaults = array(
				'setting_one' 	=> '1',
				'setting_two' 	=> '1',
			);

	$settings = get_option('prefix_settings', $defaults);
	
	return $settings;
}

/**
 * Enqueue Admin CSS and JS
 *
 * @since 1.0
 */
function prefix_enqueue_css_js( $hook ) {
	
    // Load only on Starer Plugin plugin pages
	if ( $hook != "settings_page_starter-plugin" ) {
		return;
	}
	
	// Main CSS
	// wp_enqueue_style( 'prefix-admin-main-css', PREFIX_STARTER_PLUGIN_URL . 'admin/css/main.css', '', PREFIX_VERSION_NUM );
	
	// Main JS
    // wp_enqueue_script( 'prefix-admin-main-js', PREFIX_STARTER_PLUGIN_URL . 'admin/js/main.js', array( 'jquery' ), false, true );
}
add_action( 'admin_enqueue_scripts', 'prefix_enqueue_css_js' );