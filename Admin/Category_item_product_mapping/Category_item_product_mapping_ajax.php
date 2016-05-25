<?php

//-------------------------------------------------------------------------------------------------------------------------------------------------	


if($_GET['log']=="todbjssearch")
{
	require_once("../session.php");
	require_once '../class/report.php';
	$report = new reprt_view();
	
	$sql = "SELECT [ITEM_DISPLAY_NAME]
      ,[ITEM_NAME]
      ,[KEY_WORDS]
	  ,'<a target=\"fr_one\" href=\"Category_item_product_mapping.php?product_id='+CONVERT(varchar(10), [ID])+'\">Configure</a>' as 'Configure Category Items'
	  ,'<a target=\"fr_one\" href=\"Category_item_product_mapping_products.php?product_id='+CONVERT(varchar(10), [ID])+'\">Add Products</a>' as 'Configure Products'
  			FROM [CATEGORY_ITEM]
	  		WHERE 1=1";
	 
	 if ($_GET['ctit_name'] != "") $sql .= " AND [ITEM_NAME] LIKE '%".$_GET['ctit_name']."%'";
	 if ($_GET['ctit_dname'] != "") $sql .= " AND [ITEM_DISPLAY_NAME] LIKE '%".$_GET['ctit_dname']."%'";
	 if ($_GET['key_words'] != "") $sql .= " AND [KEY_WORDS] LIKE '%".$_GET['key_words']."%'";
	 if ($_GET['product_type'] != "") $sql .= " AND [PRODUCT_TYPE_ID] LIKE '%".$_GET['product_type']."%'";
	 if ($_GET['supplier'] != "") $sql .= " AND [SUPPLIER_ID] LIKE '%".$_GET['supplier']."%'";
	
	
    echo $report->result_table($sql);
}

//-------------------------------------------------------------------------------------------------------------------------------------------------	

if($_GET['log']=="todbjssearch_pro")
{
	
	
	require_once("../session.php");
	require_once '../class/report.php';
	$report = new reprt_view();
	
	$sql = "SELECT 
		[ID],
      [NAME]
      ,[SET_NAME]
	  ,[IMAGE_PATH]
	  ,'<input type=\"button\" onclick=\"window_open(''../Product/Product_main_delete.php?product_id='+CONVERT(varchar(10), [ID])+''')\" value=\"Delete\" />' as 'Delete Product'
	 
	  FROM [PRODUCT]
	  
	 WHERE 1=1";
	 
	 if ($_GET['product_id'] != "") $sql .= " AND [ID] = '".$_GET['product_id']."'";
	 if ($_GET['product_type'] != "") $sql .= " AND [PRODUCT_TYPE_ID] = '".$_GET['product_type']."'";
	 if ($_GET['output_type'] != "") $sql .= " AND [PRODUCT_OUTPUT_ID] = '".$_GET['output_type']."'";
	 if ($_GET['product_group'] != "") $sql .= " AND [PRODUCT_GROUP_ID] = '".$_GET['product_group']."'";
	 if ($_GET['supplier'] != "") $sql .= " AND [SUPPLIER_ID] = '".$_GET['supplier']."'";
	 if ($_GET['foreign_code'] != "") $sql .= " AND [FOREIGN_PRODUCT_CODE] LIKE '%".$_GET['foreign_code']."%'";
	 if ($_GET['set_name'] != "") $sql .= " AND [SET_NAME] LIKE '%".$_GET['set_name']."%'";
	 if ($_GET['product_name'] != "") $sql .= " AND [NAME] LIKE '%".$_GET['product_name']."%'";
	 if ($_GET['key_words'] != "") $sql .= " AND [KEY_WORDS] LIKE '%".$_GET['key_words']."%'";
	 if ($_GET['is_active'] != "") $sql .= " AND [IS_ACTIVE] LIKE '%".$_GET['is_active']."%'";
	  
	  
	
	
	 try {
    echo $report->result_thumb($sql, $_GET['catit_id']);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
	
}

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------

if($_GET['log']=="addfunction")
{
	
	require_once("../session.php"); 
	require_once '../class/system_strings.php';
	$sys_st = new system_strings();
		
	$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
	if( $conn === false ) {
     	
		echo "ND";
	}
	else{
	  $status = 0;
	  $produt_id = 0;
	  $sql = "{CALL TYK_CATEGOTY_ITEM_PRODUCT_MAPPING_CREATE(?,?,?,?)}";
	  $params = array( 
                             array($_GET["cid"], SQLSRV_PARAM_IN),
                             array($_GET["pid"], SQLSRV_PARAM_IN),
                             array($_SESSION['userid'], SQLSRV_PARAM_IN),
                             
							 
                             array($status, SQLSRV_PARAM_INOUT)
                           );
  
	  $stmt = sqlsrv_query($conn, $sql, $params);
	  
	

	  if( $stmt === false ) {
	   echo "ND";
	  }
	  else{
		   
		  sqlsrv_next_result($stmt);
		  
		  if($status <0){ 
			  echo "AL";
		  }
		  else{
			  
			echo "SU";
			
			
		  }
		
		sqlsrv_free_stmt($stmt);
	  }
	}
	
	
	sqlsrv_close($conn);	
	}
?>