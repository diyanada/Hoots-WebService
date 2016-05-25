// JavaScript Document
function isEmail(str) {
  return !str || /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/.test(str);
}
function addfunction(pid , cid) {
  var url="Category_item_product_mapping_ajax.php?log=addfunction";
	
  
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
							funswith(xmlhttp.responseText);
						}
					
				   }
	xmlhttp.open("GET",url 
				 +"&cid=" + cid
				 +"&pid=" + pid
				 ,true);
	xmlhttp.send();
}

function funswith(txt) {
	switch (txt) {
    case "ND":
        day = "Couldn't insert to the database";
        break;
    case "AL":
        day = "This map is already have!";
        break;
    case "SU":
        day = "Successfully Added";
        break;
}
alert (day);
}

function window_open(url) {
    var myWindow = window.open("../login/login_check.php?url=" + url, "", "width=660, height=310, scrollbars = 0, titlebar=0, toolbar=0");
}

function return_querey()
{
	document.getElementById("spriner").style.display = 'none';
	document.getElementById('button').disabled = false;
}
function window_open(url) {
    var myWindow = window.open("../login/login_check.php?url=" + url, "", "width=660, height=310, scrollbars = 0, titlebar=0, toolbar=0");
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
	var url="Category_item_product_mapping_ajax.php?log=todbjssearch";
	
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

function search_querey_pro()
{
	if(							document.getElementById('product_id').value == ""
							   && document.getElementById('product_type').value == ""
							   && document.getElementById('output_type').value == ""
							   && document.getElementById('product_group').value == ""
							   && document.getElementById('supplier').value == ""
							   && document.getElementById('foreign_code').value == ""
							   && document.getElementById('key_words').value == ""
							   && document.getElementById('product_name').value == ""
							   && document.getElementById('set_name').value == ""
							   && document.getElementById('is_active').value == ""){
		alert("No data for search!");
	}
	
	

	else{
	document.getElementById("spriner").style.display = 'block';
	document.getElementById('button').disabled = true;

  var url="Category_item_product_mapping_ajax.php?log=todbjssearch_pro";
  
  
  
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
				 +"&product_id="+document.getElementById('product_id').value
				 +"&product_type="+document.getElementById('product_type').value
				 +"&output_type=" + document.getElementById('output_type').value 
				 +"&product_group=" + document.getElementById('product_group').value
				 +"&supplier=" + document.getElementById('supplier').value
				 +"&foreign_code=" + document.getElementById('foreign_code').value 
				 +"&set_name=" + document.getElementById('set_name').value
				 +"&product_name=" + document.getElementById('product_name').value
				 +"&key_words=" + document.getElementById('key_words').value 
				 +"&is_active=" + document.getElementById('is_active').value
				 +"&catit_id=" + document.getElementById('catit_id').value
				 ,true);
	xmlhttp.send();  
}
}

//--------------------------------------------------------------------------------------------------------------
