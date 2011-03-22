<?php 
@session_start();
?>

<div id='confirmEmail'>
<div id='container'>
<div id='header'><img src='images/header.png'/></div>
<div id='hElement'></div>
<div id='content'>
<div id='orderSummary'>Order Summary for: <?php 
echo $_SESSION['customerName'] . " :<br/><br/>";
echo "Customer Email : " .$_SESSION['email'] . " <br/><br/>";
echo $_SESSION['orderSummary'] . "<br/><br/>";
echo "Order processed At :" . $_SESSION['timeOfOrder'] . "<br/><br/>";
echo $_SESSION['delivery'] . $_SESSION['deliveryTime'] . "<br/><br/>";
echo "Customer Address : " . $_SESSION['address'] . "<br/>";
echo "Billing Address : " . $_SESSION['billingAddress'] . "<br/>";
echo "Please be ready to pay with " . $_SESSION['payMethod'] . "<br/>";
echo "Value of your coupon : $0.00 - Sorry, coupon code " . $_SESSION['emailCoupon'] . " is expired!<br/>";
echo "Total amount for your order : $" . $_SESSION['orderTotal'] . "<br/>";
echo "Thank You!! Please Visit Again!<br/>";

    ?>
    
    
    </div>
</div>
</div>
<div id='footer'>&copy; 2011 &mdash; <strong>Tony & Dave's Pizza</strong></div>
</div>
