

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

  $('.product_Quantity').change(function () {

    var quantity = $('.product_Quantity');

    $('.product_Quantity').val() = quantity.val();

  });



    
  });