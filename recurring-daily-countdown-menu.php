<?php

function rdcp_countdownMenu() {
    add_menu_page(
        'Recurring Daily Countdown Settings',
        'Recurring Daily Countdown',
        'manage_options',
        'recurring_daily_countdown',
        'rdcp_menuPage',
        null,
    );
}

function rdcp_menuPage(){
	$status = "";
	
	//update settings
	if(isset($_POST)){
		$formDataHour = isset($_POST['hour']) ? sanitize_text_field($_POST['hour']) : "";
		$formDataMinute = isset($_POST['minute']) ? sanitize_text_field($_POST['minute']) : "";
		
		update_option( 'rdc_hour', $formDataHour );
		update_option( 'rdc_minute', $formDataMinute );
		
		$status = "success";
	}
	?>
	
	<!-- render view -->
	<div class='wrap'>
		<h1>Recurring Daily Countdown</h1>
		<p>Remaining time for the countdown will be calculated, from current time to hour & minute entered below.</p>
		<?php 
		if($status === "success"){ ?>
		<div id='setting-error-settings_updated' class='notice notice-success settings-error is-dismissible'> 
			<p><strong>Settings saved.</strong></p>
		</div> 
		<?php } ?>
		<form method='post' action='' novalidate='novalidate'>
			<?php
			if ( is_file( COUNTDOWN__PLUGIN_DIR . 'menu/layout.php' ) ) {
				require_once(COUNTDOWN__PLUGIN_DIR . 'menu/layout.php');
			}
			
			?>
			<p class='submit'><input type='submit' name='submit' id='submit' class='button button-primary' value='Save Changes'></p>
		</form>
	</div>
<?php
}

