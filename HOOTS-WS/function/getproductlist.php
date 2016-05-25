<?php
function getproductlist()
{

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


$sql = "SELECT TOP 10 [ID], [ITEM_DISPLAY_NAME], [SORT_ORDER] FROM [dbo].[CATEGORY_ITEM] WHERE [PRODUCT_TYPE_ID] = 5 OR [PRODUCT_TYPE_ID] = 20";

$result = sqlsrv_query($conn, $sql);
if ($result === false) {
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
$cateogries = array();
while ($row = sqlsrv_fetch_array($result)) {
    $item = array();
    
    $sql = "SELECT TOP 10 [PRODUCT].[ID], [PRODUCT].[NAME], [PRODUCT].[IMAGE_PATH], [PRODUCT].[KEY_WORDS] FROM [dbo].[CATEGOTY_ITEM_PRODUCT_MAPPING] INNER JOIN [dbo].[PRODUCT] ON [dbo].[CATEGOTY_ITEM_PRODUCT_MAPPING].[PRODUCT_ID]=[dbo].[PRODUCT].[ID] WHERE [dbo].[PRODUCT].[IS_ACTIVE] = 1 AND [CATEGORY_ITEM_ID] = " . $row['ID'];
    
    $result2 = sqlsrv_query($conn, $sql);
    if ($result2 === false) {
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
    while ($row2 = sqlsrv_fetch_array($result2)) {
        $product               = array();
        $product['id']         = $row2['ID'];
        $product['name']       = $row2['NAME'];
        $product['imageURL']   = str_replace('~', NULL, $row2['IMAGE_PATH']);
        $product['isFeatured'] = false;
        $product['keywords']   = $row2['KEY_WORDS'];
        
        array_push($item, $product);
    }
    
    $cateogries_it              = array();
    $cateogries_it['id']        = $row['ID'];
    $cateogries_it['name']      = $row['ITEM_DISPLAY_NAME'];
    $cateogries_it['sortOrder'] = $row['SORT_ORDER'];
    $cateogries_it['items']     = $item;
    
    array_push($cateogries, $cateogries_it);
}
$return_val = json_encode(array(
    'cateogries' => $cateogries
), JSON_PRETTY_PRINT);
echo $return_val;

sqlsrv_free_stmt($result);


}
?>

