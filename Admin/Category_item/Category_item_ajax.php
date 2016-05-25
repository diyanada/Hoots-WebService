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
	  $sql = "{CALL TYK_CATEGORY_ITEM_CREATE(?,?,?, ?,?,?, ?,?,?, ?,?,?,)}";
	  $params = array( 
                             array($_GET["ctit_name"], SQLSRV_PARAM_IN),
                             array($_GET["ctit_dname"], SQLSRV_PARAM_IN),
							 array($_GET["key_words"], SQLSRV_PARAM_IN),
							 
							 array($_GET["product_type"], SQLSRV_PARAM_IN),
                             array($_GET["supplier"], SQLSRV_PARAM_IN),
							 array($_GET["ctso"], SQLSRV_PARAM_IN),
							 
							 array($_GET["title_tag"], SQLSRV_PARAM_IN),
                             array($_GET["h1_tag"], SQLSRV_PARAM_IN),
							 array($_GET["meta_des"], SQLSRV_PARAM_IN),
							 							 
                             array($_SESSION['userid'], SQLSRV_PARAM_IN),
                             array($status, SQLSRV_PARAM_INOUT),
							 array($produt_id, SQLSRV_PARAM_INOUT )
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
			  echo "<strong style='color:#900'>Supplier name already use<br />"; 
			  echo "<br /><input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
		  }
		  else{
			  
			echo"<strong style='color:#009900'>Successfully Added</strong><br />";  
			echo "<br /><input type='button' id='button' value='New Query' onclick='window.location.reload()' /></strong>";
		  }
		}
		sqlsrv_free_stmt($stmt);
	  }
	
	
	
	sqlsrv_close($conn);
}

//-------------------------------------------------------------------------------------------------------------------------------------------------	


if($_GET['log']=="todbjssearch")
{
	require_once("../session.php");
	require_once '../class/report.php';
	$report = new reprt_view();
	
	$sql = "SELECT [ITEM_DISPLAY_NAME]
      ,[ITEM_NAME]
      ,[KEY_WORDS]
      ,[PRODUCT_TYPE_ID]
      ,[SUPPLIER_ID]
      ,[SORT_ORDER]
      ,[TITLE_TAG]
      ,[H1_TAG]
      ,[META_DESCRIPTION]
	  ,'<a target=\"fr_one\" href=\"Category_item_update.php?product_id='+CONVERT(varchar(10), [ID])+'\">Edit</a>' as 'Edit Product Type'
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



if($_GET['log']=="todbjsupdte")
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
	  $sql = "{CALL TYK_CATEGORY_ITEM_UPDATE(?,?,?, ?,?,?, ?,?,?, ?,?,?)}";
	  $params = array( 
					  		 array($_GET["ctit_id"], SQLSRV_PARAM_IN),
					  		 array($_GET["ctit_name"], SQLSRV_PARAM_IN),
                             array($_GET["ctit_dname"], SQLSRV_PARAM_IN),
							 array($_GET["key_words"], SQLSRV_PARAM_IN),
							 
							 array($_GET["product_type"], SQLSRV_PARAM_IN),
                             array($_GET["supplier"], SQLSRV_PARAM_IN),
							 array($_GET["ctso"], SQLSRV_PARAM_IN),
							 
							 array($_GET["title_tag"], SQLSRV_PARAM_IN),
                             array($_GET["h1_tag"], SQLSRV_PARAM_IN),
							 array($_GET["meta_des"], SQLSRV_PARAM_IN),
							 							 
                             array($_SESSION['userid'], SQLSRV_PARAM_IN),
                             array($status, SQLSRV_PARAM_INOUT)                           );
  
  
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
			  echo "<strong style='color:#900'>Product type ID not valid<br />"; 
			  echo "<br /><input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
		  }
		  else{
			  
			echo"<strong style='color:#009900'>Successfully Added</strong><br />";  
			echo "<a  href=\"Category_item_insert.php\">";
			echo "<br /><input type='button' id='button' value='New Query' /></strong></a>";
			
			
		  }
		
		sqlsrv_free_stmt($stmt);
	  }
	}
	
	
	sqlsrv_close($conn);
}

?>