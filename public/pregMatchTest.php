<?php
$tests = array("a","ab",1,12);
foreach ($tests as $item) {
	if(preg_match("/[a-z]{2}|[0-9]{2}/",$item)) {echo $item;}
}
?>
