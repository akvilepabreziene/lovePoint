<?php 

session_start();

// print_r($_SESSION);
// echo("<hr>" . $_SESSION["shopping_cart"][0]["product_quantity"]);
//  $_SESSION["shopping_cart"][0]["product_quantity"] = 99;

if (isset($_POST['id']) && isset($_POST['quantity'])) {



    foreach ($_SESSION["shopping_cart"] as $array_id) {
        if ( $array_id["product_id"] == $_POST['id']) {

           $array_id["product_quantity"] = $_POST['quantity'];

            
            // echo json_encode($_SESSION["shopping_cart"]);
            echo json_encode($array_id);
        }
    }

}