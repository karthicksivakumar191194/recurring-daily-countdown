<?php
/**
 * Plugin Name:       Recurring Daily Countdown
 * Plugin URI:        
 * Description:       Recurring countdown that run countdown, daily for a fixed time.
 * Version:           1.0.0
 * Author:            Karthick Sivakumar
 * Author URI:        
 * License:           GPL v2 or later
 */
 
define('RDCP__PLUGIN_DIR', plugin_dir_path( __FILE__ ) ); 

require_once(RDCP__PLUGIN_DIR.'/recurring-daily-countdown-loadscripts.php');
require_once(RDCP__PLUGIN_DIR.'/recurring-daily-countdown-menu.php');
require_once(RDCP__PLUGIN_DIR.'/recurring-daily-countdown-shortcode.php');
 
add_action('wp_enqueue_scripts', 'rdcp_loadScripts');  
add_action( 'admin_menu', 'rdcp_countdownMenu' ); 

add_shortcode('recurring_daily_countdown', 'rdcp_countdownShortcode'); 