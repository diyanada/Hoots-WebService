<?php
function GetAccountPing($ruid)
{

include('../owsh_secret.php');
echo "<pre>";
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
            $er_msg['code']    = $error['code'];
            $er_msg['message'] = $error['message'];
        }
    }
    $service_msg['serviceStatus'] = $er_msg;
    $return_val = json_encode($service_msg);
    die($return_val);
}

$atid = 0;
$sdy = "oct 02 2002";
$edy = "oct 02 2002";
$nofh = 0;
$status = 0;
$quotes = "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";

$sql = "{CALL TYKWS_ACCOUNT_PING(?,?,?, ?,?,?,?)}";
	  $params = array( 
                             array($ruid, SQLSRV_PARAM_IN),
							 array($atid, SQLSRV_PARAM_INOUT),
                             array($sdy, SQLSRV_PARAM_INOUT),
							 
							 array($edy, SQLSRV_PARAM_INOUT),
                             array($nofh, SQLSRV_PARAM_INOUT),
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
	
	if($status == 40){
			$er_msg['code'] = "";
			$er_msg['message'] = "This user not have account already.";
			
			$service_msg['serviceStatus'] = $er_msg;
			die (json_encode($service_msg));	
	} 
    
    $cateogries = array();
    $cateogries['typeOfAccount'] = $atid;
    $cateogries['startDate'] = $sdy;
    $cateogries['endDate'] = $edy;
    $cateogries['awards'] = $nofh;
	$cateogries['quotes'] = $quotes;
    

$return_val = json_encode(array('Returns' => $cateogries), JSON_PRETTY_PRINT);
echo $return_val;

sqlsrv_free_stmt($result);

}


}
?>

