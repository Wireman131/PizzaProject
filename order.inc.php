<?php
/*
	* Description Short 
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
?>
<div id='container'>
<form name='pizza' action='index.php?pid=validate' method="post" onsubmit="return verifyCustomerInfo();">
<div id="PizzaSizes">
  <h3>Choose Your Size</h3>
  <table width="200" border="0">
    <tr>
      <td><label>
        <input type="radio" name="pizzaSize" id="pizzaSize_0" value="Small" onchange="sizer()" onclick="sizer()" />
        Small</label></td>
      <td>$8.00</td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="pizzaSize" id="pizzaSize_1" value="Medium" onchange="sizer()" onclick="sizer()"/>
        Medium</label></td>
      <td>$10.00</td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="pizzaSize" id="pizzaSize_2" value="Large" onchange="sizer()" onclick="sizer()"/>
        Large</label></td>
      <td>$12.00</td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="pizzaSize" id="pizzaSize_3" value="Extra Large" onchange="sizer()" onclick="sizer()"/>
        XL</label></td>
      <td>$14.00</td>
    </tr>
  </table>
  <div id="pizzaImage"><img src="images/pizza.png" alt="Pizza Image" width="200" height="150" /></div>
  </div>
  <div id="Toppings">
    <h3>Choose Your Toppings
      </h3>
    <table width="250" border="0">
      <tr>
      <?php
      /*
       * @todo use css to fix td widths 
       */ 
      ?>
      <td width="169">Toppings</td>
      <td width="87">Cost</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Pepperoni" id="topping_0" value="1.25" onchange="sizer()" onclick="sizer()"/>
      Pepperoni </label></td>
      <td>$1.25</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Mushrooms" id="topping_1" value=".50" onchange="sizer()" onclick="sizer()"/>
      Mushrooms</label></td>
      <td>$.50</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Onions" id="topping_2" value=".75" onchange="sizer()" onclick="sizer()"/>
      Onions</label></td>
      <td>$.75</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Green Peppers" id="topping_3" value=".90" onchange="sizer()" onclick="sizer()"/>
      Green Peppers</label></td>
      <td>$.90</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Sausage" id="topping_4" value="1.40" onchange="sizer()" onclick="sizer()"/>
      Sausage</label></td>
      <td>$1.40</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Bacon" id="topping_5" value="1.75" onchange="sizer()" onclick="sizer()"/>
      Bacon</label></td>
      <td>$1.75</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Jalapeno" id="topping_6" value=".55" onchange="sizer()" onclick="sizer()"/>
      Jalapeno</label></td>
      <td>$.55</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="Green Olive" id="topping_7" value="1.00" onchange="sizer()" onclick="sizer()"/>
      Green Olive</label></td>
      <td>$1.00</td>
    </tr>
    <tr>
      <td>Delivery $2.00 <span class='smaller'>- Within 5 Mile Radius Of Store</span></td>
      <td><label>
        <input type="checkbox" name="deliveryBox" id="deliveryBox" onchange="sizer()" onclick="sizer()"/>
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
    <table width="400" border="6" cellpadding="2" bgcolor="#FFFF66">
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
    <td><i><strong>Sales Tax <span class="smaller">(Michigan 6% Rate)</span></strong></i></td>
    <td id="tallySalesTax">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total</strong></td>
    <td id="tallyTotal">&nbsp;</td>
  </tr>
</table>

  </div>
  <br /> <br /> <br /> <br />
  <div id="OrderName">
 
  <table width="390" border="0">
    <tr>
      <td> <label>Name
        <input type="text" name="name" id="customerName"  />
      </label></td>
    </tr>
    <tr>
      <td><label>Address
        <input type="text" name="email" id="customerAddress" />
      </label></td>
    </tr>
    <tr>
      <td><label>Phone Number 
        <input type="text" name="phone" id="customerPhone" />
      </label></td>
    </tr>
    <tr>
      <td><label>Email Address
        <input type="text" name="email" id="customerEmail" /><input type="hidden" name="pid" value="validate">
      </label></td>
    </tr>
  </table>
  
  </div>
  
   <br />

  

  
  <table width="60" border="0">
    <tr>
      <td><label>
        <input type="submit" name="validateUser" id="submit" value="Submit Order!" />
      </label></td>
      <td><label>
        <input type="reset" name="reset" id="reset" value="Reset Order Form" onclick="tallyReset()" />
      </label></td>
    </tr>
    <tr><td colspan=2><input type="hidden" name="pid" value="validate">
  
    
    </td></tr>
  </table>
 

</form></div><br/>