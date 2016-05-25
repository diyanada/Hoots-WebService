<?php
require_once('../session.php');
if(!isset($_GET['product_id'])) die("No product id set");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script  src="Category_item_product_mapping_ajax.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/container_style.css" />

</head>
<body>
<?php 
require_once("../session.php"); 
require_once '../class/report.php';
	$report = new reprt_view();
	$sql= "SELECT [NAME] 
	,[SET_NAME] 
	,'<input type=\"button\" onclick=\"window_open(''../Category_item_product_mapping/Category_item_product_mapping_delete.php?product_id='+CONVERT(varchar(10), [CATEGOTY_ITEM_PRODUCT_MAPPING].[ID])+''')\" value=\"Remove\" />' as 'Remove Mapping'
	FROM [CATEGOTY_ITEM_PRODUCT_MAPPING] INNER JOIN [PRODUCT] ON [CATEGOTY_ITEM_PRODUCT_MAPPING].[PRODUCT_ID]=[PRODUCT].[ID] where [CATEGORY_ITEM_ID] =".$_GET['product_id'];

	echo $report->result_table($sql);	
	
?>
</body>
</html>