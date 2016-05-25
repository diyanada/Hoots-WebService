<?php
	
	
	require_once '../class/user_mang.php';
			
	$user=new user_mang();
	
	if($user->user_login($_GET['a2'], md5($_GET['a3']))){
	$url= "../main/main.php" ;
		$user->make_session($_GET['a2'], md5($_GET['a3']));
	}
	else{
		$url="../index.php?error="."Username or Password is invalid"."&uname=".$_GET['a2'];
	}
?>
<html>
<head>
<meta http-equiv="refresh" content="0; url=<?php echo $url;?>">
</head>
<body>
</body>
</html>
