<?php
/*
Plugin Name: Super Social Media Icons
Version: 1.6
Description: Quickly and Easily display Social Media Icons on your Website. 
Author: Sai Kumar Bhimarasetty
Author URI: https://saiwebpro.in
Requires at least: 4.9
Requires PHP: 5.6 or later
License: GNU General Public License v2.0 (or later)
License URI: http://www.opensource.org/licenses/gpl-license.php
*/


add_action( 'admin_init', 'super_social_admin_init' );
function super_social_admin_init() {
	
        /* Register our script. */
		wp_register_script( 'my_tabs_jquery', plugin_dir_url( __FILE__ ) . 'inc/js/super_tab.js',array('jquery-ui-tabs') );
		wp_register_style( 'my_custom_css', plugins_url( 'inc/css/settings-admin.css', __FILE__ ) );
		wp_register_style( 'css_for_fa_icon', plugins_url( 'inc/css/font-awesome-4.0.3/css/font-awesome.min.css', __FILE__ ) );
		
		wp_register_style( 'css_social_style', plugins_url( 'css/social_style.css', __FILE__ ) );
        
}

add_action('admin_menu', 'super_add_social_media_page');
function super_add_social_media_page()
{
 $setting_page=add_submenu_page( 'options-general.php', 'Link setting','Super Social Icons', 'administrator', 'super_social_media','super_social_media_setting'); 
  
      add_action('admin_print_scripts-' . $setting_page, 'super_social_admin_scripts');
}

function super_social_admin_scripts() {
    /*
     * It will be called only on your plugin admin page, enqueue our script here
     */
    wp_enqueue_style('css_for_fa_icon');
	
	wp_enqueue_style('my_custom_css');
	
	wp_enqueue_style('css_social_style');
	
	wp_enqueue_style('wp-color-picker');

    wp_enqueue_script ('my_tabs_jquery');
	
}

function super_social_media_setting()
{
 require_once('settings.php');
}

require_once('super_social_scripts.php');

add_action( 'wp_enqueue_scripts','social_media_enqueue_css');
function social_media_enqueue_css() 
{  
	wp_register_style( 'css_for_fa_icon', plugins_url( 'inc/css/font-awesome-4.0.3/css/font-awesome.min.css', __FILE__ ) );
	wp_enqueue_style('css_for_fa_icon');
	
	wp_register_style( 'css_for_hover_effect', plugins_url( 'inc/css/hover.css', __FILE__ ) );
	wp_enqueue_style('css_for_hover_effect');

}

// include widget php file
require_once('super_social_icon_widget.php');

// Add settings link on plugin page
function super_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=super_social_media">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'super_settings_link' );

/* my custom script */
add_action('admin_enqueue_scripts','my_scripts');
function my_scripts($hook)
{
	
	
  if ($hook != 'settings_page_super_social_media'){return;} 
  // we dont want to load our js on other pages
  
  wp_register_script( 'super_social_media_wp_admin_js', plugin_dir_url( __FILE__ ) . 'js/color_scheme.js',array('jquery','jquery-ui-core','jquery-ui-tabs','wp-color-picker'), false, '1.0.0' );
  wp_enqueue_script ('super_social_media_wp_admin_js');

}

?>
