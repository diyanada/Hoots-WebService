// JavaScript Document
function isEmail(str) {
  return !str || /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/.test(str);
}

function window_open(url) {
    var myWindow = window.open("../login/login_check.php?url=" + url, "", "width=660, height=310, scrollbars = 0, titlebar=0, toolbar=0");
}

function return_querey()
{
	document.getElementById("spriner").style.display = 'none';
	document.getElementById('button').disabled = false;
}
//------------------------------------------------------------------------------
function alert_str(field_name)
{
	var res = field_name.replace(/_/gi, " ");
	var res = capitalizeFirstLetter(res);
	alert(res + " can't be null.");
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
//------------------------------------------------------------------------------
function search_querey()
{
	if(!isEmail(document.getElementById('user_mail').value)){
		alert_str("Please check the email address");
	}
	

	else{

	var url="User_main_ajax.php?log=todbjssearch";
	
  		 document.getElementById("spriner").style.display = 'block';
 		 document.getElementById('button').disabled = "disabled";
  
				  if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					}
				  else
					{// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
				  xmlhttp.onreadystatechange=function()
					{
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							document.getElementById("resoult").innerHTML=xmlhttp.responseText;
							return_querey(); 
						}
					
				   }
	xmlhttp.open("GET",url 
				 +"&user_id=" + document.getElementById('user_id').value 
				 +"&user_name=" + document.getElementById('user_name').value 
				 +"&user_type=" + document.getElementById('user_type').value 
				 +"&first_name=" + document.getElementById('first_name').value 
				 +"&last_name=" + document.getElementById('last_name').value 
				 +"&user_mail=" + document.getElementById('user_mail').value 
				 +"&user_des=" + document.getElementById('user_des').value 
				 +"&user_client=" + document.getElementById('user_client').value 
				 +"&user_role=" + document.getElementById('user_role').value  
				 ,true);
	xmlhttp.send();  
	}
}

//------------------------------------------------------------------------------

function run_querey()
{
	
	if(document.getElementById('user_name').value == ""){
		alert_str("user_name");
	}
	else if(document.getElementById('user_pass').value == ""){
		alert_str("user_password");
	}
	else if(document.getElementById('user_pass1').value == ""){
		alert_str("Confirm_password");
	}
	else if(document.getElementById('user_pass').value != document.getElementById('user_pass1').value){
		alert_str("Passwords not match");
	}
	else if(document.getElementById('user_type').value == ""){
		alert_str("user_type");
	}
	else if(document.getElementById('first_name').value == ""){
		alert_str("first_name");
	}
	else if(document.getElementById('last_name').value == ""){
		alert_str("last_name");
	}
	else if(document.getElementById('user_mail').value == ""){
		alert_str("user_mail");
	}
	else if(!isEmail(document.getElementById('user_mail').value)){
		alert_str("Please check the email address");
	}
	else if(document.getElementById('user_client').value == ""){
		alert_str("user_client");
	}
	else if(document.getElementById('user_role').value == ""){
		alert_str("user_role");
	}

	

	else{
		if(document.getElementById('user_id').value == "")	var url="User_main_ajax.php?log=todbjsadd";
		else var url="User_main_ajax.php?log=todbjsupdte";
  
 		 document.getElementById('button').disabled = "disabled";
  
				  if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					}
				  else
					{// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
				  xmlhttp.onreadystatechange=function()
					{
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							document.getElementById("resoult").innerHTML=xmlhttp.responseText;
						}
					
				   }
	xmlhttp.open("GET",url 
				 +"&user_id=" + document.getElementById('user_id').value 
				 +"&user_name=" + document.getElementById('user_name').value 
				 +"&user_pass=" + document.getElementById('user_pass').value 
				 +"&user_type=" + document.getElementById('user_type').value 
				 +"&first_name=" + document.getElementById('first_name').value 
				 +"&last_name=" + document.getElementById('last_name').value 
				 +"&user_mail=" + document.getElementById('user_mail').value 
				 +"&user_des=" + document.getElementById('user_des').value 
				 +"&user_client=" + document.getElementById('user_client').value 
				 +"&user_role=" + document.getElementById('user_role').value 
				 ,true);
	xmlhttp.send();  
}
}

//-----------------------------------------------------------------------------------------------------------------------------------
function update_querey()
{
	
	if(document.getElementById('user_name').value == ""){
		alert_str("user_name");
	}
	else if(document.getElementById('user_type').value == ""){
		alert_str("user_type");
	}
	else if(document.getElementById('first_name').value == ""){
		alert_str("first_name");
	}
	else if(document.getElementById('last_name').value == ""){
		alert_str("last_name");
	}
	else if(document.getElementById('user_mail').value == ""){
		alert_str("user_mail");
	}
	else if(!isEmail(document.getElementById('user_mail').value)){
		alert_str("Please check the email address");
	}
	else if(document.getElementById('user_client').value == ""){
		alert_str("user_client");
	}
	else if(document.getElementById('user_role').value == ""){
		alert_str("user_role");
	}

	

	else{
		var url="User_main_ajax.php?log=todbjsupdte";
  
 		 document.getElementById('button').disabled = "disabled";
  
				  if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					}
				  else
					{// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
				  xmlhttp.onreadystatechange=function()
					{
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							document.getElementById("resoult").innerHTML=xmlhttp.responseText;
						}
					
				   }
	xmlhttp.open("GET",url 
				 +"&user_id=" + document.getElementById('user_id').value 
				 +"&user_name=" + document.getElementById('user_name').value 
				 +"&user_type=" + document.getElementById('user_type').value 
				 +"&first_name=" + document.getElementById('first_name').value 
				 +"&last_name=" + document.getElementById('last_name').value 
				 +"&user_mail=" + document.getElementById('user_mail').value 
				 +"&user_des=" + document.getElementById('user_des').value 
				 +"&user_client=" + document.getElementById('user_client').value 
				 +"&user_role=" + document.getElementById('user_role').value 
				 ,true);
	xmlhttp.send();  
}
}
//------------------------------------------------------------------------------

function update_pass_querey()
{
	 if(document.getElementById('user_pass').value == ""){
		alert_str("user_password");
	}
	else if(document.getElementById('user_pass1').value == ""){
		alert_str("Confirm_password");
	}
	else if(document.getElementById('user_pass').value != document.getElementById('user_pass1').value){
		alert_str("Passwords not match");
	}
	else{
		var url="User_main_ajax.php?log=todbjsadd_pass";
		
  
 		 document.getElementById('button').disabled = "disabled";
  
				  if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					}
				  else
					{// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
				  xmlhttp.onreadystatechange=function()
					{
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							document.getElementById("resoult").innerHTML=xmlhttp.responseText;
						}
					
				   }
	xmlhttp.open("GET",url 
				 +"&user_id=" + document.getElementById('user_id').value 
				 +"&user_pass=" + document.getElementById('user_pass').value 
				 ,true);
	xmlhttp.send();  
}
}

//-----------------------------------------------------------------------------------------------------------------------------------
