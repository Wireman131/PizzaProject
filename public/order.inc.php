<?php
/*
No Coupon	* Pizza Order form page
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
//temp variable is just that, never assume it's empty, clear before you use it
$customerName = "";
$customerAddress = "";
$customerBillingAddress = "";
$customerPhone = "";
$customerEmail = "";
$customerNameError = "";
$customerAddressError = "";
$customerBillingAddressError = "";
$customerPhoneError = "";
$customerEmailError = "";
$pepperoni = "";
$mushroom = "";
$onion = "";
$greenPepper = "";
$sausage = "";
$bacon = "";
$jalapeno = "";
$greenOlive = "";
$delivery = "";
$size = "";
$payMethod = "";
$couponCode = "";
$couponValue = "";

if(isset($_POST['submit'])){
	 /*
	 * at least one of these values was entered, so we need to validate all of them
	 */
		include('formValidate.inc.php');
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
    	<td><span class="reqd">*</span></td>
      <td class="col1"><label for="customerName">Name</label></td>
			<td><input type="text" name="customerName" id="customerName" 
						class="required" value="<?php echo $customerName; ?>"
						maxlength="25"/>
			</td><td><?php echo $customerNameError; ?></td>
   </tr>
    
    <tr>
    	<td><span class="reqd">*</span></td>
      <td class="col1"><label for="customerAddress">Address</label></td>
      <td><input type="text" name="customerAddress" id="customerAddress" 
      title="Input Your Address" class="required"
      value="<?php echo $customerAddress; ?>" maxlength="30"/>
      </td><td><?php echo $customerAddressError; ?></td>
    </tr>
    <tr>
    	<td><span class="reqd">*</span></td>
      <td class="col1"><label for="customerBillingAddress">Billing Address</label></td>
      <td><input type="text" name="customerBillingAddress" id="customerBillingAddress" 
      title="Input Billing Address" class="required"
      value="<?php echo $customerBillingAddress; ?>" maxlength="30" />
      </td><td><?php echo $customerBillingAddressError; ?></td>
    </tr>
    <tr>
    	<td><span class="reqd">*</span></td>
      <td class="col1"><label for="customerPhone">Phone Number</label></td> 
      <td><input type="text" name="customerPhone" id="customerPhone" 
      title="Input Your Phone Number With Area Code: XXX-XXX-XXXX" 
      class="required phoneUS" value="<?php echo $customerPhone; ?>"
      maxlength="22"/>
      </td><td><?php echo $customerPhoneError; ?></td>
    </tr>
    <tr>
    	<td><span class="reqd">*</span></td>
      <td class="col1"><label for="customerEmail">Email Address</label></td>
			<td><input type="text" name="customerEmail" id="customerEmail" 
			title="Input Email Address" class="required email"
			value="<?php echo $customerEmail; ?>" maxlength="30"/>
		  </td><td><?php echo $customerEmailError; ?></td>
    </tr>
    <tr>
    	<td><span class="reqd">*</span></td>
    	<td><span class="reqdText">Required</span></td>
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
  </table>
  
  </div>
  <div id="Payment">
 <h3>Payment Method</h3>
  <table width="300" border="0">
    <tr>
      <td><label>
        <input type="radio" name="payMethod" id="cash" value="Cash" 
				title="Pay w"  <?php echo ($payMethod=="Cash"? "checked" : "" );?>/>
        Cash</label></td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="payMethod" id="creditcard" value="Credit Card"
        title="Pay With Credit Card" <?php echo ($payMethod=="Credit Card"? "checked" : "" );?> />
        Credit Card</label></td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="payMethod" id="check" value="Check"
        title="Pay With Check" <?php echo ($payMethod=="Check"? 'checked' : '' );?>/>
        Check</label></td>
    </tr>
    <tr>
      <td> <img alt="Check" src="images/arrow.png"/>
      <label for="couponCode">Coupon Code</label>
        <input type="text" name="couponCode" id="couponCode"
				title="Please Enter Your Coupon Code" maxlength="10"
				value="<?php echo $couponCode; ?>"	/>
         </td>
    </tr>
    <tr><td><span id="couponVal"><?php echo $couponValue; ?>&nbsp;</span></td></tr>
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
			title="Small Pizza" value="Small" <?php echo ($size=="Small"? "checked" : "" );?>  />
        Small</label></td>
      <td>$8.00</td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="pizzaSize" id="pizzaSize_1" 
        title="Medium Pizza" value="Medium" <?php echo ($size=="Medium"? "checked" : "" );?>/>
        Medium</label></td>
      <td>$10.00</td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="pizzaSize" id="pizzaSize_2" 
        title="Large Pizza" value="Large" <?php echo ($size=="Large"? "checked" : "" );?>/>
        Large</label></td>
      <td>$12.00</td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="pizzaSize" id="pizzaSize_3" 
        title="Extra Large Pizza" value="Extra Large" <?php echo ($size="Extra Large"? "checked" : "" );?>/>
        XL</label></td>
      <td>$14.00</td>
    </tr>
  </table>
  <div id="pizzaImage"><img src="images/pizza.png" alt="Pizza Image"  height="150" /></div>
  <div id="submitButton">
  <table width="60" border="0">
    <tr>
      <td><label>
        <input type="submit" name="submit" id="submit" value="Submit Order!" class="submit"/>
      </label></td>
      <td><label>
        <input type="reset" name="reset" id="reset" value="Reset Order Form" onclick="tallyReset()" />
      </label></td>
    </tr>
    <tr><td colspan=2>
    									<input type="hidden" name="orderTotal" value="">
    									<input type="hidden" name="orderSummary" value="">
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
        title="Pepperoni" value=".50" <?php echo $pepperoni; ?> />
      Pepperoni </label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Mushroom" id="topping_1" 
        title="Mushroom" value=".50" <?php echo $mushroom; ?> />
      Mushroom</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Onion" id="topping_2" 
        title="Onion" value=".50" <?php echo $onion; ?> />
      Onion</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Green Pepper" id="topping_3" 
        title="Green Pepper" value=".50" <?php echo $greenPepper; ?>  />
      Green Pepper</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Sausage" id="topping_4" 
        title="Sausage" value=".50" <?php echo $sausage; ?> />
      Sausage</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Bacon" id="topping_5" 
        title="Everything Is Better With Bacon!" value=".50" <?php echo $bacon; ?> />
      Bacon</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Jalapeno" id="topping_6" 
        title="Jalepeno" value=".50" <?php echo $jalapeno; ?> />
      Jalapeno</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Green Olive" id="topping_7"
        title="Green Olive" value=".50" <?php echo $greenOlive; ?>  />
      Green Olive</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td>Delivery $2.00 <span class='smaller'>- Within 5 Miles Of Store</span></td>
      <td><label>
			<input type="checkbox" name="deliveryBox" <?php echo ($delivery ? "checked" : "" ); ?> 
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
