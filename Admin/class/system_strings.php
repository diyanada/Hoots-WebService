<?php 

class system_strings{
	
	function severnam(){
		include '../../owsh_secret.php';
		return 	$server_name; 
	}
	
	function connectionInfo(){
		include '../../owsh_secret.php';
		$connectionInfo = array( "Database"=>$database , "UID"=>$db_username, "PWD"=>$db_password);
		return 	$connectionInfo; 
	}
	
	function image_path(){
		include '../../owsh_secret.php';
		return 	$image_path; 
	}
	
	function image_path_url(){
		include '../../owsh_secret.php';
		return 	$image_path_url; 
	}
}
?>