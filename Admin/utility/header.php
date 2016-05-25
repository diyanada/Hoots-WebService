<?php
  require_once('../session.php');
  require_once("../class/user_mang.php");
  $user=new user_mang();
?>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<div id="topp_continer">
  <div id="left"> <?php echo "Welcome! ".$user->user_fullname($_SESSION['userid']);?> </div>
  <div id="right">
    <?php 
	date_default_timezone_set('Europe/London');
	echo date('l j')."<sup>".date('S')."</sup>".date(' \of F Y');
	echo "<br />";
	echo  date('g:i a');
	?>
  </div>
</div>
<div id="topbr">
  <div id="topbr_continer">
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a class="MenuBarItemSubmenu" href="#">Product</a>
        <ul>
          <li><a href="../Product/">Product</a></li>
          <li><a href="../Product_type/">Product Type</a></li>
          <li><a href="../Product_output_type/">Product Output Type</a></li>
          <li><a href="../Product_group/">Product Group</a></li>
          <li><a href="../Product_output_size/">Product Output Size</a></li>
        </ul>
      </li>
      
      <li><a href="../Supplier/">Supplier</a></li>
      
      <li><a class="MenuBarItemSubmenu" href="#">Category</a>
        <ul>
          <li><a href="../Category_main/">Category</a></li>
          <li><a href="../Category_item/">Category Item</a></li>
          
          <li><a href="../Category_item_product_mapping/">Category Item/Product Mapping</a></li>
        </ul>
      </li>
      
      <li><a class="MenuBarItemSubmenu" href="#">Users</a>
        <ul>
          <li><a href="../User_role/">Role</a></li>
          <li><a href="../User_main/">User</a></li>
        </ul>
      </li>
      
      <li><a href="../Hoot_api/">API Testing</a></li>
      <li><a href="#">HOOT WS</a>
      <ul>
          <li><a href="../Quotes/">Quotes</a></li>
          <li><a href="../Account_type/">Account Type</a></li>
          <li><a href="../Share_options/">Share Options</a></li>
          <li><a href="../DB_string/">Change Connection</a></li>
        </ul>
      </li>
      <li><a href="#">---------------</a></li>
      <li><a class="MenuBarItemSubmenu" href="#"><?php echo $user->user_firstname($_SESSION['userid']); ?></a>
        <ul>
          <li><a href="../account/logout.php">Logout</a></li>
          <li><a href="../account/pass_change.php">Password Change</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
