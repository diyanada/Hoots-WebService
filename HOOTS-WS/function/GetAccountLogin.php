<?php
function GetAccountLogin($fbid, $fbtk, $atID)
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
            $er_msg['code']    = $error['code'];
            $er_msg['message'] = $error['message'];
        }
    }
    $service_msg['serviceStatus'] = $er_msg;
    $return_val = json_encode($service_msg);
    die($return_val);
}

$ruid = 0;
$status = 0;

$sql = "{CALL TYKWS_GET_REGISTERED_USER_ID(?,?,?)}";
	  $params = array( 
                             array($fbid, SQLSRV_PARAM_IN),
                             array($status, SQLSRV_PARAM_INOUT),
							 array($ruid, SQLSRV_PARAM_INOUT)
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
	
	if($status == -2){
		
		$url = "https://graph.facebook.com/me?
		fields=id,name,first_name,last_name,email,birthday
		&access_token=". $fbtk;
		
			$json = @file_get_contents($url);
			
			if($json === false)
			{
				$er_msg['code'] = "2500";
				$er_msg['message'] = "An active access token must be used to query information about the current user.";
				
				$service_msg['serviceStatus'] = $er_msg;
				die (json_encode($service_msg));
			}
			else {
			
			$obj = json_decode($json);
			
			if(isset($obj->id)) $fbid = $obj->id;					
			else RE_prems("Facebook ID");
			if(isset($obj->name)) $name = $obj->name;				
			else RE_prems("Name");
			if(isset($obj->first_name)) $fname = $obj->first_name;	
			else RE_prems("First Name");
			if(isset($obj->last_name)) $lname = $obj->last_name;		
			else RE_prems("Last Name");
			if(isset($obj->email)) $email = $obj->email;				
			else RE_prems("E-mail");
			if(isset($obj->birthday)) $bday = $obj->birthday;		
			else $bday = NULL;
			
			
				$status = 0;
				$ruid_temp = 0;
				
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
											 array($ruid_temp, SQLSRV_PARAM_INOUT )
										   );
				  
					  $result2 = sqlsrv_query($conn, $sql, $params);
				if ($result2 === false) {
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
				else{
					sqlsrv_next_result($result2);
					sqlsrv_next_result($result2);
						  
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
							  
							$status = 100;
							$ruid = $ruid_temp;
						  }
				}
				
				sqlsrv_free_stmt($result2);
			
			
			}
			
			
	}
	
	 if($status == 100){
	
			date_default_timezone_set("UTC"); 
	
			$str = strtoupper(md5(substr($fbtk, 20, 40)) . date("YmdHis") . "ID" .$ruid);
			
    		$token = hootDBtoken($str);
			
			$atid = 0;
			$nofh = 0;
			$status = 0;
			
$quotes = "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";

			
			$sql2 = "{CALL TYKWS_ACCOUNT_LOGIN(?,?,?, ?,?,?,?)}";
				  $params2 = array( 
							 array($ruid, SQLSRV_PARAM_IN),
							 array($fbtk, SQLSRV_PARAM_IN),
							 array($token, SQLSRV_PARAM_IN),
							 
							 array($atid, SQLSRV_PARAM_INOUT),
							 array($nofh, SQLSRV_PARAM_INOUT),
							 array($quotes, SQLSRV_PARAM_INOUT),
							 array($status, SQLSRV_PARAM_INOUT)
						   );
			  
			$result2 = sqlsrv_query($conn, $sql2, $params2);
			if ($result2 === false) {
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
			
				sqlsrv_next_result($result2);
				sqlsrv_next_result($result2);
				
				if($status == 60){
						$er_msg['code'] = "";
						$er_msg['message'] = "Couldn't insert to the database Transaction Rollback.";
						
						$service_msg['serviceStatus'] = $er_msg;
						die (json_encode($service_msg));	
				} 
				
				$cateogries = array();
				$cateogries['hootID'] = $ruid;
				$cateogries['token'] = $str;
				$cateogries['typeOfAccount'] = $atid;
				$cateogries['awards'] = $nofh;
				$cateogries['quotes'] = $quotes;
				
			
			$return_val = json_encode($cateogries, JSON_PRETTY_PRINT);
			echo $return_val;
			
			sqlsrv_free_stmt($result2);

		}	
	} 
	else{
			$er_msg['code'] = "";
			$er_msg['message'] = "Unknown Error.";
			
			$service_msg['serviceStatus'] = $er_msg;
			die (json_encode($service_msg));	
	}
    
    

sqlsrv_free_stmt($result);

}


}
?>

