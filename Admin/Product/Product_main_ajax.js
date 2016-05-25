// JavaScript Document


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

function srt_id(id) {
    document.getElementById('product_id').value = id;
}

function run_querey()
{
	
	if(document.getElementById('product_type').value == ""){
		alert_str("product_type");
	}
	else if(document.getElementById('output_type').value == ""){
		alert_str("output_type");
	}
	else if(document.getElementById('product_group').value == ""){
		alert_str("product_group");
	}
	else if(document.getElementById('supplier').value == ""){
		alert_str("supplier");
	}
	else if(document.getElementById('set_name').value == ""){
		alert_str("set_name");
	}
	else if(document.getElementById('product_name').value == ""){
		alert_str("product_name");
	}
	else if(document.getElementById('price').value == ""){
		alert_str("price");
	}
	else if(isNaN(document.getElementById('price').value)){
		alert("Price should have only numbers");
	}
	else if(isNaN(document.getElementById('favorite_count').value)){
		alert("Favorite Count should have only numbers");
	}
	else if(isNaN(document.getElementById('rating_count').value)){
		alert("Rating Count should have only numbers");
	}
	else if(isNaN(document.getElementById('p_max_length').value)){
		alert("Personalization Max Length should have only numbers");
	}
	

	else{
			
  var url="Product_main_ajax.php?log=todbjsadd";
  
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
				 +"&product_type="+document.getElementById('product_type').value
				 +"&output_type=" + document.getElementById('output_type').value 
				 +"&product_group=" + document.getElementById('product_group').value
				 +"&supplier=" + document.getElementById('supplier').value
				 +"&foreign_code=" + document.getElementById('foreign_code').value 
				 +"&set_name=" + document.getElementById('set_name').value
				 +"&product_name=" + document.getElementById('product_name').value
				 +"&description=" + document.getElementById('description').value 
				 +"&price=" + document.getElementById('price').value
				 +"&personalizable=" + document.getElementById('personalizable').value
				 +"&key_words=" + document.getElementById('key_words').value 
				 +"&multifield=" + document.getElementById('multifield').value
				 +"&photo_upload=" + document.getElementById('photo_upload').value
				 +"&is_active=" + document.getElementById('is_active').value
				 +"&p_max_length=" + document.getElementById('p_max_length').value
				 +"&default_personalizable=" + document.getElementById('default_personalizable').value
				 +"&new_personalization=" + document.getElementById('new_personalization').value
				 +"&country_hosted=" + document.getElementById('country_hosted').value
				 +"&favorite_count=" + document.getElementById('favorite_count').value
				 +"&rating_count=" + document.getElementById('rating_count').value
				 +"&country_hosted=" + document.getElementById('country_hosted').value
				 ,true);
	xmlhttp.send();  
}
}

//------------------------------------------------------------------------------------------------------------------------------------------

function window_open(url) {
    var myWindow = window.open("../login/login_check.php?url=" + url, "", "width=660, height=310, scrollbars = 0, titlebar=0, toolbar=0");
}

function return_querey()
{
	document.getElementById("spriner").style.display = 'none';
	document.getElementById('button').disabled = false;
}
//------------------------------------------------------------------------------

function search_querey()
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

  var url="Product_main_ajax.php?log=todbjssearch";
  
  
  
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
				 ,true);
	xmlhttp.send();  
}
}

//--------------------------------------------------------------------------------------------------------------

function mapping_querey()
{
	
	 if(document.getElementById('product_id').value == ""){
		alert_str("product_id");
	}
	else if(document.getElementById('category_item').value == ""){
		alert_str("category_item");
	}
	else if(document.getElementById('rating_count').value == ""){
		alert_str("rating_count");
	}
	else if(isNaN(document.getElementById('rating_count').value)){
		alert("Rating Count should have only numbers");
	}
	
   
	else{
			
  var url="Product_main_ajax.php?log=todbjsmapping";
  
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
				 +"&product_id="+document.getElementById('product_id').value
				 +"&rating_count=" + document.getElementById('rating_count').value
				 +"&category_item=" + document.getElementById('category_item').value
				 ,true);
	xmlhttp.send();  
}
}

//---------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------

function update_querey()
{
	
	if(document.getElementById('product_id').value == ""){
		alert("First of all Lord the data");
	}
	else if(document.getElementById('product_type').value == ""){
		alert_str("product_type");
	}
	else if(document.getElementById('output_type').value == ""){
		alert_str("output_type");
	}
	else if(document.getElementById('product_group').value == ""){
		alert_str("product_group");
	}
	else if(document.getElementById('supplier').value == ""){
		alert_str("supplier");
	}
	else if(document.getElementById('set_name').value == ""){
		alert_str("set_name");
	}
	else if(document.getElementById('product_name').value == ""){
		alert_str("product_name");
	}
	else if(document.getElementById('price').value == ""){
		alert_str("price");
	}
	else if(isNaN(document.getElementById('price').value)){
		alert("Price should have only numbers");
	}
	else if(isNaN(document.getElementById('favorite_count').value)){
		alert("Favorite Count should have only numbers");
	}
	else if(isNaN(document.getElementById('rating_count').value)){
		alert("Rating Count should have only numbers");
	}
	else if(isNaN(document.getElementById('p_max_length').value)){
		alert("Personalization Max Length should have only numbers");
	}
	

	else{
			
  var url="Product_main_ajax.php?log=todbjsupdate";
  
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
				 +"&product_id="+document.getElementById('product_id').value
				 +"&product_type="+document.getElementById('product_type').value
				 +"&output_type=" + document.getElementById('output_type').value 
				 +"&product_group=" + document.getElementById('product_group').value
				 +"&supplier=" + document.getElementById('supplier').value
				 +"&foreign_code=" + document.getElementById('foreign_code').value 
				 +"&set_name=" + document.getElementById('set_name').value
				 +"&product_name=" + document.getElementById('product_name').value
				 +"&description=" + document.getElementById('description').value 
				 +"&price=" + document.getElementById('price').value
				 +"&personalizable=" + document.getElementById('personalizable').value
				 +"&key_words=" + document.getElementById('key_words').value 
				 +"&multifield=" + document.getElementById('multifield').value
				 +"&photo_upload=" + document.getElementById('photo_upload').value
				 +"&is_active=" + document.getElementById('is_active').value
				 +"&p_max_length=" + document.getElementById('p_max_length').value
				 +"&default_personalizable=" + document.getElementById('default_personalizable').value
				 +"&new_personalization=" + document.getElementById('new_personalization').value
				 +"&country_hosted=" + document.getElementById('country_hosted').value
				 +"&favorite_count=" + document.getElementById('favorite_count').value
				 +"&rating_count=" + document.getElementById('rating_count').value
				 +"&country_hosted=" + document.getElementById('country_hosted').value
				 ,true);
	xmlhttp.send();  
}
}

//---------------------------------------------------------------------------------------------------------------------------------