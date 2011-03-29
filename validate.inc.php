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
$rvl = 'Respect' . SLASH . 'Validation' . SLASH . 'Validator.php';
require('$rvl');

//print_r($_POST);
/*
 * Pull in posted variable from the form, test them, then set session variables
 * accrodingly. 
 */
$formFields = Array('customerName','address','billingAddress','email','payMethod','emailCoupon','orderSummary','orderTotal','javascript');
for ($i=0;$i<count($formfields);$i++){
	$_SESSION[$formFields[$i]] = $_POST[$formFields[$i]];
}
/*
}
if (!isset($_SESSION['customerName'])){
  
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
 */
if (isset($_POST['deliveryBox'])){
  $_SESSION['delivery'] = "Pizza will be delivered around ";
} else {
  $_SESSION['delivery'] = "Pizza will be ready for pickup around ";
}

if (isset($_POST['javascript'])){
  $_SESSION['javascript'] = $_POST['javascript'];


//$_SESSION['address'] = "123 Main Street";
//$_SESSION['billingAddress'] = "321 South Main Street";
//$_SESSION['email'] = "wireman131@wireman131.com";
//$_SESSION['order'] = "1 Large Pizza with: Pepperoni, Green Olive, Jalepeno,
	//				Bacon.  Plus one order of breadsticks.";
//$_SESSION['payMethod'] = "Cash";
//$_SESSION['emailCoupon'] = "None";


	//print_r($_SESSION);
	//
//if the javascript has been set, then the order has been placed
if($_SESSION['javascript']==true){
inputValidated();
}
else{
	//construct namespace path
	$rvnp = 'Respect' . SLASH . 'Validation' . SLASH . 'Validator.php';
	use $rvnp as v;

	//the javascript validation didn't fire, so we have to validate the user input.
	// check name is a name
	v::alpha()->validate(); 
$_SESSION['customerName'])){
  $_SESSION['customerName'] = $_POST['customerName'];
} 
$_SESSION['address'])){
  $_SESSION['address'] = $_POST['address'];
} 
$_SESSION['billingAddress'])){
  $_SESSION['billingAddress'] = $_POST['billingAddress'];
}
$_SESSION['email'])){
  $_SESSION['email'] = $_POST['email'];
} 

	// check address and billing address are present
	// check phone number is a number
	// check email address is an email address
	// if all check out call function that prints out the above
	// else redirect back to the form
	//
}




function inputValidated(){

/*
 * Begin section that will display a custom built captcha
 */

echo"<div id='pizza'>Real User Validation<br/>";
echo $_SESSION['customerName'] . " Please confirm that you are human!<br/><br/>\n";
echo "<div id='captcha'>";
require 'captcha.php';
echo "</div><p>WTF!?!?! I Can't Read This!<br/></p>
<form><button type='submit' onclick=\"newCaptcha();return true\">Reload</button>
<input type=\"hidden\" name=\"pid\" value=\"validate\">
</form></div>";
}

?>
