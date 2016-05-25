<?php 
include ('authorization.php');
include ('error_messages.php');

if (!isset($_GET['_url']) or $_GET['_url'] == "") die (NO_call());

$arr = array();
$arr = (explode("/",$_GET['_url']));

if (!isset($arr[1])) $arr[1] = NULL; 
if (!isset($arr[2])) $arr[2] = NULL; 
if (!isset($arr[3])) $arr[3] = NULL; 
if (!isset($arr[4])) $arr[4] = NULL; 

header('Content-Type: application/json');

//-------------------------------------------------------------------------------------------------------------------------------------------
		switch ($arr[1]) {
//---------------------------------------------------------------		
		   	case "share":
				switch ($arr[2]) {
				//----------------------------
				 	case "invite_option":
						include ('../function/GetShareOptions.php');
				 		GetShareOptions();
				  		break;	
				//----------------------------	 
				 	default :
				 		NO_method();
				 		break;
				//----------------------------
				 }
				 break;
//---------------------------------------------------------------				 
			case "account":
				switch ($arr[2]) {
				//----------------------------
				 	case "invite":
						$method = "GET";
						$pram1 = NULL_VALIDATION("hootID", "Registered User ID", $method);
						$pram2 = NULL_VALIDATION("TypeofInvite", "Share Options ID", $method);
						
						if (!isset($_GET['token']) or $_GET['token'] == NULL) die (RE_prems("Token"));
						else test_auth($_GET['token'], $_GET['hootID']);
						
						include ('../function/AddAccountInvite.php');
						AddAccountInvite($pram1, $pram2);
						
				  		break;	
				//----------------------------	
					case "upgrade":
						$method = "GET";
						$pram1 = NULL_VALIDATION("hootID", "Registered User ID", $method);
						$pram2 = NULL_VALIDATION("startDate", "Start Date", $method);
						$pram3 = NULL_VALIDATION("endDate", "End Date", $method);
						$pram4 = NULL_VALIDATION("isExtended", "Is Extended (true - false))", $method);
						$pram5 = 2; 
						
						if (!isset($_GET['token']) or $_GET['token'] == NULL) die (RE_prems("Token"));
						else test_auth($_GET['token'], $_GET['hootID']);
						
						include ('../function/AddAccountUpgrade.php');
						AddAccountUpgrade($pram1, $pram2, $pram3, $pram4, $pram5);
				  		break;	
				//----------------------------	 
					case "ping":
						$method = "GET";
						$pram1 = NULL_VALIDATION("hootID", "Registered User ID", $method);
						
						if (!isset($_GET['token']) or $_GET['token'] == NULL) die (RE_prems("Token"));
						else test_auth($_GET['token'], $_GET['hootID']);
						
						include ('../function/GetAccountPing.php');
						GetAccountPing($pram1);
				  		break;	
				//----------------------------	 
					case "login":
						$method = "POST";
						$pram1 = NULL_VALIDATION("facebookID", "Facebook ID", $method);
						$pram2 = NULL_VALIDATION("facebookToken", "Facebook Token", $method);
						$pram3 = 1;
						
						include ('../function/GetAccountLogin.php');
						GetAccountLogin($pram1, $pram2, $pram3);
				  		break;	
				//----------------------------	  
					case "register":
						$method = "GET";
						$pram1 = NULL_VALIDATION("name", "Name", $method);
						$pram2 = NULL_VALIDATION("fname", "First Name", $method);
						$pram3 = NULL_VALIDATION("lname", "Last Name", $method);
						$pram4 = NHG('bday');
						$pram5 = NULL_VALIDATION("email", "E-mail", $method);
						$pram6 = NULL_VALIDATION("fbid", "Facebook ID", $method);
						$pram7 = NULL_VALIDATION("atid", "Account Type", $method);
												
						include ('../function/AddRegisteredUser.php');
						AddRegisteredUser($pram1, $pram2, $pram3, $pram4, $pram5, $pram6, $pram7);
				  		break;	
				//----------------------------
				 	default :
				 		NO_method();
				 		break;
				//----------------------------
				 }
				 break;
//---------------------------------------------------------------				 
			case "product":
				switch ($arr[2]) {
				//----------------------------	 
					case "purchase":
						$method = "GET";
						$pram1 = NULL_VALIDATION("hootID", "Registered User ID", $method);
						$pram2 = NULL_VALIDATION("productID", "Product ID", $method);
						$pram3 = NULL_VALIDATION("typeOfShare", "Type of Share", $method);
						$pram4 = NULL_VALIDATION("typeOfAccount", "Type of Account", $method);
						
						if (!isset($_GET['token']) or $_GET['token'] == NULL) die (RE_prems("Token"));
						else test_auth($_GET['token'], $_GET['hootID']);
						
						include ('../function/AddProductPurchase.php');
						AddProductPurchase($pram1, $pram2, $pram3, $pram4);
				  		break;	
				//----------------------------	 
					case "getproductlist":						
						include ('../function/getproductlist.php');
						getproductlist();
				  		break;	
				//----------------------------	
					case "getproductdetail":
						$method = "GET";
						$pram1 = NULL_VALIDATION("productID", "Product ID", $method);
						
						include ('../function/getproductdetail.php');
						getproductdetail($pram1);
				  		break;	
				//----------------------------	 
				 	default :
				 		NO_method();
				 		break;
				//----------------------------
				 }
				 break;	 
//---------------------------------------------------------------				 
			default :
				 NO_method();
				 break;		 
		}	
//-------------------------------------------------------------------------------------------------------------------------------------------
	
function NHG($name){
	if (!isset($_GET[$name]) or $_GET[$name] == "") return NULL ;
	else return $_GET[$name];
}
function NULL_VALIDATION($name,  $PDN = "", $HD = "GET"){

	if ($HD == "POST"){
		if (!isset($_POST[$name]) or $_POST[$name] == NULL)		die (RE_prems($PDN));
		else return $_POST[$name];
	}
	else{
		if (!isset($_GET[$name]) or $_GET[$name] == NULL)	die (RE_prems($PDN));
		else return $_GET[$name];
	}
}



?>