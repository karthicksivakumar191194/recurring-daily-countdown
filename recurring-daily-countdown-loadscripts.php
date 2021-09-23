<?php

function loadScripts($hook) {  
	$hour = get_option( 'rdc_hour' ) ? get_option( 'rdc_hour' ) : "00";
	$minute = get_option( 'rdc_minute' ) ? get_option( 'rdc_minute' ) : "00";	
	
	$data = "$hour:$minute";
	
    wp_enqueue_script( 'recurring_daily_countdown_js', plugins_url( 'js/recurring_daily_countdown.js', __FILE__ ), array());
    wp_register_style( 'recurring_daily_countdown_css',    plugins_url( 'css/recurring_daily_countdown.css', __FILE__ ), false);
    wp_enqueue_style ( 'recurring_daily_countdown_css' ); 
	
	//Send PHP data to plugin js
	wp_localize_script('recurring_daily_countdown_js', 'rdc', array('data' => $data));
}

