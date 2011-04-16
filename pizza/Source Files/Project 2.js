  	
	//var piePrice = 1
	var outputSize;
	
		
	function sizer() {  // get pizza size - determined by which radio button is selected
	for (var i = 0; i<4; i++) {
			if (document.getElementById("pizzaSize_"+i).checked == true) {
				var size = document.getElementById("pizzaSize_" +i).value
				//window.alert("You picked " + size + "  as your pizza size");
				pricer(size);	}  // pass the value size to the pricer function
								}
						}
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
							topper();
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
		toppingTotal = (2 + parseFloat(toppingTotal))
		document.getElementById("deliveryYes").innerHTML = "Delivery";
		document.getElementById("deliveryYesPrice").innerHTML = "2.00";
		}
		
		
		
		tst();  //tally sheet total subtotal, then add sales tax format output
	}
	var zz; // global variable zz used for total 
	function tst() {
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
	function processOrder() {
	verifyCustomerInfo();}
	//window.open ("http://www.javascript-coder.com","mywindow");		
	//}
	function verifyCustomerInfo () {
		var passThru = 0;
		// statements to validate user input
		//window.alert("test");  // error checking tool
		//window.alert(document.getElementById("customerName").value);
		if (document.getElementById("customerName").value == "") {
			window.alert("You Must Enter Your Name!");
			
			//document.getElementById("customerName").focus();
			//return false;
			
			
		} else {
			name = document.getElementById("customerName").value;
			passThru += 1;
			//window.alert("Name was :" + name + passThru);
				}
		if (document.getElementById("customerAddress").value == "") {
			window.alert("You must enter your address!");
			//document.getElementById("customerAddress").focus();
			//return false;
		} else {
			var address = document.getElementById("customerAddress").value;
			passThru += 1;
			//window.alert("Address was:" + address + passThru);
				}
		if (document.getElementById("customerPhone").value == "") {
			window.alert("You must enter your phone number!");
			//document.getElementById("customerPhone").focus();
			//return false;
		} else {
			var phone = document.getElementById("customerPhone").value;
			passThru += 1;
			//window.alert("Phone Number was:"+ phone +passThru);
			//return true;
		}
		if (document.getElementById("customerEmail").value == "") {
			window.alert("You must enter your email address!");
			//document.getElementById("customerEmail").focus();
			//return false;
		} else {
			var email = document.getElementById("customerEmail").value;
			passThru += 1;
			//window.alert("Email address was:"+ email+passThru);
			//return true;
		} 
		if (passThru == 4) {
			//window.alert("You Made It!"+passThru);
			
			
			// open the window
			win2 = window.open("", "PizzaOrder", "width=800,height=800,resizable=0");
			// write to window
			win2.focus();
			win2.document.body.innerHTML=""
			win2.document.writeln("<html><head><title>Order Results</title>");
			win2.document.writeln("");
		    win2.document.write('<style type="text/css">');
    		win2.document.write('@import url("2.css");');
   		    win2.document.write('</style>');

			win2.document.writeln("</head><body>");
			win2.document.writeln("<div id='outputContainer'>");
			win2.document.writeln("<h2>Order Summary</h2><br/>Customer Name: "+name+"<br/>");
			win2.document.writeln("Address: "+address+"<br/>");
			win2.document.writeln("Pizza Size:"+outputSize+"<br/>");
			win2.document.writeln("Toppings: ");
			
			//subroutine to output selected toppings
			for (var i = 0; i<8; i++) {
			if (document.getElementById("topping_"+i).checked == true) {
				//alert("topping alert");
				var selectedToppingName = document.getElementById("topping_" +i).name;
				win2.document.writeln(selectedToppingName + " ");
				
						}
					}
				//output total price to popup window
				
				win2.document.writeln("<br/><strong>Total Price:$"+zz+"</strong><br/><br/>");
			
			// check to see if delivery was selected
			if (document.getElementById("deliveryBox").checked == true) {
				win2.document.writeln("Your pizza will be delivered to: "+address+" in 30 minutes<br/>");
				calculateTime();
				win2.document.writeln("Estimated Time of Delivery: "+ dt + AorP);
				win2.focus();
				
			} else {
				win2.document.writeln("Your pizza will be ready for pickup in 30 minutes<br/>");
				
							//var thisDate = new Date();
				calculateTime();
				//window.alert(dt);
				win2.document.writeln("Pick Up At: " + dt + AorP + "<br/>");
				win2.focus();
				}
			win2.document.writeln("</div></body></html>");
			win2.document.close();			
			
			}
			
		}
	var dt;	// 
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
	//string.prototype.trim = function() {
		//a = this.replace(/^\s+/, '');
		//return a.replace(/\s+$/, '');
	


