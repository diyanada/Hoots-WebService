<?php
require_once('../session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script  src="Quotes_ajax.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/container_style.css" />
</head>
<body>
<div id="body_frame">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center">Add Quotes</th>
    </tr>
    <tr>
      <td><strong> Quotes ID </strong></td>
      <td colspan="1"><input type="text" name="quote_id" id="quote_id" width="200" height="25" disabled="disabled" /></td>
    </tr>
    <tr>
      <td><strong> Quotes </strong></td>
      <td colspan="1">
      <textarea cols="45" rows="3" name="quote" id="quote"></textarea>
      </td>
    </tr>
    
    <tr>
      <td colspan="2"><div align="center" id="resoult">
          <input type='button' id='button' value="Update Query" onclick="run_querey()"  />
        </div></td>
    </tr>
  </table>
</div>
</body>
</html>