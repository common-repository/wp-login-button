<?php
/**
 * Plugin Name: WordPress Login Button With Magnific Popup & Ajax
 * Plugin URI: http://www.a2coder.com
 * Description: Wordpress login button with magnific popup and ajax.Use short code [wplgbtn_login_btn login_redirect_url="" logout_redirect_url="" sign_text="Sign In" signout_text="Sign Out" class="your-custom-class"]
 * Author: A2coder
 * Text Domain: wplgbtn
 * Domain Path: /languages/
 * Version: 1.0.0
 * Author URI: http://www.a2coder.com/
 *
 * @package WordPress
 * @author A2coder
 */

/**
 * Basic plugin definitions
 * 
 * @package WordPress Login Button With Magnific Popup & Ajax
 * @since 1.0.0
 */
if( !defined( 'WPLGBTN_VERSION' ) ) {
	define( 'WPLGBTN_VERSION', '1.0.0' ); // Version of plugin
}
if( !defined( 'WPLGBTN_DIR' ) ) {
    define( 'WPLGBTN_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'WPLGBTN_URL' ) ) {
    define( 'WPLGBTN_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'WPLGBTN_PLUGIN_BASENAME' ) ) {
	define( 'WPLGBTN_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); // plugin base name
}


/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package WordPress Login Button With Magnific Popup & Ajax
 * @since 1.0.0
 */
function wplgbtn_load_textdomain() {
	load_plugin_textdomain( 'wplgbtn', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action('plugins_loaded', 'wplgbtn_load_textdomain');

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package WordPress Login Button With Magnific Popup & Ajax
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'wplgbtn_install' );

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @package WordPress Login Button With Magnific Popup & Ajax
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'wplgbtn_uninstall');

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * stest default values for the plugin options.
 * 
 * @package WordPress Login Button With Magnific Popup & Ajax
 * @since 1.0.0
 */
function wplgbtn_install() {
    
   
}

/**
 * Plugin Setup (On Deactivation)
 * 
 * Delete  plugin options.
 * 
 * @package WordPress Login Button With Magnific Popup & Ajax
 * @since 1.0.0
 */
function wplgbtn_uninstall() {
    
}

// Taking some globals
global $wplgbtn_options;

// Functions file
require_once( WPLGBTN_DIR . '/includes/wplgbtn-functions.php' );

// Public File
require_once( WPLGBTN_DIR . '/includes/class-wplgbtn-public.php' );

// Load style and js
require_once( WPLGBTN_DIR . '/includes/class-wplgbtn-script.php' );

// Shortcode File
require_once( WPLGBTN_DIR . '/includes/shortcode/wplgbtn-login-form.php' );
