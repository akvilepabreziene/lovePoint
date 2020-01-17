<?php

//Remove item in cart 
    if(isset($_GET["action"])) {
      if($_GET["action"] == "delete") {
        foreach($_SESSION["shopping_cart"] as $key=>$value) {
              if($value["product_id"] == $_GET["id"])
              {
                $_SESSION["total_quantity"] -= $value["product_quantity"] ;

                $_SESSION["total_sum"] -= $value["product_quantity"] * $value["product_price"];
                
                unset($_SESSION["shopping_cart"][$key]);
                 header("Location: page_shoping_cart.php");
              }
            }
      }
    }