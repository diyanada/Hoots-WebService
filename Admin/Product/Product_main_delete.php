
<?php
date_default_timezone_set("UTC"); 
require_once('../session.php');
if((time() - 60) > $_SESSION['time'] && (time() + 60) > $_SESSION['time']) die("No Permition");
if($_GET['product_id'] == "") die("No product id set");

require_once("../session.php"); 
require_once '../class/system_strings.php';
	$sys_st = new system_strings();
		
	
	$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
	
	  if( $conn === false ) {
		  die("Database Connection fail!");
	  }
	  else{
		$status = 0;
		$sql = "{CALL TYK_PRODUCT_MAIN_DELETE(?,?,?)}";
		$params = array( 
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
		  }
		else{
			 
			sqlsrv_next_result($stmt);
			
			if($status <0){
				echo "<strong style='color:#900'>Couldn't insert to the database<br />"; 
			}
			else{
				
			  echo"<strong style='color:#009900'>Successfully Deleted</strong><br />";  
			  echo"<strong style='color:#009900'>Plese closs the window</strong><br />"; 
			}
			}
		  
		  sqlsrv_free_stmt($stmt);
	  
		}
	
	
	sqlsrv_close($conn);
	
	
	
?>