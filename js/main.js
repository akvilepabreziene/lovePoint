

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

    $('.loginsubmit').click(function (e) {
      var email = $('input[name="email"]').val();
      var password = $('input[name="password"]').val();
      $(".errors").html('');

      $.ajax({
        type : 'post',
        url : 'login.php', 
        data : {'email': email, 'password' : password}, 
      
        success : function(data){

          var dataArray = JSON.parse(data);

          dataArray.forEach(element => {
            if (element == true) {
              window.location.href = "page_shoping_cart.php";
            } else {
              $(".errors").append("<div class='error-message alert alert-danger' role='alert'>" + element + "</div>");
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


  function userRegister() {

    $('#registerSubmit').click(function (e) {

      var name = $('#user_name').val();
      var lastname = $('#user_lastname').val();
      var email = $('#user_email').val();
      var password = $('#user_password').val();
      var confirm_password = $('#confirm_password').val();
      var emailRegex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
      var passwordRegex = /^.*(?=.{8,})(?=.*\d)((?=.*[a-z]){1})((?=.*[A-Z]){1}).*$/g;
      
      $(".register-errors").html('');

      if ((name == "") || (lastname == "") || (email == "") || (password == "") || (confirm_password == "") ) {

          $(".register-errors").append("<div class='error-message alert alert-danger' role='alert'>Užpildykite tuščius laukelius</div>");
          return false;
        } if (!emailRegex.test(email)) {
           $(".register-errors").append("<div class='error-message alert alert-danger' role='alert'>Netinkamas el.pašto adresas</div>");
        }
          if (!passwordRegex.test(password)) {

         $(".register-errors").append("<div class='error-message alert alert-danger' role='alert'>Slaptažodis neatitinka reikalavimų</div>");
        
         }
          if (password != confirm_password) {
          $(".register-errors").append("<div class='error-message alert alert-danger' role='alert'>Slaptažodžiai nesutampa</div>");
          return false;
        }
        
           $.ajax({
             type: 'post',
             url: 'user_registration.php',
             data: {
               'user_name': name,
               'lastname': lastname,
               'email': email,
               'password': password
             },

             success: function (data) {
                window.location.href = "page_shoping_cart.php";
             },
             error: function (e) {
               alert("Request failed: " + e);
               console.log("NESUVEIKE!");
             }
           });

      })
  }

userRegister();

  function orderSumbit() {

    $('#order_form_submit').click(function (e) {

      var name = $('#customer_name').val();
      var lastname = $('#customer_lastname').val();
      var email = $('#customer_email').val();
      var street = $('#street').val();
      var house_number = $('#house_number').val();
      var post_code = $('#post_code').val();
      var city = $('#city').val();
      var phone = $('#customer_phone').val();
      var adress = $('#street').val() + ' ' + $('#house_number').val() + ' ' + $('#post_code').val() + ' ' + $('#city').val();
      var emailRegex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
      var phoneRegex = /^((?!(-1))[0-9]{11})$/g;
      var postCodeRegex = /^((?!(-1))[0-9]{5})$/g;

      $(".order_form_error").html('');

      if ((name == "") || (lastname == "") || (email == "") || (street == "") || (house_number == "") || (post_code == "") || (city == "") || (phone == "")) {

        $(".order_form_error").append("<div class='error-message alert alert-danger' role='alert'>Užpildykite tuščius laukelius</div>");
        return false;
      }
      if (!emailRegex.test(email)) {
        $(".order_form_error").append("<div class='error-message alert alert-danger' role='alert'>Netinkamas el.pašto adresas</div>");
      }
      if (!phoneRegex.test(phone)) {

        $(".order_form_error").append("<div class='error-message alert alert-danger' role='alert'>Neteisingas telefono numeris</div>");
      }
      if (!postCodeRegex.test(post_code)) {

        $(".order_form_error").append("<div class='error-message alert alert-danger' role='alert'>Pašto kodas turi būti iš 5 skaičių.</div>");
         return false;
      }


      $.ajax({
        type: 'post',
        url: 'create_order.php',
        data: {
          'name': name,
          'lastname': lastname,
          'email': email,
          'adress': adress,
          'phone': phone
          
        },

        success: function (data) {
          $(".cart-message").html(data);
          window.location.href = "page_shoping_cart.php";
        },
        error: function (e) {
          alert("Request failed: " + e);
          console.log("NESUVEIKE!");
        }
      });

    })
  }

orderSumbit();

});

