<?php
function getproductdetail($itemID){

include('../owsh_secret.php');
echo "<pre>";
$service_msg = array();
$er_msg      = array();
$return_val  = array();

$connectionInfo = array(
    "Database" => $database,
    "UID" => $db_username,
    "PWD" => $db_password,
    "CharacterSet" => "UTF-8"
);
$conn           = sqlsrv_connect($server_name, $connectionInfo);
if ($conn === false) {
    if (($errors = sqlsrv_errors()) != null) {
        foreach ($errors as $error) {
            $er_msg['code']    = $error['code'];
            $er_msg['message'] = $error['message'];
        }
    }
    $service_msg['serviceStatus'] = $er_msg;
    $return_val                   = json_encode($service_msg);
    die($return_val);
}


$sql = "SELECT [PRODUCT].[ID], [PRODUCT].[SET_NAME], [PRODUCT_GROUP].[AU_CODE]  FROM [PRODUCT] INNER JOIN [PRODUCT_GROUP] ON [PRODUCT].[PRODUCT_GROUP_ID] = [PRODUCT_GROUP].[ID] WHERE [PRODUCT].[ID] = " .$itemID;

$result = sqlsrv_query($conn, $sql);
if ($result === false) {
    if (($errors = sqlsrv_errors()) != null) {
        foreach ($errors as $error) {
            $er_msg['code']    = $error['code'];
            $er_msg['message'] = $error['message'];
        }
    }
    $service_msg['serviceStatus'] = $er_msg;
    $return_val = json_encode($service_msg);
    die($return_val);
}
$cateogries = array();
while ($row = sqlsrv_fetch_array($result)) {

  
	$images  = array();
	$texts  = array();
	
	$doc = new DOMDocument();
	$doc->load("http://preview.funkypigeon.com/dsmo/streamimage.aspx?set=" . $row["SET_NAME"] . "_lowres&t=Any%20Name&xml=1&pw=323&ac=" . $row["AU_CODE"]);
	
	
	$img = $doc->getElementsByTagName('Layer')->item(1);
	if ($img === null) {
   			$er_msg['code']    = "";
			$er_msg['message'] = "Can't load the web service.";
			
			$service_msg['serviceStatus'] = $er_msg;
			die (json_encode($service_msg));
	}
$searchNode = $doc->getElementsByTagName( "Layer" ); 

$img_nub =1;
$txt_nub =1;
foreach( $searchNode as $searchNode ) 
{ 
    if( $searchNode->getAttribute('Type') == "PICTURE"){
	$images_temp  = array();
	
	$bounds  = $searchNode->getElementsByTagName( "Bounds" ); 
	
		$images_temp['imageIndex'] = $img_nub++;
		$images_temp['imageURL'] = NULL;
		$images_temp['imageLocalX'] = $bounds->item(0)->getAttribute('Left');
		$images_temp['imageLocalY'] = $bounds->item(0)->getAttribute('Top');
		$images_temp['imageWidth'] = $bounds->item(0)->getAttribute('Width');
		$images_temp['imageHeight'] = $bounds->item(0)->getAttribute('Height');
		
		
	array_push($images, $images_temp);
	}
	else if	( $searchNode->getAttribute('Type') == "TEXT"){
	$texts_temp  = array();
	
	$bounds  = $searchNode->getElementsByTagName( "Bounds" ); 
	
		$texts_temp['textIndex'] = $txt_nub++;
		$texts_temp['defaultText'] = NULL;
		$texts_temp['textMaxLength'] = NULL;
		$texts_temp['textLocalX'] = $bounds->item(0)->getAttribute('Left');
		$texts_temp['textLocalY'] = $bounds->item(0)->getAttribute('Top');
		$texts_temp['textWidth'] = $bounds->item(0)->getAttribute('Width');
		$texts_temp['textHeight'] = $bounds->item(0)->getAttribute('Height');
		
	array_push($texts, $texts_temp);
	} 
}
    
    $cateogries_it              = array();
    $cateogries_it['id']        = $row['ID'];
    $cateogries_it['setName']      = $row['SET_NAME'];
    $cateogries_it['ac'] = $row['AU_CODE'];
	$cateogries_it['width'] = $doc->documentElement->getAttribute('Width');
	$cateogries_it['height'] = $doc->documentElement->getAttribute('Height');
    $cateogries_it['images']     = $images;
	$cateogries_it['texts']     = $texts;
    
    array_push($cateogries, $cateogries_it);



}
$return_val = json_encode(array('product' => $cateogries), JSON_PRETTY_PRINT);
echo $return_val;

sqlsrv_free_stmt($result);

}
?>

