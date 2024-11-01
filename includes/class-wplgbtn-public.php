<?php
/**
 * Public Class
 *
 * Handles the Public side functionality of plugin
 *
 * @package WordPress Login Button With Magnific Popup & Ajax
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Wplgbtn_Public {
	
	function __construct() {
		// Ajax call to login action
		add_action( 'wp_ajax_nopriv_wplgbtn_ajax_login',array( $this, 'wplgbtn_ajax_login'));

		//Ajax call to logout action
		add_action( 'wp_ajax_wplgbtn_ajax_logout',array( $this, 'wplgbtn_ajax_logout'));
	}

	/**
	 * Ajax function for login
	 * 
	 * @package WordPress Login Button With Magnific Popup & Ajax
	 * @since 1.0.0
	 */
	function wplgbtn_ajax_login() {
		//get form data
		$form_data 			= parse_str($_POST['data'], $form_post_data);
		$response 			= array();
		$response['status'] = false;
		if(empty($form_post_data['password']))
		{
			$response['message'] 		= '<strong>'.__('ERROR','wplgbtn').'</strong>: '.__('Password is required.','wplgbtn');
		}
		if(empty($form_post_data['username']))
		{
			$response['message'] 		= '<strong>'.__('ERROR','wplgbtn').'</strong>: '.__('Username is required.','wplgbtn');
		}
		$info 							= array();
		$info['user_login'] 			= trim($form_post_data['username']);
		$info['user_password'] 			= $form_post_data['password'];
	    $info['rememberme'] 			= isset($_POST['rememberme']) ? true : false;
	    if(is_email($info['user_login']))
	    {
	    	$user = get_user_by( 'email',  $info['user_login'] );
			if ( isset( $user->user_login ) ) {
				$info['user_login'] 	= $user->user_login;
			} else {
				$response['message'] 	= '<strong>'.__('ERROR','wplgbtn').'</strong>: '.__('A user could not be found with this email address.','wplgbtn');
			}
	    }
	    if(!isset($response['message']))
	    {
		    $user_signon = wp_signon( $info, false );
		    if ( is_wp_error($user_signon) ){
				global $errors;
				$err_codes = $user_signon->get_error_codes();
				if ( in_array( 'invalid_username', $err_codes ) ) {
					$message 			= '<strong>'.__('ERROR','wplgbtn').'</strong>: '.__('Invalid username.','wplgbtn');
				}
				if ( in_array( 'incorrect_password', $err_codes ) ) {
					$message 			= '<strong>'.__('ERROR','wplgbtn').'</strong>: '.__('Invalid password.','wplgbtn');
				}
		    	$response['message'] 	= $message;	        
		    } else {
		    	$response['status'] 	= true; 
		    	$response['message']	= __('Login successful, Please wait ...','wplgbtn');	        
			}
		}
		echo json_encode($response);
		die();   
	}
	
	/**
	 * Ajax function for logout
	 * 
	 * @package WordPress Login Button With Magnific Popup & Ajax
	 * @since 1.0.0
	 */
	public function wplgbtn_ajax_logout()
	{
		wp_logout(); 
		$response['status'] 	= true; 
		$response['message'] 	= __('Logout successful, Please wait ...','wplgbtn');
		echo json_encode($response);
		die();
	}

}

$wplgbtn_public = new Wplgbtn_Public();