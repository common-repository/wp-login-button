=== WordPress Login Button With Magnific Popup & Ajax ===
Contributors: a2coder
Tags: login button, login, ajax, login popup, login redirect, magnific popup,magnific popup login,user login
Requires at least: 3.1
Tested up to: 4.7.4
Stable tag: trunk
Author URI: http://a2codevilla.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Wordpress login with magnific popup and ajax.

== Description ==
WordPress Login Button With Magnific Popup & Ajax is provide popup ajax login and server side validation.Also provide functionality to after login redirect and after logout redirect.

= Features =
* Signin/Signout button.
* After login redirect
* After logout redirect
* Login validation check with ajax
* Class for custom css designing.

= Example =
<code>
Sign In Text
[wplgbtn_login_btn sign_text="Member Login"]
Sign Out Text
[wplgbtn_login_btn signout_text="Logout"]
Login Redirect
[wplgbtn_login_btn login_redirect_url="http://www.a2codevilla.com/home2/"]
Logout Redirect
[wplgbtn_login_btn logout_redirect_url="http://www.a2codevilla.com/"]
Class
[wplgbtn_login_btn class="my-theme-class"]
</code>

= Shortcode parameters are =
* **sign_text** : <code>[wplgbtn_login_btn sign_text="Member Login"]</code> (Before login button text)
* **signout_text** : <code>[wplgbtn_login_btn signout_text="Logout"]</code> (After login button text)
* **login_redirect_url** : <code>[wplgbtn_login_btn login_redirect_url="http://www.a2codevilla.com/home2/"]</code> (After login user can redirect to this page.)
* **logout_redirect_url** : <code>[wplgbtn_login_btn logout_redirect_url="http://www.a2codevilla.com/"]</code> (After logout user can redirect to this page.)
* **class** : <code>[wplgbtn_login_btn class="my-theme-class"]</code> (Design login button by giving a custom class.)

= Complete shortcode with all parameters =

<code>[wplgbtn_login_btn login_redirect_url="http://a2codevilla/logout-form" logout_redirect_url="http://a2codevilla/sample-page/" sign_text="Sign In" signout_text="Sign Out" class="custom-class"]</code>

== Installation ==

1. Upload the 'wp-login-button' folder to the '/wp-content/plugins/' directory.
2. Activate the "WordPress Login Button With Magnific Popup & Ajax" list plugin through the 'Plugins' menu in WordPress.
3. Add this short code where you want to display signin/signout button
<code>[wplgbtn_login_btn]</code>

= Complete shortcode with all parameters =

<code>[wplgbtn_login_btn login_redirect_url="http://a2codevilla/logout-form" logout_redirect_url="http://a2codevilla/sample-page/" sign_text="Sign In" signout_text="Sign Out" class="custom-class"]</code>

== Screenshots ==

1. Sign in buttton.
2. Login form in magnific popup.
3. Ajax validation message.


== Changelog ==

= Version 1.0.0 (08-05-2017)=
* Initial release.