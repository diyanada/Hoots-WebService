<?php
require_once('../session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script  src="Share_options_ajax.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/container_style.css" />
</head>
<body>
<div id="body_frame">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Add Share Options </th>
    </tr>
    <tr>
      <td><strong> Options ID </strong></td>
      <td colspan="1"><input type="text" name="so_id" id="so_id" width="200" height="25" disabled="disabled" /></td>
    </tr>
    <tr>
      <td><strong> Type </strong></td>
      <td colspan="1"><input type="text" name="so_type" id="so_type" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> Number of Free Hoots </strong></td>
      <td colspan="1"><input type="text" name="nofh" id="nofh" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> Quotes </strong></td>
      <td colspan=""><strong>
        <select name="quotes" id="quotes">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once '../class/DB.php';
			
			$sql = "SELECT [ID] as VALUE ,[QUOTES] as OPTIO FROM [QUOTES]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql, "qut_");
			?>
        </select>
        </strong></td>
    </tr>
    <tr>
    
    
      <td colspan="2"><div align="center" id="resoult">
          <input type='button' id='button' value="Update Query" onclick="run_querey()"  />
        </div></td>
    </tr>
  </table>
</div>
</body>
</html>