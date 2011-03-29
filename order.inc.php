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

?>
<div id='container'>
<div id='headerImage'><img src='images/header.png' /></div>
<?php 
/*
 * Form submits to the validate.inc.php page if the client side validaton passes.
 */
?>
<form name='pizza' class="cmxform" id="pizza" action='index.php?pid=validate' method="post" >
<div id="topBox">
<div id="CustomerInfo">
<h3 class="left">Customer Info</h3>
  <table >
    <tr>
      <td class="col1"><label for="customerName">Name</label></td>
      <td><input type="text" name="customerName" id="customerName"  class="required"/>
      </td><td></td>
    </tr>
    
    <tr>
      <td class="col1"><label for="customerAddress">Address</label></td>
      <td><input type="text" name="address" id="customerAddress" class="required"/>
      </td><td></td>
    </tr>
    <tr>
      <td class="col1"><label for="billAddress">Billing Address</label></td>
      <td><input type="text" name="billingAddress" id="billAddress" class="required" />
      </td><td></td>
    </tr>
    <tr>
      <td class="col1"><label for="customerPhone">Phone Number</label></td> 
      <td><input type="text" name="phone" id="customerPhone" class="required phoneUS"/>
      </td><td></td>
    </tr>
    <tr>
      <td class="col1"><label for="customerEmail">Email Address</label></td>
			<td><input type="text" name="email" id="customerEmail" class="required email"/>
		  </td><td></td>
    </tr>
    
  </table>
  
  </div>
  <div id="Payment">
 <h3>Payment Method</h3>
  <table width="300" border="0">
    <tr>
      <td><label>
        <input type="radio" name="payMethod" id="cash" value="Cash" checked />
        Cash</label></td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="payMethod" id="creditcard" value="Credit Card" " />
        Credit Card</label></td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="payMethod" id="check" value="Check" " />
        Check</label></td>
    </tr>
    <tr>
      <td> <label for="couponCode">Coupon Code</label>
        <input type="text" name="couponCode" id="couponCode"  />
         </td>
    </tr>
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
			<input type="radio" name="pizzaSize" id="pizzaSize_0" value="Small" />
        Small</label></td>
      <td>$8.00</td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="pizzaSize" id="pizzaSize_1" value="Medium"  />
        Medium</label></td>
      <td>$10.00</td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="pizzaSize" id="pizzaSize_2" value="Large" />
        Large</label></td>
      <td>$12.00</td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="pizzaSize" id="pizzaSize_3" value="Extra Large" />
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
    <tr><td colspan=2><input type="hidden" name="pid" value="validate">
    									<input type="hidden" name="orderTotal" value="">
    									<input type="hidden" name="orderSummary" value="">
											<input type="hidden" name="pid" value="validate">
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
        <input type="checkbox" name="Pepperoni" id="topping_0" value="1.25" />
      Pepperoni </label></td>
      <td>$1.25</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Mushrooms" id="topping_1" value=".50" />
      Mushrooms</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Onions" id="topping_2" value=".75" />
      Onions</label></td>
      <td>$.75</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Green Peppers" id="topping_3" value=".90" />
      Green Peppers</label></td>
      <td>$.90</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Sausage" id="topping_4" value="1.40" />
      Sausage</label></td>
      <td>$1.40</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Bacon" id="topping_5" value="1.75" />
      Bacon</label></td>
      <td>$1.75</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Jalapeno" id="topping_6" value=".55" />
      Jalapeno</label></td>
      <td>$.55</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Green Olive" id="topping_7" value="1.00" />
      Green Olive</label></td>
      <td>$1.00</td>
    </tr>
    <tr>
      <td>Delivery $2.00 <span class='smaller'>- Within 5 Miles Of Store</span></td>
      <td><label>
        <input type="checkbox" name="deliveryBox" id="deliveryBox" />
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
