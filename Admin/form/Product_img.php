<?php 

require_once("../session.php");

require_once '../class/system_strings.php';
$sys_st = new system_strings();





$ext = substr($_FILES['file']['name'], strpos($_FILES['file']['name'],'.'), strlen($_FILES['file']['name'])-1);

$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
		
		$img_path_bd = "/".$_POST["product_group"];
		$img_path = $sys_st->image_path().$img_path_bd;
		
		if (!file_exists($img_path)) {
    		mkdir($img_path, 0777, true);
		}
		
		$img_path_bd = "/".$_POST["product_group"]."/".$_POST['set_name'].$ext;
		$img_path = $sys_st->image_path().$img_path_bd;


		
			if (!move_uploaded_file($_FILES["file"]["tmp_name"], $img_path) )
			echo "CANNOT MOVE" ;
			else{
				
		
				$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
				if( $conn === false ) {
     					echo "<strong style='color:#900'>Couldn't insert to the database<br />"; 
			  if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
					echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
					echo "code: ".$error[ 'code']."<br />";
					echo "message: ".$error[ 'message']."<br />";
			  }}
				}
				else{
				  $sql = "{CALL TYK_PRODUCT_MAIN_IMGPATH(?,?)}";
				  $params = array( 	 array($_POST["product_id_frm"], SQLSRV_PARAM_IN),
									array($_POST['set_name'].$ext, SQLSRV_PARAM_IN)
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
					  
					  
						  
						echo"<strong style='color:#009900'>Successfully Added</strong><br />";  
						header("Location:../Product/Product_main_img.php?product_id=".$_POST["product_id_frm"]."&set_name=".$_POST["set_name"]."&product_group_id=".$_POST["group_id"]."&img_url=".$_POST['set_name'].$ext);
					  
					
					sqlsrv_free_stmt($stmt);
	  }
	}
	
	
	sqlsrv_close($conn);
				
			}
		
		
     
     /*}
	  
	$sql="UPDATE authordetails SET photo = '../upload/Author_Photo/".$_POST["book_ath"].$ext."' WHERE authordetails.authorid = '".$_POST['book_ath']."'";

		$result=mysql_query($sql) or die("couldnt run the query : ".$sql);
		//echo $sql;
	
	header("Location:../newadds/author_profile.php?Userid=".$_POST["book_ath"]);*/
		
    }
	
  }
else
  {
  echo "Invalid file";
  }
?>