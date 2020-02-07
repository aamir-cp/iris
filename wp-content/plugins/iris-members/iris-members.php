<?php
/**
* Plugin Name: IRIS members
* Plugin URI: https://www.lookwhatwemadeyou.com/
* Description: Plugin to manage IRIS members.
* Version: 1.0
* Author: LookWhatWeMadeYou
* Author URI: https://www.lookwhatwemadeyou.com/
* Text Domain: iris-members
**/
require_once( plugin_dir_path( __FILE__ ).'inc/admin-settings.php');
require_once( plugin_dir_path( __FILE__ ).'inc/iris_members_posttype.php');
require_once( plugin_dir_path( __FILE__ ).'inc/iris_contacts_posttype.php');
require_once( plugin_dir_path( __FILE__ ).'inc/iris_insurance_posttype.php');
require_once( plugin_dir_path( __FILE__ ).'inc/iris_members_contactdetails.php');
require_once( plugin_dir_path( __FILE__ ).'inc/shortcodes.php');
require_once( plugin_dir_path( __FILE__ ).'frontend/separate-template.php');

function iris_members_admin_assets() {
		wp_enqueue_script( 'iris_members_admin_js',  plugin_dir_url( __FILE__ ) . "assets/js/iris_admin_js.js");
		//wp_enqueue_script( 'iris_members_color_picker_js',  plugin_dir_url( __FILE__ ) . "assets/js/jquery.minicolors.js");
		wp_enqueue_style( 'iris_members_admin_css',  plugin_dir_url( __FILE__ ) . "assets/css/iris_admin_css.css");
		//wp_enqueue_style( 'iris_members_color_picker_css',  plugin_dir_url( __FILE__ ) . "assets/css/jquery.minicolors.css");
    }
add_action( 'admin_enqueue_scripts', 'iris_members_admin_assets' );

function iris_members_frontend_assets() {
	wp_enqueue_script( 'iris_members_frontend_js',  plugin_dir_url( __FILE__ ) . "assets/js/iris_frontend_js.js");
	wp_enqueue_style( 'iris_members_frontend_css',  plugin_dir_url( __FILE__ ) . "assets/css/iris_frontend_css.css");
}
add_action( 'wp_enqueue_scripts', 'iris_members_frontend_assets',10 );
