<?php
require_once '../class/system_strings.php';
$sys_st = new system_strings();
$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if( !$conn ) die("Connection could not be established.");
sqlsrv_close($conn);
require_once('../session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Administrator </title>
<?php
include("../utility/header.php");
?>
</head>

</body>
</html>