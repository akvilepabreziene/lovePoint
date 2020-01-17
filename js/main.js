

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

function login() {
  // Onclick function for counting multiple product prices

    $('#loginsubmit').click(function (e) {
      var email = $('input[name="email"]').val();
      var password = $('input[name="password"]').val();
    
      // console.log(quantity);
      // console.log(price);
      $.ajax({
        type : 'post',
        url : 'login.php', 
        data : {'email': email, 'password' : password}, 
      
        success : function(data){

          var dataArray = JSON.parse(data);
          console.log(dataArray);
          // $(".errors").html(dataArray);

          dataArray.forEach(element => {
            if (element== true) {
              window.location.href = "index.php";
            } else {
              $(".errors").append("<div class='alert alert-danger' role='alert'>" + element + "</div >");
            }
          });  
        //     if (dataArray['connection'] == true) {
        //       console.log(dataArray['connection']);
        //       window.location.href = "index.php";

        // }
          // console.log(dataArray['connection']);
          // window.location.href = "modals/sign-in_modal.php";
                },
        error: function(e) {
            alert( "Request failed: " + e );
            console.log("NESUVEIKE!");
      }
      });
    });
  }
 login()

  $('button[name="add_to_cart"]').click(function (e) { 

    var quantity = $('input[name="quantity"]').val();
    var totalquantity = $('.cart-counter').text();
    $('.cart-counter').html(quantity);

 
  })

    $('.categories').mouseover(function() {
      $('.categories-list').show(100);
    })

    $('.categories').mouseleave(function () {
      $('.categories-list').hide(100);
    })
});

