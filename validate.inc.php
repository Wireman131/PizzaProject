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
//$_SESSION['address'] = "123 Main Street";
//$_SESSION['billingAddress'] = "321 South Main Street";
//$_SESSION['email'] = "wireman131@wireman131.com";
//$_SESSION['order'] = "1 Large Pizza with: Pepperoni, Green Olive, Jalepeno,
	//				Bacon.  Plus one order of breadsticks.";
//$_SESSION['payMethod'] = "Cash";
//$_SESSION['emailCoupon'] = "None";

//////////////////////////////////////////////////////////////////////////////////////////////////



/*
 * Begin section that will display a custom built captcha
 */

echo"<div id='validate'>Real User Validation<br/>";

echo $_SESSION['customerName'] . " Please confirm that you are human!<br/><br/>\n";
echo "<div id='captcha'>";
require 'captcha.php';
echo "<form><button type='submit' onclick=\"newCaptcha();return true\">Reload</button>
<input type=\"hidden\" name=\"pid\" value=\"validate\">
</form></div>";

?>
