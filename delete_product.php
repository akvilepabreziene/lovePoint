<?php
include('header.php');
require_once('models/product.php'); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    deleteProduct($id);

    header("Location: page_all_products.php");

}

