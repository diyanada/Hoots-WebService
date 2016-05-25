// JavaScript Document
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
	var url="Product_group_ajax.php?log=todbjssearch";
	
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
				 +"&pdgp_name=" + document.getElementById('pdgp_name').value 
				 +"&pdgp_au=" + document.getElementById('pdgp_au').value
				 ,true);
	xmlhttp.send();  
}

//------------------------------------------------------------------------------

function run_querey()
{
	
	if(document.getElementById('pdgp_name').value == ""){
		alert_str("product_group_name");
	}
	else if(document.getElementById('pdgp_pass').value == ""){
		alert_str("product_group_password");
	}
	else if(document.getElementById('pdgp_au').value == ""){
		alert_str("product_group_AU_code");
	}
	

	else{
		if(document.getElementById('pdgp_id').value == "")	var url="Product_group_ajax.php?log=todbjsadd";
		else var url="Product_group_ajax.php?log=todbjsupdte";
  
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
				 +"&pdgp_id="+document.getElementById('pdgp_id').value
				 +"&pdgp_name=" + document.getElementById('pdgp_name').value 
				 +"&pdgp_pass=" + document.getElementById('pdgp_pass').value 
				 +"&pdgp_au=" + document.getElementById('pdgp_au').value
				 ,true);
	xmlhttp.send();  
}
}