<?php

function createOrder($customer_id, $order_time ){
    $sql = "INSERT INTO orders VALUES (NULL, '$customer_id', '$order_time', 1)";

    $createNewOrder = mysqli_query(getConnect(), $sql);

    if (!$createNewOrder && DEBUG_MODE > 0) {
        echo "ERROR: nepavyko sukurti naujo pirkėjo!!! <br>";
    }
}

// Function returns recent orders
function getLastOrder($qty = 999999) {

    $sql = "SELECT * FROM orders ORDER BY id DESC LIMIT $qty";
    $latestOrders= mysqli_query(getConnect(), $sql);
    

    return $latestOrders;
    
}