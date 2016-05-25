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
	if(isNaN(document.getElementById('nofh').value)){
		alert("Number of free hoots should have only numbers");
	}
	

	else{
	var url="Share_options_ajax.php?log=todbjssearch";
	
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
				 +"&so_type=" + document.getElementById('so_type').value 
				 +"&nofh=" + document.getElementById('nofh').value 
				 +"&quotes=" + document.getElementById('quotes').value 
				 ,true);
	xmlhttp.send();  
	}
}

//------------------------------------------------------------------------------

function run_querey()
{
	
	if(document.getElementById('so_type').value == ""){
		alert_str("Share options type")
	}
	else if(document.getElementById('nofh').value == ""){
		alert_str("Number of free hoots");
	}
	else if(isNaN(document.getElementById('nofh').value)){
		alert("Number of free hoots should have only numbers");
	}
	else if(document.getElementById('quotes').value == ""){
		alert_str("quotes");
	}
	

	else{
		if(document.getElementById('so_id').value == "")	var url="Share_options_ajax.php?log=todbjsadd";
		else var url="Share_options_ajax.php?log=todbjsupdte";
  
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
				 +"&so_id="+document.getElementById('so_id').value
				 +"&so_type=" + document.getElementById('so_type').value 
				 +"&nofh=" + document.getElementById('nofh').value 
				 +"&quotes=" + document.getElementById('quotes').value 
				 ,true);
	xmlhttp.send();  
}
}