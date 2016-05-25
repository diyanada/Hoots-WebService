<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script type="text/javascript">

</script>
<link rel="stylesheet" type="text/css" href="../css/container_style.css" />
</head>
<body>
<div id="body_frame">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center">Database String </th>
    </tr>
    <form action="String_save.php" method="get" target="fr_two">
    <tr>
      <td><strong> Strings </strong></td>
      <td colspan="1">
      <textarea cols="45" rows="15" name="str" id="str"><?php echo file_get_contents("../../owsh_secret.php"); ?></textarea>
      </td>
    </tr>
    <tr>
      <td><strong> Save  </strong></td>
      <td colspan="1"><input type="submit" value="Submit"></td>
    </tr>
    </form>
    <tr>
      <td><strong> Test  </strong></td>
      <td colspan="1">
      <a href="../DB/sql_server.php" target="fr_two">
      <input type="button" value="Test">
      </a>
      </td>
    </tr>
  </table>
</div>
</body>
</html>