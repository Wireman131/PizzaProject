/*
  * Javascript code for Pizza Project 
  *
  * Description Long
  *
  * @author     Tony Gaudio, David Sullivan
  * @category   ANM293
  * @package    PizzaProject
  * @version    1
  * @link       git@github.com:Wireman131/PizzaProject
  * @link       git@github.com:teamsullivango/PizzaProject
  * @since      Mar 11, 2011-2011
*/

/*
 * Begin jQuery driven event handling on page read, I think
 * @todo  figure out if $(function(){ some code } ); gets run on page load or ready, just for reference
 */

//since this only runs if javascript is enabled, we'll set the form value 'javascript' equal to true
//$('#javascript').val('true');

var couponValue;
function couponCheck(){
  //alert('Coupon Checker');
  couponCode = document.getElementById("couponCode").value;
  
  if (couponCode.length == 0){
    //alert(couponCode.length);
    document.getElementById("couponVal").innerHTML = "&nbsp;";
    couponValue = 0;
    document.getElementById("tallyCouponValue").innerHTML = "<strong>$0.00</strong>";
    return;
  } else {
  
   switch(couponCode)
  {
  case "twitter2":
  couponValue = -2;
  document.getElementById("tallyCouponValue").innerHTML = "<strong>-$2.00</strong>";
  document.getElementById("couponVal").innerHTML = "Valid Coupon - 2 Bucks Off!";
    break;
  case "freepizza":
  couponValue = 2;
  document.getElementById("tallyCouponValue").innerHTML = "<strong>+$2.00</strong>";
  document.getElementById("couponVal").innerHTML = "Valid Coupon - Add 2 Bucks!<br/>No Such Thing As Free Pizza!!";
    break;
  case "springbreak":
    couponValue = -1;
    document.getElementById("tallyCouponValue").innerHTML = "<strong>-$1.00</strong>";
    document.getElementById("couponVal").innerHTML = "Valid Coupon - 1 Buck Off!";
    break;
  default:
    couponValue = 0;
    document.getElementById("tallyCouponValue").innerHTML = "<strong>$0.00</strong>";
    document.getElementById("couponVal").innerHTML = "Not A Valid Coupon";
  }
  return;
}}
      

//  ajax routine to reload captcha
function newCaptcha(){
  //  Create an XMLHttpRequest object
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
// Create the function to be executed when the server response is ready
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById("captcha").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("GET","captcha.php" ,true);
xmlhttp.send();
  };
}

