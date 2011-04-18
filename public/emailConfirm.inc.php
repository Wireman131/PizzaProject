<?php
@session_start();
/*
	* Swiftmailer email notification of order
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
function cleanUserData($value){  // use this to clean values prior to query
	return mysql_real_escape_string(trim(strip_tags($value)));
}  

date_default_timezone_set('America/Detroit');
/*
 * perhaps calling Date once will be enough
 * 
*/
$timeOfOrder = Date("l, F j, Y, g:i a");
$timeOfDelievery = Date("l, F j, Y, g:i a", strtotime("+30 minutes"));
$_SESSION['timeOfOrder'] = $timeOfOrder;
$_SESSION['deliveryTime'] = $timeOfDelievery;

/*
 * Bring in emailBody.php - Display results to browser.  If the email
 * was successful there will be notification at the bottom of the page.
 */
include 'emailBody.php';

//exit(); // temporary block of the emailer for testing purposes

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
$message->setSubject('Tony Gaudio, Pizza Order Confirmation');

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
$_SESSION['customerEmail'] => $_SESSION['customerName']));
  //'wireman131@chartermi.net' => 'Anthony Gaudio'));
/*
 * Bounce path for messages that can not be delivered, or a Reply To address.
 */
$message->setReturnPath('tonyforschool@gmail.com');
/*
 * Set the body of the message, followed by the format, in this case 'text/html'
 */

$emailConfirm = "<img src='http://localhost:8080/PizzaProject/images/header.png' />";
$emailConfirm .= "<hr><h3>Order Confirmation: " . $_SESSION['orderSummary'] . " </h3>";
$emailConfirm .= "<h4>Time of order:" . $_SESSION['timeOfOrder'] . "</h4>";
$emailConfirm .= "<h4>" . $_SESSION['delivery'] . $_SESSION['deliveryTime'] . "</h4><br/>";
$emailConfirm .= "<h4>For : " . $_SESSION['customerName'] . "</h4><br/>";
$emailConfirm .= "<h4>Please be ready to pay $" . $_SESSION['orderTotal'] . " with "
	. $_SESSION['payMethod'] . "</h4><br/>";
$emailConfirm .= "<h4>Your Coupon Value : " . $_SESSION['couponValue'] . "<br/>";
$emailConfirm .= "<h2>Thank You For Your Order!!</h2>";
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
  




