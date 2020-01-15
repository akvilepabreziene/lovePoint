<?php

// Data validation
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// Function for input check or it is not empty

function checkInput($input_name = '', $errorMessage = '') {

    if (empty($_POST[$input_name])) {

        $inputName_Error = "$'$input_name'Error";
        $inputName_Error = $errorMessage;
        return $inputName_Error;
        // echo $inputName_Error;
    } 
}


