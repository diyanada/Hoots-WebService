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
	var url="Supplier_main_ajax.php?log=todbjssearch";
	
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
				 +"&supplier_name=" + document.getElementById('supplier_name').value 
				 +"&supplier_add=" + document.getElementById('supplier_add').value 
				 +"&supplier_con=" + document.getElementById('supplier_con').value
				 
				 +"&supplier_vat=" + document.getElementById('supplier_vat').value 
				 +"&supplier_tel=" + document.getElementById('supplier_tel').value 
				 +"&supplier_mail=" + document.getElementById('supplier_mail').value
				 
				 +"&supplier_fax=" + document.getElementById('supplier_fax').value 
				 ,true);
	xmlhttp.send();  
}

//------------------------------------------------------------------------------

function run_querey()
{
	
	if(document.getElementById('supplier_name').value == ""){
		alert_str("supplier_name");
	}
	else if(isNaN(document.getElementById('supplier_comm').value)){
		alert("Commision should have only numbers");
	}
	else if(isNaN(document.getElementById('supplier_vat').value)){
		alert("VAT number should have only numbers");
	}
	else if(isNaN(document.getElementById('supplier_tel').value)){
		alert("Tel number should have only numbers");
	}
	else if(isNaN(document.getElementById('supplier_fax').value)){
		alert("Fax number should have only numbers");
	}
	else if(!isEmail(document.getElementById('supplier_mail').value)){
		alert_str("Please check the email address");
	}
	

	else{
		if(document.getElementById('supplier_id').value == "")	var url="Supplier_main_ajax.php?log=todbjsadd";
		else var url="Supplier_main_ajax.php?log=todbjsupdte";
  
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
				 +"&supplier_id="+document.getElementById('supplier_id').value
				 +"&supplier_name=" + document.getElementById('supplier_name').value 
				 +"&supplier_add=" + document.getElementById('supplier_add').value 
				 +"&supplier_con=" + document.getElementById('supplier_con').value
				 +"&supplier_comm="+document.getElementById('supplier_comm').value
				 +"&supplier_vat=" + document.getElementById('supplier_vat').value 
				 +"&supplier_tel=" + document.getElementById('supplier_tel').value 
				 +"&supplier_mail=" + document.getElementById('supplier_mail').value
				 +"&supplier_log1="+document.getElementById('supplier_log1').value
				 +"&supplier_log2=" + document.getElementById('supplier_log2').value 
				 +"&supplier_lic=" + document.getElementById('supplier_lic').value 
				 +"&supplier_fax=" + document.getElementById('supplier_fax').value 
				 ,true);
	xmlhttp.send();  
}
}