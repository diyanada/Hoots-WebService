<?php
require_once('../session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script  src="Product_main_ajax.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/container_style.css" />
</head>
<body>
<div id="body_frame">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center">Add New Products</th>
    </tr>
    <tr>
      <td><strong> Product ID </strong></td>
      <td colspan="1"><input type="text" name="product_id" id="product_id" width="200" height="25" disabled="disabled" value="<?php 
	  //code
	  ?>"/></td>
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
			echo $db->select_dropdown($sql);
			?>
        </select>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Output Type </strong></td>
      <td colspan=""><strong>
        <select name="output_type" id="output_type">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once '../class/DB.php';
			
			$sql = "SELECT [ID] as VALUE ,[NAME] as OPTIO FROM [PRODUCT_OUTPUT_TYPE]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql);
			?>
        </select>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Product Group </strong></td>
      <td colspan=""><strong>
        <select name="product_group" id="product_group">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once '../class/DB.php';
			
			$sql = "SELECT [ID] as VALUE ,[NAME] as OPTIO FROM [PRODUCT_GROUP]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql);
			?>
        </select>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Supplier </strong></td>
      <td colspan=""><strong>
        <select name="supplier"  id="supplier">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once '../class/DB.php';
			
			$sql = "SELECT [ID] as VALUE ,[NAME] as OPTIO FROM [SUPPLIER]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql);
			?>
        </select>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Foreign Product Code </strong></td>
      <td colspan="1"><strong>
        <input type="text"  name="foreign_code" id="foreign_code" />
        </strong></td>
    </tr>
    <tr>
      <td><strong> Set Name </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="3" name="set_name" id="set_name"></textarea>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Product Name </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="3" name="product_name" id="product_name"></textarea>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Description </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="3" name="description" id="description"></textarea>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Price </strong></td>
      <td colspan="1"><strong>
        <input type="text"  name="price" id="price" />
        </strong></td>
    </tr>
    <tr>
      <td><strong> Personalizable </strong></td>
      <td colspan=""><strong>
        <select name="personalizable" id="personalizable">
          <option value="0">NO</option>
          <option value="1" selected="selected">YES</option>
        </select>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Key Words </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="3" name="key_words" id="key_words"></textarea>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Is Multifield </strong></td>
      <td colspan=""><strong>
        <select name="multifield" id="multifield">
          <option value="0" selected="selected">NO</option>
          <option value="1">YES</option>
        </select>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Photo Upload </strong></td>
      <td colspan=""><strong>
        <select name="photo_upload" id="photo_upload">
          <option value="0" selected="selected">NO</option>
          <option value="1">YES</option>
        </select>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Is Active </strong></td>
      <td colspan=""><strong>
        <select name="is_active" id="is_active">
          <option value="0">NO</option>
          <option value="1" selected="selected">YES</option>
        </select>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Personalization Max Length </strong></td>
      <td colspan="1"><strong>
        <input type="text"  name="p_max_length" id="p_max_length" />
        </strong></td>
    </tr>
    <tr>
      <td><strong> Default Personalization </strong></td>
      <td colspan="1"><strong>
        <input type="text"  name="default_personalizable" id="default_personalizable" />
        </strong></td>
    </tr>
    <tr>
      <td><strong> New Personalization </strong></td>
      <td colspan=""><strong>
        <select name="new_personalization" id="new_personalization">
          <option value="0" selected="selected">NO</option>
          <option value="1">YES</option>
        </select>
        </strong></td>
    </tr>
    
    <tr>
      <td><strong> Country Hosted </strong></td>
      <td colspan=""><strong>
        <select name="country_hosted" id="country_hosted">
        
          <?php
		  	require_once '../class/DB.php';
			
			$sql = "SELECT [ID] as VALUE ,[NAME] as OPTIO FROM [COUNTRY_HOSTED]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql);
			?>
        </select>
        </strong></td>
    </tr>
    <tr>
      <td><strong>  Favorite Count </strong></td>
      <td colspan="1"><strong>
        <input type="text"  name="favorite_count" id="favorite_count" />
        </strong></td>
    </tr>
    <tr>
      <td><strong> Rating Count </strong></td>
      <td colspan="1"><strong>
        <input type="text"  name="rating_count" id="rating_count" />
        </strong></td>
    </tr>
    
    <tr>
      <td colspan="3"><div align="center" id="resoult">
          <input type='button' id='button' value="Update Query" onclick="run_querey()"  />
        </div></td>
    </tr>
  </table>
</div>
</body>
</html>