<?php
/**
 * Plugin generic functions file
 *
 * @package WordPress Login Button With Magnific Popup & Ajax
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Function to get unique number value
 * 
 * @package WordPress Login Button With Magnific Popup & Ajax
 * @since 1.0.0
 */
function wplgbtn_get_unique() {
	static $unique = 0;
	$unique++;

	return $unique;
}