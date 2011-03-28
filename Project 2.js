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
 * @todo	figure out if $(function(){ some code } ); gets run on page load or ready, just for reference
 */

//since this only runs if javascript is enabled, we'll set the form value 'javascript' equal to true
$('#javascript').val('true');

var couponValue;
function couponCheck(){
  //alert('Coupon Checker');
  couponCode = document.getElementById("couponCode").value;
  switch(couponCode)
  {
  case "twitter2":
  couponValue = -2;
  document.getElementById("tallyCouponValue").innerHTML = "<strong>-$2.00</strong>";
    break;
  case "freepizza":
  couponValue = 2;
  document.getElementById("tallyCouponValue").innerHTML = "<strong>+$2.00</strong>";
    break;
  case "springbreak":
    couponValue = -1;
    document.getElementById("tallyCouponValue").innerHTML = "<strong>-$1.00</strong>";
    break;
  default:
    couponValue = 0;
    document.getElementById("tallyCouponValue").innerHTML = "<strong>$0.00</strong>";
  }
  return;
}
      
  


//alert("javascript file is here");
$(function(){
// call to jquery validation occurs here!!!
$("#pizza").validate();

//alert("jquery is on!");
	$("input").change(
		function(){
			//alert('here');
		  sizer();
			topper();
			couponCheck();
		
				});
			calcTotal();  //tally sheet total subtotal, then add sales tax format output
		});




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
				pricer(size);	}  // pass the value size to the pricer function
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

		function verifyCustomerInfo() {
//	  alert("verify customer info");
		//we're only interested in validating the name, address, city, zip and phone number
		var c_name, c_address, cb_address, c_phone;	
		c_name = $("#customerName").val();
		c_address = $("#customerAddress").val();
		cb_address = $("#billAddress").val();
		c_phone = $("#customerPhone").val();
//		alert("jquery grabs = " + c_name + c_address + cb_address + c_phone);
		if ( c_name == "") {
			window.alert("You Must Enter Your Name!");
			//return false;
		} else {
			var customerName = document.getElementById("customerName").value;
			//passThru += 1;
			//window.alert("Name was :" + name + //passThru);
				}
		if ($("#customerAddress").value == "") {
			window.alert("You must enter your address!");
			//document.getElementById("customerAddress").focus();
			//return false;
		} else {
			var address = document.getElementById("customerAddress").value;
			//passThru += 1;
			//window.alert("Address was:" + address + //passThru);
				}
		if ($("#billAddress").value == "") {
      window.alert("You must enter your billing address!");
      //document.getElementById("customerAddress").focus();
      //return false;
    } else {
       //passThru += 1;
      //window.alert("Address was:" + address + //passThru);
        }
		if ($("#customerPhone").value == "") {
			window.alert("You must enter your phone number!");
			//document.getElementById("customerPhone").focus();
			//return false;
		} else {
			var phone = document.getElementById("customerPhone").value;
			//passThru += 1;
			//window.alert("Phone Number was:"+ phone +//passThru);
			
		}
		if ($("#customerEmail").value == "") {
			window.alert("You must enter your email address!");
			//document.getElementById("customerEmail").focus();
			//return false;
		} else {
			var email = document.getElementById("customerEmail").value;
			//passThru += 1;
			//window.alert("Email address was:"+ email+//passThru);
					} 
		//if (//passThru == 5) {
		  pizza.orderTotal.value = zz;
		  pizza.orderSummary.value = myOrderSummary;
		  return true;
		 // alert("code to unhide the captcha box");
		  //document.pizza.submit();
		//} 
			
	}
			
		  
	var dt;	 
	function calculateTime () {
		var today=new Date();
		var hr=today.getHours();
		var mn=today.getMinutes();
		//window.alert("value of mn:"+mn);
		var s=today.getSeconds();
		
		mn = parseInt(mn)+ 30; // add 30 minutes to the current minutes
			if (mn > 59) {  // if adding 30 minutes pushes the minutes past 59,  advance hour by one, and then subtract 60 minutes from the minute total
			hr = parseInt(hr) + 1;
			mn = parseInt(mn) - 60;
				}
		//window.alert("value of mn:"+mn);
		
		today.setMinutes(mn);
		// add a zero in front of numbers<10
		mn=checkTime(mn);
		s=checkTime(s);
		//convert from 24 hour format to am/pm
		hr=hourConvert(hr);
		dt = hr+":"+mn+":"+s;
		//window.alert(dt);
		return dt;
		
		}
	
	function checkTime(i) // this will add a zero if it the minutes or seconds are single digit numbers
		{
		if (i<10)
		  {
		  i="0" + i;
		  }
		return i;
		}
		
	var AorP;	
	function hourConvert(hr){  // determine AM or PM assign it to vabiable AorP 
			
			if (hr>=12) {
   				 AorP=" PM"; 
			} else {
    			AorP=" AM"; }

			if (hr>=13) {
    			hr-=12; }
			if (hr==0) {
			    hr=12; }
		return hr;
		}
		
		
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


