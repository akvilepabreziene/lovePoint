<?php

require('config/connection.php');
require_once('models/user.php');
require('functions.php');

session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST")  {

    $emailError = checkInput('email', 'įveskite el.paštą');

    $passwordError = checkInput('password', 'įveskite slaptažodį');

    if (!$emailError && !$passwordError) {

        $email = validate($_POST['email']);
        $password = validate($_POST['password']);
   
        $checkEmail = checkUserEmail($email);

        $connectedUser = getUser($email, $password);

        if (isset($checkEmail)) {
            if(isset($connectedUser)) {
                //  echo "Prisijungete!";
                $_SESSION['login'] = $connectedUser;
                $loginErrorsArray['connection'] = true;
            } else {
                $loginErrorsArray['password'] = 'Neteisingas slaptažodis';
            }
        } else {
            $loginErrorsArray['email'] = 'Neteisingas el.pašto adresas arba toks vartotojas neregistruotas';
        }

    } else {
            $loginErrorsArray['email'] = $emailError;
             $loginErrorsArray['password'] = $passwordError;
    }

    echo json_encode ($loginErrorsArray);  
}



