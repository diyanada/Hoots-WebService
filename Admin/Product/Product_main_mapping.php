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
require_once '../class/report.php';
	$report = new reprt_view();
	$sql= "SELECT
      [RATING_COUNT_BY_CAT]
      ,[ITEM_NAME]
	  ,'<input type=\"button\" onclick=\"window_open(''../Product/Product_main_mapping_delete.php?product_id='+CONVERT(varchar(10), [CATEGOTY_ITEM_PRODUCT_MAPPING].[ID])+''')\" value=\"Remove\" />' as 'Remove Mapping'
      FROM [CATEGOTY_ITEM_PRODUCT_MAPPING]
		INNER JOIN [CATEGORY_ITEM] ON [CATEGOTY_ITEM_PRODUCT_MAPPING].[CATEGORY_ITEM_ID]=[CATEGORY_ITEM].[ID]
	WHERE [CATEGOTY_ITEM_PRODUCT_MAPPING].[PRODUCT_ID] =".$_GET['product_id'];

	echo $report->result_table($sql);	
	
	
?>
</head>
<body>
<div id="body_frame">
  <table align="center" width="450" height="140" id="input_table">
  <tr>
      <th colspan="2" align="center">Add Category Item Mapping</th>
    </tr>
    <tr>
      <td><strong> Product ID </strong></td>
      <td colspan="1"><input type="text" name="product_id" id="product_id" width="200" height="25" readonly="readonly" value="<?php echo $_GET['product_id']?>" /></td>
    </tr>
    <tr>
      <td><strong> Category Item </strong></td>
      <td colspan=""><strong>
        <select name="category_item " id="category_item">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once '../class/DB.php';
			
			$sql = "SELECT [ID] as VALUE ,[ITEM_NAME] as OPTIO FROM [CATEGORY_ITEM]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql, "ctit_");
			?>
        </select>
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
          <input type='button' id='button' value="Update Query" onclick="mapping_querey()" />
        </div></td>
    </tr>
  </table>
</div>
</body>
</html>