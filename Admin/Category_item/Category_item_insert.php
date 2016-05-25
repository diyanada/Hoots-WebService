<?php
require_once('../session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script  src="Category_item_ajax.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/container_style.css" />
</head>
<body>
<div id="body_frame">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center">Add Category Item </th>
    </tr>
    <tr>
      <td><strong> Type ID </strong></td>
      <td colspan="1"><input type="text" name="ctit_id" id="ctit_id" width="200" height="25" disabled="disabled" /></td>
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
    <tr>
      <td><strong> Short Order </strong></td>
      <td colspan="1"><input type="text" name="ctso" id="ctso" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> Title Tag </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="3" name="title_tag" id="title_tag"></textarea>
        </strong></td>
    </tr>
    <tr>
      <td><strong> H1 Tag </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="3" name="h1_tag" id="h1_tag"></textarea>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Meta Description </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="3" name="meta_des" id="meta_des"></textarea>
        </strong></td>
    </tr>
    
      <td colspan="2"><div align="center" id="resoult">
          <input type='button' id='button' value="Update Query" onclick="run_querey()"  />
        </div></td>
    </tr>
  </table>
</div>
</body>
</html>