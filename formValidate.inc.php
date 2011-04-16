<?php

$isValid = true; //we'll assume that it's okay until we know better

//validate name, verify it's 2 letters or longer/////////////////////////////////////////////////
$temp = $_POST['customerName'];
if($temp == ''){
//if it's empty just tell them to fill it in
	$isValid = false;
	$customerNameError = "Please Enter Your Name";
}
elseif(!preg_match("/[a-zA-z]{2}/",$temp)){
//if it's there, but it's not Letters
	$isValid = false;
	$customerNameError = "Only Alphabetical Characters Please";
}
else {
	$customerName = $temp;
	$_SESSION['customerName'] = $temp;
}

//validate customerAddress/////////////////////////////////////////////////
$temp = $_POST['customerAddress']; 
if($temp == ''){
	$customerAddressError = "Please Enter Your Address";
	$isValid = false;
}
elseif(!preg_match("/^[0-9]+\s[a-zA-Z0-9]{3,}\s[a-zA-Z]{3,}\s[A-Z]{2}\s[0-9]{5}/",$temp)){
// "1 aaa aaa AA 12345" should pass
//elseif(!preg_match("/[a-z]{4,}/",$temp)){
	$isValid = false;
	$customerAddressError = "Address Format: 123 STREET CITY ST 12345";
} 
else {
	$customerAddress = $temp;
	$_SESSION['customerAddress'] = $temp;
}

//validate billing address/////////////////////////////////////////////////
$temp = $_POST['customerBillingAddress']; 
if($temp == ''){
	$customerBillingAddressError = "Please Enter Your Billing Address";
	$isValid = false;
}
elseif(!preg_match("/^[0-9]+\s[a-zA-Z0-9]{3,}\s[a-zA-Z]{3,}\s[A-Z]{2}\s[0-9]{5}/",$temp)){
// "1 aaa aaa AA 12345" should pass
//elseif(!preg_match("/[a-z]{4,}/",$temp)){
	$isValid = false;
	$customerBillingAddressError = "Address Format: 123 STREET CITY ST 12345";
} 
else {
	$customerBillingAddress = $temp; 
	$_SESSION['customerBillingAddress'] = $temp;
}

//validate phone number/////////////////////////////////////////////////
$temp = $_POST['customerPhone'];
if($temp == ''){
	$customerPhoneError = "Please Enter Phone Number";
	$isValid = false;
}
elseif(!preg_match("/^([\(]{1}[0-9]{3}[\)]{1}[\.| |\-]{0,1}|^[0-9]{3}[\.|\-| ]?)?[0-9]{3}(\.|\-| )?[0-9]{4}$/",$temp)){
	$isValid = false; //echo $temp . " is the phone number you entered";
	$customerPhoneError = "Phone Number Format: 1234567890, no punctuation";
} 
else {
	$customerPhone = $temp; 
	$_SESSION['customerPhone'] = $temp;
//echo $temp . " is the phone number you entered";
}

//validate email address/////////////////////////////////////////////////
$temp = $_POST['customerEmail']; 
if($temp == ''){
	$customerEmailError = "Please Enter Email Address";
	$isValid = false;
}
elseif(!validEmail($temp)){
	$isValid = false;
	$customerEmailError = "Email Format: email@host.tld";
} 
else {
	$customerEmail = $temp; 
	$_SESSION['customerEmail'] = $temp;
}

// set the rest of the session variables blindly
// we may want to do further verification in the
// future

if (!isset($_SESSION['payMethod'])){
  $_SESSION['payMethod'] = $_POST['payMethod'];
}
//calculate the pizza order totals     
//get size

echo "post     " . print_r($_POST) . "<br />";

echo "session        " . print_r($_SESSION) . "<br />";


// order Summary is
$orderSummary = $_POST['pizzaSize'];
// get price of pie size
switch($_POST['pizzaSize']){
case 'Small':
	$orderTotal = 8;
	break;
case 'Medium':
	$orderTotal = 10;
	break;
case 'Large':
	$orderTotal = 12;
	break;
case 'Extra Large':
	$orderTotal = 14;
	break;
case default:
	echo "oh crap, something's wrong";
}

