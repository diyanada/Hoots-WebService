<?php
require_once('../session.php');
if(!isset($_GET['product_id'])) die("No product id set");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script  src="Category_item_ajax.js" type="text/javascript"></script>
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
      ,[ITEM_DISPLAY_NAME]
      ,[ITEM_NAME]
      ,[KEY_WORDS]
      ,[PRODUCT_TYPE_ID]
      ,[SUPPLIER_ID]
      ,[SORT_ORDER]
      ,[TITLE_TAG]
      ,[H1_TAG]
      ,[META_DESCRIPTION]
  FROM [CATEGORY_ITEM] 
		WHERE [ID] = ".$_GET['product_id'];	  
		
	  $result = sqlsrv_query($conn, $sql);
	  
	

	  if( $result === false ) {
		  die("Database Connection fail!");
	  }
	  
	  	$row = sqlsrv_fetch_array($result);
		
		
		echo '<script type="text/javascript">function dats(){';
		
		echo 'document.getElementById("ctit_id").value ="'.$row['ID'].'";';
		echo 'document.getElementById("ctit_name").value ="'.$row['ITEM_NAME'].'";';
		echo 'document.getElementById("ctit_dname").value ="'.$row['ITEM_DISPLAY_NAME'].'";';
		
		echo 'document.getElementById("key_words").value ="'.$row['KEY_WORDS'].'";';
		echo 'document.getElementById("pdty_'.$row['PRODUCT_TYPE_ID'].'").selected = "true";';
		echo 'document.getElementById("sp_'.$row['SUPPLIER_ID'].'").selected = "true";';
		
		echo 'document.getElementById("ctso").value ="'.$row['SORT_ORDER'].'";';
		echo 'document.getElementById("title_tag").value ="'.$row['TITLE_TAG'].'";';
		echo 'document.getElementById("h1_tag").value ="'.$row['H1_TAG'].'";';
		echo 'document.getElementById("meta_des").value ="'.$row['META_DESCRIPTION'].'";';
		
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
      <th colspan="2" align="center"> Update Category Item </th>
    </tr>
    <tr>
      <td><strong> Lord Data </strong></td>
      <td colspan="1"><input type="button" onclick="dats()" value="Lord Data"></td>
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
    
    <tr>
      <td colspan="3"><div align="center" id="resoult">   
          <input type='button' id='button' value="Update Query" onclick="run_querey()" disabled="true" />
        </div></td>
    </tr>
  </table>
</div>
</body>
</html>