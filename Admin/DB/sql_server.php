<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DB TEST</title>
</head>
<body>
<?php


require_once '../class/system_strings.php';
$sys_st = new system_strings();



$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if( $conn ) {
     		echo "Connection established.<br />";
		}
		else{
    		echo "Connection could not be established.<br />";
   			die( print_r( sqlsrv_errors(), true));
		}
sqlsrv_close($conn);
?>
</body>
</html>