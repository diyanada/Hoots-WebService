<?php
require_once('../session.php');
if(!isset($_GET['product_id'])) die("No product id set");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script  src="Share_options_ajax.js" type="text/javascript"></script>
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
      ,[TYPE]
      ,[NO_OF_FREE_HOOTS]
	  ,[QUOTES_ID]
  FROM [SHARE_OPTIONS]
		WHERE [ID] = ".$_GET['product_id'];	  
		
	  $result = sqlsrv_query($conn, $sql);
	  
	

	  if( $result === false ) {
		  die("Database Connection fail!");
	  }
	  
	  	$row = sqlsrv_fetch_array($result);
		
		
		echo '<script type="text/javascript">function dats(){';
		
		echo 'document.getElementById("so_id").value ="'.$row['ID'].'";';
		echo 'document.getElementById("so_type").value ="'.$row['TYPE'].'";';
		echo 'document.getElementById("nofh").value ="'.$row['NO_OF_FREE_HOOTS'].'";';
		
		echo 'document.getElementById("qut_'.$row['QUOTES_ID'].'").selected = "true";';
		
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
      <th colspan="2" align="center"> Update Share Options </th>
    </tr>
    <tr>
      <td><strong> Lord Data </strong></td>
      <td colspan="1"><input type="button" onclick="dats()" value="Lord Data"></td>
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
      <td colspan="3"><div align="center" id="resoult">   
          <input type='button' id='button' value="Update Query" onclick="run_querey()" disabled="true" />
        </div></td>
    </tr>
  </table>
</div>
</body>
</html>