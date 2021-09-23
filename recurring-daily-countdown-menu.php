<?php

function recurringDailyCountdownMenu() {
    add_menu_page(
        'Recurring Daily Countdown Settings',
        'Recurring Daily Countdown',
        'manage_options',
        'recurring_daily_countdown',
        'menuPage',
        null,
    );
}

function menuPage(){
	$status = "";
	
	//update settings
	if($_POST){
		$formDataHour = $_POST['hour'] ? $_POST['hour'] : "";
		$formDataMinute = $_POST['minute'] ? $_POST['minute'] : "";
		
		update_option( 'rdc_hour', $_POST['hour'] );
		update_option( 'rdc_minute', $_POST['minute'] );
		
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

