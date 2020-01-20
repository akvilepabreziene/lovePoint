<?php

require('config/connection.php');
require_once('models/user.php');
require('functions.php');

session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST")  {

    $emailError = checkInput('email', 'įveskite el.paštą');

    $passwordError = checkInput('password', 'įveskite slaptažodį');
    
    $loginErrorsArray = [];

    if (!$emailError && !$passwordError) {

        $email = validate($_POST['email']);
        $password = $_POST['password'];
   
        $checkEmail = checkUserEmail($email);

        if (isset($checkEmail)) {

             $hash_password = $checkEmail['password'];

            if(password_verify($password, $hash_password)) {

                $_SESSION['login'] = $checkEmail;

                array_push($loginErrorsArray, true);

                if($checkEmail['role'] == 2) {

                    $_SESSION['admin'] = $checkEmail;
                }
            } else {
                array_push($loginErrorsArray, 'Neteisingas slaptažodis');
            }
        } else {

             array_push($loginErrorsArray, 'Neteisingas el.pašto adresas arba toks vartotojas neregistruotas');
        }

    } else {
            
            array_push($loginErrorsArray, 'Užpildykite tuščius laukelius');


    }

    echo json_encode ($loginErrorsArray);  
}



