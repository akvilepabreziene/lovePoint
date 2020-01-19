<?php

require('config/connection.php');
require_once('models/user.php');

$name = $_POST['user_name']; 
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password']; 
$password = password_hash($password, PASSWORD_DEFAULT);

// Password Encryption, If you like you can also leave sha1.
// Check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
//  Sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "Invalid Email.......";
}else{
    $result = mysqli_query(getConnect(),"SELECT * FROM users WHERE email = '$email'");
    $rowcount = mysqli_num_rows($result);
    print_r($rowcount);
        if($rowcount == 0){
        $query = createUser($name, $lastname, $email, $password, 1);
        print_r($query);
            if($query){
                echo "You have Successfully Registered.....";

            } else {
                echo "Error....!!";
            }
        } else {
        echo "This email is already registered, Please try another email...";
        }
}

