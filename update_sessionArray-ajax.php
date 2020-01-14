<?php 

session_start();


if (isset($_POST['id']) && isset($_POST['quantity'])) {

    $all_products_qty = 0;
    $all_products_sum = 0;

    for ($i=0; $i < count($_SESSION["shopping_cart"]); $i++) { 

        if ($_SESSION["shopping_cart"][$i]["product_id"] == $_POST['id']) {

            $_SESSION["shopping_cart"][$i]["product_quantity"] = $_POST['quantity']; 
        }

    $all_products_qty += $_SESSION["shopping_cart"][$i]["product_quantity"];
    $all_products_sum += $_SESSION["shopping_cart"][$i]["product_price"] * $_SESSION["shopping_cart"][$i]["product_quantity"];

    $_SESSION["all_products_qty"] = $all_products_qty;
    $_SESSION["all_products_sum"] = $all_products_sum;
        
    $data[0] = $all_products_qty;
    $data[1] = $all_products_sum;


    }

   echo json_encode( $data);

}
