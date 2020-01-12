<?php

// Return one picture by id
// Return an array
function getPicture($id) {
    $sql = "SELECT * FROM pictures WHERE id = '$id' ";
    $getObject = mysqli_query(getConnect(), $sql);
    $picture = mysqli_fetch_assoc($getObject);

    return $picture;
}

