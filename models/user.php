<?php
    require('../config/connection.php');
//returns all users

function getAllUsers($qty = 999999) {
    $sql = "SELECT * FROM  users LIMIT $qty";
    $users = mysqli_query(getConnect(), $sql);

    return $users;
}

// return user by email and password.
function getuser($email, $password) {
    $sql = "SELECT * FROM users WHERE user_name = '$email' and password = '$password '";
    $userObject = mysqli_query(getConnect(), $sql);
    $user = mysqli_fetch_assoc($userObject);

    return $user;
}
