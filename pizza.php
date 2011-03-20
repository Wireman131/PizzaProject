<?php
/*
 * This simulates the "Pizza Order Form" page. 
 * Replace with the actual code..
 * 
 */
//print_r($_POST);
 
ob_start();
echo"<div id='pizza'>pizza page<br/>";
echo"order form will go here<br/><br/></div>\n";
echo "<span id='captcha'>";
include 'captcha.php';
echo "</span>WTF!?!?! I Can't Read This!<br/>
<form><button onclick=\"newCaptcha();\">Reload</button></form>";
ob_flush();
?>

</body>
</html>