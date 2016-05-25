<?php
require_once('../session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script  src="Category_item_product_mapping_ajax.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/container_style.css" />
<link rel="stylesheet" type="text/css" href="../css/throbber.css" />
</head>
<body>
<div id="body_frame">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center">Category Item Search </th>
    </tr>
    <tr>
      <td><strong> Name </strong></td>
      <td colspan="1"><input type="text" name="ctit_name" id="ctit_name" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> Display Name </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="3" name="ctit_dname" id="ctit_dname"></textarea>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Key Words </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="3" name="key_words" id="key_words"></textarea>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Product Type </strong></td>
      <td colspan=""><strong>
        <select name="product_type" id="product_type">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once '../class/DB.php';
			
			$sql = "SELECT [ID] as VALUE ,[NAME] as OPTIO FROM [PRODUCT_TYPE]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql, "pdty_");
			?>
        </select>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Supplier </strong></td>
      <td colspan=""><strong>
        <select name="supplier" id="supplier">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once '../class/DB.php';
			
			$sql = "SELECT [ID] as VALUE ,[NAME] as OPTIO FROM [SUPPLIER]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql, "sp_");
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