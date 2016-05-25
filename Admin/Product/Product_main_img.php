<?php
require_once('../session.php');
if(!isset($_GET['product_id'])) die("No product id set");
else if(!isset($_GET['set_name'])) die("No name set");
else if(!isset($_GET['product_group_id'])) die("No product group set");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<link rel="stylesheet" type="text/css" href="../css/container_style.css" />
<script type="text/javascript">
function validateForm() {
    var x = document.forms["myForm"]["file"].value;
    if (x == null || x == "") {
        alert("Plese select the file");
        return false;
    }
	else{
		document.forms["myForm"]["submit"].disabled = "disabled";
		document.forms["myForm"]["button"].disabled = "disabled";
		return true;
	}
}
</script>
</head>
<body>
<div id="body_frame">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center">Image Uploder</th>
    </tr>
    <form action="../form/Product_img.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" name="myForm">
    
      <tr>
        <td><strong> Product ID </strong></td>
        <td colspan="1"><input type="text" readonly="readonly" name="product_id_frm" id="product_id_frm" width="200" height="25" value="<?php echo $_GET['product_id']; ?>"/></td>
      </tr>
      <tr>
        <td><strong> Set Name </strong></td>
        <td colspan="1"><strong>
          <textarea cols="45" rows="3" readonly="readonly" name="set_name" id="set_name"><?php echo $_GET['set_name']; ?></textarea>
          </strong></td>
      </tr>
      <tr>
        <td><strong> Product Group ID </strong></td>
        <td colspan="1"><strong>
          <input type="text" name="group_id" id="group_id" readonly="readonly" value="<?php echo $_GET['product_group_id']; ?>" />
          </strong></td>
      </tr>
      <tr>
        <td><strong> Product Group </strong></td>
        <td colspan=""><strong>
          <input type="text" name="product_group" readonly="readonly" id="product_group" value="<?php
		  	require_once '../class/DB.php';
			
			$sql = "SELECT [NAME] as VALUE FROM [PRODUCT_GROUP] WHERE [ID] = '".$_GET['product_group_id'] ."'";
			
			$db=new database_retrive();
			echo $db->set_value($sql);
			?>" />
          </strong></td>
      </tr>
      <tr>
        <td><label for="file"><strong>Filename:</strong></label></td>
        <td colspan="1"><input type="file" name="file" id="file" >
      <tr>
        <td colspan="2"><div align="center" id="resoult">
            <input type="submit" name="submit" id="button2" value="Upload" />
          </div></td>
      </tr>
    </form>
    <tr>
        <td colspan="2"><div align="center">
        <a href = "Product_main_insert.php">
            <input type="button" name="button" value="New Query" />
            </a>
          </div></td>
      </tr>
    <tr>
        <td colspan="2"><strong>
        <?php 
		if (isset($_GET['img_url'])){	
		$sql = "SELECT [NAME] as VALUE FROM [PRODUCT_GROUP] WHERE [ID] = '".$_GET['product_group_id'] ."'";
			
			$db=new database_retrive();
		
			echo "<img src=\"../form/image.php?product_group=".$db->set_value($sql)."&product_img=".$_GET['img_url']."\" style='width:100%;height:100%;'/>";
		}
		?>
          
          </strong></td>
      </tr>
  </table>
</div>
</body>
</html>