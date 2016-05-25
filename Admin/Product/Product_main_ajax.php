<?php

//-------------------------------------------------------------------------------------------------------------------------------------------------	


if($_GET['log']=="todbjsadd")
{
	require_once("../session.php"); 
	require_once '../class/system_strings.php';
	$sys_st = new system_strings();
		
	$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
	if( $conn === false ) {
     	echo "<strong style='color:#900'>Couldn't insert to the database<br />"; 
		if( ($errors = sqlsrv_errors() ) != null) {
		  foreach( $errors as $error ) {
			  echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
			  echo "code: ".$error[ 'code']."<br />";
			  echo "message: ".$error[ 'message']."<br />";
        }}
		echo "<br /><input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
	}
	else{
	  $status = 0;
	  $produt_id = 0;
	  $sql = "{CALL TYK_PRODUCT_MAIN_CREATE(?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,? ,?)}";
	  $params = array( 
                             array($_GET["product_name"], SQLSRV_PARAM_IN),
                             array($_GET["product_type"], SQLSRV_PARAM_IN),
                             array($_GET["set_name"], SQLSRV_PARAM_IN),
                             array($_GET["description"], SQLSRV_PARAM_IN),
                             array($_GET["key_words"], SQLSRV_PARAM_IN),
							 
                             array($_GET["p_max_length"], SQLSRV_PARAM_IN),
							 array($_GET["default_personalizable"], SQLSRV_PARAM_IN),
                             array($_GET["personalizable"], SQLSRV_PARAM_IN),
                             array($_GET["price"], SQLSRV_PARAM_IN),
                             array($_GET["supplier"], SQLSRV_PARAM_IN),
							 
                             array($_GET["product_group"], SQLSRV_PARAM_IN),
                             array($_GET["output_type"], SQLSRV_PARAM_IN),
							 array($_GET["favorite_count"], SQLSRV_PARAM_IN),
                             array($_GET["rating_count"], SQLSRV_PARAM_IN),
                             array($_SESSION['userid'], SQLSRV_PARAM_IN),
							 
                             array($status, SQLSRV_PARAM_INOUT),
                             array($_GET["is_active"], SQLSRV_PARAM_IN),
                             array($_GET["photo_upload"], SQLSRV_PARAM_IN),
							 array($_GET["multifield"], SQLSRV_PARAM_IN),
                             array($produt_id, SQLSRV_PARAM_INOUT ),
							 
							 array($_GET["foreign_code"], SQLSRV_PARAM_IN),
							 array($_GET["country_hosted"], SQLSRV_PARAM_IN),
							 array($_GET["new_personalization"], SQLSRV_PARAM_IN)
                           );
  
	  $stmt = sqlsrv_query($conn, $sql, $params);
	  
	

	  if( $stmt === false ) {
	   echo "<strong style='color:#900'>Couldn't insert to the database<br />"; 
	   
		if( ($errors = sqlsrv_errors() ) != null) {
		  foreach( $errors as $error ) {
			  echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
			  echo "code: ".$error[ 'code']."<br />";
			  echo "message: ".$error[ 'message']."<br />";
        }}
		echo "<br /><input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
	  }
	  else{
		   
		  sqlsrv_next_result($stmt);
		  
		  if($status <0){
			  echo "<strong style='color:#900'>Couldn't insert to the database<br />"; 
			  echo "<strong style='color:#900'>Product name already use<br />"; 
			  echo "<br /><input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
		  }
		  else{
			  
			echo"<strong style='color:#009900'>Successfully Added</strong><br />";  
			echo "<br /><input type='button' id='button' value='New Query' onclick='window.location.reload()' /></strong>";
			
			echo "
			<a target=\"fr_one\" href=\"Product_main_img.php?product_id=".$produt_id."&set_name=".$_GET["set_name"]."&product_group_id=".$_GET["product_group"]."\">
    		<input type=\"button\" name=\"button\" id=\"button\" value=\"Add Image to this Product\">
			</a>
			";
		  }
		
		sqlsrv_free_stmt($stmt);
	  }
	}
	
	
	sqlsrv_close($conn);
}

