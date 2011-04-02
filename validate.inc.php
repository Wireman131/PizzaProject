<?php
/*
	* Validate that user is human - captcha container 
	*
	* Description Long
	*
	* @author			Tony Gaudio, David Sullivan
	* @category   ANM293
	* @package    PizzaProject
	* @version    1
	* @link				git@github.com:Wireman131/PizzaProject
	* @link       git@github.com:teamsullivango/PizzaProject
	* @since      Mar 11, 2011-2011
*/
@session_start();
//generate path to Respect Validation library
//$rvl = 'Respect' . SLASH . 'Validation' . SLASH . 'Validator.php';
//require('$rvl');

//print_r($_POST);
/*
 * Pull in posted variable from the form, test them, then set session variables
 * accrodingly. 
 */
/*$formFields = Array('customerName'=>'',
	'address'=>'',
	'billingAddress'=>'',
	'customerPhone'=>'',
	'email'=>'',
	'payMethod'=>'',
	'emailCoupon'=>'',
	'orderSummary'=>'',
	'orderTotal'=>'',
	'javascript'=>''
);
for ($i=0;$i<count($formFields);$i++){
	$_SESSION[$formFields[$i]] = $_POST[$formFields[$i]];
	echo $_SESSION[$formFields[$i]]; 
	$temp = ob_get_contents();
	echo $temp . " " . $i . " what is going on";
}
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
if (!isset($_SESSION['customerPhone'])){
  $_SESSION['customerPhone'] = $_POST['payMethod'];
}
if (!isset($_SESSION['payMethod'])){
  $_SESSION['payMethod'] = $_POST['payMethod'];
}
if (!isset($_SESSION['emailCoupon'])){
  $_SESSION['emailCoupon'] = $_POST['couponCode'];
}
$val = $_SESSION['emailCoupon'];
if (!isset($_SESSION['couponValue'])){
if($val == "twitter2"){
   $_SESSION['couponValue'] = "Your Coupon equals 2 bucks off!<br/>";
}else if ($val == "springbreak"){
   $_SESSION['couponValue'] = "Your Coupon equals 1 buck off!</br>";
}else if ($val == "freepizza"){
   $_SESSION['couponValue'] = "Coupon equals add 2 bucks sucker!<br/>Only
   a complete fool would think that we would give you FREE PIZZA!<br/>";
} else {
   $_SESSION['couponValue'] = "Coupon equals nothing";
     }}
     
if (!isset($_SESSION['orderSummary'])){
  $_SESSION['orderSummary'] = $_POST['orderSummary'];
} 
if (!isset($_SESSION['orderTotal'])){
  $_SESSION['orderTotal'] = $_POST['orderTotal'];
}
 
if (isset($_POST['deliveryBox'])){
  $_SESSION['delivery'] = "Pizza will be delivered around ";
} else {
  $_SESSION['delivery'] = "Pizza will be ready for pickup around ";
}
//$_SESSION['address'] = "123 Main Street";
//$_SESSION['billingAddress'] = "321 South Main Street";
//$_SESSION['email'] = "wireman131@wireman131.com";
//$_SESSION['order'] = "1 Large Pizza with: Pepperoni, Green Olive, Jalepeno,
	//				Bacon.  Plus one order of breadsticks.";
//$_SESSION['payMethod'] = "Cash";
//$_SESSION['emailCoupon'] = "None";

//////////////////////////////////////////////////////////////////////////////////////////////////
if(!$isValid){
	include('order.inc.php');
}





function inputValidated(){

/*
 * Begin section that will display a custom built captcha
 */
echo"<div id='pizza'>Real User Validation<br/>";

echo"<div id='validate'>Real User Validation<br/>";

echo $_SESSION['customerName'] . " Please confirm that you are human!<br/><br/>\n";
echo "<div id='captcha'>";
require 'captcha.php';
echo "</div><p>WTF!?!?! I Can't Read This!<br/></p>
<form><button type='submit' onclick=\"newCaptcha();return true\">Reload</button>
<input type=\"hidden\" name=\"pid\" value=\"validate\">
</form></div>";
}

?>
