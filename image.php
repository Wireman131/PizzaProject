<?php
/* 
 * Code to create the CAPTCHA image
 * also creates the 'solution' to the CAPTCHA, encrypts it, and saves it to
 * a session variable. 
 */
session_start();
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
 * Choose Random font from list of 6 fonts
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

$pubKey = "-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDXPiEI69TtMmMefTwh/0u4k4C4
TEVk5kwXGa4SgR+CVbhHSRKs+5s1a8/VOOtrKWljR2fa3+bIZYqMnD2vxRu0VMlk
0fcusS4vaqMId8V0aFakpULzGUcGUqzhd7w46l3p7vLRTNpoy9W3QnJ2JZYRhX0o
9FJdOTf/vXNsqScPOwIDAQAB
-----END PUBLIC KEY-----";
$encryptedData = "";

openssl_public_encrypt($solution, $encryptedData, $pubKey);
$encryptedData = base64_encode($encryptedData);
$_SESSION['solution'] = $encryptedData;

header("Content-type: image/jpg");
imagejpeg($img);
imagedestroy($img);
exit();
?>