//----------------------------------------------------------------------------------------------------------------------------------------------------------------


if($_GET['log']=="todbjssearch")
{
	
	
	require_once("../session.php");
	require_once '../class/report.php';
	$report = new reprt_view();
	
	$sql = "SELECT 
      [NAME]
      ,[SET_NAME]
      ,[KEY_WORDS]
      ,[DESCRIPTION]
      ,[IS_ACTIVE]
      ,'<a target=\"fr_one\" href=\"Product_main_img.php?product_id='+CONVERT(varchar(10), [ID])+'&set_name='+[SET_NAME]+'&product_group_id='+CONVERT(varchar(10),[PRODUCT_GROUP_ID])+'\">Add Image</a>' as 'Add Image'
	  ,'<a target=\"fr_one\" href=\"Product_main_img.php?product_id='+CONVERT(varchar(10), [ID])+'&set_name='+[SET_NAME]+'&product_group_id='+CONVERT(varchar(10),[PRODUCT_GROUP_ID])+'&img_url='+[IMAGE_PATH]+'\">Change Image</a>' as 'Change Image'
	  ,'<a target=\"fr_one\" href=\"Product_main_update.php?product_id='+CONVERT(varchar(10), [ID])+'\">Edit</a>' as 'Edit Product'
	  ,'<a target=\"fr_one\" href=\"Product_main_mapping.php?product_id='+CONVERT(varchar(10), [ID])+'\">Mapping</a>' as 'Category Item Mapping'
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
    echo $report->result_table($sql);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
	
}

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------

if($_GET['log']=="todbjsupdate")
{
	
	
	require_once("../session.php"); 
	require_once '../class/system_strings.php';
	$sys_st = new system_strings();
		
	$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
	if( $conn === false ) {
     	echo "<strong style='color:#900'>Couldn't insert to the database<br />"; 
		if( ($errors = sqlsrv_errors() ) != null) {
		  foreach( $errors as $error ) {
			  echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
			  echo "code: ".$error[ 'code']."<br />";
			  echo "message: ".$error[ 'message']."<br />";
        }}
		echo "<br /><input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
	}
	else{
	  $status = 0;
	  $produt_id = 0;
	  $sql = "{CALL TYK_PRODUCT_MAIN_UPDATE(?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,? ,?)}";
	  $params = array( 
                             array($_GET["product_name"], SQLSRV_PARAM_IN),
                             array($_GET["product_type"], SQLSRV_PARAM_IN),
                             array($_GET["set_name"], SQLSRV_PARAM_IN),
                             array($_GET["description"], SQLSRV_PARAM_IN),
                             array($_GET["key_words"], SQLSRV_PARAM_IN),
							 
                             array($_GET["p_max_length"], SQLSRV_PARAM_IN),
							 array($_GET["default_personalizable"], SQLSRV_PARAM_IN),
                             array($_GET["personalizable"], SQLSRV_PARAM_IN),
                             array($_GET["price"], SQLSRV_PARAM_IN),
                             array($_GET["supplier"], SQLSRV_PARAM_IN),
							 
                             array($_GET["product_group"], SQLSRV_PARAM_IN),
                             array($_GET["output_type"], SQLSRV_PARAM_IN),
							 array($_GET["favorite_count"], SQLSRV_PARAM_IN),
                             array($_GET["rating_count"], SQLSRV_PARAM_IN),
                             array($_SESSION['userid'], SQLSRV_PARAM_IN),
							 
                             array($status, SQLSRV_PARAM_INOUT),
                             array($_GET["is_active"], SQLSRV_PARAM_IN),
                             array($_GET["photo_upload"], SQLSRV_PARAM_IN),
							 array($_GET["multifield"], SQLSRV_PARAM_IN),
                             array($_GET["product_id"], SQLSRV_PARAM_IN ),
							 
							 array($_GET["foreign_code"], SQLSRV_PARAM_IN),
							 array($_GET["country_hosted"], SQLSRV_PARAM_IN),
							 array($_GET["new_personalization"], SQLSRV_PARAM_IN)
                           );
  
	  $stmt = sqlsrv_query($conn, $sql, $params);
	  
	

	  if( $stmt === false ) {
	   echo "<strong style='color:#900'>Couldn't insert to the database<br />"; 
	   
		if( ($errors = sqlsrv_errors() ) != null) {
		  foreach( $errors as $error ) {
			  echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
			  echo "code: ".$error[ 'code']."<br />";
			  echo "message: ".$error[ 'message']."<br />";
        }}
		echo "<br /><input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
	  }
	  else{
		   
		  sqlsrv_next_result($stmt);
		  
		  if($status <0){
			  echo "<strong style='color:#900'>Couldn't insert to the database<br />"; 
			  echo "<strong style='color:#900'>Product ID not valid<br />"; 
			  echo "<br /><input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
		  }
		  else{
			  
			echo"<strong style='color:#009900'>Successfully Added</strong><br />";  
			echo "<a  href=\"Product_main_insert.php\">";
			echo "<br /><input type='button' id='button' value='New Query' /></strong></a>";
			
			echo "
			<a target=\"fr_one\" href=\"Product_main_img.php?product_id=".$_GET["product_id"]."&set_name=".$_GET["set_name"]."&product_group_id=".$_GET["product_group"]."\">
    		<input type=\"button\" name=\"button\" id=\"button\" value=\"Add Image to this Product\">
			</a>
			";
		  }
		
		sqlsrv_free_stmt($stmt);
	  }
	}
	
	
	sqlsrv_close($conn);
}


