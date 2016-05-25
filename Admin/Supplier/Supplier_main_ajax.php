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
	  $sql = "{CALL TYK_SUPPLIER_MAIN_CREATE(?,?,?, ?,?,?, ?,?,?, ?,?,? ,?,?)}";
	  $params = array( 
                             array($_GET["supplier_name"], SQLSRV_PARAM_IN),
                             array($_GET["supplier_add"], SQLSRV_PARAM_IN),
                             array($_GET["supplier_con"], SQLSRV_PARAM_IN),
							 
							 array($_GET["supplier_log1"], SQLSRV_PARAM_IN),
                             array($_GET["supplier_log2"], SQLSRV_PARAM_IN),
                             array($_GET["supplier_tel"], SQLSRV_PARAM_IN),
							 
							 array($_GET["supplier_mail"], SQLSRV_PARAM_IN),
                             array($_GET["supplier_vat"], SQLSRV_PARAM_IN),
                             array($_GET["supplier_fax"], SQLSRV_PARAM_IN),
							 
                             array($_SESSION['userid'], SQLSRV_PARAM_IN),
                             array($status, SQLSRV_PARAM_INOUT),
                             array($_GET["supplier_comm"], SQLSRV_PARAM_IN),
							 
                             array($_GET["supplier_lic"], SQLSRV_PARAM_IN),
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
      ,[COMPANY_ADDRESS]
      ,[CONTACT_NAME]
      ,[COMMISSION]
      ,[VAT_NUMBER]
      ,[TELEPHONE]
      ,[EMAIL]
      ,[FAX]
      ,[PRIMARY_LOGO]
      ,[SECONDARY_LOGO]
      ,[LICENCE_INFO]
	  ,'<a target=\"fr_one\" href=\"Supplier_main_update.php?product_id='+CONVERT(varchar(10), [ID])+'\">Edit</a>' as 'Edit Product Type'
  			FROM [SUPPLIER]
	  		WHERE 1=1";
	 
	 if ($_GET['supplier_name'] != "") $sql .= " AND [NAME] LIKE '%".$_GET['supplier_name']."%'";
	 if ($_GET['supplier_add'] != "") $sql .= " AND [COMPANY_ADDRESS] LIKE '%".$_GET['supplier_add']."%'";
	 if ($_GET['supplier_con'] != "") $sql .= " AND [CONTACT_NAME] LIKE '%".$_GET['supplier_con']."%'";
	 
	 if ($_GET['supplier_vat'] != "") $sql .= " AND [VAT_NUMBER] LIKE '%".$_GET['supplier_vat']."%'";
	 if ($_GET['supplier_tel'] != "") $sql .= " AND [TELEPHONE] LIKE '%".$_GET['supplier_tel']."%'";
	 if ($_GET['supplier_mail'] != "") $sql .= " AND [EMAIL] LIKE '%".$_GET['supplier_mail']."%'";
	 
	 if ($_GET['supplier_fax'] != "") $sql .= " AND [FAX] LIKE '%".$_GET['supplier_fax']."%'";
	 
	
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
	  $sql = "{CALL TYK_SUPPLIER_MAIN_UPDATE(?,?,?, ?,?,?, ?,?,?, ?,?,? ,?,?)}";
	  $params = array( 
					  		 array($_GET["supplier_id"], SQLSRV_PARAM_IN),
                             array($_GET["supplier_name"], SQLSRV_PARAM_IN),
                             array($_GET["supplier_add"], SQLSRV_PARAM_IN),
							 
                             array($_GET["supplier_con"], SQLSRV_PARAM_IN),
							 array($_GET["supplier_log1"], SQLSRV_PARAM_IN),
                             array($_GET["supplier_log2"], SQLSRV_PARAM_IN),
							 
                             array($_GET["supplier_tel"], SQLSRV_PARAM_IN),
							 array($_GET["supplier_mail"], SQLSRV_PARAM_IN),
                             array($_GET["supplier_vat"], SQLSRV_PARAM_IN),
							 
                             array($_GET["supplier_fax"], SQLSRV_PARAM_IN),
							 array($_GET["supplier_comm"], SQLSRV_PARAM_IN),
							 array($_GET["supplier_lic"], SQLSRV_PARAM_IN),

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
			echo "<a  href=\"Supplier_main_insert.php\">";
			echo "<br /><input type='button' id='button' value='New Query' /></strong></a>";
			
			
		  }
		
		sqlsrv_free_stmt($stmt);
	  }
	}
	
	
	sqlsrv_close($conn);
}

?>