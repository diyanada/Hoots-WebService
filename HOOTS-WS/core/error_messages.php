<?php 
function NO_method(){
	$service_msg = array();
	$er_msg = array();
	
	$er_msg['code']    = "404";
    $er_msg['message'] = "Invalid function reference.";
	
	$service_msg['serviceStatus'] = $er_msg;
    die (json_encode($service_msg));
	
}
function RE_prems($pram = NULL){
	$service_msg = array();
	$er_msg = array();
	
	$er_msg['code'] = "400";
    $er_msg['message'] = "Required parameter (".$pram.") are not present.";
	
	$service_msg['serviceStatus'] = $er_msg;
    die (json_encode($service_msg));
	
}
function NO_call(){
	$service_msg = array();
	$er_msg = array();
	
	$er_msg['code'] = "404";
    $er_msg['message'] = "Invalid  reference.";
	
	$service_msg['serviceStatus'] = $er_msg;
    die (json_encode($service_msg));
	
}
function Gen_er($status){
	$er_msg['code'] = "";
	
	switch ($status) {
    case 10:
        $er_msg['message'] = "Successfully upgraded account.";
        break;
    case 20:
        $er_msg['message'] = "Successfully create account.";
        break;
    case 30:
        $er_msg['message'] = "This user has account already cannot create.";
        break;
	case 40:
        $er_msg['message'] = "This user not have account already.";
        break;
	case 50:
        $er_msg['message'] = "The end date is pass.";
        break;
	case 60:
        $er_msg['message'] = "Couldn't insert to the database Transaction Rollback.";
        break;
    default:
        $er_msg['message'] = "Unknown Error.";
		break;
}			
			
			$service_msg['serviceStatus'] = $er_msg;
			echo (json_encode($service_msg));
	
}
?>