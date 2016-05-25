<?php
require_once('../session.php');
if(!isset($_GET['product_id'])) die("No user id set");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script  src="User_main_ajax.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/container_style.css" />
<?php 
require_once("../session.php"); 
?>
</head>
<body>
<div id="body_frame">
  <table align="center" width="450" height="140" id="input_table">
  <tr>
      <th colspan="2" align="center">Update User</th>
    </tr>
    <tr>
      <td><strong> User ID </strong></td>
      <td colspan="1"><input type="text" name="user_id" id="user_id" width="200" height="25" disabled="disabled" value="<?php echo $_GET['product_id']; ?>" /></td>
    </tr>
    
    <tr>
      <td><strong> User Password </strong></td>
      <td colspan="1"><input type="password" name="user_pass" id="user_pass" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> User Confirm Password </strong></td>
      <td colspan="1"><input type="password" name="user_pass1" id="user_pass1" width="200" height="25" /></td>
    </tr>
    
    <tr>
      <td colspan="3"><div align="center" id="resoult">   
          <input type='button' id='button' value="Update Query" onclick="update_pass_querey()" />
        </div></td>
    </tr>
  </table>
</div>
</body>
</html>