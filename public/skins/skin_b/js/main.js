// get token from a meta tag and assign it to all ajax ops 
$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });
});



$('#quantity_change').click( function() {
    alert("yup")
});


$('.orderitem_add').submit( function(event) {
	// Because this is a form, a submit reloads the page.
	// A page Reload kills all of the Javascript.
	// This prevents this default form behavior.
	event.preventDefault();
	data = $(this).serialize();
	add_to_cart(data);
});



$('.orderitem_remove').submit( function(event) {
	event.preventDefault();
	data = $(this).serialize();
	delete_from_cart(data);
});


 $('.dropdown-menu a').click(function(){
    $('#selected').text($(this).text());
  });


function add_to_cart(in_data) {

	$.ajax({
	    type:   'POST',
	    url:    '/carts/add',
	    data:   in_data,
	    success: function(data){
           bootbox.alert(data, function(){
           		window.location.reload();
           });  
           
    	}
	});

}


function delete_from_cart(in_data)
{
	$.ajax({
	    type:   'POST',
	    url:    '/carts/remove',
	    data:   in_data,
	    success: function(data){
           bootbox.alert(data,function()
           	{
           		window.location.reload();
           	});  
    	}
	});
}


function update_cart_count()
{
	$.ajax({
	    type:   'POST',
	    url:    '/carts/count',
	    success: function(data){
	    	$('#cart_count').text(data)
    	}
	});
}


// test if a user is logged in
function is_logged_in() {	
	if( $('meta[name=_auth]').attr("content") )
	{
		return true;
	}
	else
	{
		return false;
	}
}


// call the bootbox login dialog
// due to serialization of the form the form fields 
// must be named the same as the model fields on the backend
// pass in an function for a success action
function login_user() {
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

         
                        }
                    }
                }
            }
        );
}

// JQUERY EXTENSIONS
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

// gets a url parameter
$.fn.getUrlParam = function(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}



