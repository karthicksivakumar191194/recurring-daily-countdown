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
 
define('COUNTDOWN__PLUGIN_DIR', plugin_dir_path( __FILE__ ) ); 

require_once(COUNTDOWN__PLUGIN_DIR.'/recurring-daily-countdown-loadscripts.php');
require_once(COUNTDOWN__PLUGIN_DIR.'/recurring-daily-countdown-menu.php');
require_once(COUNTDOWN__PLUGIN_DIR.'/recurring-daily-countdown-shortcode.php');
 
add_action('wp_enqueue_scripts', 'loadScripts');  
add_action( 'admin_menu', 'recurringDailyCountdownMenu' ); 

add_shortcode('recurring_daily_countdown', 'recurringDailyCountdownShortcode'); 