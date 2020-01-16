<?php

//returns all categories, return array

function getAllCategories($qty = 999999) {
    $sql = "SELECT * FROM categories LIMIT $qty";
    $allCategories = mysqli_query(getConnect(), $sql);

    return $allCategories;
}