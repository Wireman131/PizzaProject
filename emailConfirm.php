<?php
session_start();
/*
 * Pull in all session variables that were set on the order form sucess page.
 */
$_SESSION['firstName'] = "Tony";
$_SESSION['lastName'] = "Gaudio";
$_SESSION['address'] = "123 Main Street";
$_SESSION['billingAddress'] = "321 South Main Street";
$_SESSION['email'] = "j";
function goBack(){
  //echo"Fail! <br/> Form Values Are No Good!!<br/>Try Again!";
  header('Location: pizza.php');
}
/*
Validate all submitted fields to make sure they are compliant...
firstName
lastName
address
billingAddress
email
payMethod
emailCoupon
timeOfOrder 
*/
if(isset($_SESSION['firstName'])){
  $firstName = $_SESSION['firstName'];
} else {
  goBack();
}
if(isset($_SESSION['lastName'])){
  $lastName = $_SESSION['lastName'];
} else {
  goBack();
}
if(isset($_SESSION['address'])){
  $address = $_SESSION['address'];
} else {
  goBack();
}
if(isset($_SESSION['billingAddress'])){
  $billingAddress = $_SESSION['billingAddress'];
   } else {
  goBack();
}
if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
   } else {
  goBack();
}
  echo "Hello " . $firstName ." " . $lastName;
  echo "<br/>Your Address " . $address;
  echo"<br/>Billing Address " . $billingAddress;
  echo"<br/>Email Address " . $email;


/*
 * This is where the SwiftMailer will work it's magic and compose a HTML based 
 * to send as a confirmation...
 */






