$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });
});



$('.post_to_cart').click( function(){
	
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
	
	$.post( "echo", { product_id: product_id, product_quantity: product_quantity })
		  .done(function( data ) {
		    bootbox.alert( "Data Loaded: " + data );
		  });

	// bootbox.alert("Hello world! " + " Id: " + product_id + " Quantity: " + product_quantity);
});




