<?php
echo "setsessionv's is running";
if (!isset($_SESSION['payMethod'])){
  $_SESSION['payMethod'] = $_POST['payMethod'];
}
if (!isset($_SESSION['emailCoupon'])){
  $_SESSION['emailCoupon'] = $_POST['couponCode'];
}
$val = $_SESSION['emailCoupon'];
if (!isset($_SESSION['couponValue'])){
if($val == "twitter2"){
   $_SESSION['couponValue'] = "Your Coupon equals 2 bucks off!<br/>";
}else if ($val == "springbreak"){
   $_SESSION['couponValue'] = "Your Coupon equals 1 buck off!</br>";
}else if ($val == "freepizza"){
   $_SESSION['couponValue'] = "Coupon equals add 2 bucks sucker!<br/>Only
   a complete fool would think that we would give you FREE PIZZA!<br/>";
} else {
   $_SESSION['couponValue'] = "No Coupon";
     }}
     
if (!isset($_SESSION['orderSummary'])){
  $_SESSION['orderSummary'] = $_POST['orderSummary'];
} 
if (!isset($_SESSION['orderTotal'])){
  $_SESSION['orderTotal'] = $_POST['orderTotal'];
}
 
if (isset($_POST['deliveryBox'])){
  $_SESSION['delivery'] = "Pizza will be delivered around ";
} else {
  $_SESSION['delivery'] = "Pizza will be ready for pickup around ";
}
