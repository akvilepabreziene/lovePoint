<?php

require('config/connection.php');
require_once('models/customer.php');
require_once('models/order.php');
require_once('models/order-product.php');

session_start(); 

date_default_timezone_set("Europe/Helsinki");

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $adress = $_POST['adress'];
    $phone = $_POST['phone'];
    
    $order_time = date("Y-m-d h:i:s", time());

    $customer = getCustomerByEmail($email);

    $customer_id = $customer['id'];

    if (!$customer) {
        createCustomer($name, $lastname, $adress, $email, $phone);
        $customer = getLastCustomer(1);
        $customer = mysqli_fetch_assoc($customer);
        $customer_id = $customer['id'];

        createOrder($customer_id, $order_time);

        $lastOrder = getLastOrder(1);
        $lastOrder  = mysqli_fetch_assoc($lastOrder);

        $order_id = $lastOrder['id'];

        foreach ($_SESSION["shopping_cart"] as $key => $cart_item) {

            createOrderProduct($order_id, $cart_item['product_id'], $cart_item['product_quantity']);
            unset($_SESSION["shopping_cart"][$key]);
        }

        echo "Užsakymas gautas! Daugiau informacijos gausite el.paštu";

    } else {
        
        print_r($customer_id);
        print_r($order_time);

        createOrder($customer_id, $order_time);

        $lastOrder = getLastOrder(1);
        $lastOrder = mysqli_fetch_assoc($lastOrder);

        $order_id = $lastOrder['id'];

        foreach ($_SESSION["shopping_cart"] as $key => $cart_item) {

            createOrderProduct($order_id, $cart_item['product_id'], $cart_item['product_quantity']);
            unset($_SESSION["shopping_cart"][$key]);

        }
        echo "Užsakymas gautas! Daugiau informacijos gausite el.paštu";

 }

}