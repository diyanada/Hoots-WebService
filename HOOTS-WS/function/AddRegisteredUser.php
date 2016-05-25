<?php
function AddRegisteredUser($name, $fname, $lname, $bday, $email, $fbid, $atID)
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
$conn           = sqlsrv_connect($server_name, $connectionInfo);
if ($conn === false) {
    if (($errors = sqlsrv_errors()) != null) {
        foreach ($errors as $error) {
            $er_msg['code']    = $error['code'];
            $er_msg['message'] = $error['message'];
        }
    }
    $service_msg['serviceStatus'] = $er_msg;
    $return_val                   = json_encode($service_msg);
    die($return_val);
}

$status = 0;
$produt_id = 0;

$sql = "{CALL TYKWS_REGISTERED_USER_CREATE(?,?,?, ?,?,?, ?,?,?)}";
	  $params = array( 
                             array($name, SQLSRV_PARAM_IN),
                             array($fname, SQLSRV_PARAM_IN),
							 array($lname, SQLSRV_PARAM_IN),
							 
							 array($bday, SQLSRV_PARAM_IN),
                             array($email, SQLSRV_PARAM_IN),
							 array($fbid, SQLSRV_PARAM_IN),
							 
							 array($atID, SQLSRV_PARAM_IN),
							 							 
                             //array($_SESSION['userid'], SQLSRV_PARAM_IN),
                             array($status, SQLSRV_PARAM_INOUT),
							 array($produt_id, SQLSRV_PARAM_INOUT )
                           );
  
	  $result = sqlsrv_query($conn, $sql, $params);
if ($result === false) {
    if (($errors = sqlsrv_errors()) != null) {
        foreach ($errors as $error) {
            $er_msg['code']    = $error['code'];
            $er_msg['message'] = $error['message'];
        }
    }
    $service_msg['serviceStatus'] = $er_msg;
    $return_val                   = json_encode($service_msg);
    die($return_val);
}
else{
	sqlsrv_next_result($result);
	sqlsrv_next_result($result);
		  
		  if($status == -2){
			$er_msg['code']    = "";
			$er_msg['message'] = "The Facebook id is already exists.";
			
			$service_msg['serviceStatus'] = $er_msg;
			echo (json_encode($service_msg));
		  }
		  else if($status == -3){
			$er_msg['code']    = "";
			$er_msg['message'] = "The Account type id is NOT exists.";
			
			$service_msg['serviceStatus'] = $er_msg;
			echo (json_encode($service_msg));
		  }
		  else{
			  
			$er_msg['code']    = "";
			$er_msg['message'] = "Successfully added.";
			
			$service_msg['serviceStatus'] = $er_msg;
			echo (json_encode($service_msg));
		  }
}

sqlsrv_free_stmt($result);


}
?>

