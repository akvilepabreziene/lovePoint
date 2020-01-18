<?php
require('config/connection.php');
require_once('models/product.php'); 
require_once('models/picture.php'); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $picture = getPicture($id);

    $picture_name = $picture['picture_name'];

    deleteProduct($id);

        if(isset($_POST['delete_file']))
        {
            $filename = $_POST['file_name'];

            $path = 'pictures/'.$filename;
            print_r($path);
            unlink('pictures/'.$filename);
        }






    header("Location: page_all_products.php");

}

