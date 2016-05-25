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
	  $sql = "{CALL TYK_SYSTEM_USER_CREATE(?,?,?,?, ?,?,?,?,?, ?,?,?)}";
	  $params = array( 
                             array($_GET["user_name"], SQLSRV_PARAM_IN),
                             array(md5($_GET["user_pass"]), SQLSRV_PARAM_IN),
							 array($_GET["first_name"], SQLSRV_PARAM_IN),
                             array($_GET["last_name"], SQLSRV_PARAM_IN),
							 
							 array($_GET["user_mail"], SQLSRV_PARAM_IN),
                             array($_GET["user_des"], SQLSRV_PARAM_IN),
							 array($_GET["user_type"], SQLSRV_PARAM_IN),
                             array($_GET["user_client"], SQLSRV_PARAM_IN),
							 array($_GET["user_role"], SQLSRV_PARAM_IN),
							 
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
			  echo "<strong style='color:#900'>User already have<br />"; 
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
	
	$sql = "SELECT [USER_NAME]
      ,[FIRST_NAME]
      ,[LAST_NAME]
      ,[EMAIL]
      ,[DESCRIPTION]
	  ,'<a target=\"fr_one\" href=\"User_main_update.php?product_id='+CONVERT(varchar(10), [ID])+'\">Edit</a>' as 'Edit User'
	  ,'<a target=\"fr_one\" href=\"User_main_password.php?product_id='+CONVERT(varchar(10), [ID])+'\">Change</a>' as 'Password'
	  ,'<input type=\"button\" onclick=\"window_open(''../User_main/User_main_delete.php?product_id='+CONVERT(varchar(10), [ID])+''')\" value=\"Delete\" />' as 'Delete User'
  			FROM [SYSTEM_USER]
	  		WHERE 1=1";
	 if ($_GET['user_id'] != "") $sql .= " AND [ID] = '".$_GET['user_id']."'";
	 if ($_GET['user_name'] != "") $sql .= " AND [USER_NAME] LIKE '%".$_GET['user_name']."%'";
	 if ($_GET['user_type'] != "") $sql .= " AND [USER_TYPE] = '".$_GET['user_type']."'";
	 if ($_GET['first_name'] != "") $sql .= " AND [FIRST_NAME] LIKE '%".$_GET['first_name']."%'";
	 if ($_GET['last_name'] != "") $sql .= " AND [LAST_NAME] LIKE '%".$_GET['last_name']."%'";
	 if ($_GET['user_mail'] != "") $sql .= " AND [EMAIL] LIKE '%".$_GET['user_mail']."%'";
	 if ($_GET['user_des'] != "") $sql .= " AND [DESCRIPTION] LIKE '%".$_GET['user_des']."%'";
	 if ($_GET['user_client'] != "") $sql .= " AND [CLIENT_CODE] = '".$_GET['user_client']."'";
	 if ($_GET['user_role'] != "") $sql .= " AND [ROLE_ID] = '".$_GET['user_role']."'";
	
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
		echo "<br /><input type='button' id='button' value='Update Query' onclick='update_querey()' /></strong>";
	}
	else{
	  $status = 0;
	  $produt_id = 0;
	  $sql = "{CALL TYK_SYSTEM_USER_UPDATE(?,?,?, ?,?,?, ?,?, ?,?,?)}";
	  $params = array( 
	 						 array($_GET["user_id"], SQLSRV_PARAM_IN),
					  		 array($_GET["user_name"], SQLSRV_PARAM_IN),
							 array($_GET["first_name"], SQLSRV_PARAM_IN),
							 
                             array($_GET["last_name"], SQLSRV_PARAM_IN),
							 array($_GET["user_mail"], SQLSRV_PARAM_IN),
                             array($_GET["user_des"], SQLSRV_PARAM_IN),
							 
							 array($_GET["user_type"], SQLSRV_PARAM_IN),
                             array($_GET["user_client"], SQLSRV_PARAM_IN),
							 array($_GET["user_role"], SQLSRV_PARAM_IN),
							 							 
                             array($_SESSION['userid'], SQLSRV_PARAM_IN),
                             array($status, SQLSRV_PARAM_INOUT), 
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
		echo "<br /><input type='button' id='button' value='Update Query' onclick='update_querey()' /></strong>";
	  }
	  else{
		   
		  sqlsrv_next_result($stmt);
		  
		  if($status <0){
			  echo "<strong style='color:#900'>Couldn't insert to the database<br />"; 
			  echo "<strong style='color:#900'>Product type ID not valid<br />"; 
			  echo "<br /><input type='button' id='button' value='Update Query' onclick='update_querey()' /></strong>";
		  }
		  else{
			  
			echo"<strong style='color:#009900'>Successfully Added</strong><br />";  
			echo "<a  href=\"User_main_insert.php\">";
			echo "<br /><input type='button' id='button' value='New Query' /></strong></a>";
			
			
		  }
		
		sqlsrv_free_stmt($stmt);
	  }
	}
	
	
	sqlsrv_close($conn);
}

//-------------------------------------------------------------------------------------------------------------------------------------------------	



if($_GET['log']=="todbjsadd_pass")
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
		echo "<br /><input type='button' id='button' value='Update Query' onclick='update_pass_querey()' /></strong>";
	}
	else{
	  $status = 0;
	  $produt_id = 0;
	  $sql = "{CALL TYK_SYSTEM_USER_UPDATE_PASS(?,?,?, ?)}";
	  $params = array( 
	 						 array($_GET["user_id"], SQLSRV_PARAM_IN),
                             array(md5($_GET["user_pass"]), SQLSRV_PARAM_IN),
							 							 
                             array($_SESSION['userid'], SQLSRV_PARAM_IN),
                             array($status, SQLSRV_PARAM_INOUT), 
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
		echo "<br /><input type='button' id='button' value='Update Query' onclick='update_pass_querey()' /></strong>";
	  }
	  else{
		   
		  sqlsrv_next_result($stmt);
		  
		  if($status <0){
			  echo "<strong style='color:#900'>Couldn't insert to the database<br />"; 
			  echo "<strong style='color:#900'>Product type ID not valid<br />"; 
			  echo "<br /><input type='button' id='button' value='Update Query' onclick='update_pass_querey()' /></strong>";
		  }
		  else{
			  
			echo"<strong style='color:#009900'>Successfully Added</strong><br />";  
			
			
		  }
		
		sqlsrv_free_stmt($stmt);
	  }
	}
	
	
	sqlsrv_close($conn);
}
?>