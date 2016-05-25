<?php
  require_once('../session.php');
  require_once("../class/user_mang.php");
  $user=new user_mang();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<body>
<div id="topp_continer" style="margin:0, auto;">
  <div id="left"> <?php echo "Welcome! ".$user->user_fullname($_SESSION['userid']);?> </div>
  <div id="right">
    <?php 
	date_default_timezone_set('Europe/London');
	echo date('l j')."<sup>".date('S')."</sup>".date(' \of F Y');
	echo "<br />";
	echo  date('g:i a');
	?>
  </div>
</div>
<div id="topbr">
  <div id="topbr_continer" style="margin:0, auto;" >
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a target="_top" href="../account/logout.php">Logout</a></li>
      <li><a target="_top" href="../main/main.php">Menu</a></li>
    </ul>
  </div>
</div>
</body>
</head>
</html>
