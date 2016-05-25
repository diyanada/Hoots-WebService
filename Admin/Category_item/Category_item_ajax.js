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
	var url="Category_item_ajax.php?log=todbjssearch";
	
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
				 +"&ctit_name=" + document.getElementById('ctit_name').value 
				 +"&ctit_dname=" + document.getElementById('ctit_dname').value 
				 +"&key_words="+document.getElementById('key_words').value
				 +"&product_type="+document.getElementById('product_type').value
				 +"&supplier=" + document.getElementById('supplier').value 
				 ,true);
	xmlhttp.send();  
}

//------------------------------------------------------------------------------

function run_querey()
{
	
	if(document.getElementById('ctit_name').value == ""){
		alert_str("Category item_name");
	}
	else if(document.getElementById('ctit_dname').value == ""){
		alert_str("Category item_display_name");
	}
	else if(document.getElementById('product_type').value == ""){
		alert_str("product_type");
	}
	else if(document.getElementById('supplier').value == ""){
		alert_str("supplier");
	}
	else if(document.getElementById('ctso').value == ""){
		alert_str("Short order");
	}
	else if(isNaN(document.getElementById('ctso').value)){
		alert("Short order should have only numbers");
	}
	

	else{
		if(document.getElementById('ctit_id').value == "")	var url="Category_item_ajax.php?log=todbjsadd";
		else var url="Category_item_ajax.php?log=todbjsupdte";
  
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
				 +"&ctit_id="+document.getElementById('ctit_id').value
				 +"&ctit_name=" + document.getElementById('ctit_name').value 
				 +"&ctit_dname=" + document.getElementById('ctit_dname').value 
				 +"&key_words="+document.getElementById('key_words').value
				 +"&product_type="+document.getElementById('product_type').value
				 +"&supplier=" + document.getElementById('supplier').value 
				 +"&ctso=" + document.getElementById('ctso').value
				 +"&title_tag="+document.getElementById('title_tag').value
				 +"&h1_tag=" + document.getElementById('h1_tag').value 
				 +"&meta_des=" + document.getElementById('meta_des').value
				 ,true);
	xmlhttp.send();  
}
}