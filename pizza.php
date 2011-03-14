<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


<script type="text/javascript">
function newCaptcha(){
  //alert("WTF Holmes!");

//  Create an XMLHttpRequest object
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
// Create the function to be executed when the server response is ready
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
		document.getElementById("captcha").innerHTML=xmlhttp.responseText;
	}
	}

xmlhttp.open("GET","captcha.php" ,true);
xmlhttp.send();
}

</script>
</head>

<body>


<?php
/*
 * This simulates the "Pizza Order Form" page. 
 * Replace with the actual code..
 * 
 */
echo"<div id='pizza'>pizza page<br/>";
echo"order form will go here<br/><br/></div>\n";
echo "<span id='captcha'>";
include 'captcha.php';
echo "</span>WTF!?!?! I Can't Read This!<br/>
<form><button onclick=\"newCaptcha();\">Reload</button></form>";
?>

</body>
</html>