<?php

function createOrderProduct($order_id, $product_id, $quantity)
{
    $sql = "INSERT INTO orders_products VALUES (NULL, $order_id, $product_id, $quantity)";

    $newRecord= mysqli_query(getConnect(), $sql);

    if (!$newRecord && DEBUG_MODE > 0) {
        echo "ERROR: nepavyko sukurti naujo pirkėjo!!! <br>";
    }
}
