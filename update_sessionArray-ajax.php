<?php 

session_start();


if (isset($_POST['id']) && isset($_POST['quantity'])) {

    $total_quantity = 0;
    $total_sum = 0;

    for ($i=0; $i < count($_SESSION["shopping_cart"]); $i++) { 

        if ($_SESSION["shopping_cart"][$i]["product_id"] == $_POST['id']) {

            $_SESSION["shopping_cart"][$i]["product_quantity"] = $_POST['quantity']; 
        }

    $total_quantity += $_SESSION["shopping_cart"][$i]["product_quantity"];
    $total_sum += $_SESSION["shopping_cart"][$i]["product_price"] * $_SESSION["shopping_cart"][$i]["product_quantity"];

    $_SESSION["total_quantity"] = $total_quantity;
    $_SESSION["total_sum"] = $total_sum;
        
    $data[0] = $total_quantity;
    $data[1] = $total_sum;


    }

   echo json_encode( $data);

}
