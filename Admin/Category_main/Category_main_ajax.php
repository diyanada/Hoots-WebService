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
	  $sql = "{CALL TYK_CATEGORY_MAIN_CREATE(?,?,?, ?,?,?)}";
	  $params = array( 
                             array($_GET["category_name"], SQLSRV_PARAM_IN),
                             array($_GET["category_dname"], SQLSRV_PARAM_IN),
							 array($_GET["category_sor"], SQLSRV_PARAM_IN),
							 							 
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
		
		sqlsrv_free_stmt($stmt);
	  }
	}
	
	
	sqlsrv_close($conn);
}

//-------------------------------------------------------------------------------------------------------------------------------------------------	


if($_GET['log']=="todbjssearch")
{
	require_once("../session.php");
	require_once '../class/report.php';
	$report = new reprt_view();
	
	$sql = "SELECT [NAME]
      ,[DISPLAY_NAME]
      ,[DISPLAY_SORT_ORDER]
	  ,'<a target=\"fr_one\" href=\"Category_main_update.php?product_id='+CONVERT(varchar(10), [ID])+'\">Edit</a>' as 'Edit Product Type'
  			FROM [CATEGORY]
	  		WHERE 1=1";
	 
	 if ($_GET['category_name'] != "") $sql .= " AND [NAME] LIKE '%".$_GET['category_name']."%'";
	 if ($_GET['category_dname'] != "") $sql .= " AND [DISPLAY_NAME] LIKE '%".$_GET['category_dname']."%'";
	
	
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
	  $sql = "{CALL TYK_CATEGORY_MAIN_UPDATE(?,?,?, ?,?,?)}";
	  $params = array( 
					  		 array($_GET["category_id"], SQLSRV_PARAM_IN),
                             array($_GET["category_name"], SQLSRV_PARAM_IN),
                             array($_GET["category_dname"], SQLSRV_PARAM_IN),
							 array($_GET["category_sor"], SQLSRV_PARAM_IN),
							 							 
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
			echo "<a  href=\"Category_main_insert.php\">";
			echo "<br /><input type='button' id='button' value='New Query' /></strong></a>";
			
			
		  }
		
		sqlsrv_free_stmt($stmt);
	  }
	}
	
	
	sqlsrv_close($conn);
}

?>