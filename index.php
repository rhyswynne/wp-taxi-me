<?php
/*
Plugin Name:  WP Taxi Me (Free)
Plugin URI:   http://winwar.co.uk/plugins/wp-taxi-me/
Description:  Get your customers to order taxis to your location through Taxi.
Version:      1.0
Author:       Winwar Media
Author URI:   http://winwar.co.uk/

*/


define( 'WP_TAXI_ME_PLUGIN_PATH', dirname( __FILE__ ) );

define( "WP_TAXI_ME_PLUGIN_NAME", "WP Taxi Me" );
define( 'WP_TAXI_ME_PLUGIN_TAGLINE', __( 'Get your customers to order taxis to your location through Taxi.', 'wptaxime' ) );
define( "WP_TAXI_ME_PLUGIN_URL", "http://winwar.co.uk/plugins/inline-tweet-sharer/" );
define( "WP_TAXI_ME_EXTEND_URL", "http://wordpress.org/plugins/inline-tweet-sharer/" );
define( "WP_TAXI_ME_AUTHOR_TWITTER", "winwaruk" );
define( "WP_TAXI_ME_DONATE_LINK", "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SBVM5663CHYN4" );

require_once( WP_TAXI_ME_PLUGIN_PATH . '/inc/core.php' );
