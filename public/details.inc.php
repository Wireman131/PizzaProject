<?php
$id = $_GET['id'];
try {
$dbh = new PDO('sqlite:../database/pizzaOrders.db'); //SQLite by default is UTF-8
$oe = "odd";
echo "<table class='results'>";

 //$dbh->query('select * from orders WHERE id = $id');
 $sql = "SELECT * FROM orders WHERE id=$id";

    /*** fetch into an PDOStatement object ***/
    $stmt = $dbh->query($sql);

    /*** echo number of columns ***/
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
  $xid = $row['id'];
  $name = $row['name'];
  $email = $row['email'];
  $orderSummary = $row['orderSummary'];
  $timeOfOrder = $row['timeOfOrder'];
  $address = $row['address'];
  $billingAddress = $row['billingAddress'];
  $payMethod = $row['payMethod'];

 
  echo "<tr><td>Details For Order Number: $xid</td></tr><tr><td>For: $name</td></tr>
  			<tr><td>Time Of Order: $timeOfOrder</td></tr><tr><td>Address :$address
  			</td></tr><tr><td>Order Summary: $orderSummary</td></tr>
  			<tr><td>Billing Address: $billingAddress</td></tr>
  			<tr><td>Payment Method :$payMethod</td></tr>";
  
  echo "<tr><td><a href='index.php?pid=manageOrders'>Return To Manager Screen</a></td></tr>";
  echo "</table>";


$dbh = NULL;
}
catch(PDOException $e)
{
die($e->getMessage());
}
