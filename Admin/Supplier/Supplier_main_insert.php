<?php
require_once('../session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script  src="Supplier_main_ajax.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/container_style.css" />
</head>
<body>
<div id="body_frame">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center">Add Supplier </th>
    </tr>
    <tr>
      <td><strong> ID </strong></td>
      <td colspan="1"><input type="text" name="supplier_id" id="supplier_id" width="200" height="25" disabled="disabled" /></td>
    </tr>
    <tr>
      <td><strong> Name </strong></td>
      <td colspan="1"><input type="text" name="supplier_name" id="supplier_name" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> Address </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="3" name="supplier_add" id="supplier_add"></textarea>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Contact Name </strong></td>
      <td colspan="1"><input type="text" name="supplier_con" id="supplier_con" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> Commision </strong></td>
      <td colspan="1"><input type="text" name="supplier_comm" id="supplier_comm" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> VAT Number </strong></td>
      <td colspan="1"><input type="text" name="supplier_vat" id="supplier_vat" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> Tel Number </strong></td>
      <td colspan="1"><input type="text" name="supplier_tel" id="supplier_tel" maxlength="11"  width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> Fax </strong></td>
      <td colspan="1"><input type="text" name="supplier_fax" id="supplier_fax" maxlength="11"  width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> E-mail </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="1" name="supplier_mail" id="supplier_mail"></textarea>
        </strong></td>
    </tr>
    <tr>
      <td><strong> Primary Logo </strong></td>
      <td colspan="1"><input type="text" name="supplier_log1" id="supplier_log1" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> Secondary  Logo </strong></td>
      <td colspan="1"><input type="text" name="supplier_log2" id="supplier_log2" width="200" height="25" /></td>
    </tr>
    <tr>
      <td><strong> Licence Info </strong></td>
      <td colspan="1"><input type="text" name="supplier_lic" id="supplier_lic" width="200" height="25" /></td>
    </tr>
    
      <td colspan="2"><div align="center" id="resoult">
          <input type='button' id='button' value="Update Query" onclick="run_querey()"  />
        </div></td>
    </tr>
  </table>
</div>
</body>
</html>