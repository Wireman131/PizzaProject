<?php
/*
 * This simulates the "Pizza Order Form" page. 
 * Replace with the actual code..
 * 
 */
//print_r($_POST);
 //unset($_SESSION['pid']);
ob_start();
echo"<div id='pizza'>pizza page<br/>";
echo"order form will go here<br/><br/>\n";
echo "<div id='captcha'>";
require 'captcha.php';
echo "</div><p>WTF!?!?! I Can't Read This!<br/></p>
<form><button type='submit' onclick=\"newCaptcha();return true\">Reload</button>
<input type=\"hidden\" name=\"pid\" value=\"validate\">
</form></div>";
//ob_end_flush();
?>

</body>
</html>