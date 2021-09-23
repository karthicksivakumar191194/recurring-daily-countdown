<?php

function getSelectOptions($type){
	$count = 0;
	$prevSelectedOption = "";
	$output = "";
	
	if($type === "hour"){
		$count = 23;
		$prevSelectedOption = get_option( 'rdc_hour' ) ? get_option( 'rdc_hour' ) : "";
	}else if($type === "minute"){	
		$count = 59;
		$prevSelectedOption = get_option( 'rdc_minute' ) ? get_option( 'rdc_minute' ) : "";
	}
	
	for($i = 0; $i <= $count; $i++){
		$option = $i <= 9 ? "0".$i : $i;
		$selected  = $prevSelectedOption == $option ? "selected" : "";
		
		$output .= "<option value='$option' $selected>$option</option>";
	}
	
	
	return $output;
}

echo 
"<table class='form-table' role='presentation'>
<tbody>
<tr>
<th scope='row'><label for='hour'>Hour</label></th>
<td><select name='hour' id='hour'><option value='' selected disabled>Select Hour</option>".getSelectOptions('hour')."</select></td>
</tr>
<tr>
<tr>
<th scope='row'><label for='minute'>Minute</label></th>
<td><select name='minute' id='minute'><option value='' selected disabled>Select Minute</option>".getSelectOptions('minute')."</select></td>
</tr>
<tr>
</tbody>
</table>
";