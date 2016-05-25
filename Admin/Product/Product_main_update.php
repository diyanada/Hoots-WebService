<?php
require_once('../session.php');
if(!isset($_GET['product_id'])) die("No product id set");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script  src="Product_main_ajax.js" type="text/javascript"></script>
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
	  $sql = "SELECT 
	  [PRODUCT_TYPE_ID]
      ,[NAME]
      ,[SET_NAME]
      ,[FOREIGN_PRODUCT_CODE]
      ,[KEY_WORDS]
      ,[DESCRIPTION]
      ,[IMAGE_PATH]
      ,[PRICE]
      ,[IS_PERSONALIZABLE]
      ,[IS_MULTIFIELD]
      ,[IS_PHOTO_UPLOAD]
      ,[IS_ACTIVE]
      ,[PERSONALIZATION_MAX_LENGTH]
      ,[DEFAULT_PERSONALIZATION]
      ,[FAVORITE_COUNT]
      ,[RATING_COUNT]
      ,[SUPPLIER_ID]
      ,[ROYALTY_ID]
      ,[PRODUCT_GROUP_ID]
      ,[PRODUCT_OUTPUT_ID]
      ,[PRODUCT_SIMILAR_ID]
      ,[NEW_PERSONALISATION]
      ,[CREATED_BY]
      ,[CREATED_DATETIME]
      ,[LAST_UPDATED_BY]
      ,[LAST_UPDATED_TIME]
      ,[COUNTRY_HOSTED_ID]
      ,[ENLARGE_IMAGE_CREATED]
  	FROM [PRODUCT]
	WHERE [ID] = ".$_GET['product_id'];	   
	  $result = sqlsrv_query($conn, $sql);
	  
	

	  if( $result === false ) {
		  die("Database Connection fail!");
	  }
	  
	  	$row = sqlsrv_fetch_array($result);
		
		echo '<script type="text/javascript">function dats(){';
		echo 'document.getElementById("pdty_'.$row['PRODUCT_TYPE_ID'].'").selected = "true";';
		echo 'document.getElementById("outy_'.$row['PRODUCT_OUTPUT_ID'].'").selected = "true";';
		echo 'document.getElementById("pdgr_'.$row['PRODUCT_GROUP_ID'].'").selected = "true";';
		echo 'document.getElementById("sp_'.$row['SUPPLIER_ID'].'").selected = "true";';
		echo 'document.getElementById("cuho_'.$row['COUNTRY_HOSTED_ID'].'").selected = "true";';
		echo 'document.getElementById("nwpr_'.$row['NEW_PERSONALISATION'].'").selected = "true";';
		
		echo 'document.getElementById("foreign_code").value ="'.$row['FOREIGN_PRODUCT_CODE'].'";';
		echo 'document.getElementById("set_name").value ="'.$row['SET_NAME'].'";';
		echo 'document.getElementById("product_name").value ="'.$row['NAME'].'";';
		echo 'document.getElementById("description").value ="'.$row['DESCRIPTION'].'";';
		echo 'document.getElementById("price").value ="'.$row['PRICE'].'";';
		
		echo 'document.getElementById("personalizable").value ="'.$row['IS_PERSONALIZABLE'].'";';
		echo 'document.getElementById("key_words").value ="'.$row['KEY_WORDS'].'";';
		echo 'document.getElementById("multifield").value ="'.$row['IS_MULTIFIELD'].'";';
		echo 'document.getElementById("photo_upload").value ="'.$row['IS_PHOTO_UPLOAD'].'";';
		echo 'document.getElementById("is_active").value ="'.$row['IS_ACTIVE'].'";';
		
		echo 'document.getElementById("p_max_length").value ="'.$row['PERSONALIZATION_MAX_LENGTH'].'";';
		echo 'document.getElementById("default_personalizable").value ="'.$row['DEFAULT_PERSONALIZATION'].'";';
		echo 'document.getElementById("favorite_count").value ="'.$row['FAVORITE_COUNT'].'";';
		echo 'document.getElementById("rating_count").value ="'.$row['RATING_COUNT'].'";';
		
		echo 'document.getElementById("product_id").value ="'.$_GET['product_id'].'";';
		
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
      <th colspan="2" align="center">Update Products</th>
    </tr>
    <tr>
      <td><strong> Lord Data </strong></td>
      <td colspan="1"><input type="button" onclick="dats()" value="Lord Data"></td>
    </tr>
    <tr>
      <td><strong> Product ID </strong></td>
      <td colspan="1"><input type="text" name="product_id" id="product_id" width="200" height="25" readonly="readonly" /></td>
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
      <td><strong> Output Type </strong></td>
      <td colspan=""><strong>
        <select name="output_type" id="output_type">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once '../class/DB.php';
			
			$sql = "SELECT [ID] as VALUE ,[NAME] as OPTIO FROM [PRODUCT_OUTPUT_TYPE]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql, "outy_");
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
			echo $db->select_dropdown($sql, "pdgr_");
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
      <td><strong> Foreign Product Code </strong></td>
      <td colspan="1"><strong>
      <input type="text" name="foreign_code" id="foreign_code" width="200" height="25" />
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
          <option id="pr_0" value="0">NO</option>
          <option id="pr_1" value="1">YES</option>
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
          <option id="mu_0" value="0">NO</option>
          <option id="mu_1" value="1">YES</option>
        </select>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Photo Upload </strong></td>
      <td colspan=""><strong>
        <select name="photo_upload" id="photo_upload">
          <option id="poup_0" value="0">NO</option>
          <option id="poup_1" value="1">YES</option>
        </select>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Is Active </strong></td>
      <td colspan=""><strong>
        <select name="is_active" id="is_active">
          <option id="act_0" value="0">NO</option>
          <option id="act_1" value="1">YES</option>
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
          <option id="nwpr_0" value="0">NO</option>
          <option id="nwpr_1" value="1">YES</option>
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
			echo $db->select_dropdown($sql, "cuho_");
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
          <input type='button' id='button' value="Update Query" onclick="update_querey()" disabled="true" />
        </div></td>
    </tr>
  </table>
</div>
</body>
</html>