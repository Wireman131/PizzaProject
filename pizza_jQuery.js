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


//alert("javascript file is here");
$(function(){
  $('.auto-focus:first').focus();
// call to jquery validation occurs here!!!
$("#pizza").validate({
  messages: {
    customerName: "You Must Submit Your Name.",
    address: "Address Is Required",
    billAddress: "Billing Address Is Required",
    phone: {
      required: "Phone Number Is Required!!",
      phone: "Number Must Be In This Format"
    },
    email: {
      required: "We need your email address to contact you",
      email: "Your email address must be in the format of name@domain.com"
    }
    
  },
  errorPlacement: function(error, element) {
    error.appendTo( element.parent("td").next("td") );
  }
  
});

  $("input").change(
    function(){
      //alert('here');
      sizer();
      topper();
      couponCheck();
      calcTotal();  //tally sheet total subtotal, then add sales tax format output
        });
  
 
    });


