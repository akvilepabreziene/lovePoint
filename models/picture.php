<?php

// Return one picture by id
// Return an array
function getPicture($id) {
    $sql = "SELECT * FROM pictures WHERE product_id = '$id' ";
    $getObject = mysqli_query(getConnect(), $sql);
    $picture = mysqli_fetch_assoc($getObject);

    return $picture;
}

function uploadPicture($product_id, $picture_name) {

    $sql = "INSERT INTO pictures VALUES (NULL, '$picture_name', '$product_id')";

    $uploadPicture = mysqli_query(getConnect(), $sql);

    if (!$uploadPicture && DEBUG_MODE > 0 ) {
        echo "ERROR: nepavyko sukurti naujo producto!!! <br>";
    }
}

function deletePicture($id) {
    $sql = "DELETE FROM pictures WHERE product_id = '$id' ";
    $delete= mysqli_query(getConnect(), $sql);
}

