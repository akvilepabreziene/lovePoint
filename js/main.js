

$(document).ready(function(){

    var passwordInput = $('#signInPassword');
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

function changeShoppingCartInputValue() {
      // Onclick function for counting multiple product prices

      $('input[name="product_Quantity"]').change(function (e) {
        var id = $(this).attr('id');
        var quantity = $(this).val();
        // console.log(quantity);
        var price = $(".product-price-"+id).text();
        // console.log(price);
        
        var sum = quantity * price;
        
        var suma = $(".product-sum-" + id).html(sum + " &euro;");
  
      // When you change quantity value in shoping cart it changes a session variable
      $.ajax({
        type : 'post',
        url : 'update_sessionArray-ajax.php', 
        data : {'id': id, 'quantity' : quantity}, 
      
        success : function(data){
  
          var dataArray = JSON.parse(data);
          $('.cart-counter').html(dataArray[0]);
          $('.total_sum').html(dataArray[1] + " &euro;");
console.log(dataArray);

                },
        error: function(e) {
             alert( "Request failed: " + e );
             console.log("NESUVEIKE!");
       }
      });
  
  
    });
}

changeShoppingCartInputValue();

});

