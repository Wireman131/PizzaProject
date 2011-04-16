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
}

//validate phone number/////////////////////////////////////////////////
$temp = $_POST['customerPhone'];
echo $temp . " is the phone number";
if($temp == ''){
$customerPhoneError = "Please Enter Phone Number";
$isValid = false;
}
elseif(!preg_match("/^([\(]{1}[0-9]{3}[\)]{1}[\.| |\-]{0,1}|^[0-9]{3}[\.|\-| ]?)?[0-9]{3}(\.|\-| )?[0-9]{4}$/",$temp)){
$isValid = false; echo $temp . " is the phone number you entered";
$customerPhoneError = "Phone Number Format: 1234567890, no punctuation";
} 
else {
$customerPhone = $temp; echo $temp . " is the phone number you entered";

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
}

/////////////////////////////////////////////////////////////////////////
//if all of these tests have passed, then the form is ready to
//redirect to validate.inc.php
if($isValid){
echo "is valid";
header("Location: index.php?pid=validate"); 
}
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

