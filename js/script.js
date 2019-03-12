$(document).ready(function(){
$("#submit").click(function(){
/*var name     = $("#name").val();
var email    = $("#email").val();
var password = $("#password").val();
var contact  = $("#contact").val();
var lastname = $("#lname").val();
var username = $("#uname").val();
var Conpassword = $("#cpassword").val();*/

var data = $('#data').serialize();


// Returns successful data submission message when the entered information is stored in database.
//var post_data = {'name1':name , 'email1':email , 'password1':password,"contact1":contact, "lname1":lastname, "uname1":username, "cpassword1":Conpassword };

// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "ajaxsubmit.php",
data: data,
cache: false,
beforeSend: function(result){
	$(".error").each(function() {
		$('#success').text('Please try again');
	});	
	$('#success').html('');
},
success: function(result){
	var obj = jQuery.parseJSON( result );
	
	$.each( obj.errors, function( key, val ) {
		console.log( "."+key );
		$( "."+key+"_error" ).html( "<p>"+val+"</p>" );
  	});
	

	if(typeof obj.success != 'undefined'){
		$('#success').text('Form Submitted Successfull');
		  window.location.href='http://localhost/registration/display.php'
	}else{
		$('#success').text('Please try again');
	}
}
});

return false;
});
});


$(document).ready(function(){
      $("#data").validationEngine('attach');

       });
