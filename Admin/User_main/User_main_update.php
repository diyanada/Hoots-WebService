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
require_once '../class/system_strings.php';
	$sys_st = new system_strings();
		
	
	$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
	if( $conn === false ) {
     	die("Database Connection fail!");
	}
	else{
	  $sql = "SELECT [ID]
      ,[USER_NAME]
      ,[PWD]
      ,[USER_TYPE]
      ,[FIRST_NAME]
      ,[LAST_NAME]
      ,[EMAIL]
      ,[DESCRIPTION]
      ,[ROLE_ID]
      ,[CLIENT_CODE]
  FROM [SYSTEM_USER] 
		WHERE [ID] = ".$_GET['product_id'];	  
		
	  $result = sqlsrv_query($conn, $sql);
	  
	

	  if( $result === false ) {
		  die("Database Connection fail!");
	  }
	  
	  	$row = sqlsrv_fetch_array($result);
		
		
		echo '<script type="text/javascript">function dats(){';
		
		echo 'document.getElementById("rol_'.$row['ROLE_ID'].'").selected = "true";';
		echo 'document.getElementById("cli_'.$row['CLIENT_CODE'].'").selected = "true";';
		echo 'document.getElementById("urty_'.$row['USER_TYPE'].'").selected = "true";';
		
		echo 'document.getElementById("user_id").value ="'.$row['ID'].'";';
		echo 'document.getElementById("user_name").value ="'.$row['USER_NAME'].'";';
		
		echo 'document.getElementById("first_name").value ="'.$row['FIRST_NAME'].'";';
		echo 'document.getElementById("last_name").value ="'.$row['LAST_NAME'].'";';
		echo 'document.getElementById("user_mail").value ="'.$row['EMAIL'].'";';
		
		echo 'document.getElementById("user_des").value ="'.$row['DESCRIPTION'].'";';

		
		echo 'document.getElementById("button").disabled = false;';
		echo '}</script>';
	  
		sqlsrv_free_stmt($result);
	  
	}
	
	
	sqlsrv_close($conn);
?>
</head>
<body>
<div id="body_frame">
  <table align="center" width="450" height="140" id="input_table">
  <tr>
      <th colspan="2" align="center">Update User</th>
    </tr>
    <tr>
      <td><strong> Lord Data </strong></td>
      <td colspan="1"><input type="button" onclick="dats()" value="Lord Data"></td>
    </tr>
    <tr>
      <td><strong> User ID </strong></td>
      <td colspan="1"><input type="text" name="user_id" id="user_id" width="200" height="25" disabled="disabled" /></td>
    </tr>
    <tr>
      <td><strong> User Name </strong></td>
      <td colspan="1"><input type="text" name="user_name" id="user_name" width="200" height="25" /></td>
    </tr>
    <td><strong> User Type </strong></td>
      <td colspan=""><strong>
        <select name="user_type" id="user_type">
          <option value=""> -- Select a Value -- </option>
          <option value="1" id="urty_1"> Admin </option>
        </select>
        </strong></td>
    </tr>
    <tr>
      <td><strong> First Name </strong></td>
      <td colspan="1"><input type="text" name="first_name" id="first_name" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> Last Name </strong></td>
      <td colspan="1"><input type="text" name="last_name" id="last_name" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> E-mail </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="1" name="user_mail" id="user_mail"></textarea>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Description </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="3" name="user_des" id="user_des"></textarea>
        </strong></td>
    </tr>
    <td><strong> Role </strong></td>
      <td colspan=""><strong>
        <select name="user_role" id="user_role">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once '../class/DB.php';
			
			$sql = "SELECT [ID] as VALUE ,[NAME] as OPTIO FROM [ROLE]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql, "rol_");
			?>
        </select>
        </strong></td>
    </tr>
    <td><strong> Client </strong></td>
      <td colspan=""><strong>
        <select name="user_client" id="user_client">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once '../class/DB.php';
			
			$sql = "SELECT [CODE] as VALUE ,[NAME] as OPTIO FROM [CLIENT]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql, "cli_");
			?>
        </select>
        </strong></td>
    </tr>
    
    <tr>
      <td colspan="3"><div align="center" id="resoult">   
          <input type='button' id='button' value="Update Query" onclick="update_querey()" disabled="true" />
        </div></td>
    </tr>
  </table>
</div>
</body>
</html>