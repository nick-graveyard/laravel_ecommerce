// to do: Namespace 
$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });
});


// ready function
$( document ).ready(function() {
	// is_logged_in();
});


// post to cart
$('.post_to_cart').click( function() {
	my_this = this
	if( !is_logged_in() ) {

		login_user()
		.then(function(){
			post_to_cart(my_this);
		});			
	}
	else {
		post_to_cart(my_this)
	}
});



function post_to_cart(context) {
	/* 
	Get the parent then traverse DOM downwards
	Allow any of the elements to be anywhere inside of the 
	button stage.
	*/
	button_stage = $(context).parents('.button_stage');
	product_name = button_stage.find('.product_name').text();
	product_id = button_stage.find('.product_id').text();
	product_quantity = button_stage.find('.product_quantity').text();
	
	$.post( "carts", { product_id: product_id, product_quantity: product_quantity })
		  .then(function( data ) {
			   bootbox.alert( "Successfully Added: " + data,
			   function(){
			   		window.location.reload()
			   	});   
		  });
}



// test if a user is logged in
function is_logged_in() {	
	//the value of the meta tag set to true if logged in, blank if not
	var is_auth = $('meta[name=_auth]').attr("content");

	if(is_auth)
	{
		return true;
	}
	else
	{
		return false;
	}

}

var Popper = function(){};



// call the bootbox login dialog
// due to serialization of the form the form fields 
// must be named the same as the model fields on the backend
// pass in an function for a success action
function login_user() {
	var def = new $.Deferred();

			bootbox.dialog({
                title: "Please login or register to continue.",
                message: '' + 
                '<div class="row">  ' +
                    '<div class="col-md-12"> ' +
	                    '<form class="form-horizontal" id="login_dialog" action="/auth/ajax-login"> ' +

	                    	'<div class="form-group"> ' +
	                    		'<label class="col-md-4 control-label" for="username" id ="msg_stage"></label> ' +
	                    	'</div> ' +

	                    	'<div class="form-group"> ' +
	                    		'<label class="col-md-4 control-label" for="username">Email</label> ' +
	                    		'<div class="col-md-4"> ' +
	                    			'<input id="email" name="email" type="text" placeholder="Your email" class="form-control input-md"> ' +
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
   							url = $('#login_dialog').attr('action');
   							data = $('#login_dialog').serializeJson();

                           	$.post(url, data)
                           	.done( function(){
                           		def.resolve();
                           	}) 
						    .fail( function(){ 
						    	login_user();  
						    });
                        }
                    }
                }
            }
        );

		return def.promise();

}


// serializes jquery collection to JSON
$.fn.serializeJson = function() {
   var o = {};
   var a = this.serializeArray();
   $.each(a, function() {
       if (o[this.name]) {
           if (!o[this.name].push) {
               o[this.name] = [o[this.name]];
           }
           o[this.name].push(this.value || '');
       } else {
           o[this.name] = this.value || '';
       }
   });
   return o;
};






