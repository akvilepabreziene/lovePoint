<?php

//returns all categories, return array

function getAllCategories($qty = 999999) {
    $sql = "SELECT * FROM categories LIMIT $qty";
    $allCategories = mysqli_query(getConnect(), $sql);

    return $allCategories;
}

function getCategory($category_id) {
    $sql = "SELECT * FROM categories WHERE id = '$category_id' ";
    $categoryObject = mysqli_query(getConnect(), $sql);
    $category = mysqli_fetch_assoc($categoryObject);

    return $category;
}