<?php
/**
 * Design 1 HTML Template
 * 
 * @package WordPress Login Button With Magnific Popup & Ajax
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
?>

<div class="wplgbtn-login-frm-wrp">
	<form id="wplgbtn-login-form-<?php echo $unique;?>" class="wplgbtn-login-form" action="login" method="post">
    
    <div class="wplgbtn-response"></div>
    
    <div class="wplgbtn-row">
      <label for="username"><?php _e('Username or Email','wplgbtn');?></label>
      <input type="text" name="username" class="wplgbtn-input wplgbtn-username">
    </div>

    <div class="wplgbtn-row">
      <label for="password"><?php _e('Password','wplgbtn');?></label>
      <input type="password" name="password" class="wplgbtn-input wplgbtn-password">
    </div>

    <div class="wplgbtn-row">
      <label for="rememberme" class="inline">
      <input class="wplgbtn-input wplgbtn-checkbox wplgbtn-rememberme" id="rememberme-<?php echo $unique;?>" name="rememberme" type="checkbox" value="forever" />
      <label for="rememberme-<?php echo $unique;?>" class="wplgbtn-lbl-remember"><?php _e( 'Remember Me', 'wplgbtn' ); ?></label> 
      <input type="hidden" name="wpbtn_current_url" class="wpbtn_current_url" value="<?php echo $login_redirect_url;?>">
      <a class="wplgbtn-lost-password" href="<?php echo wp_lostpassword_url(); ?>"><?php _e('Lost your password?','wplgbtn');?></a>
      </label>
    </div>

    <div class="wplgbtn-row">
      <a class="wplgbtn-btn submit_button wplgbtn-submit"><?php echo __('Login','wplgbtn');?></a>
    </div>
    
    <?php wp_nonce_field( 'wplgbtn_login_nonce', 'wplgbtn_login_nonce' ); ?>
  </form>
</div><!-- end .aigpl-columns -->