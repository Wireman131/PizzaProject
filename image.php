<?php
/* 
 	* Code to create the CAPTCHA image
 	* also creates the 'solution' to the CAPTCHA, encrypts it, and saves it to
 	* a session variable. 
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
session_start();
/*
 * Generate a string with a length of $length using $characters as possible
 * parts.
 */
function stringGen($length){
  $characters = "abcdefhkmnrstuvwxyz2345678";
  srand((double)microtime()*1000000);
  $str="";
  $i = 0;
    while($i <= $length){
      $num = rand() % 26;
      $tmp = substr($characters,$num,1);
      $str = $str . $tmp;
      $i++;
    }
    return $str;
}
/*
 * Just as it says, this fuction will generate a random font, and return the 
 * path to that font for usage in the imagettftext fuction.
 */
function randomFont(){
  $fonts = array("ASafePlacetoFall.ttf","AYearWithoutRain.ttf",
                "Herkules.ttf","guanine.ttf");
  $randFont = $fonts[rand(0,3)];
  $fontPath = "captcha/fonts/" .$randFont;
  return $fontPath;
}


/*
 * Generate Random image from background image folder
 */

$imgPath = "captcha/backgrounds/bg". rand(1,5). ".jpg";

$img = imagecreatefromjpeg($imgPath);
/*
 * Set color variables for later use
 */
$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img,0,0,0);
$red = imagecolorallocate($img,138,6,6);
$pink = imagecolorallocate($img, 200, 0, 150);


/*
 * Parameters for imagettftext fuction
 */
$solution = "";
$size = 25;
$angle = 0;
$x = 20;
$y = 40;
//@todo randomize the color and angle
$i = 0;
$color = $red;
$wordLength = rand(4,6);
while($i <= $wordLength){
  $text = stringGen(0);
  $solution = $solution . $text;
  $angle = rand(-30,30);
  $fontPath = randomFont();
  imagettftext($img, $size, $angle, $x, $y, $color, $fontPath, $text);
  $x=$x+40;
  $i++;
}
/*
 * Public key used to encrypt the solution before base64 encoding and
 * storing it to a session variable.
 */
$pubKey = "-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDXPiEI69TtMmMefTwh/0u4k4C4
TEVk5kwXGa4SgR+CVbhHSRKs+5s1a8/VOOtrKWljR2fa3+bIZYqMnD2vxRu0VMlk
0fcusS4vaqMId8V0aFakpULzGUcGUqzhd7w46l3p7vLRTNpoy9W3QnJ2JZYRhX0o
9FJdOTf/vXNsqScPOwIDAQAB
-----END PUBLIC KEY-----";
$encryptedData = "";
/*
 * encrypt the solution using above key
 */
openssl_public_encrypt($solution, $encryptedData, $pubKey);
/*
 * apply base 64 encoding to the encrypted solution
 */
$encryptedData = base64_encode($encryptedData);
/*
 * Store solution for later use
 */
$_SESSION['solution'] = $encryptedData;
/*
 * Push newly created captcha image to the buffer, it will then be pushed 
 * to the browser.
 */
header("Content-type: image/jpg");
imagejpeg($img);
imagedestroy($img);
exit();
?>