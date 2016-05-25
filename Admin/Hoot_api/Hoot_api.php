<?php
require_once('../session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
<script  src="Hoot_api_ajax.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/container_style.css" />
</head>
<body>
<div id="body_frame">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center">Facebook Connections</th>
    </tr>
    <tr>
      <td><strong> Facebook Login </strong></td>
      <td colspan="1">
      	<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
      </td>
    </tr>
    <tr>
      <td><strong> Access Token </strong></td>
      <td colspan="1"><textarea cols="45" rows="6" name="access_token" id="access_token" readonly="readonly"></textarea></td>
    </tr>
    <tr>
      <td><strong> Facebook ID </strong></td>
      <td colspan="1"><textarea cols="45" rows="1" name="facebook_id" id="facebook_id" readonly="readonly"></textarea></td>
    </tr>
    <tr>
      <td><strong> Time left (Seconds) </strong></td>
      <td colspan="1"><input type="text" name="time_left" id="time_left" width="200" height="25" readonly="readonly" /></td>
    </tr>
    <!--====================================================================================================================-->
     <tr>
      <th colspan="2" align="center">API (share - invite_option)</th>
    </tr>
    <form action="http://52.25.84.11:8080/HOOTS-WS/share/invite_option/" method="get" target="fr_two">
    <tr>
      <td><strong> Call  </strong></td>
      <td colspan="1"><input type="submit" value="Submit"></td>
    </tr>
    </form>
    <!--====================================================================================================================-->
    <tr>
      <th colspan="2" align="center">API (account - invite)</th>
    </tr>
    <form action="http://52.25.84.11:8080/HOOTS-WS/account/invite" method="get" target="fr_two">
    <tr>
      <td><strong> Access Token </strong></td>
      <td colspan="1"><textarea cols="45" rows="6" name="token" id="token" ></textarea></td>
    </tr>
    <tr>
      <td><strong> Hoot ID </strong></td>
      <td colspan="1"><input type="text" name="hootID" id="hootID" width="200" height="25"/></td>
    </tr>
    <tr>
      <td><strong> Type of Invite </strong></td>
      <td colspan="1"><input type="text" name="TypeofInvite" id="TypeofInvite" width="200" height="25"/></td>
    </tr>
    <tr>
      <td><strong> Call  </strong></td>
      <td colspan="1"><input type="submit" value="Submit"></td>
    </tr>
    </form>
    <!--====================================================================================================================-->
    <tr>
      <th colspan="2" align="center">API (account - upgrade )</th>
    </tr>
    <form action="http://52.25.84.11:8080/HOOTS-WS/account/upgrade" method="get" target="fr_two">
    <tr>
      <td><strong> Access Token </strong></td>
      <td colspan="1"><textarea cols="45" rows="6" name="token" id="token" ></textarea></td>
    </tr>
    <tr>
      <td><strong> Hoot ID </strong></td>
      <td colspan="1"><input type="text" name="hootID" id="hootID" width="200" height="25"/></td>
    </tr>
    <tr>
      <td><strong> Start Date/Time </strong></td>
      <td colspan="1"><input type="date" name="startDate" id="startDate"/></td>
    </tr>
    <tr>
      <td><strong> End Date/Time </strong></td>
      <td colspan="1"><input type="date" name="endDate" id="endDate"/></td>
    </tr>
    <tr>
      <td><strong> is Extended </strong></td>
      <td colspan="1">
      	<select name="isExtended" id="isExtended">
        	<option value="false">False</option>
            <option value="true">True</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><strong> Call  </strong></td>
      <td colspan="1"><input type="submit" value="Submit"></td>
    </tr>
    </form>
     <!--====================================================================================================================-->
    <tr>
      <th colspan="2" align="center">API (account - ping )</th>
    </tr>
    <form action="http://52.25.84.11:8080/HOOTS-WS/account/ping" method="get" target="fr_two">
    <tr>
      <td><strong> Access Token </strong></td>
      <td colspan="1"><textarea cols="45" rows="6" name="token" id="token" ></textarea></td>
    </tr>
    <tr>
      <td><strong> Hoot ID </strong></td>
      <td colspan="1"><input type="text" name="hootID" id="hootID" width="200" height="25"/></td>
    </tr>
    <tr>
      <td><strong> Call  </strong></td>
      <td colspan="1"><input type="submit" value="Submit"></td>
    </tr>
    </form>
    <!--====================================================================================================================-->
    <tr>
      <th colspan="2" align="center">API (account - login )</th>
    </tr>
    <form action="http://52.25.84.11:8080/HOOTS-WS/account/login" method="post" target="fr_two">
    <tr>
      <td><strong> Access Token </strong></td>
      <td colspan="1"><textarea cols="45" rows="6" name="facebookToken" id="facebookToken"></textarea></td>
    </tr>
    <tr>
      <td><strong> Facebook ID </strong></td>
      <td colspan="1"><textarea cols="45" rows="1" name="facebookID" id="facebookID"></textarea></td>
    </tr>
    <tr>
      <td><strong> Call  </strong></td>
      <td colspan="1"><input type="submit" value="Submit"></td>
    </tr>
    </form>
    <!--====================================================================================================================-->
    <tr>
      <th colspan="2" align="center">API (account - purchase )</th>
    </tr>
    <form action="http://52.25.84.11:8080/HOOTS-WS/product/purchase" method="get" target="fr_two">
    <tr>
      <td><strong> Access Token </strong></td>
      <td colspan="1"><textarea cols="45" rows="6" name="token" id="token" ></textarea></td>
    </tr>
    <tr>
      <td><strong> Hoot ID </strong></td>
      <td colspan="1"><input type="text" name="hootID" id="hootID" width="200" height="25"/></td>
    </tr>
    <tr>
      <td><strong> product ID </strong></td>
      <td colspan="1"><input type="text" name="productID" id="productID"/></td>
    </tr>
    <tr>
      <td><strong> Type of Account </strong></td>
      <td colspan="1"><input type="text" name="typeOfAccount" id="typeOfAccount"/></td>
    </tr>
    <tr>
      <td><strong> Type of Share </strong></td>
      <td colspan="1"><input type="text" name="typeOfShare" id="typeOfShare"/></td>
    </tr>
    <tr>
      <td><strong> Call  </strong></td>
      <td colspan="1"><input type="submit" value="Submit"></td>
    </tr>
    </form>
    <!--====================================================================================================================-->
    <tr>
      <th colspan="2" align="center">API (account - getproductlist )</th>
    </tr>
    <form action="http://52.25.84.11:8080/HOOTS-WS/product/getproductlist" method="get" target="fr_two">
    <tr>
      <td><strong> Call  </strong></td>
      <td colspan="1"><input type="submit" value="Submit"></td>
    </tr>
    </form>
    <!--====================================================================================================================-->
    <tr>
      <th colspan="2" align="center">API (account - getproductdetail )</th>
    </tr>
    <form action="http://52.25.84.11:8080/HOOTS-WS/product/getproductdetail" method="get" target="fr_two">
    <tr>
      <td><strong> product ID </strong></td>
      <td colspan="1"><input type="text" name="productID" id="productID"/></td>
    </tr>
    <tr>
      <td><strong> Call  </strong></td>
      <td colspan="1"><input type="submit" value="Submit"></td>
    </tr>
    </form>
  </table>
</div>
</body>
</html>