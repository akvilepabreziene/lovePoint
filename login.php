<?php

require('config/connection.php');
require_once('models/user.php');
require('functions.php');



if ($_SERVER["REQUEST_METHOD"] == "POST")  {

    $email = checkInput('email', 'įveskite el.paštą');

    $password = checkInput('password', 'įveskite slaptažodį');

    $checkEmail = checkUserEmail($email);

    $connectedUser = getUser($email, $password);


    if (isset($checkEmail)) {
        if(isset($connectedUser)) {
            // echo "Prisijungete!";
            setcookie('login_id', 1, time() + (86400 * 30), "/");
        } else {
            $_COOKIE['login_id'] = 0;
            $loginError = 'Neteisingas slaptažodis';
            // echo 'Neteisingas slaptažodis';

        }
    } else {
        $loginError = 'Neteisingas el.pašto adresas arba toks vartotojas neregistruotas';
    }

     $ajaxmessage = 'Ajax veikia';

    echo json_encode( $ajaxmessage);  
}



