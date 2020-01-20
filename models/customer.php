<?php


//getAllcustomers() returns all customers

function getAllCustomers($qty = 999999) {
    $sql = "SELECT * FROM customers LIMIT $qty";
    $allCustomers = mysqli_query(getConnect(), $sql);

    return $allCustomers;
}

function getCustomerByEmail($email) {
    $sql = "SELECT * FROM customers WHERE email = '$email' ";
    $customer = mysqli_query(getConnect(), $sql);
    $customer = mysqli_fetch_assoc($customer);

    return $customer;
}

// Function returns recent orders
function getLastCustomer($qty = 999999) {
    $sql = "SELECT * FROM customers ORDER BY id DESC LIMIT $qty";
    $latestCustomer = mysqli_query(getConnect(), $sql);
    

    return $latestCustomer;
}


function createCustomer($name, $lastname, $adress, $email, $phone) {
    $name = htmlspecialchars($name, ENT_QUOTES);
    $lastname = htmlspecialchars($lastname, ENT_QUOTES);
    $adress = htmlspecialchars($adress, ENT_QUOTES);
    $email = htmlspecialchars($email, ENT_QUOTES);
    $phone = htmlspecialchars($phone, ENT_QUOTES);


    $sql = "INSERT INTO customers VALUES (NULL, '$name', '$lastname', '$email', '$adress', '$phone')";

    $insertNewCustomer = mysqli_query(getConnect(), $sql);

    if (!$insertNewCustomer && DEBUG_MODE > 0) {
        echo "ERROR: nepavyko sukurti naujo pirkėjo!!! <br>";
    }
}