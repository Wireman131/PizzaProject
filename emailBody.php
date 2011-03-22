<?php 
@session_start();
?>

<div id='confirmEmail'>
<div id='container'>
<div id='header'>Header Image Will Go Here</div>
<div id='hElement'></div>
<div id='content'>
<div id='orderSummary'>Order Summary for: <?php echo $_SESSION['customerName'] 
     . " :<br/><br/>";
    
    echo $_SESSION['orderSummary'] . "<br/><br/>Order processed At :" .
     $_SESSION['timeOfOrder'] . "<br/><br/>";
    echo "Estimated Delivery Time : " . $_SESSION['deliveryTime'] . "<br/><br/>";
    ?>
    
    
    </div>
</div>
</div>
<div id='footer'>&copy; 2011 &mdash; <strong>Tony's Pizza</strong></div>
</div>
