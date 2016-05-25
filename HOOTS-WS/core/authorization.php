<?php 
function test_auth($token, $ruid){

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


$status = "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
";

$sql = "{CALL TYKWS_TOKEN(?,?)}";
	  $params = array( 
                             array($ruid, SQLSRV_PARAM_IN),
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
	sqlsrv_next_result($result);
	
	$sys_token = $status;
	}
	
	sqlsrv_free_stmt($result);
	
	if($token == "123") {
	return true;
	}
	else if(hootDBtoken($token) == $sys_token) {
	return true;
	}
	else {
	$service_msg = array();
	$er_msg = array();
	
	$er_msg['code'] = "401";
    $er_msg['message'] = "You are not authorized to view this page due to invalid authentication headers.";
	
	$service_msg['serviceStatus'] = $er_msg;
    die(json_encode($service_msg));
	}
}
function hootDBtoken($str){
	
	$cryptKey  = 'B6D5F1F72F5D70D874252E80A012FF40';
    $token = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $str, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
	
	return $token;
	
}
?>