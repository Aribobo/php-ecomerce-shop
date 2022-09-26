<<?php  



$('#cartform').submit(function(e){
  	e.preventDefault();
  	var product = $(this).serialize();
  	$.ajax({
  		type: 'POST',
  		url: 'cart_add.php',
  		data: product,
  		dataType: 'json',
  		success: function(response){
  			$('#callout').show();
  			$('.message').html(response.message);
  			if(response.error){
  				$('#callout').removeClass('callout-success').addClass('callout-danger');
  			}
  			else{
				$('#callout').removeClass('callout-danger').addClass('callout-success');
				getCart();
  			}
  		}
  	});
  });

  $(document).on('click', '.close', function(){
  	$('#callout').hide();
  });

});
?>