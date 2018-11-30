<?php
/*
Plugin Name:  WP Taxi Me (Free)
Plugin URI:   https://winwar.co.uk/plugins/wp-taxi-me/?utm_source=plugin-link&utm_medium=plugin&utm_campaign=wptaxime
Description:  Get your customers to order taxis to your location through Taxi.
Version:      2.3.1
Author:       Winwar Media
Author URI:   https://winwar.co.uk/?utm_source=author-link&utm_medium=plugin&utm_campaign=wptaxime
Text Domain:  wp-taxi-me

*/


define( 'WP_TAXI_ME_PLUGIN_PATH', dirname( __FILE__ ) );

define( "WP_TAXI_ME_PLUGIN_NAME", "WP Taxi Me" );
define( 'WP_TAXI_ME_PLUGIN_TAGLINE', __( 'Get your customers to order taxis to your location through Uber.', 'wp-taxi-me' ) );
define( "WP_TAXI_ME_PLUGIN_URL", "https://winwar.co.uk/plugins/wp-taxi-me/" );
define( "WP_TAXI_ME_EXTEND_URL", "http://wordpress.org/plugins/wp-taxi-me/" );
define( "WP_TAXI_ME_AUTHOR_TWITTER", "winwaruk" );
define( "WP_TAXI_ME_DONATE_LINK", "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SBVM5663CHYN4" );

/**
 * Load the plugin Textdomain
 * 
 * @return void
 */
function wptaxime_load_plugin_textdomain() {
    load_plugin_textdomain( 'wp-taxi-me', FALSE, basename( WP_TAXI_ME_PLUGIN_PATH ) . '/languages/' );
}
add_action( 'plugins_loaded', 'wptaxime_load_plugin_textdomain' );

require_once( WP_TAXI_ME_PLUGIN_PATH . '/inc/core.php' );
