<?php
require_once '../class/system_strings.php';
$sys_st = new system_strings();
$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if( !$conn ) die("Connection could not be established.");
sqlsrv_close($conn);
require_once('../session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
</head>
<html xmlns="http://www.w3.org/1999/xhtml">
<frameset rows="85px,*" border="0">
  <frame src="../utility/header_frame.php" scrolling="no">
  <frameset cols="50%,50%" border="0">
    <frame name="fr_one" id="fr_one" src="Product_output_size_insert.php">
    <frame name="fr_two" id="fr_two" src="Product_output_size_search.php">
  </frameset>
</frameset>
<noframes></noframes>
</html>