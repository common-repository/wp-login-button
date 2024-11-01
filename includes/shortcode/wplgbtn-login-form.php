<?php
/**
 * 
 * @package WordPress Login Button With Magnific Popup & Ajax
 * @since 1.0.0
*/
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
function wplgbtn_login_btn( $atts, $content = null ) {	

	// Shortcode Parameter

	extract(shortcode_atts(array(
		'design' 				=> 'design-1',
		'sign_text'				=> __('Sign In','wplgbtn'),
		'signout_text'			=> __('Sign Out','wplgbtn'),
		'login_redirect_url'	=> '',
		'logout_redirect_url'	=> '',	
		'class' 				=> '',	
		), $atts));

	
	global $wp;
	//get unique number
	$unique 			= wplgbtn_get_unique();
	//get current page url
	$wpbtn_current_url 	= home_url(add_query_arg(array(),$wp->request));

	if(empty($login_redirect_url)){
		$login_redirect_url = $wpbtn_current_url;
	}
	if(empty($logout_redirect_url)){
		$logout_redirect_url = $wpbtn_current_url;
	}
	wp_enqueue_script( 'wplgbtn-magnific-script' );
	wp_enqueue_script( 'wplgbtn-public-js' );

	// template design  file
	$design_file_path 			= WPLGBTN_DIR . '/templates/' . $design . '.php';
	$default_design_file_path 	= WPLGBTN_DIR . '/templates/design-1.php';
	$template_file 				= (file_exists($design_file_path)) ? $design_file_path : $default_design_file_path;
	$wplgbtn_text 				= $sign_text;
	$wp_logout_url_attr			= '';	
	$wplgbtn_mfp_src 			= ' data-mfp-src="#wplgbtn-sign-popup-'.$unique.'" ';
	if(is_user_logged_in()){
		$wplgbtn_text 		= $signout_text;
		$wp_logout_url_attr = ' data-url = "'.$logout_redirect_url.'"';
		$class 				.= ' wplgbtn-sign-out';
		$wplgbtn_mfp_src	= '';
	}
	else{
		$class 				.= ' wplgbtn-sign-in wplgbtn-sign-popup-btn';
	}

	ob_start();
?>
<div class="wplgbtn-action">
	<a href="javascript:void(0);" <?php echo $wplgbtn_mfp_src;?> class="wplgbtn-btn <?php echo $class;?>" <?php echo $wp_logout_url_attr;?>>
		<?php echo $wplgbtn_text;?>
	</a>
</div>
<?php 
if(!is_user_logged_in()){
?>
	<div id="wplgbtn-sign-popup-<?php echo $unique;?>" class="mfp-hide wp-wplgbtn-popup-wrp zoom-anim-dialog white-popup-block">
		<?php include ($template_file); ?>
	</div>
<?php
}
	$content .= ob_get_clean();
	return $content;
}

// 'wplgbtn_login_btn' shortcode
add_shortcode('wplgbtn_login_btn', 'wplgbtn_login_btn');