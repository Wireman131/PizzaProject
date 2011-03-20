<?php 
@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tony's Pizza Email Confirmation</title>
<style type="text/css">
#confirmEmail #container {
	position:relative;
	width:1000px;
	min-height:800px;
	background-color:#C00;
	color:black;
	margin:0 auto;
}
#confirmEmail #header {
	width:100%;
	min-height:150px;
	background-color:#090;
	text-align:center;
}
#confirmEmail #hElement {
	width:100%;
	min-height:25px;
	background-color:#000;
}
#confirmEmail #content {
	position:relative;
	width:750px;
	padding:25px;
	min-height:400px;
	margin:100px;
	background-color:#0C6;
}
#confirmEmail #orderSummary {
	font-family:georgia;
	font-weight:bold;
	width:600px;
	padding:50px;
	margin:25px;
	background-color:#FF9;
}
#confirmEmail #footer {
	width:1000px;
	height:25px;
	margin:0 auto;
	color:white;
	background-color:black;
	text-align:center;
}
</style>
</head>

<body>
<div id='confirmEmail'>
<div id='container'>
<div id='header'>Header Image Will Go Here</div>
<div id='hElement'></div>
<div id='content'>
<div id='orderSummary'>Order Summary for: <?php echo $_SESSION['firstName'] 
    . " " . $_SESSION['lastName'] . ":<br/><br/>";
    
    echo $_SESSION['order'] . "<br/><br/>Order processed At :" .
     $_SESSION['timeOfOrder'] . "<br/><br/>";
    echo "Estimated Delivery Time : " . $_SESSION['deliveryTime'] . "<br/><br/>";
    ?>
    
    
    </div>
</div>
</div>
<div id='footer'>&copy; 2011 &mdash; <strong>Tony's Pizza</strong></div>
</div>


</body>
</html>
