<?php
require_once('../session.php');
if(!isset($_GET['product_id'])) die("No product id set");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script  src="Category_main_ajax.js" type="text/javascript"></script>
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
      ,[NAME]
      ,[DISPLAY_NAME]
      ,[DISPLAY_SORT_ORDER]
  FROM [CATEGORY] 
		WHERE [ID] = ".$_GET['product_id'];	  
		
	  $result = sqlsrv_query($conn, $sql);
	  
	

	  if( $result === false ) {
		  die("Database Connection fail!");
	  }
	  
	  	$row = sqlsrv_fetch_array($result);
		
		
		echo '<script type="text/javascript">function dats(){';
		
		echo 'document.getElementById("category_id").value ="'.$row['ID'].'";';
		echo 'document.getElementById("category_name").value ="'.$row['NAME'].'";';
		echo 'document.getElementById("category_dname").value ="'.$row['DISPLAY_NAME'].'";';
		
		echo 'document.getElementById("cso_'.$row['DISPLAY_SORT_ORDER'].'").selected = "true";';
		
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
      <th colspan="2" align="center"> Update Product Output Size </th>
    </tr>
    <tr>
      <td><strong> Lord Data </strong></td>
      <td colspan="1"><input type="button" onclick="dats()" value="Lord Data"></td>
    </tr>
    <tr>
      <td><strong> Category ID </strong></td>
      <td colspan="1"><input type="text" name="category_id" id="category_id" width="200" height="25" disabled="disabled" /></td>
    </tr>
    <tr>
      <td><strong> Name </strong></td>
      <td colspan="1"><input type="text" name="category_name" id="category_name" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> Display Name </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="3" name="category_dname" id="category_dname"></textarea>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Short Order </strong></td>
      <td colspan=""><strong>
        <select name="category_sor" id="category_sor">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once '../class/DB.php';
			
			$sql = "SELECT COUNT(*) as [COUNT] FROM [CATEGORY]";
			
			$db=new database_retrive();
			echo $db->select_count_dropdown($sql, "cso_");
			?>
        </select>
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