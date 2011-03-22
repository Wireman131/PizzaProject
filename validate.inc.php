<?php
/*
 * This simulates the "Pizza Order Form" page. 
 * Replace with the actual code..
 * 
 */
@session_start();
//print_r($_POST);
//echo "<br/><br/>";

//echo "Welcome " . $_POST['name'];
/*
 * Sample - Temporary Data for testing:
 */
if (!isset($_SESSION['customerName'])){
  $_SESSION['customerName'] = $_POST['customerName'];
} 
if (!isset($_SESSION['address'])){
  $_SESSION['address'] = $_POST['address'];
} 
if (!isset($_SESSION['billingAddress'])){
  $_SESSION['billingAddress'] = $_POST['billingAddress'];
}
if (!isset($_SESSION['email'])){
  $_SESSION['email'] = $_POST['email'];
} 
if (!isset($_SESSION['payMethod'])){
  $_SESSION['payMethod'] = $_POST['payMethod'];
}
if (!isset($_SESSION['emailCoupon'])){
  $_SESSION['emailCoupon'] = $_POST['couponCode'];
}
if (!isset($_SESSION['orderSummary'])){
  $_SESSION['orderSummary'] = $_POST['orderSummary'];
} 
if (!isset($_SESSION['orderTotal'])){
  $_SESSION['orderTotal'] = $_POST['orderTotal'];
}

if (isset($_POST['deliveryBox'])){
  $_SESSION['delivery'] = "Pizza will be delivered around ";
} else {
  $_SESSION['delivery'] = "Pizza will be ready for pickup ";
}

//$_SESSION['address'] = "123 Main Street";
//$_SESSION['billingAddress'] = "321 South Main Street";
//$_SESSION['email'] = "wireman131@wireman131.com";
//$_SESSION['order'] = "1 Large Pizza with: Pepperoni, Green Olive, Jalepeno,
	//				Bacon.  Plus one order of breadsticks.";
//$_SESSION['payMethod'] = "Cash";
//$_SESSION['emailCoupon'] = "None";


//print_r($_SESSION);

echo"<div id='pizza'>Real User Validation<br/>";
echo $_SESSION['customerName'] . " Please confirm that you are human!<br/><br/>\n";
echo "<div id='captcha'>";
require 'captcha.php';
echo "</div><p>WTF!?!?! I Can't Read This!<br/></p>
<form><button type='submit' onclick=\"newCaptcha();return true\">Reload</button>
<input type=\"hidden\" name=\"pid\" value=\"validate\">
</form></div>";

 ?>