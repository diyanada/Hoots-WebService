<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body id="body2">
<form id="abcc" method="get" action="login_delete.php">
  <div id="login">
    <table width="348" align="center" border="0">
      <tr>
        <td width="114"><font face="Arial"> User Name </font></td>
        <td>:</td>
        <td colspan="2" align="center"><input type="text" name="a2" id="a2" value="<?php if(isset($_GET['uname']))echo $_GET['uname'] ?>"/></td>
      </tr>
      <tr>
        <td width="114"><font face="Arial"> Password </font></td>
        <td>:</td>
        <td colspan="2" align="center"><input name="a3" type="password" id="a3" value=""/></td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center"><input type="submit"  value="Sign In" /></td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <br />
    <hr />
    <h3 class="style3" align="center">Project Name</h3>
    <p class="error" align="center"><?php if(isset($_GET['error']))echo $_GET['error'] ?></p>
    
  </div>
  <input name="url" type="text" id="url" class="url" readonly="readonly" value="<?php if(isset($_GET['url'])) echo urlencode($_GET['url']) ?>"/>
</form>
</body>
</html>
