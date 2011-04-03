<?php
/*
	* Pizza Order form page
	*
	* Description Long
	*
	* @author			Tony Gaudio, David Sullivan
	* @category   ANM293
	* @package    PizzaProject
	* @version    1
	* @link       git@github.com:Wireman131/PizzaProject
	* @since      Mar 11, 2011-2011
*/
/*
 * This code will nuke all session variables
 */
session_unset();


$customerNameError = "";
$addressError = "";
$billingAddressError = "";
$phoneError = "";
$emailError = "";
//print_r($_POST);
if(	(isset($_POST['customerName'])) || (isset($_POST['address'])) || 
    (isset($_post['billingaddress'])) || (isset($_post['phone'])) || 
    (isset($_post['email'])) ){
      //echo "all set";
 /*
	* at least one of these values was entered, so we need to validate all of them
	*/
$isValid = true; //we'll assume that it's okay until we know better

//validate name

if($_POST['customerName'] == ''){
$isValid = false;
$customerNameError = "Please Enter Your Name";
} else {
  $customerName = $_POST['customerName'];
}

//validate address

if($_POST['address'] == ''){
$isValid = false;
$addressError = "Please Enter Your Address";
} else {
  $address = $_POST['address'];
}

//validate billing address

if($_POST['billingAddress'] == ''){
$isValid = false;
$billingAddressError = "Enter Address Please";
} else {
  $billingAddress = $_POST['billingAddress'];
}

//validate phone number

if($_POST['phone'] == ''){
$isValid = false;
$phoneError = "Enter Phone Number Please";
} else {
  $customerPhone = $_POST['phone'];
}

//validate email address

if($_POST['email'] == ''){
$isValid = false;
$emailError = "Enter Email Address Please";
} else {
  $email = $_POST['email'];
}

//if all of these tests have passed, then the form is ready to
//redirect to validate.inc.php
if($isValid){
  echo "is valid";
	header("Location: index.php?pid=validate"); 
}
}

?>
<div id='container'>
<div id='headerImage'><img src='images/header.png' /></div>
<form name='pizza' class="cmxform" id="pizza" action='index.php?pid=order' method="post" >
<div id="topBox">
<div id="CustomerInfo">
<h3 class="left">Customer Info</h3>
  <table >
    <tr>
      <td class="col1"><label for="customerName">Name</label></td>
			<td><input type="text" name="customerName" id="customerName" 
						class="required" value="<?php echo $customerName; ?>"/>
			</td><td><?php echo $customerNameError; ?></td>
   </tr>
    
    <tr>
      <td class="col1"><label for="customerAddress">Address</label></td>
      <td><input type="text" name="address" id="customerAddress" 
      title="Input Your Address" class="required"
      value="<?php echo $address; ?>"/>
      </td><td><?php echo $addressError; ?></td>
    </tr>
    <tr>
      <td class="col1"><label for="billAddress">Billing Address</label></td>
      <td><input type="text" name="billingAddress" id="billAddress" 
      title="Input Billing Address" class="required"
      value="<?php echo $billingAddress; ?>" />
      </td><td><?php echo $billingAddressError; ?></td>
    </tr>
    <tr>
      <td class="col1"><label for="customerPhone">Phone Number</label></td> 
      <td><input type="text" name="phone" id="customerPhone" 
      title="Input Your Phone Number With Area Code: XXX-XXX-XXXX" 
      class="required phoneUS" value="<?php echo $customerPhone; ?>"/>
      </td><td><?php echo $phoneError; ?></td>
    </tr>
    <tr>
      <td class="col1"><label for="customerEmail">Email Address</label></td>
			<td><input type="text" name="email" id="customerEmail" 
			title="Input Email Address" class="required email"
			value="<?php echo $email; ?>"/>
		  </td><td><?php echo $emailError; ?></td>
    </tr>
    
  </table>
  
  </div>
  <div id="Payment">
 <h3>Payment Method</h3>
  <table width="300" border="0">
    <tr>
      <td><label>
        <input type="radio" name="payMethod" id="cash" value="Cash" 
        title="Pay w" checked />
        Cash</label></td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="payMethod" id="creditcard" value="Credit Card"
        title="Pay With Credit Card" />
        Credit Card</label></td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="payMethod" id="check" value="Check"
        title="Pay With Check" />
        Check</label></td>
    </tr>
    <tr>
      <td> <img alt="Check" src="images/arrow.png"/>
      <label for="couponCode">Coupon Code</label>
        <input type="text" name="couponCode" id="couponCode"
        title="Please Enter Your Coupon Code"  />
         </td>
    </tr>
    <tr><td><span id="couponVal">&nbsp;</span></td></tr>
  </table>
 </div>
  </div> 
