<?php
function AddAccountUpgrade($ruid, $sdy, $edy, $iex, $atid)
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

$sql = "{CALL TYKWS_ACCOUNT_UPGRADE(?,?,?, ?,?,?)}";
	  $params = array( 
                             array($ruid, SQLSRV_PARAM_IN),
                             array($sdy, SQLSRV_PARAM_IN),
							 array($edy, SQLSRV_PARAM_IN),
							 
                             array($iex, SQLSRV_PARAM_IN),
							 array($atid, SQLSRV_PARAM_IN),
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
	
	Gen_er($status);
		  
}

sqlsrv_free_stmt($result);


}
?>