//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------	


if($_GET['log']=="todbjsmapping")
{
	require_once("../session.php"); 
	require_once '../class/system_strings.php';
	$sys_st = new system_strings();
		
	$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
	if( $conn === false ) {
     	echo "<strong style='color:#900'>Couldn't insert to the database<br />"; 
		if( ($errors = sqlsrv_errors() ) != null) {
		  foreach( $errors as $error ) {
			  echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
			  echo "code: ".$error[ 'code']."<br />";
			  echo "message: ".$error[ 'message']."<br />";
        }}
		echo "<br /><input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
	}
	else{
	  $status = 0;
	  $produt_id = 0;
	  $sql = "{CALL TYK_CATEGOTY_ITEM_PRODUCT_MAPPING_CREATE(?,?,?,?)}";
	  $params = array( 
                             array($_GET["category_item"], SQLSRV_PARAM_IN),
                             array($_GET["product_id"], SQLSRV_PARAM_IN),
                             array($_SESSION['userid'], SQLSRV_PARAM_IN),
                             
							 
                             array($status, SQLSRV_PARAM_INOUT)
                           );
  
	  $stmt = sqlsrv_query($conn, $sql, $params);
	  
	

	  if( $stmt === false ) {
	   echo "<strong style='color:#900'>Couldn't insert to the database<br />"; 
	   
		if( ($errors = sqlsrv_errors() ) != null) {
		  foreach( $errors as $error ) {
			  echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
			  echo "code: ".$error[ 'code']."<br />";
			  echo "message: ".$error[ 'message']."<br />";
        }}
		echo "<br /><input type='button' id='button' value='Update Query' onclick='mapping_querey()' /></strong>";
	  }
	  else{
		   
		  sqlsrv_next_result($stmt);
		  
		  if($status <0){
			  echo "<strong style='color:#900'>Couldn't insert to the database<br />"; 
			  echo "<strong style='color:#900'>Product name already use<br />"; 
			  echo "<br /><input type='button' id='button' value='Update Query' onclick='mapping_querey()' /></strong>";
		  }
		  else{
			  
			echo"<strong style='color:#009900'>Successfully Added</strong><br />";  
			echo "<br /><input type='button' id='button' value='New Query' onclick='window.location.reload()' /></strong>";
			
			
		  }
		
		sqlsrv_free_stmt($stmt);
	  }
	}
	
	
	sqlsrv_close($conn);
}

//----------------------------------------------------------------------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
?>