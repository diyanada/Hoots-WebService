<?php
function AddProductPurchase($ruid, $prod_id, $tos_id, $at_id)
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


$status = 0;

	switch ($at_id) {
    case 1:
        $sql = "{CALL TYKWS_PRODUCT_PURCHASE_FREE(?,?,?,?,?,?,?,?,?,?,?)}";
        break;
    case 2:
        $sql = "{CALL TYKWS_PRODUCT_PURCHASE_PREMIUM(?,?,?,?,?,?,?,?,?,?,?)}";
        break;
    default:
        $er_msg['code'] = "";
		$er_msg['message'] = "Account Type ID NOT in Product Purchase Sorry!.";
			
		$service_msg['serviceStatus'] = $er_msg;
		die (json_encode($service_msg));
}
$fbID = NULL;
$fbmail = NULL;
//=-------=--------=--------

$sdy = "oct 02 2002";
$edy = "oct 02 2002";
$nofh = 0;
$quotes = "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";

	  $params = array( 
                             array($ruid, SQLSRV_PARAM_IN),
                             array($prod_id, SQLSRV_PARAM_IN),
							 array($tos_id, SQLSRV_PARAM_IN),
                             array($at_id, SQLSRV_PARAM_IN),
							 array($fbmail, SQLSRV_PARAM_IN),
							 array($fbID, SQLSRV_PARAM_IN),
							 
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
	sqlsrv_next_result($result);
	sqlsrv_next_result($result);
	sqlsrv_next_result($result);
	sqlsrv_next_result($result);
	
	
	//echo $status;
		  
		  if($status == 100){
			   
	$cateogries = array();
    $cateogries['startDate'] = $sdy;
    $cateogries['endDate'] = $edy;
    $cateogries['awards'] = $nofh;
	$cateogries['quotes'] = $quotes;
    

$return_val = json_encode(array('returns' => $cateogries), JSON_PRETTY_PRINT);
echo $return_val;
		  }
		  else if($status == 120){
			   
			$er_msg['code'] = "";
			$er_msg['message'] = "User NOT have free Hoots ";
			
			$service_msg['serviceStatus'] = $er_msg;
			echo (json_encode($service_msg));
		  }
		  else if($status == 105){
			   
			$er_msg['code'] = "";
			$er_msg['message'] = "User account is NOT premium or expired!";
			
			$service_msg['serviceStatus'] = $er_msg;
			echo (json_encode($service_msg));
		  }
		  else if($status == 60){
			   
			$er_msg['code'] = "";
			$er_msg['message'] = "This Share Options ID or Product ID are NOT exist ";
			
			$service_msg['serviceStatus'] = $er_msg;
			echo (json_encode($service_msg));
		  }
		  else if($status == -20){
			   
			$er_msg['code'] = "";
			$er_msg['message'] = "Couldn't insert to the database Transaction Rollback.";
			
			$service_msg['serviceStatus'] = $er_msg;
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

