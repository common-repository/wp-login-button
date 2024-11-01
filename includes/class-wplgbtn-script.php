<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package WordPress Login Button With Magnific Popup & Ajax
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Wplgbtn_Script {
	
	function __construct() {
		
		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'wplgbtn_front_style') );
		
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'wplgbtn_front_script') );
	}

	/**
	 * Function to add style at front side
	 * 
	 * @package WordPress Login Button With Magnific Popup & Ajax
	 * @since 1.0.0
	 */
	function wplgbtn_front_style() {

		// Registring and enqueing magnific css
		if( !wp_style_is( 'wplgbtn-magnific-style', 'registered' ) ) {
			wp_register_style( 'wplgbtn-magnific-style', WPLGBTN_URL.'assets/css/magnific-popup.css', array(), WPLGBTN_VERSION );
			wp_enqueue_style( 'wplgbtn-magnific-style');
		}		
		// Registring and enqueing public css
		wp_register_style( 'wplgbtn-public-css', WPLGBTN_URL.'assets/css/wplgbtn-public-style.css', null, WPLGBTN_VERSION );
		wp_enqueue_style( 'wplgbtn-public-css' );
	}
	
	/**
	 * Function to add script at front side
	 * 
	 * @package WordPress Login Button With Magnific Popup & Ajax
	 * @since 1.0.0
	 */
	function wplgbtn_front_script() {

		// Registring magnific popup script
		if( !wp_script_is( 'wplgbtn-magnific-script', 'registered' ) ) {
			wp_register_script( 'wplgbtn-magnific-script', WPLGBTN_URL.'assets/js/jquery.magnific-popup.min.js', array('jquery'), WPLGBTN_VERSION, true );
		}
		
		// Registring public script
		wp_register_script( 'wplgbtn-public-js', WPLGBTN_URL.'assets/js/wplgbtn-public.js', array('jquery'), WPLGBTN_VERSION, true );
		wp_localize_script( 'wplgbtn-public-js', 'Wplgbtn', array('ajaxurl' => admin_url( 'admin-ajax.php' ),'redirecturl' => home_url(),'loadingmessage' => __('Sending user info, please wait...','woo-video-subscription')));
		wp_enqueue_script('wplgbtn-public-js');
	}
}

$wplgbtn_script = new Wplgbtn_Script();