<?php
// require('uploads.php');
require('functions.php');
require('config/connection.php');
require_once('models/category.php'); 
require_once('models/product.php'); 
require_once('models/picture.php');

// print_r($_FILES["fileToUpload"]["tmp_name"]);
print_r(getimagesize($_FILES["fileToUpload"]["tmp_name"]));


$target_dir = "pictures/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
print_r(strtolower(pathinfo($target_file, PATHINFO_EXTENSION)));
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



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


    //  header("Location: page_product.php?id=$id");
    $product_id = $product['id'];

    $picture_name = basename($_FILES["fileToUpload"]["name"]);

    uploadPicture($product_id, $picture_name);

    //  header("Location: page_product.php?id=$product_id");


}