//massive set of if's to check each topping until a more efficient method is devised. AKA, quick and dirty
if(isset($_POST['Pepperoni']){ 
	$orderSummary .= ", " . 'Pepperoni';
	$orderTotal += .50;
}
if(isset($_POST['Mushroom']){ 
	$orderSummary .= ", " .'Mushroom';
	$orderTotal += .50;
}
if(isset($_POST['Onion']){ 
	$orderSummary .= ", " . 'Onion';
	$orderTotal += .50;
}
if(isset($_POST['Green Peppers']){ 
	$orderSummary .= ", " . 'Green Peppers';
	$orderTotal += .50;
}
if(isset($_POST['Sausage'])){ 
	$orderSummary .= ", " . 'Sausage';
	$orderTotal += .50;
}
if(isset($_POST['Bacon']){ 
	$orderSummary .= ", " . 'Bacon';
	$orderTotal += .50;
}
if(isset($_POST['Jalapeno']){ 
	$orderSummary .= ", " . 'Jalapeno';
	$orderTotal += .50;
}
if(isset($_POST['Green Olive']){ 
	$orderSummary .= ", " . 'Green Olive';
	$orderTotal += .50;
}


// check coupon ///////////////////////////////////////////////////////////////////

if (isset($_POST['couponCode'])){
  $_SESSION['couponCode'] = $_POST['couponCode'];
}

switch ($_POST['couponCode']){
case 'twitter2':
	$orderTotal += -2;
	$_SESSION['couponValue'] = "Valid Coupon - 2 Bucks Off!";
	break;
case 'freepizza':
	$orderTotal += 2;
	$_SESSION['couponValue'] =	"Valid Coupon - Add 2 Bucks!<br/>No Such Thing As Free Pizza!!";
	break;
case 'springbreak':
	$orderTotal += -1;
	$_SESSION['couponValue'] = "Valid Coupon - 1 Buck Off!";
	break;
default:
	$_SESSION['couponValue'] = "No Coupon";
	break;
}



// check delivery /////////////////////////////////////////////////////////////////
if (isset($_POST['deliveryBox'])){
	$orderTotal += 2;
	$_SESSION['delivery'] = "Pizza will be delivered around ";
} else {
  $_SESSION['delivery'] = "Pizza will be ready for pickup around ";
}




if (!isset($_SESSION['orderSummary'])){
  $_SESSION['orderSummary'] = $_POST['orderSummary'];
} 
if (!isset($_SESSION['orderTotal'])){
  $_SESSION['orderTotal'] = $_POST['orderTotal'];
}

if($isValid){
//	header("Location: index.php?pid=validate"); 
}
else {
	
}
//}
//otherwise the pizza order form will proceed to load.


////////////////////////////////////////////////////////////////////////////////////////////////
//I found this at http://www.linuxjournal.com/article/9585?page=0,3
//not sure if it's okay to use it, so, please let me know

/**
 * Validate an email address.
 * Provide email address (raw input)
 * Returns true if the email address has the email 
 * address format and the domain exists.
 * */
function validEmail($email)
{
   $isValid = true;
    $atIndex = strrpos($email, "@");
    if (is_bool($atIndex) && !$atIndex)
   {
 $isValid = false;
    }
   else
    {
$domain = substr($email, $atIndex+1);
$local = substr($email, 0, $atIndex);
$localLen = strlen($local);
$domainLen = strlen($domain);
if ($localLen < 1 || $localLen > 64)
{
// local part length exceeded
    $isValid = false;
    }
    else if ($domainLen < 1 || $domainLen > 255)
    {
 // domain part length exceeded
    $isValid = false;
    }
    else if ($local[0] == '.' || $local[$localLen-1] == '.')
    {
 // local part starts or ends with '.'
    $isValid = false;
    }
    else if (preg_match('/\\.\\./', $local))
    {
 // local part has two consecutive dots
    $isValid = false;
    }
    else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
    {
 // character not valid in domain part
    $isValid = false;
    }
    else if (preg_match('/\\.\\./', $domain))
    {
 // domain part has two consecutive dots
    $isValid = false;
    }
    else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',str_replace("\\\\","",$local)))
   {
	// character not valid in local part unless 
  // local part is quoted
	if (!preg_match('/^"(\\\\"|[^"])+"$/',
	str_replace("\\\\","",$local)))
  {
    $isValid = false;
	}	
	}
	if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
  {
  // domain not found in DNS
  	$isValid = false;
  }
     }
  return $isValid;
  }
?>

