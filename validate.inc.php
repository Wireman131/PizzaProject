<?php
/*
 * This simulates the "Pizza Order Form" page. 
 * Replace with the actual code..
 * 
 */
//print_r($_POST);
/*
 * Sample - Temporary Data for testing:
 */
session_start();
$_SESSION['firstName'] = "Tony";
$_SESSION['lastName'] = "Gaudio";
$_SESSION['address'] = "123 Main Street";
$_SESSION['billingAddress'] = "321 South Main Street";
$_SESSION['email'] = "wireman131@wireman131.com";
$_SESSION['order'] = "1 Large Pizza with: Pepperoni, Green Olive, Jalepeno,
					Bacon.  Plus one order of breadsticks.";
$_SESSION['payMethod'] = "Cash";
$_SESSION['emailCoupon'] = "None";




echo"<div id='pizza'>Real User Validation<br/>";
echo"Please confirm that you are human!<br/><br/>\n";
echo "<div id='captcha'>";
require 'captcha.php';
echo "</div><p>WTF!?!?! I Can't Read This!<br/></p>
<form><button type='submit' onclick=\"newCaptcha();return true\">Reload</button>
<input type=\"hidden\" name=\"pid\" value=\"validate\">
</form></div>";
//ob_end_flush();
if ($_SESSION['captchaGood'] == 'true'){
  $_SESSION['captchaGood'] = 'false';
  //header("Location: emailConfirm.php");
  ?>
  <script language="JavaScript">

window.location = 'http://localhost:8080/PizzaProject/emailConfirm.php';
</script>
<?php } ?>