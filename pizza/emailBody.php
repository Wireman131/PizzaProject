<?php 
/*
	* Confirmation page to display to screen and send to Swiftmailer 
	*
	* Description Long
	*
	* @author			Tony Gaudio, David Sullivan
	* @category   ANM293
	* @package    PizzaProject
	* @version    1
	* @link				git@github.com:Wireman131/PizzaProject
	* @link       git@github.com:teamsullivango/PizzaProject
	* @since      Mar 11, 2011-2011
*/

@session_start();

try {
$dbh = new PDO('sqlite:../database/pizzaOrders.db'); //SQLite by default is UTF-8
//$dbh->exec('SET NAMES utf8');
$dbh->exec('CREATE TABLE orders(id INTEGER PRIMARY KEY, name CHAR(20), email CHAR(30), 
						orderSummary CHAR(255), timeOfOrder CHAR(40), address CHAR(30), 
						billingAddress CHAR(30), payMethod CHAR(10) ) ');
$dbh->exec('INSERT INTO orders (name,email,orderSummary,timeOfOrder,address,billingAddress,payMethod)
					  VALUES("Fred","fred@flintstone.com","Small Pizza with Pepperoni, Green Olives","12:30 PM Saturday April 16","1316 West Maple Street","123 Main Street","cash")');
foreach( $dbh->query('select * from orders') as $row ){
echo $row['name'] . chr(10);
echo $row['email'] . chr(10);
echo $row['orderSummary'] . chr(10);
echo $row['timeOfOrder'] . chr(10);
echo $row['address'] . chr(10);
echo $row['billingAddress'] . chr(10);
echo $row['payMethod'] . chr(10);

}

$dbh = NULL;
}
catch(PDOException $e)
{
die($e->getMessage());
}



?>
<div id='confirmEmail'>
<div id='container'>
<div id='header'><img src='images/header.png'/></div>
<div id='hElement'></div>
<div id='content'>
<div id='orderSummary'>Order Summary for: <?php 
//print_r($_SESSION);

echo $_SESSION['customerName'] . " :<br/><br/>";
echo "Customer Email : " .$_SESSION['email'] . " <br/><br/>";
echo $_SESSION['orderSummary'] . "<br/><br/>";
echo "Order processed At :" . $_SESSION['timeOfOrder'] . "<br/><br/>";
echo $_SESSION['delivery'] . $_SESSION['deliveryTime'] . "<br/><br/>";
echo "Customer Address : " . $_SESSION['address'] . "<br/>";
echo "Billing Address : " . $_SESSION['billingAddress'] . "<br/>";
echo "Please be ready to pay with " . $_SESSION['payMethod'] . "<br/>";
//echo "Value of your coupon : $0.00 - Sorry, coupon code " . $_SESSION['emailCoupon'] . " is expired!<br/>";
echo"Coupon Value : " . $_SESSION['couponValue'] . "<br/>";
echo "Total amount for your order : $" . $_SESSION['orderTotal'] . "<br/>";
echo "Thank You!! Please Visit Again!<br/>";
echo "<a href='index.php'>Order Another</a>";
ob_flush();
    ?>
    
    
    </div>
</div>
</div>
<div id='footer'>&copy; 2011 &mdash; <strong>Tony & Dave's Pizza</strong></div>
</div>
