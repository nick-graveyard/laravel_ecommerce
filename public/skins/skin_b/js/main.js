$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });
});


$( document ).ready(function() {
	is_logged_in();
});


$('.post_to_cart').click( function(){
	/* 
		Guard clause to test for log in.
		A cart has to be submitted to a logged in users account.
		Note: All authentication functaionality happens server side.  
		This is just a test and Ajax post. 
	 */

	is_logged_in();



	/* 
		Get the parent then traverse DOM downwards
		This reduces brittleness of the elements on the HTML.
		Allow any of the elements to be anywhere inside of the 
		button stage.
	*/
	button_stage = $(this).parents('.button_stage');
	product_name = button_stage.find('.product_name').text();
	product_id = button_stage.find('.product_id').text();
	product_quantity = button_stage.find('.product_quantity').text();
	
	$.post( "carts", { product_id: product_id, product_quantity: product_quantity })
		  .done(function( data ) {
		    bootbox.alert( "Data Loaded: " + data );
		  });

	// bootbox.alert("Hello world! " + " Id: " + product_id + " Quantity: " + product_quantity);
});


function is_logged_in()
{	
	var is_auth = $('meta[name=_auth]').attr("content");

	if(is_auth)
	{
		return true;
	}
	else
	{
		login_dialog();
	}

}




function login_dialog()
{
			bootbox.dialog({
                title: "Please login or register to continue.",
                message: '' + 
                '<div class="row">  ' +
                    '<div class="col-md-12"> ' +
	                    '<form class="form-horizontal"> ' +
	                    	'<div class="form-group"> ' +
	                    		'<label class="col-md-4 control-label" for="username">User Name</label> ' +
	                    		'<div class="col-md-4"> ' +
	                    			'<input id="username" name="username" type="text" placeholder="Your user name" class="form-control input-md"> ' +
	                    		'</div> ' +
	                    	'</div> ' +

	                    	'<div class="form-group"> ' +
	                    		'<label class="col-md-4 control-label" for="password">Password</label> ' +
	                    		'<div class="col-md-4"> ' +
	                    			'<input id="password" name="password" type="password" placeholder="Your Password" class="form-control input-md"> ' +
	                    		'</div> ' +
	                    	'</div> ' +
                    	'</form>' +
                    '</div>' + 
                '</div>',
                buttons: {
                    success: {
                        label: "Save",
                        className: "btn-success",
                        callback: function () {
                            var name = $('#name').val();
                            var answer = $("input[name='awesomeness']:checked").val()
                            Example.show("Hello " + name + ". You've chosen <b>" + answer + "</b>");
                        }
                    }
                }
            }
        );

}


