<?php
/*
   Plugin Name: WooCommerce Shopping Countdown Simple by MeccaProduction, LLC
   Plugin URI: https://meccaproduction.com/woocomerce-shopping-countdown
   Description: Adds a countdown timer through the checkout process that deletes the order once the timer ends.
   Version: 1.0
   Author: Mecca Product, LLC
   Author URI: https://www.meccaproduction.com
   License: GPL2
*/

// exit if file accessed directly
defined( 'ABSPATH' ) or exit;


/*

1. Check if order has started
2. Initiate countdown timer
	a) Create new timer object
	b) Set to the User session
	c) 
3. Destroy Timer if 
	a) User deletes order by: removing all the detail lines from the order or exits the site
4. Destroy Order if
	a) Timer is up

*/


// Adding custom javascript to toggle prepay buttons on my-subscriptions.php
add_action( 'wp_enqueue_scripts', 'sms_admin_register_plugin_includes' );

//register/enqueue style callback function
function sms_admin_register_plugin_includes() {
	//script
	wp_register_script( 'wscsCustomjQuery', plugins_url( '/src/js/countdown.js', __FILE__ ),['jquery-core'],null, true );
	wp_enqueue_script( 'wscsCustomjQuery' );

	wp_register_style( 'wscsCustomCSS', plugins_url( '/src/css/countdown.css', __FILE__ ) );
	wp_enqueue_style( 'wscsCustomCSS' );

}


//Add Admin Menu with Countdown Amount
function mp_shopping_countdown_plugin_menu() {
	add_menu_page( 'Countdown Timer', 'Countdown Timer', 'manage_options', 'mp-countdown-menu','mp_countdown_menu_options_page' );
}


add_action( 'admin_menu', 'mp_shopping_countdown_plugin_menu' );

Function mp_countdown_menu_options_page(){
	echo "Info here";
}

?>