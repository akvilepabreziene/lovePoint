<?php


function getAllUsers($qty = 999999) {
    $sql = "SELECT * FROM  users LIMIT $qty";
    $users = mysqli_query(getConnect(), $sql);

    return $users;
}

// return user by email and password.
function getUser($email, $password) {
    $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password '";
    $userObject = mysqli_query(getConnect(), $sql);
    $user = mysqli_fetch_assoc($userObject);

    return $user;
}

// ckeck or user email correct
function checkUserEmail($email) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $userObject = mysqli_query(getConnect(), $sql);
    $user = mysqli_fetch_assoc($userObject);

    return $user;
}

function createUser($user_name, $lastname, $email, $password, $role) {
    
    $sql = "INSERT INTO users VALUES (NULL, '$user_name', '$lastname', '$email', '$password', $role)";

    $createUser = mysqli_query(getConnect(), $sql);

     if (!$createUser && DEBUG_MODE > 0 ) {
        echo "ERROR: nepavyko sukurti naujo vartotojo!!! <br>";
    }
}

