<?php 
class user_mang{
	public function user_login($usern, $password){

	require_once 'system_strings.php';
	$sys_st = new system_strings();
	
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		$sql = "SELECT [ID] FROM [SYSTEM_USER] WHERE [USER_NAME] = '".$usern."' and [PWD] = '".$password."'"; 
		$result = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
		
		$row_count = sqlsrv_num_rows( $result );
		
		if ($row_count == 1) return true;
		else return false;
		
		
	
	}
	
	public function make_session($usern, $password){

	require_once 'system_strings.php';
	$sys_st = new system_strings();
	
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		$sql = "SELECT [ID], [USER_NAME] FROM [SYSTEM_USER] WHERE [USER_NAME] = '".$usern."' and [PWD] = '".$password."'"; 
		$result = sqlsrv_query($conn, $sql);
		
		$row = sqlsrv_fetch_array($result);
		
		session_start();
			$_SESSION['userid']=$row['ID'];
			$_SESSION['uname']=$row['USER_NAME'];
  		
	
	}
	public function make_delete_session($usern, $password){

	require_once 'system_strings.php';
	$sys_st = new system_strings();
	
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		$sql = "SELECT [ID], [USER_NAME] FROM [SYSTEM_USER] WHERE [USER_NAME] = '".$usern."' and [PWD] = '".$password."'"; 
		$result = sqlsrv_query($conn, $sql);
		
		$row = sqlsrv_fetch_array($result);
		
		date_default_timezone_set("UTC"); 
		
		session_start();
			$_SESSION['userid']=$row['ID'];
			$_SESSION['uname']=$row['USER_NAME'];
			$_SESSION['time']=time();
  		
	
	}
	public function user_fullname($usern){

	require_once 'system_strings.php';
	$sys_st = new system_strings();
	
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		$sql = "SELECT [FIRST_NAME] + ' ' + [LAST_NAME] as FullName FROM [SYSTEM_USER] WHERE [ID] = '".$usern."'"; 
		$result = sqlsrv_query($conn, $sql);
		
		$row = sqlsrv_fetch_array($result);
		
		return $row['FullName'];
  		
	
	}
	
	public function user_firstname($usern){

	require_once 'system_strings.php';
	$sys_st = new system_strings();
	
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		$sql = "SELECT [FIRST_NAME] FROM [SYSTEM_USER] WHERE [ID] = '".$usern."'"; 
		$result = sqlsrv_query($conn, $sql);
		
		$row = sqlsrv_fetch_array($result);
		
		return $row['FIRST_NAME'];
  		
	
	}
}
?>