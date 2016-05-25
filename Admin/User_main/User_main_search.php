<?php
require_once('../session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script  src="User_main_ajax.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/container_style.css" />
<link rel="stylesheet" type="text/css" href="../css/throbber.css" />
</head>
<body>
<div id="body_frame">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center">User Search </th>
    </tr>
    <tr>
      <td><strong> User ID </strong></td>
      <td colspan="1"><input type="text" name="user_id" id="user_id" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> User Name </strong></td>
      <td colspan="1"><input type="text" name="user_name" id="user_name" width="200" height="25" /></td>
    </tr>
    <td><strong> User Type </strong></td>
      <td colspan=""><strong>
        <select name="user_type" id="user_type">
          <option value=""> -- Select a Value -- </option>
          <option value="1"> Admin </option>
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
			echo $db->select_dropdown($sql);
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
			echo $db->select_dropdown($sql);
			?>
        </select>
        </strong></td>
    </tr>
    
    <td colspan="2"><div align="center">
          <input type='button' id='button' value="Search" onclick="search_querey()"  />
        </div></td>
    </tr>
    <tr>
        <td colspan="2"><div id="spriner" align="center">
        	<br /><br />
           <div class="throbber-loader"></div>
          </div></td>
      </tr>
  </table>
  <div align="center" id="resoult"></div>
</div>
</body>
</html>