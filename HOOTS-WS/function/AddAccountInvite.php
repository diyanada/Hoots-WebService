<?php
function AddAccountInvite($ruid, $soid)
{

include('../owsh_secret.php');
$service_msg = array();
$er_msg      = array();
$return_val  = array();

$connectionInfo = array(
    "Database" => $database,
    "UID" => $db_username,
    "PWD" => $db_password,
    "CharacterSet" => "UTF-8"
);
$conn = sqlsrv_connect($server_name, $connectionInfo);
if ($conn === false) {
    if (($errors = sqlsrv_errors()) != null) {
        foreach ($errors as $error) {
            $er_msg['code'] = $error['code'];
            $er_msg['message'] = $error['message'];
        }
    }
    $service_msg['serviceStatus'] = $er_msg;
    $return_val = json_encode($service_msg);
    die($return_val);
}


$status = 100;
$awards = 0;
$quotes = "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";

$sql = "{CALL TYKWS_ACCOUNT_INVITE(?,?,?,?,?)}";
	  $params = array( 
                             array($ruid, SQLSRV_PARAM_IN),
                             array($soid, SQLSRV_PARAM_IN),
							 array($awards, SQLSRV_PARAM_INOUT),
							 array($quotes, SQLSRV_PARAM_INOUT),
                             array($status, SQLSRV_PARAM_INOUT),
                           );
  
	  $result = sqlsrv_query($conn, $sql, $params);
	  
if ($result === false) {
    if (($errors = sqlsrv_errors()) != null) {
        foreach ($errors as $error) {
            $er_msg['code'] = $error['code'];
            $er_msg['message'] = $error['message'];
        }
    }
    $service_msg['serviceStatus'] = $er_msg;
    $return_val  = json_encode($service_msg);
    die($return_val);
}
else{
	sqlsrv_next_result($result);
	sqlsrv_next_result($result);
	sqlsrv_next_result($result);
	
	//echo $status;
		  if($status == -2){
		  
			$er_msg['code'] = "";
			$er_msg['message'] = "The Account Registered User ID or Share Options ID is NOT exists.";
			
			$service_msg['serviceStatus'] = $er_msg;
			echo (json_encode($service_msg));
		  }
		  else if($status == 20){
		  
			$er_msg['code'] = "";
			$er_msg['message'] = "Couldn't insert to the database Transaction Rollback.";
			
			$service_msg['serviceStatus'] = $er_msg;
			echo (json_encode($service_msg));
		  }
		  else if($status == 100){
			   
			$er_msg['awards'] = $awards;
			$er_msg['quotes'] = $quotes;
			
			$service_msg['Returns'] = $er_msg;
			echo (json_encode($service_msg));
		  }
		  else{			   
			$er_msg['code'] = "";
			$er_msg['message'] = "Unknown Error.";
			
			$service_msg['serviceStatus'] = $er_msg;
			echo (json_encode($service_msg));
		  }
}

sqlsrv_free_stmt($result);


}
?>

