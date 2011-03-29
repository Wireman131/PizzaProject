<?php
/*
 	* CAPTCHA form module - self contained
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
//print_r($_POST);

$image="default";
error_reporting(E_ALL ^ E_NOTICE);
/*
 * Since this is s self submitting form we need to check to see if the form is
 * being shown for the first time, or being shown as a result of the form being
 * submitted.
 */
if(!isset($_POST['submit'])){
 
  echo"<form method=\"post\" action=\"index.php?pid=validate\">\n";
  echo"<table border=\"0\" cellspacing=\"3\" cellpadding=\"3\">\n";
  echo"<tr><td>Type The Letters You See Below Into The Box</td></tr>\n";
  echo"<tr><td align=\"center\"><img src=\"image.php\"></td></tr>\n";
  /*
   * Image is dynamically created by specifiying image.php as the source of the
   * image.
   */
  echo"<tr><td><input type=\"text\" name=\"image\" class=\"auto-focus\"></td>
  			</tr>\n";
  echo"<tr><td><input type=\"submit\" name=\"submit\" value=
  		\"Check CAPTCHA\" ></tr>\n";
  echo"</table></form>\n";
  /*
   * flush the output buffer - push to browser
   */
  ob_flush();
}else{
  /*
   * clean ouput buffer so that the following header calls will work.
   */
  ob_end_clean();
  /*
   * set $image to the users guess at the captcha solution.
   */
  $image = $_POST['image'];
  /*
   * Set ssl private key, we are going to use this to decrypt the encrypted
   * session variable that we pushed to the users machine when we displayed
   * the captcha image.
   */
 $privateKey = "-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQDXPiEI69TtMmMefTwh/0u4k4C4TEVk5kwXGa4SgR+CVbhHSRKs
+5s1a8/VOOtrKWljR2fa3+bIZYqMnD2vxRu0VMlk0fcusS4vaqMId8V0aFakpULz
GUcGUqzhd7w46l3p7vLRTNpoy9W3QnJ2JZYRhX0o9FJdOTf/vXNsqScPOwIDAQAB
AoGAK6on63ZkIKZbI0FGpKL0yoHp1/lpDnoFr53/CTP2n2siUhvJ1RvJtcGkTN4a
LAgfoAtJT0aiu76Vp8a+YNz8rG5T0qQ/zXIgxBFSLKtYO0/DbOcvVE3bZ3jxc0go
vhW9w2buo3OsWaQfxSKs7iIxzEWVbsKY2mThL++fd3XU5AECQQDtRVpnFLJ7dvZb
as4p924UDfoVFvw92cbQacX1FfeG+a1by84vKSecPalwMaTbN9U8u271jtVg/p3f
gjpdhIYBAkEA6DukIbSuvLrvdrtWcfzNd99xMJB8spKPAe05ZvWyxhQEGs480XvG
xT0bHkC5lbJGsapm1KjmkR9GjBlhfA4tOwJBAMaffhQ4oUj1xzmz6S38cWvcX3N0
MGhefC5PvWVzpCibrmHf9JRKMVx7yfGfvU++J4WVqkdp8Hon62UFkXJj1AECQCmq
OaJKdmcp6riUl8fPoVV2YyphYd3v6XRhCUFtp2teP/ZHNiYnXNwaQHlHB4TR/Vj2
x4gz3VoAEHomO5U0Pe0CQHpPFqGSU22EmYr1Y0g6yj1rQ1KLrEVkqAbwPVOTVHG9
sLNea3JU8i95cQGgQOsujwzc2TbXcAkM7zjUTKoeq9Q=
-----END RSA PRIVATE KEY-----";
 /*
  * Decode the base64 encoding on the solution session variable that we did
  *  before storing it in session
  */
  $encryptedData = base64_decode($_SESSION['solution']);
  /*
   * decrypt the solution so we can compare it to the users guess
   */
  openssl_private_decrypt($encryptedData, $solution, $privateKey);
  
  /*
   * compare the guess with the actual solution and reroute accordingly.
   */
  if($image == $solution){
   header("Location: index.php?pid=emailConfirm");    
     }else{
   header("Location: index.php?pid=validate");
   
  }
}



?>