<?php
/*
 * CAPTCHA form module - self contained
 */
@session_start();
//ob_start();

$image="default";
error_reporting(E_ALL ^ E_NOTICE);
if(!$_POST['submit']){
 
  echo"<form method=\"post\" action=\"captcha.php\">\n";
  echo"<table border=\"0\" cellspacing=\"3\" cellpadding=\"3\">\n";
  echo"<tr><td colspan=2>Type The Letters You See Below Into The Box</td></tr>\n";
  echo"<tr><td colspan=2 align=\"center\">
  <img src=\"image.php\"></td></tr>\n";
  //echo"<tr><td>". $_session['solution'] . "</td></tr>\n";
  echo"<tr><td><input type=\"text\" name=\"image\"></td><td>&nbsp;</td></tr>\n";
  echo"<tr><td><input type=\"submit\" name=\"submit\" value=
  		\"Check CAPTCHA\"></td>&nbsp;<td>
  		
  		</td></tr>\n";
  echo"</table></form>\n";
  
}else{
  $image = $_POST['image'];
  
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
  $encryptedData = base64_decode($_SESSION['solution']);
  openssl_private_decrypt($encryptedData, $solution, $privateKey);
  
  
  if($image == $solution){
    header("Location: emailConfirm.php");
    
     }else{
    echo"Fail!";
  }
}

//ob_end_flush();

?>