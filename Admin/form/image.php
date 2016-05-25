<?php 
require_once('../session.php');
if(!isset($_GET['product_group'])) die("No product id set");
else if(!isset($_GET['product_img'])) die("No name set");
// open the file in a binary mode\\
require_once '../class/system_strings.php';
$sys_st = new system_strings();

$df =  $sys_st->image_path();
$i_path = "/".$_GET['product_group']."/".$_GET['product_img'];

$name = $df . $i_path ;

$path =  realpath($name);



$path_parts = pathinfo($path);
$pro_group =  basename($path_parts['dirname']).PHP_EOL;
$pro_stnm = $path_parts['filename'];

$fp = fopen($path, 'rb');

// send the right headers
header("Content-Type: image/png");
header("Content-Length: " . filesize($name));

// dump the picture and stop the script
fpassthru($fp);
exit;

?>
