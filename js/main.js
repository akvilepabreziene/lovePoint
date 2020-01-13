

$(document).ready(function(){

    console.log("Testas");
    var passwordInput = $('#signInPassword');
    console.log(passwordInput.attr('type'));
    $('#eye-show').hide();

    $('#show-password').click(function() {

        var passwordInput = $('#signInPassword');

        if (passwordInput.attr('type') === "password") {
    
            $('#eye-show').show();
            $('#eye-hide').hide();
            passwordInput.attr('type', 'text');
          } else {
            passwordInput.attr('type', 'password');
            $('#eye-show').hide();
            $('#eye-hide').show();
          }
    });

    // Onclick function for counting multiple product prices

  $('input[name="product_Quantity"]').change(function (e) {
    var id = $(this).attr('id');
    var quantity = $(this).val();
    console.log(quantity);
    var price = $(".product-price-"+id).text();
    console.log(price);
    
    
    var suma =  $(".product-sum-"+id).text(quantity * price);

    $.ajax({
      type : 'post',
      url : 'update_sessionArray-ajax.php', //Here you will fetch records
      data : {'id': id, 'quantity' : quantity}, //Pass $id
    
      success : function(data){
            var x = JSON.parse(data);
            console.log(x);
              },
      error: function(e) {
           //called when there is an error
           alert( "Request failed: " + e );
           console.log("NESUVEIKE!");
     }
  });


  });

 

    
  });