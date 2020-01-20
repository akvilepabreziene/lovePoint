<?php

require_once('uploads.php');
require('functions.php');
require_once('models/category.php'); 
require_once('models/product.php'); 
require_once('models/picture.php');

if((isset($_POST['title']) && $_POST['title'] !='') && (isset($_POST['product_code'])&& $_POST['product_code'] !='') && (isset($_POST['price']) && $_POST['price'] !='') && (isset($_POST['material']) && $_POST['material'] !='') && (isset($_POST['description'])&& $_POST['description'] !='') && (isset($_POST['category_id']) && $_POST['category_id'] !='') && (isset($_POST['quantity']) && $_POST['quantity'] !='')) {

     $title = htmlspecialchars($_POST['title']);
     $product_code = htmlspecialchars($_POST['product_code']);
     $price = htmlspecialchars($_POST['price']);
     $material = htmlspecialchars($_POST['material']);
     $description = htmlspecialchars($_POST['description']);
     $category_id = htmlspecialchars($_POST['category_id']);
     $quantity = htmlspecialchars($_POST['quantity']);

     createProduct($title, $product_code, $price, $material, $description, $category_id, $quantity);

    $lastCreated = getNewProducts(1);

    $product = mysqli_fetch_assoc($lastCreated);

    $product_id = $product['id'];

    $picture_name = basename($_FILES["fileToUpload"]["name"]);

    uploadPicture($product_id, $picture_name);

    header("Location: page_product.php?id=$product_id");


}