<!-- make another Div to hold all this crap -->
<div id="pizzaSection">
<div id="PizzaSizes">
  <h3>Choose Your Size</h3>
  <table  border="0">
    <tr>
      <td><label>
			<input type="radio" name="pizzaSize" id="pizzaSize_0" 
			title="Small Pizza" value="Small" checked />
        Small</label></td>
      <td>$8.00</td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="pizzaSize" id="pizzaSize_1" 
        title="Medium Pizza" value="Medium"  />
        Medium</label></td>
      <td>$10.00</td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="pizzaSize" id="pizzaSize_2" 
        title="Large Pizza" value="Large" />
        Large</label></td>
      <td>$12.00</td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="pizzaSize" id="pizzaSize_3" 
        title="Extra Large Pizza" value="Extra Large" />
        XL</label></td>
      <td>$14.00</td>
    </tr>
  </table>
  <div id="pizzaImage"><img src="images/pizza.png" alt="Pizza Image"  height="150" /></div>
  <div id="submitButton">
  <table width="60" border="0">
    <tr>
      <td><label>
        <input type="submit" name="validateUser" id="submit" value="Submit Order!" class="submit"/>
      </label></td>
      <td><label>
        <input type="reset" name="reset" id="reset" value="Reset Order Form" onclick="tallyReset()" />
      </label></td>
    </tr>
    <tr><td colspan=2>
    									<input type="hidden" name="orderTotal" value="">
    									<input type="hidden" name="orderSummary" value="">
											
											<input type="hidden" name="javascript" value="false">
 
    
    </td></tr>
  </table>
 </div>
  
  
  
  </div>
 
  <div id="Toppings">
    <h3>Choose Your Toppings</h3>
    <table  border="0">
      <tr>
        <td>Toppings</td>
        <td>Cost</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Pepperoni" id="topping_0" 
        title="Pepperoni" value=".50" />
      Pepperoni </label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Mushrooms" id="topping_1" 
        title="Mushrooms" value=".50" />
      Mushrooms</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Onions" id="topping_2" 
        title="Onions" value=".50" />
      Onions</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Green Peppers" id="topping_3" 
        title="Green Peppers" value=".50" />
      Green Peppers</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Sausage" id="topping_4" 
        title="Sausage" value=".50" />
      Sausage</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Bacon" id="topping_5" 
        title="Everything Is Better With Bacon!" value=".50" />
      Bacon</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Jalapeno" id="topping_6" 
        title="Jalepeno" value=".50" />
      Jalapeno</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Green Olive" id="topping_7" 
        title="Green Olive" value=".50" />
      Green Olive</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td>Delivery $2.00 <span class='smaller'>- Within 5 Miles Of Store</span></td>
      <td><label>
        <input type="checkbox" name="deliveryBox" 
        title="Delivery - Yes!" id="deliveryBox" />
        Yes</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td></td>
    </tr>
  </table>
  </div> 
  
  
  <div id="OrderTally">
    <h3>Your Order</h3>
    <table border="6" cellpadding="2" bgcolor="#FFFF66">
  <tr>
    <td id="tallySize" width="260">&nbsp;</td>
    <td id="tallyPiePrice" width="122">&nbsp;</td>
  </tr>
  <tr>
    <td id="toppingOutput_1">&nbsp;</td>
    <td id="toppingPrice_1">&nbsp;</td>
  </tr>
  <tr>
    <td id="toppingOutput_2">&nbsp;</td>
    <td id="toppingPrice_2">&nbsp;</td>
  </tr>
  <tr>
    <td id="toppingOutput_3">&nbsp;</td>
    <td id="toppingPrice_3">&nbsp;</td>
  </tr>
  <tr>
    <td id="toppingOutput_4">&nbsp;</td>
    <td id="toppingPrice_4">&nbsp;</td>
  </tr>
  <tr>
    <td id="toppingOutput_5">&nbsp;</td>
    <td id="toppingPrice_5">&nbsp;</td>
  </tr>
  <tr>
    <td id="toppingOutput_6">&nbsp;</td>
    <td id="toppingPrice_6">&nbsp;</td>
  </tr>
  <tr>
    <td id="toppingOutput_7">&nbsp;</td>
    <td id="toppingPrice_7">&nbsp;</td>
  </tr>
  <tr>
    <td id="toppingOutput_8">&nbsp;</td>
    <td id="toppingPrice_8">&nbsp;</td>
  </tr>
  <tr>
    <td id="deliveryYes">&nbsp;</td>
    <td id="deliveryYesPrice">&nbsp;</td>
  </tr>
  <tr>
  	<td><em><strong>Coupon Value</strong></em></td>
  	<td id="tallyCouponValue">&nbsp;</td>
  </tr>
  <tr>
    <td><em><strong>Sales Tax <span class="smaller">(Mi 6% Rate)</span></strong></em></td>
    <td id="tallySalesTax">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total</strong></td>
    <td id="tallyTotal">&nbsp;</td>
  </tr>
</table>

  </div>
  </div>
 
  

 

</form></div><br/>
<?php 
ob_flush();

?>
