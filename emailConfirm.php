<?php
session_start();
/*
 * Pull in all session variables that were set on the order form sucess page.
 */

function cleanUserData($value){  // use this to clean values prior to query
	return mysql_real_escape_string(trim(strip_tags($value)));
}  
/*
 * Sample - Temporary Data for testing:
 */
$_SESSION['firstName'] = "Tony";
$_SESSION['lastName'] = "Gaudio";
$_SESSION['address'] = "123 Main Street";
$_SESSION['billingAddress'] = "321 South Main Street";
$_SESSION['email'] = "wireman131@wireman131.com";
$_SESSION['order'] = "1 Large Pizza with: Pepperoni, Green Olive, Jalepeno,
					Bacon.  Plus one order of breadsticks.";
$_SESSION['payMethod'] = "Cash";
$_SESSION['emailCoupon'] = "None";
date_default_timezone_set('America/Detroit');
/*
 * perhaps calling Date once will be enough
 * 
*/
$timeOfOrder = Date("l, F j, Y, g:i a");
$timeOfDelievery = Date("l, F j, Y, g:i a", strtotime("+30 minutes"));
$_SESSION['timeOfOrder'] = $timeOfOrder;
$_SESSION['deliveryTime'] = $timeOfDelievery;

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
deliveryTime
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

include 'emailBody.php';

exit(); // temporary block of the emailer for testing purposes

/*
 * This is where the SwiftMailer will work it's magic and compose a HTML based 
 * to send as a confirmation...
 */


include '/library/SwiftMailer/V4.0.6/lib/swift_required.php';


try {
  /*
   * Create the transport object using the smtp transport method, parameters:
   * mail host, port number, and 'ssl' sets Secure Socket Layers encryption.
   * Below that the email account username and password is set.
   * Store all of this information in the $transport variable
   */
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
  ->setUsername('tonyforschool')
  ->setPassword('advancedphp')  ;

  /*
   * Create the Mailer using your created Transport
   * Create new mailer object - Store it in $mailer variable
   */
$mailer = Swift_Mailer::newInstance($transport);
/*
 * Create an new instance of a message - store it in the $message variable
 */
$message = Swift_Message::newInstance();
/*
 * Get existing header information frm the message object
 */
$headers = $message->getHeaders();
/*
 * add text header information to the headers object - this is viewable if you
 * view the source of the email received.
 */
$headers->addTextHeader('ANM293', 'CNM-270');
/*
 * Set the subject of the message.
 */
$message->setSubject('Tony Gaudio, SWIFT Mailer 4.0.6');

/*
 * Set a From: address including a name - need to use array if more than one
 * from address, OR if you include a name.
 */
$message->setFrom(array('tonyforschool@gmail.com' => 'Tony Gaudio'));
$message->setReplyTo(array('tonyforschool@gmail.com' => 'Tony Gaudio'));
/*
 * Same thing goes for the To field, need to use array if more than one to
 * address, OR if you include a name.
 */
$message->setTo(array(
  'wireman131@chartermi.net' => 'Anthony Gaudio'));
/*
 * Bounce path for messages that can not be delivered, or a Reply To address.
 */
$message->setReturnPath('tonyforschool@gmail.com');
/*
 * Set the body of the message, followed by the format, in this case 'text/html'
 */
$emailConfirm = "<h1 style=\"color:red;text-align:center;\">Tony's Pizza!</h1>";
$emailConfirm .= "<hr><h3>Order Confirmation: " . $_SESSION['order'] . " </h3>";
$emailConfirm .= "<h4>Time of order:" . $_SESSION['timeOfOrder'] . "</h4>";
$emailConfirm .= "<h4>Estimated Time Of Delivery : " . $_SESSION['deliveryTime']
. "<br/>";
$message->setBody($emailConfirm, 'text/html');
/*
 * Create result variable - assign it the result of the send method of the 
 * mailer object.  result will be a number - 0 means the message failed, any
 * other digit tells you how many messages were sucesfully delivered.
 */
$result = $mailer->send($message, $failures);  

if (!$result)
{
  echo "Failures:";
  print_r($failures);
  /*
   * Quoted from the support forums -->
   * The only type of failures that will go into that array are immediate 
   * failures such as "Relay denied", "Malformed address", 
   * "Service unavailable" and such like errors. <--- */
  trigger_error('Send Error Message From IF Statement : ' . $failures,E_USER_NOTICE);
} else {
  echo "Another amazing success story.<br/>";
 /*
 * Output to browser the total (%d = decimal) sent messages.
 */
  printf("Sent %d messages\n", $result);
}

/*
 * Catch block for the above try.  If there is an exception anywhere above it
 * will be assigned to $e
 */
  } catch(Exception $e)
  {
  /*
   * I'm not sure if this is the proper way to do this, BUT it works.
   * If there is an exception caught above, send it to the log using this.
   */
  trigger_error('Send Error Message: ' . $e,E_USER_NOTICE);
  }
  
ob_end_flush();



