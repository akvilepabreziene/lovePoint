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
        $password = validate($_POST['password']);
   
        $checkEmail = checkUserEmail($email);

        $connectedUser = getUser($email, $password);

        if (isset($checkEmail)) {
            if(isset($connectedUser)) {
                //  echo "Prisijungete!";
                $_SESSION['login'] = $connectedUser;
                array_push($loginErrorsArray, true);
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



