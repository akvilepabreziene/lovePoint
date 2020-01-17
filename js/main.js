

$(document).ready(function(){

  var passwordInput = $('input[name="password"]');
    $('.eye-hide').hide();

    $('.show-password').click(function() {

        if (passwordInput.attr('type') === "password") {
    
            $('.eye-hide').show();
            $('.eye-show').hide();
            passwordInput.attr('type', 'text');
          } else {
            passwordInput.attr('type', 'password');
            $('.eye-hide').hide();
            $('.eye-show').show();
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
          // $(".errors").html(dataArray);

          dataArray.forEach(element => {
            if (element== true) {
              window.location.href = "index.php";
            } else {
              $(".errors").html("<div class='error-message alert alert-danger' role='alert'>" + element + "</div>");
            }
          });  
                },
        error: function(e) {
            alert( "Request failed: " + e );
            console.log("NESUVEIKE!");
      }
      });
    });
  }
 login();

 function categoriesDisplay(parent, child) {
    $(parent).mouseover(function () {
      $(this).children().show(100);
    })

    $(parent).mouseleave(function () {
      $(child).hide(100);
    })
 }

  categoriesDisplay('.categories', '.categories-list');

  categoriesDisplay('.zoom-img', '.control-panel');


//  It turns off login form modal when open register form modal
  $('.btn-link').click(function () {
    $('#login_form').modal('toggle');
  })


});