var outputSize;
  var myOrderSummary;
    
  function sizer() { 
    myOrderSummary = "";
     // get pizza size - determined by which radio button is selected
  for (var i = 0; i<4; i++) {
      if (document.getElementById("pizzaSize_"+i).checked == true) {
        var size = document.getElementById("pizzaSize_" +i).value;
        //window.alert("You picked " + size + "  as your pizza size");
        myOrderSummary = size + " Pizza, with ";
        pricer(size); topper(); }  // pass the value size to the pricer function
                }
}
var piePrice;
function pricer(size) {  // determine price of pie based on size
  if (size == "Small") {
    //alert("You picked Small!!!")  
    outputSize = "Small";
    piePrice = 8.00;
    piePrice = piePrice.toFixed(2);
    document.getElementById("tallySize").innerHTML = ("<strong>One " + size + " Pizza</strong>");
    document.getElementById("tallyPiePrice").innerHTML = "<strong>"+piePrice+"</strong>";
  } else if (size == "Medium") {
    outputSize = "Medium";
    piePrice = 10.00;
    piePrice = piePrice.toFixed(2);
    document.getElementById("tallySize").innerHTML = ("<strong>One " + size + " Pizza</strong>");
    document.getElementById("tallyPiePrice").innerHTML = "<strong>"+piePrice+"</strong>";
  } else if (size == "Large") {
    outputSize = "Large";
    piePrice = 12.00;
    piePrice = piePrice.toFixed(2);
    document.getElementById("tallySize").innerHTML = ("<strong>One " + size + " Pizza</strong>");
    document.getElementById("tallyPiePrice").innerHTML = "<strong>"+piePrice+"</strong>";
  } else if (size == "Extra Large") {
    outputSize = "Extra Large";
    piePrice = 14.00;
    piePrice = piePrice.toFixed(2);
    document.getElementById("tallySize").innerHTML = ("<strong>One " + size + " Pizza</strong>");
    document.getElementById("tallyPiePrice").innerHTML = "<strong>"+piePrice+"</strong>";
  } else if (size == "Reset") {  // reset size and price if reset button pushed
    piePrice = 0;
    document.getElementById("tallySize").innerHTML = "&nbsp;";
    document.getElementById("tallyPiePrice").innerHTML = "&nbsp;";
    return;
  }
}

	var toppingTotal=0;
	function topper() {
		var toppingCount = 0;
		var selectedToppingTotal = 0;
		for (var c =1; c<9; c++){
				// This routine will clear all output boxes and clear the topping total
				document.getElementById("toppingOutput_"+c).innerHTML = "&nbsp;";
				document.getElementById("toppingPrice_"+c).innerHTML = "&nbsp;";
				document.getElementById("deliveryYes").innerHTML = "&nbsp;";
				document.getElementById("deliveryYesPrice").innerHTML = "&nbsp;";
				toppingTotal=0;
				}
		// Run through the list of toppings to see what is checked
		for (var i = 0; i<8; i++) {
			if (document.getElementById("topping_"+i).checked == true) {
				//alert("topping alert");
				// Get the topping Name
				var selectedToppingName = document.getElementById("topping_" +i).name;
				//alert("Topping Name: "+ selectedToppingName);
				if (toppingCount == 0){
				  myOrderSummary += selectedToppingName;
				} else {
				  myOrderSummary += ", " + selectedToppingName;
				}
				// Get the topping Price
				var selectedToppingPrice = document.getElementById("topping_"+i).value;
				//alert("Selected Topping Price: "+ selectedToppingPrice);
				// Used for running tally of topping price
				toppingTotal = (parseFloat(selectedToppingPrice) + parseFloat(toppingTotal));
				
				//alert("Topping Total: "+ toppingTotal);
				// toppingCount is used to order the order total list so there are no blank spaces
				toppingCount = toppingCount + 1;
				//alert("Topping Count: "+ toppingCount);
				document.getElementById("toppingOutput_"+toppingCount).innerHTML = selectedToppingName;
				document.getElementById("toppingPrice_"+toppingCount).innerHTML = selectedToppingPrice;
				
				}
		}
		//alert("Topper Function");
		// check to see if delivery is checked if so, add 2 bucks to the toppingTotal and output delivery tag and price
		if (document.getElementById("delivery").checked == true) {
		toppingTotal = (2 + parseFloat(toppingTotal));
		document.getElementById("deliveryYes").innerHTML = "Delivery";
		document.getElementById("deliveryYesPrice").innerHTML = "2.00";
	}
			}
	
	var zz; // global variable zz used for total 
	function calcTotal() {
		var w = parseFloat(toppingTotal);
		//alert("variable w: "+w);
		var x = parseFloat(piePrice) + w;
		var y = x * .06;
		
		//alert("variable y: "+y);
		yy = y.toFixed(2);
		var z = x + y;
		 zz = z.toFixed(2);
		document.getElementById("tallySalesTax").innerHTML = "<i><strong>"+yy+"</strong></i>";
		document.getElementById("tallyTotal").innerHTML = "<strong>$"+zz+"</strong>";
		//alert("Sales Tax " + y + " Pie Price " + x + " Total Cost:$" + zz); 
				}
	
	
	
	
	
	var name,address,phone,email; // declare 4 global variables so they can be used in popup

  var toppingTotal=0;
  function topper() {
    var toppingCount = 0;
    var selectedToppingTotal = 0;
    for (var c =1; c<9; c++){
        // This routine will clear all output boxes and clear the topping total
        document.getElementById("toppingOutput_"+c).innerHTML = "&nbsp;";
        document.getElementById("toppingPrice_"+c).innerHTML = "&nbsp;";
        document.getElementById("deliveryYes").innerHTML = "&nbsp;";
        document.getElementById("deliveryYesPrice").innerHTML = "&nbsp;";
        toppingTotal=0;
        }
    // Run through the list of toppings to see what is checked
    for (var i = 0; i<8; i++) {
      if (document.getElementById("topping_"+i).checked == true) {
        //alert("topping alert");
        // Get the topping Name
        var selectedToppingName = document.getElementById("topping_" +i).name;
        //alert("Topping Name: "+ selectedToppingName);
        if (toppingCount == 0){
          myOrderSummary += selectedToppingName;
        } else {
          myOrderSummary += ", " + selectedToppingName;
        }
        // Get the topping Price
        var selectedToppingPrice = document.getElementById("topping_"+i).value;
        //alert("Selected Topping Price: "+ selectedToppingPrice);
        // Used for running tally of topping price
        toppingTotal = (parseFloat(selectedToppingPrice) + parseFloat(toppingTotal));
        
        //alert("Topping Total: "+ toppingTotal);
        // toppingCount is used to order the order total list so there are no blank spaces
        toppingCount = toppingCount + 1;
        //alert("Topping Count: "+ toppingCount);
        document.getElementById("toppingOutput_"+toppingCount).innerHTML = selectedToppingName;
        document.getElementById("toppingPrice_"+toppingCount).innerHTML = selectedToppingPrice;
        
        }
      pizza.orderSummary.value = myOrderSummary;
    }
    //alert("Topper Function");
    // check to see if delivery is checked if so, add 2 bucks to the toppingTotal and output delivery tag and price
    if (document.getElementById("deliveryBox").checked == true) {
    toppingTotal = (2 + parseFloat(toppingTotal));
    document.getElementById("deliveryYes").innerHTML = "Delivery";
    document.getElementById("deliveryYesPrice").innerHTML = "2.00";
  }
      }
  
  var zz; // global variable zz used for total 
  function calcTotal() {
    var w = parseFloat(toppingTotal);
    //alert("variable w: "+w);
    var x = parseFloat(piePrice) + w + couponValue;
    var y = x * .06;
    
    //alert("variable y: "+y);
    yy = y.toFixed(2);
    var z = x + y;
     zz = z.toFixed(2);
    document.getElementById("tallySalesTax").innerHTML = "<i><strong>"+yy+"</strong></i>";
    document.getElementById("tallyTotal").innerHTML = "<strong>$"+zz+"</strong>";
    pizza.orderTotal.value = zz;
    
    //alert("Sales Tax " + y + " Pie Price " + x + " Total Cost:$" + zz); 
        }
  
  
  var name,address,phone,email; // declare 4 global variables so they can be used in popup
     
      

    
function tallyReset() {
    var size = "Reset";
    pricer(size);
    for (var c =1; c<9; c++){
        // This routine will clear all output boxes and clear the topping total
        document.getElementById("toppingOutput_"+c).innerHTML = "&nbsp;";
        document.getElementById("toppingPrice_"+c).innerHTML = "&nbsp;";
        document.getElementById("deliveryYes").innerHTML = "&nbsp;";
        document.getElementById("deliveryYesPrice").innerHTML = "&nbsp;";
        toppingTotal=0;
        }
        tst();
    }
