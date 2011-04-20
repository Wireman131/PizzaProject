<?php
@session_start();

try {
$dbh = new PDO('sqlite:../database/pizzaOrders.db'); //SQLite by default is UTF-8
$oe = "odd";
echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Time Of Order</th>
			<th>Address</th><th>Processed</th></tr>";
foreach( $dbh->query('select * from orders') as $row ){
  $id = $row['id'];
  $name = $row['name'];
  $email = $row['email'];
  $orderSummary = $row['orderSummary'];
  $timeOfOrder = $row['timeOfOrder'];
  $address = $row['address'];
  $billingAddress = $row['billingAddress'];
  $payMethod = $row['payMethod'];
  $processed = $row['processed'];
  if ($processed == 0){
    $processed = "No";
  } else if ($processed == 1){
    $processed = "Yes";
  }
if ($oe == "odd"){ 
echo "<tr class='odd'><td><a href='index.php?pid=details&id=$id'>$id</a></td>
			<td>$name</td><td>$timeOfOrder</td><td>$address</td><td>$processed</td></tr>";
$oe = "even";
} else {
echo "<tr class='even'><td><a href='index.php?pid=details&id=$id'>$id</a></td>
<td>$name</td><td>$timeOfOrder</td><td>$address</td><td>$processed</td></tr>";
$oe = "odd"; 
}
}
  echo"</table><table>";
  echo "<tr><td><span class='black'><a href='index.php'>Return To Order Screen</a>
  </span></td></tr></table>";
$dbh = NULL;
}
catch(PDOException $e)
{
die($e->getMessage());
}