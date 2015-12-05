$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });
});



$('.post_to_cart').click( function(){
	alert('ayyy lmao');
});



