<?php
function GetShareOptions()
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


$sql = "SELECT [ID]
      ,[TYPE]
      ,[NO_OF_FREE_HOOTS]
  FROM [SHARE_OPTIONS]";

$result = sqlsrv_query($conn, $sql);
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
$cateogries = array();
while ($row = sqlsrv_fetch_array($result)) {
    
    
    $cateogries_it = array();
    $cateogries_it['id'] = $row['ID'];
    $cateogries_it['type'] = $row['TYPE'];
    $cateogries_it['vofh'] = $row['NO_OF_FREE_HOOTS'];
    
    array_push($cateogries, $cateogries_it);
}
$return_val = json_encode(array('Options' => $cateogries), JSON_PRETTY_PRINT);
echo $return_val;

sqlsrv_free_stmt($result);


}
?>

